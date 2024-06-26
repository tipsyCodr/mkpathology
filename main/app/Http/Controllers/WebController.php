<?php

namespace App\Http\Controllers;

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

    public function showAllTests()
    {
        $search = request()->query('search', '');
        $tests = \App\Models\Test::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->paginate(30);

        return view('tests', compact('tests', 'search'));
    }

}
