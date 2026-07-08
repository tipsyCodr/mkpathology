<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Categories;
use App\Models\Package;
use App\Models\Parameter;
use App\Models\Test;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WebController extends Controller
{
    public function __invoke($view)
    {
        return view($view);
    }


    public function exportPackagesWithTestsAndParameters()
    {
        // Open or create the CSV file
        $fileName = public_path('packages_export.csv');
        $file = fopen($fileName, 'w');

        // Write the headers to the CSV file
        fputcsv($file, ['Package Name', 'Package Price', 'Test Name', 'Parameter Name', 'Parameter Unit', 'Normal Range']);

        // Fetch all packages
        $packages = Package::all();

        foreach ($packages as $package) {
            // Retrieve related tests for the package
            $tests = Test::whereIn('id', json_decode($package->test_id, true))->get();

            foreach ($tests as $test) {
                // Retrieve related parameters for each test
                $parameters = Parameter::whereIn('id', json_decode($test->parameter_id, true) ?? [])->get();

                if ($parameters->count() === 0) {
                    // If no parameters, write only package and test details
                    fputcsv($file, [$package->name, $package->price, $test->name, '', '', '']);
                } else {
                    // Write each parameter for the test
                    foreach ($parameters as $parameter) {
                        fputcsv($file, [
                            $package->name,
                            $package->price,
                            $test->name,
                            $parameter->name,
                            $parameter->unit,
                            $parameter->normal_range,
                        ]);
                    }
                }
            }
        }

        // Close the file
        fclose($file);

        return response()->download($fileName);
    }
    public function exportTestsWithParameters()
    {
        // Open or create the CSV file
        $fileName = public_path('tests_export.csv');
        $file = fopen($fileName, 'w');

        // Write the headers to the CSV file
        fputcsv($file, ['Test Name', 'Test Price', 'Parameter Name', 'Parameter Unit', 'Normal Range']);

        // Fetch all tests
        $tests = Test::all();

        foreach ($tests as $test) {
            // Retrieve related parameters for each test
            $parameters = Parameter::whereIn('id', json_decode($test->parameter_id, true) ?? [])->get();

            if ($parameters->count() === 0) {
                // If no parameters, write only test details
                fputcsv($file, [$test->name, $test->price, '', '', '']);
            } else {
                // Write each parameter for the test
                foreach ($parameters as $parameter) {
                    fputcsv($file, [
                        $test->name,
                        $test->price,
                        $parameter->name,
                        $parameter->unit,
                        $parameter->normal_range,
                    ]);
                }
            }
        }

        // Close the file
        fclose($file);

        return response()->download($fileName);
    }

    public function home(Request $request)
    {
        $search = $request->query('search', '');
        $categories = Categories::all();
        $tests = Test::when($search, function (Builder $query) use ($search): void {
            $query->where('name', 'like', '%' . $search . '%');
        })->paginate(30);

        $packages = \App\Models\Package::with('tests')->get()->map(function ($package) {
            $package->test_ids = $package->tests->pluck('name')->toArray();
            return $package;
        });

        $cart = auth()->user()
            ? auth()->user()->cart()->latest()->first() ?? auth()->user()->cart()->create()
            : Cart::where('session_id', session()->getId())->first() ?? Cart::create(['session_id' => session()->getId()]);

        return view('home', compact('tests', 'search', 'packages', 'categories', 'cart'));
    }

    public function search(Request $request)
    {
        $categories = Categories::all();

        return view('search', compact('categories'));

    }
    public function searchByQuery(Request $request)
    {
        // $category = $request->input
        $query = $request->query('q');

        if ($query) {
            $tests = Test::where('name', 'like', '%' . $query . '%')->get();
            $packages = Package::where('name', 'like', '%' . $query . '%')->get();
        } else {
            // Handle the case when no query is provided
            $tests = collect();  // Empty collection
            $packages = collect();  // Empty collection
        }

        $cart = auth()->user()
            ? auth()->user()->cart()->latest()->first() ?? auth()->user()->cart()->create()
            : Cart::where('session_id', session()->getId())->first() ?? Cart::create(['session_id' => session()->getId()]);

        return view('search', compact('tests', 'packages', 'cart'));
        foreach ($tests as $test) {
            echo $test->name;
            echo '<br>';
        }

    }
    public function searchByCategory(Request $request)
    {
        // $category = $request->input
        $categoryId = $request->segment(3);
        $categoryName = Categories::find($categoryId)->name;
        // find all tests & Packages in that category
        $testsByCategory = Test::whereJsonContains('category_id', $categoryId)->get();
        $packageByCategory = Package::whereJsonContains('category_id', $categoryId)->get();

        $cart = auth()->user()
            ? auth()->user()->cart()->latest()->first() ?? auth()->user()->cart()->create()
            : Cart::where('session_id', session()->getId())->first() ?? Cart::create(['session_id' => session()->getId()]);

        return view('search', compact('testsByCategory', 'packageByCategory', 'categoryName', 'cart'));


    }

    public function admin()
    {
        try {
            $bookings = \App\Models\PackageBooking::with('package', 'user')
                ->latest()
                ->take(10)
                ->get()
                ->map(function ($booking) {
                    $data = [
                        'id' => $booking->id ?? null,
                        'type' => 'Package',
                        'patient' => $booking->user ? $booking->user->name : 'Unknown',
                        'date' => $booking->booking_date ?? null,
                        'status' => ucfirst($booking->status ?? ''),
                        'package' => $booking->package ? $booking->package->name : 'No Packages found',
                        'slot' => $booking->slot ?? null,
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
                                'id' => $booking->id ?? null,
                                'type' => 'Test',
                                'patient' => $booking->user ? $booking->user->name : 'Unknown',
                                'date' => $booking->booking_date ?? null,
                                'status' => ucfirst($booking->status ?? ''),
                                'test' => $booking->test ? $booking->test->name : 'Unknown',
                                'slot' => $booking->slot ?? null,
                                'status_classes' => $booking->status === 'completed' ? 'bg-green-500 text-white' : 'bg-red-500 text-white',
                            ];
                            return $data;
                        })
                );
            return view('admin.dashboard', compact('bookings'));
        } catch (\Exception $e) {
            // Handle the exception appropriately
            // For example, log the exception and display an error page to the user
            return redirect()->back()->with('error', $e->getMessage());
        }
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
        try {
            $bookings = \App\Models\PackageBooking::with('package', 'user')
                ->latest()
                ->get()
                ->map(function ($booking) {
                    $data = [
                        'id' => $booking->id ?? null,
                        'type' => 'Package',
                        'patient' => $booking->user ? $booking->user->name : 'Unknown',
                        'date' => $booking->booking_date ?? null,
                        'status' => ucfirst($booking->status ?? ''),
                        'package' => $booking->package ? $booking->package->name : 'No Packages found',
                        'slot' => $booking->slot ?? null,
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
                                'id' => $booking->id ?? null,
                                'type' => 'Test',
                                'patient' => $booking->user ? $booking->user->name : 'Unknown',
                                'date' => $booking->booking_date ?? null,
                                'status' => ucfirst($booking->status ?? ''),
                                'test' => $booking->test ? $booking->test->name : 'No Tests found',
                                'slot' => $booking->slot ?? null,
                                'status_classes' => $booking->status == 'completed' ? 'bg-green-500 text-white' : 'bg-red-500 text-white',
                            ];
                            return $data;
                        })
                );
            return view('admin.bookings', compact('bookings'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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

        //Get cart
        $cart = auth()->user()
            ? auth()->user()->cart()->latest()->first() ?? auth()->user()->cart()->create()
            : Cart::where('session_id', session()->getId())->first() ?? Cart::create(['session_id' => session()->getId()]);


        return view('tests', compact('tests', 'search', 'cart'));
    }

    public function searchAllTests(Request $request)
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

        $cart = auth()->user()
            ? auth()->user()->cart()->latest()->first() ?? auth()->user()->cart()->create()
            : Cart::where('session_id', session()->getId())->first() ?? Cart::create(['session_id' => session()->getId()]);


        return view('view-description', compact('item', 'type', 'cart'));
    }
    public function getTest(Request $request)
    {
        $id = request()->segment(2);
        return Test::find($id);
    }
    public function fetchPackage(Request $request)
    {
        $id = request()->segment(2);
        $package = Package::find($id);
        $packageName = $package->name;
        $packageDesc = $package->description;
        $photoURL = $package->package_photo_url;
        $testIDs = $package->test_id;
        $testCount = json_decode($testIDs) ? count(json_decode($testIDs)) : 0;
        $price = $package->price;
        $tests = [];
        $testIDs = json_decode($testIDs, true);
        foreach ($testIDs as $testID) {
            $test = Test::find($testID);
            $testName = $test->name;
            $parameters = json_decode($test->parameter_id, true);
            $parameterNames = [];
            $parameterCount = 0;

            if (is_array($parameters)) {
                $parameterCount = count($parameters); // Get the count of parameters
                foreach ($parameters as $parameter) {
                    $parameterNames[] = Parameter::find($parameter)->name;
                }
            }
            $tests[] = [
                'name' => $testName,
                'items' => $parameterNames,
                'parameterCount' => $parameterCount // Add parameter count to the array
            ];
        }

        $data = [
            'id' => $id,
            'name' => $packageName,
            'price' => $price,
            'description' => $packageDesc,
            'testCount' => $testCount,
            'tests' => $tests,
            'photoURL' => $photoURL
        ];
        return response()->json($data);

    }

    public function fetchTest(Request $request)
    {
        $id = request()->segment(2);
        $test = Test::find($id);
        $name = $test->name;
        $description = $test->description;
        $price = $test->price;
        $parameters = json_decode($test->parameter_id, true);
        $parameterNames = [];
        $parameterCount = 0;

        if (is_array($parameters)) {
            $parameterCount = count($parameters); // Get the count of parameters
            foreach ($parameters as $parameter) {
                $parameterNames[] = Parameter::find($parameter)->name;
            }
        }
        $tests[] = [
            'name' => $name,
            'items' => $parameterNames,
            'parameterCount' => $parameterCount // Add parameter count to the array
        ];

        $data = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'tests' => $tests,

        ];
        return response()->json($data);

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
