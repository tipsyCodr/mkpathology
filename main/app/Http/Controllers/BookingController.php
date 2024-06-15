<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function bookPackage(Request $request)
    {
        echo "Package: ";
        // dd($request->all());
        $inp = $request->all();
        return $inp['name'];

    }
    //
    public function bookTests(Request $request)
    {
        echo "Tests: ";
        dd($request->all());
    }
}
