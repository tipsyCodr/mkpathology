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
    public function allReports()
    {
        $reports = Report::all();

        // $confirmedPackageBookings = PackageBooking::where('status', 'booked')->get();
        $confirmedTestBookings = TestBooking::where('status', 'booked')->get();
        $confirmedPackageBookings = PackageBooking::where('status', 'booked')
            ->with('user:id,name', 'package:id,name')
            ->get()
            ->map(function ($booking) {
                return [
                    'user_name' => $booking->user ? $booking->user->name : null,
                    'package_name' => $booking->package ? $booking->package->name : null,
                    'booking_date' => $booking->booking_date,
                ];
            });
        $confirmedTestBookings = TestBooking::where('status', 'booked')
            ->with('user:id,name', 'test:id,name')
            ->get()
            ->map(function ($booking) {
                return [
                    'user_name' => $booking->user ? $booking->user->name : null,
                    'test_name' => $booking->test ? $booking->test->name : null,
                    'booking_date' => $booking->booking_date,
                ];
            });
        // dd($confirmedTestBookings);

        if ($reports == null) {
            return redirect()->back()->with('success', 'No Report data to show!');
        }
        return view('admin.reports', compact('reports', 'confirmedPackageBookings', 'confirmedTestBookings'));
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
