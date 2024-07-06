<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrescriptionController extends Controller
{
    public function index(Request $request)
    {
        return view('prescription.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // currently authenticated user;
        $user = auth()->user();
        // dd($user);
        $inp = $request->except('prescription');
        $prescription = $request->file('prescription');
        if ($prescription) {
            $allowed_file_types = ['pdf', 'jpg'];
            $file_extension = strtolower($prescription->getClientOriginalExtension());
            if (in_array($file_extension, $allowed_file_types)) {
                $prescription_file_name = $user->id . '_' . time() . '.' . $file_extension;
                $prescription->storeAs('uploads/prescriptions', $prescription_file_name, 'public');
                // Accessing the uploaded file
                // $filePath = public_path('storage/uploads/prescriptions/' . $prescription_file_name);
                $inp['prescription'] = $prescription_file_name;
            } else {
                return redirect()->back()->with('error', 'Invalid file format. Only PDF or JPG files are supported');
            }
        }
        Prescription::create([
            'user_id' => $user->id,
            'prescription' => $inp['prescription'],
            'status' => 'unread',
        ]);
        return redirect()->back()->with('success', 'Prescription created successfully');
    }
    public function view(Request $request)
    {
        $prescriptions = Prescription::with('user')->get();
        $prescriptions->transform(function ($prescription) {
            if ($prescription->user) {
                $prescription->user_name = $prescription->user->name;
                $prescription->user_email = $prescription->user->email;
                $prescription->user_mobile = $prescription->user->mobile;
            }
            unset($prescription->user);
            return $prescription;
        });

        return view('admin.prescription.index', compact('prescriptions'));
    }
    public function show(Request $request)
    {
        $id = $request->id;

        $prescription = Prescription::find($id);
        $user = User::find($prescription->user_id);
        $tests = Test::all();
        return view('admin.prescription.show', compact('prescription', 'user', 'tests'));
    }

    public function destroy($id)
    {
        $prescription = Prescription::find($id);
        Storage::disk('public')->delete('uploads/prescriptions/' . $prescription->prescription);
        $prescription->delete();
        return redirect()->back()->with('success', 'Prescription deleted successfully');
    }
}
