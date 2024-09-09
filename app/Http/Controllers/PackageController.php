<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Package;
use App\Models\PackageBooking;
use App\Models\Parameter;
use App\Models\Report;
use App\Models\Test;
use App\Models\TestBooking;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    //
    //
    public function store(Request $request)
    {
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'tests' => 'required',
        ]);

        // dd($request->all());
        $inp = $request->except(['package_photo_url', 'package_photo_url_wide']);
        $package = new Package();
        $package->test_id = json_encode($request->input('tests'));

        //add categories
        $categories = json_encode($request->input('categories'));
        $package->category_id = $categories;

        $package_photo_url = $request->file('package_photo_url');
        $package_photo_url_wide = $request->file('package_photo_url_wide');

        $package_photo_filename = strtolower(str_replace(' ', '_', $request->input('name')));
        $package_photo_filename_wide = strtolower(str_replace(' ', '_', $request->input('name')));
        // dd($package_photo_filename, $package_photo_filename_wide);

        $ext = $package_photo_url->getClientOriginalExtension();
        $package_photo_url->move(public_path('assets/img/packages'), $package_photo_filename . '.' . $ext);

        $ext = $package_photo_url_wide->getClientOriginalExtension();
        $package_photo_url_wide->move(public_path('assets/img/packages/wide'), $package_photo_filename_wide . '.' . $ext);

        $package->package_photo_url = $package_photo_filename . "." . $ext;
        // dd("File Name to be Stored in db " . $package->package_photo_url);
        $package->fill($inp);
        $package->save();
        return redirect()->back()->with('success', 'Package Added successfully!');

    }
    public function fetchTestData(Request $request)
    {
        $ids = $request->input('ids');
        $id = json_decode($ids, true);
        $tname = [];
        $i = 0;
        $html = "<ul>";
        foreach ($id as $key => $value) {
            $test = Test::find($value);
            $tname[$i]['name'] = $test->name;

            $html .= "<li>" . $test->name . "</li>";

            $html .= "<ul>";
            $pids = json_decode($test->parameter_id);
            $pids = (array) $pids;
            foreach ($pids as $pid) {
                // echo "Hello";
                $html .= "<li>" . Parameter::find($pid)->name . "</li>";
                $tname[$i]['pname'][] = Parameter::find($pid)->name;
            }
            $html .= "</ul>";
            $i++;
        }
        $html .= "</ul>";

        return json_encode($tname);
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
        $categories = Categories::all();
        return view('admin.package.view', compact('packages', 'tests', 'categories'));
    }
    public function destroy($id)
    {
        // delete test details here
        Package::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Package Deleted successfully!');
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
        $tests = Test::all();


        // Decode the parameter ids
        $testCategory_id = json_decode($package->category_id, true) ?? [];
        $testPackages_id = json_decode($package->test_id, true) ?? [];


        $packageCategory = array_map(function ($value) {
            return Categories::find($value);
        }, $testCategory_id);

        $packageTests = array_map(function ($value) {
            return Test::find($value);
        }, $testPackages_id);



        // Filter out any null values in the testParameter array

        $packageCategory = array_filter($packageCategory);

        return view('admin.package.edit', compact('package', 'categories', 'packageCategory', 'tests', 'packageTests'));
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
            $package->test_id = json_encode($request->input('tests', []));
            $package->category_id = json_encode($request->input('categories', []));
            $package->save();

            return redirect()->back()->with('success', 'Test updated successfully');
        } catch (\Exception $e) {
            // Handle the exception and return an error message
            return redirect()->back()->with('error', 'Failed to update test.');
        }
    }
}
