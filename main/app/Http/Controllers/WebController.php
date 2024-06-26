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
    public function admin()
    {
        $query = \App\Models\PackageBooking::latest()
            ->take(10)
            ->with('package', 'user');
        $testBookings = \App\Models\TestBooking::latest()
            ->take(10)
            ->with('test', 'user');
        $bookings = $query->union($testBookings)->get();

        $bookings->map(function ($booking) {
            $data = [
                'id' => $booking->id,
                'type' => $booking instanceof \App\Models\PackageBooking ? 'Package' : 'Test',
                'patient' => optional($booking->user)->name,
                'date' => $booking->booking_date,
                'status' => ucfirst($booking->status),
            ];
            if ($booking instanceof \App\Models\PackageBooking) {
                $data['package'] = optional($booking->package)->name;
                $data['slot'] = $booking->slot;
            } else {
                $data['test'] = optional($booking->test)->name;
            }
            $data['status_classes'] = $booking->status == 'completed' ? 'bg-green-500 text-white' : 'bg-orange-500 text-white';
            if ($booking->status == 'canceled') {
                $data['status_classes'] = 'bg-red-500 text-white';
            }
            return $data;
        });
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
                    'patient' => $booking->user->name,
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
                            'patient' => $booking->user->name,
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
