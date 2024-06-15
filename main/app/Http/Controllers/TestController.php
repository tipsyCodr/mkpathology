<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function store(Request $request)
    {
        // dd($request->all());
        $inp = $request->all();
        $test = new Test();
        $test->fill($inp);
        $test->save();
    }
    public function view()
    {
        // retrieve test details here
        $tests = Test::paginate(10);
        return view('test.view', compact('tests'));
    }

}
