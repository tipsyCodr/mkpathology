<?php

namespace App\Http\Controllers;

use App\Models\PackageBooking;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function bookPackage(Request $request)
    {
        // dd($request->all());
        $user = User::firstOrCreate([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => $request->mobile,
        ]);

        $patient = Patient::firstOrCreate([
            'user_id' => $user->id,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'reach' => json_encode(explode(',', $request->reach)),
            'authorize' => $request->authorize ? 1 : 0,
        ]);

        $booking = PackageBooking::create([
            'user_id' => $user->id,
            'package_id' => $request->package,
            'booking_date' => $request->date,
            'slot' => $request->slot,
            'status' => 'pending',
        ]);

        if ($user && $patient && $booking) {
            return redirect()->back()->with('success', 'Booking created successfully.');

        } else {
            return redirect()->back()->with('error', 'Failed to create booking. Registration ' . ($user ? '' : 'failed. ') . ($patient ? '' : 'Failed.'));

        }


    }
    //
    public function bookTests(Request $request)
    {
        echo "Tests: ";
        dd($request->all());
    }


}
