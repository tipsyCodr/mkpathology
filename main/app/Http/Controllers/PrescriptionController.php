<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index(Request $request)
    {
        return view('prescription.index');
    }

    public function store(Request $request)
    {
        dd($request->all());
        return redirect()->back()->with('success', 'Prescription created successfully');
    }
    public function view(Request $request)
    {
        return view('admin.prescriptions');
    }
}
