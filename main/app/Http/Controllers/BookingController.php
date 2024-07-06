<?php

namespace App\Http\Controllers;

use App\Models\PackageBooking;
use App\Models\Patient;
use App\Models\Test;
use App\Models\TestBooking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //
    public function bookPackage(Request $request)
    {
        // Check if user exists
        $user = User::where('email', $request->email)
            ->orWhere('mobile', $request->mobile)
            ->orWhere('name', $request->name)
            ->first();

        if (!$user) {
            // Create a new user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => $request->mobile,
            ]);

            $user->assignRole('patient');

            // Create a new patient
            $patientData = [
                'user_id' => $user->id,
                'age' => $request->age,
                'gender' => $request->gender,
                'address' => $request->address,
                'city' => $request->city,
                'pincode' => $request->pincode,
                'reach' => json_encode($request->reach),
                'authorize' => (bool) $request->authorize,
            ];
            $patient = Patient::firstOrCreate($patientData);

            $bookingData = [
                'user_id' => $user->id,
                'package_id' => $request->package,
                'booking_date' => $request->date,
                'slot' => $request->slot,
                'status' => 'pending',
            ];
            $booking = PackageBooking::create($bookingData);

            if ($user && $patient && $booking) {
                // Attempt to login
                if (Auth::loginUsingId($user->id)) {
                    $request->session()->regenerate();

                    return view('create-password', compact('user', 'patient', 'booking'));
                }

            } else {
                return redirect()->back()->with('error', 'Failed to create booking. Registration failed.');
            }
        }

        $bookingData = [
            'user_id' => $user->id,
            'package_id' => $request->package,
            'booking_date' => $request->date,
            'slot' => $request->slot,
            'status' => 'pending',
        ];
        $booking = PackageBooking::create($bookingData);

        if ($user && $booking) {
            // Attempt to login
            if (Auth::loginUsingId($user->id)) {
                $request->session()->regenerate();

                // Redirect based on role
                $userController = new UserController();
                return $userController->redirectBasedOnRole(Auth::user());
            }

            return redirect()->back()->with('success', 'Booking created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create booking. Registration failed.');
        }
    }

    //
    public function bookTest(Request $request)
    {
        echo "Tests: ";
        // dd($request->all());
        $bookingData = [
            'user_id' => Auth::user()->id,
            'tests_ids' => $request->test_id,
            'booking_date' => $request->date,
            'slot' => $request->slot,
            'status' => 'pending',
        ];
        $booking = TestBooking::create($bookingData);
        return redirect()->back()->with('success', 'Booking created successfully.');
    }
    public function bookFor(Request $request)
    {
        dump($request->all());
        $bookTestFor = TestBooking::create([
            'user_id' => $request->user_id,
            'booking_date' => $request->booking_date,
            'tests_ids' => $request->test_id,
            'slot' => $request->slot,
            'status' => $request->has('status') ? 'booked' : 'pending',
        ]);
        return redirect()->back()->with('success', 'Test Booked successfully.');
    }

    //  Fetch bookings
    public function booking()
    {
        $bookings = \App\Models\PackageBooking::with('package', 'user')
            ->where('user_id', Auth::user()->id)
            ->latest()
            ->get()
            ->merge(
                \App\Models\TestBooking::with('test', 'user')
                    ->where('user_id', Auth::user()->id)
                    ->latest()
                    ->get()
            )
            ->map(function ($booking) {
                $data = [
                    'id' => $booking->id,
                    'type' => get_class($booking) == 'App\Models\PackageBooking' ? 'Package' : 'Test',
                    'patient' => $booking->user->name,
                    'date' => $booking->booking_date,
                    'status' => ucfirst($booking->status),
                    'title' => get_class($booking) == 'App\Models\PackageBooking' ? $booking->package->name : $booking->test->name,
                    'slot' => $booking->slot,
                    'status_classes' => $booking->status == 'completed' ? 'bg-green-500 text-white' : 'bg-red-500 text-white',
                ];
                return $data;
            });
        return view('patient.bookings', compact('bookings'));
    }

    // Cancel a booking
    public function cancelPackage(Request $request)
    {
        if ($request->type == 'Test') {
            $booking = TestBooking::find($request->id);
        } else {
            $booking = PackageBooking::find($request->id);
        }

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        if ($booking->status == 'canceled') {
            return redirect()->back()->with('error', 'Booking already canceled.');
        }

        $booking->status = 'cancelled';
        if ($booking->save()) {
            return redirect()->back()->with('success', 'Booking canceled successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to cancel booking.');
        }
    }

    public function PatientTestView(Request $request)
    {
        // $request = $request->all();
        $search = $request->input('search');
        $user = auth()->user();
        $query = Test::select('id', 'name', 'price', 'description');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }

        $tests = $query->get();
        return view('patient.tests', compact('tests'));
    }

    public function viewTestByPatient($id)
    {
        // retrieve data for all test patient has booked here details here
        $tests = TestBooking::where('user_id', $id)->get();
        return $tests;

    }

}
