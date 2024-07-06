<?php

namespace App\Http\Controllers;

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
                    'status' => ucfirst($booking->status),
                    'package' => $booking->package->name,
                    'slot' => $booking->slot,
                    'status_classes' => $booking->status == 'completed' ? 'bg-green-500 text-white' : 'bg-red-500 text-white',
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
                            'status' => ucfirst($booking->status),
                            'test' => $booking->test->name,
                            'slot' => $booking->slot,
                            'status_classes' => $booking->status == 'completed' ? 'bg-green-500 text-white' : 'bg-red-500 text-white',
                        ];
                        return $data;
                    })
            );
        return view('admin.dashboard', compact('bookings'));
    }
    public function booking()
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
                    'status' => ucfirst($booking->status),
                    'package' => $booking->package->name,
                    'slot' => $booking->slot,
                    'status_classes' => $booking->status == 'completed' ? 'bg-green-500 text-white' : 'bg-red-500 text-white',
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
}
