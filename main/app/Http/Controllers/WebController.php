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
        $bookings = \App\Models\PackageBooking::latest()
            ->take(10)
            ->with('package', 'user')
            ->union(\App\Models\TestBooking::latest()->take(10)->with('test', 'user'))
            ->get()
            ->map(function ($booking) {
                $patient = $booking->user;
                if ($patient === null) {
                    throw new \Exception('User is null for booking: ' . $booking->id);
                }
                $data = [
                    'id' => $booking->id,
                    'type' => $booking instanceof \App\Models\PackageBooking ? 'Package' : 'Test',
                    'patient' => $patient->name,
                    'date' => $booking->booking_date,
                    'status' => ucfirst($booking->status),
                ];
                if ($booking instanceof \App\Models\PackageBooking) {
                    $package = $booking->package;
                    if ($package === null) {
                        throw new \Exception('Package is null for package booking: ' . $booking->id);
                    }
                    $data['package'] = $package->name;
                    $data['slot'] = $booking->slot;
                } else {
                    $test = $booking->test;
                    if ($test === null) {
                        throw new \Exception('Test is null for test booking: ' . $booking->id);
                    }
                    $data['test'] = $test->name;
                }
                $data['status_classes'] = $booking->status == 'completed' ? 'bg-green-500 text-white' : 'bg-orange-500 text-white';
                if ($booking->status == 'canceled') {
                    $data['status_classes'] = 'bg-red-500 text-white';
                }
                return $data;
            })
            ->all();
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

}
