<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function store(Request $request)
    {
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
            'authorize' => $request->authorize ? 1 : 0,
        ]);

        dd($request->all());
        $inp = $request->all();
        $user = new User();
        $user->fill($inp);
        $user->save();
        return redirect()->back()->with('success', 'You Are Successfully Registered');
    }
}
