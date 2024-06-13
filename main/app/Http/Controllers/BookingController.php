<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function bookTest(Request $request)
    {
        dd($request->all());
    }
}
