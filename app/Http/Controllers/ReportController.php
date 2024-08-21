<?php

namespace App\Http\Controllers;

use App\Models\PackageBooking;
use App\Models\Report;
use App\Models\TestBooking;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    //For Fetching all reports
    // public function fetchAll(Request $request)
    // {
    //     //add code


    // }
    public function fetchpatientReports()
    {
        $reports = Report::where('user_id', auth()->user()->id)->get();
        return view('patient.reports', compact('reports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reports' => 'required',
        ]);

        $inp = $request->all();
        $reportName = $inp['user_name'] . '-' . $inp['test_name'] . '.pdf';

        // checking if dir exists and create if not
        if (!file_exists(storage_path('app/public/uploads/reports/' . $inp['user_id']))) {
            mkdir(storage_path('app/public/uploads/reports/' . $inp['user_id']), 0777, true);
        }
        try {
            foreach ($request->file('reports') as $file) {
                $reportName = $inp['user_name'] . '-' . $inp['test_name'] . '-' . $file->getClientOriginalName();
                $reportPath = storage_path('app/public/uploads/reports/' . $inp['user_id'] . '/' . $reportName);
                $file->storeAs('public/uploads/reports/' . $inp['user_id'], $reportName);
                $report = new Report();
                $report->user_id = $inp['user_id'];
                $report->user_name = $inp['user_name'];
                $report->test_name = $inp['test_name'];
                $report->reports = $reportName;
                $report->comments = $inp['comments'];
                $report->save();
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.report.view')->with('error', 'Report saving failed!: ' . $e->getMessage());
            // echo "error: " . $e->getMessage();
            // dd($e->getMessage());
        }
        // echo "Report uploaded successfully";
        // dd('Report uploaded successfully');
        return redirect()->route('admin.report.view')->with('success', 'Report uploaded successfully');
    }
    public function uploadForm(Request $request)
    {
        $inp = $request->all();
        return view('admin.report.add', compact('inp'));

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
                    'user_id' => $booking->user ? $booking->user->id : null,
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
                    'user_id' => $booking->user ? $booking->user->id : null,
                    'user_name' => $booking->user ? $booking->user->name : null,
                    'test_name' => $booking->test ? $booking->test->name : null,
                    'booking_date' => $booking->booking_date,
                ];
            });

        if ($reports == null) {
            return redirect()->back()->with('success', 'No Report data to show!');
        }
        return view('admin.report.view', compact('reports', 'confirmedPackageBookings', 'confirmedTestBookings'));
    }
}
