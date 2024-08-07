<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function store(Request $request)
    {
        // dd($request->all());
        $inp = $request->except('parameters');
        $test = new Test($inp);
        $test->parameter_id = json_encode($request->input('parameters', []));
        $test->save();
        return redirect()->back()->with('success', 'Test created successfully');
    }
    public function view()
    {
        // retrieve test details here
        $tests = Test::orderBy('id', 'desc')->get();
        $parameters = Parameter::all();
        return view('admin.test.view', compact('tests', 'parameters'));

    }
    public function edit($id)
    {
        // Find the test with the given id
        $test = Test::find($id);

        // Check if the test exists
        if (!$test) {
            return redirect()->back()->with('error', 'Test not found.');
        }

        // Retrieve all parameters
        $parameters = Parameter::all();

        // Decode the parameter ids
        $testParameter_id = json_decode($test->parameter_id, true) ?? [];

        // Find the parameters associated with the test
        $testParameter = array_map(function ($value) {
            return Parameter::find($value);
        }, $testParameter_id);

        // Filter out any null values in the testParameter array
        $testParameter = array_filter($testParameter);

        return view('admin.test.edit', compact('test', 'parameters', 'testParameter'));
    }
    public function update(Request $request)
    {
        // Check if the request has the required id
        if (!$request->has('id')) {
            return redirect()->back()->with('error', 'Invalid request.');
        }

        // Find the test with the given id
        $test = Test::find($request->input('id'));

        // Check if the test exists
        if (!$test) {
            return redirect()->back()->with('error', 'Test not found.');
        }

        try {
            // Update the test fields
            $test->name = $request->input('name');
            $test->price = $request->input('price');
            $test->description = $request->input('description');
            $test->parameter_id = json_encode($request->input('parameters', []));
            $test->save();

            return redirect()->back()->with('success', 'Test updated successfully');
        } catch (\Exception $e) {
            // Handle the exception and return an error message
            return redirect()->back()->with('error', 'Failed to update test.');
        }
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
