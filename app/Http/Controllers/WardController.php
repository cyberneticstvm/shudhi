<?php

namespace App\Http\Controllers;

use App\Models\LocalBody;
use App\Models\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wards = Ward::all();
        return view('admin.ward.index', compact('wards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lbs = LocalBody::leftJoin('districts as d', 'd.id', 'local_bodies.district_id')->selectRaw("CONCAT_WS(' -- ', local_bodies.name, d.name) AS name, local_bodies.id as id")->get();
        return view('admin.ward.create', compact('lbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'localbody_id' => 'required',
        ]);
        $input = $request->all();
        Ward::create($input);
        return redirect()->route('wards')->with("success", "Ward created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ward = Ward::findOrFail(decrypt($id));
        $lbs = LocalBody::leftJoin('districts as d', 'd.id', 'local_bodies.district_id')->selectRaw("CONCAT_WS(' -- ', local_bodies.name, d.name) AS name, local_bodies.id as id")->get();
        return view('admin.ward.edit', compact('lbs', 'ward'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'localbody_id' => 'required',
        ]);
        $input = $request->all();
        Ward::findOrFail($id)->update($input);
        return redirect()->route('wards')->with("success", "Ward updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Ward::findOrFail(decrypt($id))->delete();
        return redirect()->route('wards')->with("success", "Ward deleted successfully");
    }
}
