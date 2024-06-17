<?php

namespace App\Http\Controllers;

use App\Models\Package;
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
        return view('package.view', compact('packages', 'tests'));
    }
    public function destroy($id)
    {
        // delete test details here
        Package::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Package Deleted successfully!');
    }
}
