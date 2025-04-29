<?php

namespace App\Http\Controllers;

use App\Models\CustomerGeoTagging;
use App\Models\LocalBody;
use App\Models\StaffFeedback;
use App\Models\Ward;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function staffFeedback()
    {
        $input = array(date('Y-m-d'), date('Y-m-d'));
        $data = [];
        return view('admin.report.staff.feedback', compact('input', 'data'));
    }

    public function getStaffFeedback(Request $request)
    {
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
        $input = array($request->from_date, $request->to_date);
        $fromdate = Carbon::parse($request->from_date)->startOfDay();
        $todate = Carbon::parse($request->to_date)->endOfDay();
        $data = StaffFeedback::whereBetween('created_at', [$fromdate, $todate])->get();
        return view('admin.report.staff.feedback', compact('input', 'data'));
    }

    public function geoTagging()
    {
        $input = array(date('Y-m-d'), date('Y-m-d'), 1, 0);
        $lbs = LocalBody::pluck('name', 'id');
        $wards = Ward::orderBy('name')->get();
        $data = [];
        return view('admin.report.staff.geo-tagging', compact('input', 'data', 'lbs', 'wards'));
    }

    public function getGeoTagging(Request $request)
    {
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
            'local_body' => 'required',
        ]);
        $input = array($request->from_date, $request->to_date, $request->local_body, $request->ward);
        $lbs = LocalBody::pluck('name', 'id');
        $wards = Ward::orderBy('name')->get();
        $fromdate = Carbon::parse($request->from_date)->startOfDay();
        $todate = Carbon::parse($request->to_date)->endOfDay();
        $data = CustomerGeoTagging::whereBetween('created_at', [$fromdate, $todate])->where('localbody_id', $request->local_body)->get();
        return view('admin.report.staff.geo-tagging', compact('input', 'data', 'lbs', 'wards'));
    }
}
