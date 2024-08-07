<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parameter;
use Exception;
use Log;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ParameterController extends Controller
{
    //
    public function index()
    {
        // get all parameters
        $parameters = Parameter::all();
        return view('admin.parameters.index', compact('parameters'));
    }



    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
        ]);

        Parameter::create([
            'name' => $request->name,
            'unit' => $request->unit,
            'normal_range' => $request->normal_range,
            'is_active' => $request->is_active,
        ]);

        return redirect()->back()->with('success', 'Parameter created successfully');
    }

    public function edit(Parameter $parameter)
    {
        return view('admin.parameters.edit', compact('parameter'));
    }

    public function update(Request $request, Parameter $parameter)
    {
        if ($parameter === null) {
            abort(404);
        }

        try {
            $parameter->update([
                'name' => $request->name,
                'unit' => $request->unit,
                'normal_range' => $request->normal_range,
                'is_active' => $request->is_active ?: $parameter->is_active,
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Unable to update parameter');
        }

        return redirect()->route('parameters.view')->with('success', 'Parameter updated successfully');
    }

    public function destroy(Parameter $parameter)
    {
        try {
            $parameter->delete();
            return redirect()->route('parameters.view')->with('success', 'Parameter deleted successfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Unable to delete parameter');
        }
    }
    public function importFromExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);
        $file = $request->file('file');
        if ($file === null) {
            return redirect()->back()->with('error', 'No file provided');
        }
        try {
            $spreadsheet = IOFactory::load($file);
            $data = [
                1,
                $spreadsheet->getActiveSheet()
                    ->toArray(null, true, true, true)
            ];
            $i = 1;
            foreach ($data[1] as $key => $value) {
                Parameter::create([
                    'name' => $value['A'],
                    'unit' => " ",
                    'normal_range' => " ",
                    'is_active' => 1,
                ]);
                // $key . " = " . print_r($value['A']) . "<br/> /n ";
                // echo " count = {$i} ";
                // $i++;
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Unable to import data');
        }
    }
}
