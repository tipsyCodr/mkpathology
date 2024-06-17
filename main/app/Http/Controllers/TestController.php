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
        return redirect()->back()->with('success', 'Test created successfully');
    }
    public function view()
    {
        // retrieve test details here
        $tests = Test::paginate(10);
        return view('test.view', compact('tests'));

    }
    public function destroy($id)
    {
        // delete test details here
        Test::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Test deleted successfully');
    }

    // public function update(Request $request, $id)
    // {
    //     $test = Test::find($id);
    //     $test->update($request->all());
    //     $test->save();
    //     return redirect()->route('test.view')->with('success', 'Test updated successfully');
    // }
}
