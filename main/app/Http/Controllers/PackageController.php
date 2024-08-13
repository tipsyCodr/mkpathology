<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Package;
use App\Models\Parameter;
use App\Models\Report;
use App\Models\Test;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    //
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'tests' => 'required',
        ]);
        // dd($request->all());
        $inp = $request->all();
        $package = new Package();
        $package->test_id = json_encode($request->input('tests'));
        $package->fill($inp);
        $package->save();
        return redirect()->back()->with('success', 'Package Added successfully!');

    }
    public function view()
    {
        // retrieve test details here
        $packages = Package::paginate(10);
        $tests = Test::paginate(10);
        return view('admin.package.view', compact('packages', 'tests'));
    }
    public function viewAll()
    {
        // retrieve test details here
        $packages = Package::paginate(10);
        $tests = Test::all();
        return view('admin.package.view', compact('packages', 'tests'));
    }
    public function destroy($id)
    {
        // delete test details here
        Package::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Package Deleted successfully!');
    }
    public function allReports()
    {
        $reports = Report::all();
        if ($reports == null) {
            return redirect()->back()->with('success', 'No Report data to show!');
        }
        return view('admin.reports', compact('reports'));
    }

    public function edit($id)
    {
        // Find the test with the given id
        $package = Package::find($id);

        // Check if the test exists
        if (!$package) {
            return redirect()->back()->with('error', 'Test not found.');
        }

        // Retrieve all Categories
        $categories = Categories::all();


        // Decode the parameter ids
        $testCategory_id = json_decode($package->category_id, true) ?? [];


        $packageCategory = array_map(function ($value) {
            return Categories::find($value);
        }, $testCategory_id);


        // Filter out any null values in the testParameter array

        $packageCategory = array_filter($packageCategory);

        return view('admin.package.edit', compact('package', 'categories', 'packageCategory'));
    }
    public function update(Request $request)
    {
        // Check if the request has the required id
        if (!$request->has('id')) {
            return redirect()->back()->with('error', 'Invalid request.');
        }

        // Find the test with the given id
        $package = Package::find($request->input('id'));

        // Check if the test exists
        if (!$package) {
            return redirect()->back()->with('error', 'Packages not found.');
        }

        try {
            // Update the test fields
            $package->name = $request->input('name');
            $package->price = $request->input('price');
            $package->description = $request->input('description');
            $package->category_id = json_encode($request->input('categories', []));
            $package->save();

            return redirect()->back()->with('success', 'Test updated successfully');
        } catch (\Exception $e) {
            // Handle the exception and return an error message
            return redirect()->back()->with('error', 'Failed to update test.');
        }
    }
}
