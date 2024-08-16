<?php

namespace App\Http\Controllers;

use App\Models\Package;
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
    public function index($packageId)
    {
        $package = Package::find($packageId);
        $packageName = $package->name;

        return view('book', compact('packageId', 'packageName'));
    }
    public function testViewBook($testId)
    {
        $test = Test::find($testId);
        $testName = $test->name;

        return view('test-book', compact('testId', 'testName'));
    }
    public function bookPackage(Request $request)
    {

        $bookingDate = new \DateTime($request->booking_date);
        if ($bookingDate->format('l') == 'Sunday') {
            return redirect()->back()->with('error', 'Booking can not be done on Sunday.');
        }

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

                    // Uncomment if you want user to create a password on registration
                    // return view('create-password', compact('user', 'patient', 'booking'));
                }

            } else {
                return redirect()->back()->with('error', 'Failed to create booking. Registration failed.');
            }
        } else {

            $bookingData = [
                'user_id' => $user->id,
                'package_id' => $request->package,
                'booking_date' => $request->date,
                'slot' => $request->slot,
                'status' => 'pending',
            ];
            $booking = PackageBooking::create($bookingData);
        }


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
        // echo "Tests: ";
        // dd($request->booking_date);

        $bookingDate = new \DateTime($request->booking_date);
        if ($bookingDate->format('l') == 'Sunday') {
            return redirect()->back()->with('error', 'Booking can not be done on Sunday.');
        }
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
    public function bookTestFromHomepage(Request $request)
    {
        // echo "Tests: ";
        // dd($request->booking_date);

        $bookingDate = new \DateTime($request->booking_date);
        if ($bookingDate->format('l') == 'Sunday') {
            return redirect()->back()->with('error', 'Booking can not be done on Sunday.');
        }

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

            // dd($request->all());
            $bookingData = [
                'user_id' => $user->id,
                'tests_ids' => $request->test,
                'booking_date' => $request->date,
                'slot' => $request->slot,
                'status' => 'pending',
            ];
            $booking = TestBooking::create($bookingData);
            if ($user && $patient && $booking) {
                // Attempt to login
                if (Auth::loginUsingId($user->id)) {
                    $request->session()->regenerate();

                    // Uncomment if you want user to create a password on registration
                    // return view('create-password', compact('user', 'patient', 'booking'));
                }

            } else {
                return redirect()->back()->with('error', 'Failed to create booking. Registration failed.');
            }
        }

        // return redirect()->back()->with('success', 'Booking created successfully.');
    }
    public function bookFor(Request $request)
    {
        // dump($request->all());
        // dd($request->booking_date);
        $bookingDate = new \DateTime($request->booking_date);
        if ($bookingDate->format('l') == 'Sunday') {
            return redirect()->back()->with('error', 'Booking can not be done on Sunday.');
        }
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
        // Start by checking if the authenticated user exists
        if (Auth::check()) {
            $user = Auth::user();

            // Now fetch the bookings for the authenticated user
            $packageBookings = \App\Models\PackageBooking::with('package', 'user')
                ->where('user_id', $user->id)
                ->latest()
                ->get();

            $testBookings = \App\Models\TestBooking::with('test', 'user')
                ->where('user_id', $user->id)
                ->latest()
                ->get();

            // Merge the two collections and map the data
            $bookings = $packageBookings->merge($testBookings)
                ->map(function ($booking) {
                    $data = [
                        'id' => $booking->id,
                        'type' => get_class($booking) == 'App\Models\PackageBooking' ? 'Package' : 'Test',
                        'patient' => $booking->user ? $booking->user->name : 'Unknown',
                        'date' => $booking->booking_date,
                        'status' => $booking->status ? ucfirst($booking->status) : 'Unknown',
                        'title' => get_class($booking) == 'App\Models\PackageBooking' ? ($booking->package ? $booking->package->name : 'No Packages found') : ($booking->test ? $booking->test->name : 'No Tests found'),
                        'slot' => $booking->slot,
                        'status_classes' => $booking->status == 'completed' ? 'bg-green-500 text-white' : 'bg-red-500 text-white',
                    ];
                    return $data;
                });

            return view('patient.bookings', compact('bookings'));
        } else {
            // If the user is not authenticated, redirect to login
            return redirect()->route('login');
        }
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

        if ($booking->status == 'cancelled') {
            return redirect()->back()->with('error', 'Booking already cancelled.');
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

    /**
     * Retrieves the list of tests booked by a patient.
     *
     * @param int $id The ID of the patient.
     * @return \Illuminate\Support\Collection The collection of tests booked by the patient.
     */
    public function viewTestByPatient($id)
    {
        // Retrieve the data for all tests that the patient has booked.
        // The tests are retrieved based on the user ID of the patient.
        $tests = TestBooking::where('user_id', $id)->get();

        // Return the collection of tests booked by the patient.
        return $tests;
    }


}
