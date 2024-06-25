<?php

namespace App\Http\Controllers;

use App\Models\PasswordResetToken;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Str;

class UserController extends Controller
{
    public function store(Request $request)
    {
        if (!isset($request->password)) {
            $pass = bcrypt($request->mobile);
        }
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => $pass ?? $request->password,
        ];

        $user = User::updateOrCreate($userData, $userData);

        $patientData = [
            'user_id' => $user->id,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'authorize' => (bool) $request->authorize,
        ];

        $patient = Patient::updateOrCreate(['user_id' => $user->id], $patientData);

        $user->assignRole('patient');

        // Attempt to login
        if (Auth::loginUsingId($user->id)) {
            $request->session()->regenerate();

            // Redirect based on role
            return $this->redirectBasedOnRole(Auth::user());
        }


        return redirect()->back()->with('success', 'You Are Successfully Registered');
    }



    public function resetLink(Request $request)
    {
        $inp = $request->except('_token');
        if (!isset($inp['email'])) {
            return redirect()->back()->with('error', 'Email not found');
        }

        $user = User::where('email', $inp['email'])->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email not found');
        }

        $token = PasswordResetToken::updateOrCreate(
            ['email' => $inp['email']],
            ['token' => Str::random(60), 'created_at' => now()]
        );

        try {
            Mail::send('emails.password_reset', ['token' => $token->token], function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('Password Reset Request');
            });
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error sending reset link');
        }

        return redirect()->back()->with('success', 'Reset link sent to your email');
    }

    public function redirectBasedOnRole($user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin');
        } elseif ($user->hasRole('patient')) {
            return redirect()->route('patient.dashboard');
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Checks if the user with ID 8 has the 'book test' permission.
     * Used just for testing purposes
     * @return \Illuminate\Http\JsonResponse Returns a JSON response indicating if the user has the permission or not.
     */
    public function checkPermission()
    {

        $user = User::findOrFail(8);
        $user->assignRole('patient');

        if ($user->can('book test')) {
            return response()->json(['message' => 'User has permission']);
        } else {
            return response()->json(['message' => 'User does not have permission']);
        }
    }

    public function forgotPassword(Request $request)
    {
        return view('emails.forgot-password', ['user' => User::findOrFail(8)]);
    }
    //password Reset
    public function resetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        // return response()->json(['message' => 'Password reset successfully'], 200);

        // Redirect based on role
        $userController = new UserController();
        return $userController->redirectBasedOnRole(Auth::user());

    }

    //make a login function
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::validate($credentials)) {
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user, $request->has('remember'));
            $request->session()->regenerate();
            return $this->redirectBasedOnRole(Auth::user());
        }
        return redirect()->back()->with('error', 'Invalid Credentials');
    }
    public function fetchPatientSetting()
    {
        $user = Auth::user();
        $patient = Patient::where('user_id', $user->id)->first();
        // return $patient;
        return view('patient.settings', ['patient' => $patient]);
    }
    //updatepassword
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('success', 'Password updated successfully');

    }

    public function updateEmail(Request $request)
    {
        $user = Auth::user();
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success', 'Email updated successfully');

    }
    public function updateName(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->save();
        return redirect()->back()->with('success', 'Name updated successfully');
    }

    public function updatePatientSetting(Request $request)
    {
        $user = Auth::user();
        $patient = Patient::where('user_id', $user->id)->first();
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->address = $request->address;
        $patient->city = $request->city;
        $patient->pincode = $request->pincode;
        // $patient->authorize = (bool) $request->authorize;
        $patient->save();
        return redirect()->back()->with('success', 'Patient Details updated successfully!');


    }

    // make a Logout function
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
