<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Package;
use App\Models\Test;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function __invoke($view)
    {
        return view($view);
    }

    public function home(Request $request)
    {
        $search = $request->query('search', '');
        $tests = Test::when($search, function (Builder $query) use ($search): void {
            $query->where('name', 'like', '%' . $search . '%');
        })->paginate(30);

        $packages = \App\Models\Package::with('tests')->get()->map(function ($package) {
            $package->test_ids = $package->tests->pluck('name')->toArray();
            return $package;
        });

        return view('home', compact('tests', 'search', 'packages'));
    }

    public function search(Request $request)
    {
        $categories = Categories::all();

        return view('search', compact('categories'));

    }
    public function searchByQuery(Request $request)
    {
        // $category = $request->input

        $query = $request->segment(3);
        $tests = $query ? Test::where('name', 'like', '%' . $query . '%')->get() : Test::all()->paginate(30);
        $packages = $query ? Package::where('name', 'like', '%' . $query . '%')->get() : Package::all()->paginate(30);
        foreach ($tests as $test) {
            echo $test->name;
            echo '<br>';
        }

    }
    public function searchByCategory(Request $request)
    {
        // $category = $request->input
        $categoryId = $request->segment(3);

        // find all tests & Packages in that category
        $testsByCategory = Test::whereJsonContains('category_id', $categoryId)->get();
        $packageByCategory = Package::whereJsonContains('category_id', $categoryId)->get();

        return view('search', compact('testsByCategory', 'packageByCategory'));

        foreach ($testsByCategory as $test) {
            echo $test->name;
            echo $test->price;
            echo '<br>';
        }

        foreach ($packageByCategory as $package) {
            echo $package->name;
            echo $package->price;
            echo '<br>';
        }
    }

    public function admin()
    {
        $bookings = \App\Models\PackageBooking::with('package', 'user')
            ->latest()
            ->take(10)
            ->get()
            ->map(function ($booking) {
                $data = [
                    'id' => $booking->id,
                    'type' => 'Package',
                    'patient' => $booking->user ? $booking->user->name : 'Unknown',
                    'date' => $booking->booking_date,
                    'status' => ucfirst($booking->status ?? ''),
                    'package' => $booking->package ? $booking->package->name : 'No Packages found',
                    'slot' => $booking->slot,
                    'status_classes' => $booking->status === 'completed' ? 'bg-green-500 text-white' : 'bg-red-500 text-white',
                ];
                return $data;
            })
            ->merge(
                \App\Models\TestBooking::with('test', 'user')
                    ->latest()
                    ->take(10)
                    ->get()
                    ->map(function ($booking) {
                        $data = [
                            'id' => $booking->id,
                            'type' => 'Test',
                            'patient' => $booking->user ? $booking->user->name : 'Unknown',
                            'date' => $booking->booking_date,
                            'status' => ucfirst($booking->status ?? ''),
                            'test' => $booking->test ? $booking->test->name : 'Unknown',
                            'slot' => $booking->slot,
                            'status_classes' => $booking->status === 'completed' ? 'bg-green-500 text-white' : 'bg-red-500 text-white',
                        ];
                        return $data;
                    })
            );
        return view('admin.dashboard', compact('bookings'));
    }
    public function showCategory()
    {
        // get categories from table
        $categories = \App\Models\Categories::all();
        return view('admin.categories', compact('categories'));
    }
    public function createCategory(Request $request)
    {
        // add category name to table
        $request->validate([
            'name' => 'required',
        ]);

        $category = new \App\Models\Categories();
        $category->name = $request->name;
        $category->save();
        return redirect()->back();
    }
    public function editCategory()
    {
        return view('categories');
    }
    public function deleteCategory(Request $request)
    {
        try {
            $categoryId = $request->id;
            $category = \App\Models\Categories::find($categoryId);
            if (!$category) {
                throw new \Exception('Category not found');
            }
            $category->delete();
            return redirect()->back()->with('success', "Deleted Successfully!");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function booking()
    {
        $bookings = \App\Models\PackageBooking::with('package', 'user')
            ->latest()
            ->get()
            ->map(function ($booking) {
                $data = [
                    'id' => $booking->id,
                    'type' => 'Package',
                    'patient' => $booking->user ? $booking->user->name : 'Unknown',
                    'date' => $booking->booking_date,
                    'status' => ucfirst($booking->status),
                    'package' => $booking->package ? $booking->package->name : 'No Packages found',
                    'slot' => $booking->slot,
                    'status_classes' => $booking->status == 'completed' ? 'bg-green-500 text-white' : 'bg-red-500 text-white',
                ];
                return $data;
            })
            ->merge(
                \App\Models\TestBooking::with('test', 'user')
                    ->latest()
                    ->get()
                    ->map(function ($booking) {
                        $data = [
                            'id' => $booking->id,
                            'type' => 'Test',
                            'patient' => $booking->user ? $booking->user->name : 'Unknown',
                            'date' => $booking->booking_date,
                            'status' => ucfirst($booking->status),
                            'test' => $booking->test->name,
                            'slot' => $booking->slot,
                            'status_classes' => $booking->status == 'completed' ? 'bg-green-500 text-white' : 'bg-red-500 text-white',
                        ];
                        return $data;
                    })
            );
        return view('admin.bookings', compact('bookings'));
    }


    /**
     * Show all tests.
     *
     * @param \Illuminate\Http\Request $request The request object.
     * @return \Illuminate\Contracts\View\View The view displaying all tests.
     */
    public function showAllTests(Request $request): \Illuminate\Contracts\View\View
    {
        $search = $request->query('search', '');
        $tests = Test::when($search, function (Builder $query) use ($search): void {
            $query->where('name', 'like', '%' . $search . '%');
        })->paginate(30);

        return view('tests', compact('tests', 'search'));
    }

    public function searchAllTests(Request $request, )
    {
        $search = $request->get('search', '');
        $tests = $search ? Test::where('name', 'like', '%' . $search . '%')->get() : Test::all()->paginate(30);
        return $tests;
    }

    public function searchAll(Request $request)
    {
        $search = $request->input('q', '');

        $tests = Test::when($search, function (Builder $query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->paginate(30);

        $packages = Package::when($search, function (Builder $query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->paginate(30);

        // Check if the $tests and $packages are not null
        if ($tests === null || $packages === null) {
            abort(500, 'Failed to fetch data.');
        }

        return [
            'tests' => $tests,
            'packages' => $packages,
        ];
    }

    public function viewDescription(Request $request)
    {
        $type = request()->segment(2);
        $id = request()->segment(3);
        if ($type === "package") {
            $item = Package::find($id);
        } else {
            $item = Test::find($id);

        }
        return view('view-description', compact('item', 'type'));
    }
    public function getTest(Request $request)
    {
        $id = request()->segment(2);
        return Test::find($id);
    }
    public function getPackage(Request $request)
    {
        $id = request()->segment(2);
        return Package::find($id);
    }
    public function confirmBooking($id, $status, $type)
    {
        $type == "Package" ? $booking = \App\Models\PackageBooking::find($id) : $booking = \App\Models\TestBooking::find($id);
        // $booking = \App\Models\PackageBooking::find($id);
        // dd($booking);
        // $booking->status = $status;
        switch ($status) {
            case 'pending':
                $booking->status = 'booked';
                $booking->save();
                return redirect()->back()->with('success', 'Confirmed Booking!');
                break;
            case 'booked':
                return redirect()->back()->with('error', 'Already Confirmed!.');
                break;
            case 'completed':
                return redirect()->back()->with('error', 'Error: Booking already completed!. Please book another appointment.');
                break;
            case 'cancelled':
                return redirect()->back()->with('error', 'Error: This Booking is cancelled!. Please book another appointment.');
                break;

            default:
                return redirect()->back()->with('error', 'This booking cannot be confirmed!');
        }
    }
    public function rescheduleBooking(Request $request)
    {
        $req = $request->all();

        // Determine the booking model based on the type.
        $bookingModel = $req['type'] == "package" ? \App\Models\PackageBooking::class : \App\Models\TestBooking::class;

        // Attempt to find the booking; if not found, return an error message.
        $booking = $bookingModel::find($req['id']);
        if (!$booking) {
            return redirect()->back()->with('error', 'Error: Booking not found. Please try again.');
        }

        // Handle the booking based on its status.
        if ($req['status'] == 'pending') {
            $booking->slot = $req['slot'];
            $booking->booking_date = $req['date'];
            $booking->save();
            return redirect()->back()->with('success', 'Rescheduled Booking!');
        } elseif ($req['status'] == 'completed' || $req['status'] == 'booked') {
            return redirect()->back()->with('error', 'Error: Booking already completed. Please book another appointment.');
        } else {
            return redirect()->back()->with('error', 'Error: Booking cancelled. Please book another appointment.');
        }
    }

}
