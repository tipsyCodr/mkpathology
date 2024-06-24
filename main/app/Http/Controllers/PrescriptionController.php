<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = User::find($request->user_id);
        $inp = $request->except('prescription');
        $prescription = $request->file('prescription');
        if ($prescription) {
            $allowed_file_types = ['pdf', 'jpg'];
            $file_extension = strtolower($prescription->getClientOriginalExtension());
            if (in_array($file_extension, $allowed_file_types)) {
                $prescription_file_name = $user->id . '_' . time() . '.' . $file_extension;
                $prescription->storeAs('public/prescriptions', $prescription_file_name);
                $inp['prescription'] = $prescription_file_name;
            } else {
                return redirect()->back()->with('error', 'Invalid file format. Only PDF or JPG files are supported');
            }
        }
        $user = User::create($inp);
        return redirect()->back()->with('success', 'Prescription created successfully');
    }
    public function view(Request $request)
    {
        return view('admin.prescription.index');
    }
}
