<?php
namespace App\Http\Controllers;

use App\Models\PackageBooking;
use App\Models\Patient;
use App\Models\TestBooking;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CheckoutController extends Controller
{
    public function showCheckoutForm()
    {
        $cart = auth()->check() ? auth()->user()->cart : Cart::where('session_id', session()->getId())->first();

        return view('checkout.form', compact('cart'));
    }

    public function processCheckout(Request $request)
    {
        if (!auth()->check()) {
            // Validate and register the user
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile' => 'required|digits:10',
                'age' => 'required|integer',
                'pincode' => 'required|digits:6',
                'gender' => 'required|in:Male,Female,Other',
                'address' => 'required|string',
            ]);
            $request->password = $request->mobile;

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => $request->mobile,
            ]);

            // Create or update patient record
            $patientData = [
                'user_id' => $user->id,
                'age' => $request->age,
                'gender' => $request->gender,
                'address' => $request->address,
                'city' => $request->city,
                'pincode' => $request->pincode,
                'authorize' => (bool) $request->authorize,
            ];

            Patient::updateOrCreate(['user_id' => $user->id], $patientData);

            // Assign patient role
            $user->assignRole('patient');

            // Assign guest cart to the new user
            $sessionId = session()->getId();
            $cart = Cart::where('session_id', $sessionId)->first();

            if ($cart) {
                $cart->user_id = $user->id;
                $cart->session_id = null;
                $cart->save();
            }

            // Authenticate the user
            Auth::login($user); // Uncommented to ensure the user is logged in
        }

        // Ensure the user is authenticated
        $user = auth()->user();

        // Process the payment and order...
        // dump('User id: ' . $user->id);

        // Access the cart associated with the authenticated user
        $cart = $user->cart;

        if (!$cart) {
            return response()->json(['error' => 'Cart not found.'], 404);
        }

        // dump('Cart of user: ' . $cart);

        $cartItems = $cart->map(function ($cartInstance) {
            return $cartInstance->items;
        })->flatten();

        // TODO: Process the payment
        // dump('Cart items: ' . $cartItems);
        // TODO: Create the order
        foreach ($cartItems as $cartItem) {
            // echo "inside";
            if (is_null($cartItem->test_id)) {
                // echo "inside1";
                try {
                    PackageBooking::create([
                        'user_id' => $user->id,
                        'package_id' => $cartItem->package_id,
                        'booking_date' => $request->date,
                        'slot' => $request->slot,
                        'status' => 'pending',
                    ]);
                    // echo "package booking created";
                } catch (\Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 500);
                    // echo "package booking not created";
                }
            } else {
                // echo "inside2";
                try {
                    TestBooking::create([
                        'user_id' => $user->id,
                        'test_id' => $cartItem->test_id,
                        'booking_date' => $request->date,
                        'slot' => $request->slot,
                        'status' => 'pending',
                    ]);
                } catch (\Exception $e) {
                    Log::error('Error creating test booking: ' . $e->getMessage());
                }
                // echo "inside3";
            }
        }


        // TODO: Empty the cart after booking

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->mobile, $user->password)) {
            Auth::login($user, true);
            if (Auth::check()) {
                // return "success";
                // $request->session()->regenerate();
                $userController = new UserController();
                return $userController->redirectBasedOnRole($user);
            } else {
                return "failed";
            }
        } else {
            return "Hash dont match";
        }



        // if (Auth::validate($credentials)) {
        //     $user = Auth::getProvider()->retrieveByCredentials($credentials);
        //     Auth::login($user, true);
        //     $request->session()->regenerate();

        //     // $intendedUrl = $request->session()->get('url.intended', '/');
        //     $userController = new UserController();

        //     return $userController->redirectBasedOnRole(Auth::user());
        //     echo "after redirect";

        //     // return redirect()->intended($intendedUrl);
        // }


        // echo "isset book";
        // $cart->each->delete(); // Remove items from the cart
        // // Redirect based on role
        // Auth::loginUsingId($user->id);
        // $userController = new UserController();
        // return $userController->redirectBasedOnRole($user);
        // echo "user redirected";

    }
}
