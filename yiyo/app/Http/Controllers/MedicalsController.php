<?php

namespace App\Http\Controllers;

use App\Models\Medical;
use Illuminate\Http\Request;

class MedicalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicals = Medical::all();
        return response()->json($medicals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('medicals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medical = Medical::create($request->all());
        return response()->json(['status' => 'ok', 'message' => 'update success', 'data' => $medical]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medical = Medical::findOrFail($id);
        return response()->json($medical);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medical = Medical::findOrFail($id);
        $data = compact('medical');
        return response()->view('medicals.edit', $data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Medical::findOrFail($id)->update($request->all());
        return response()->json(['status' => 'ok', 'message' => 'update success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medical::findOrFail($id)->delete();
        return response()->json(['status' => 'ok', 'message' => 'delete success']);
    }

    public function doctorsNotEmergency()
    {
        $doctors = Medical::where('division_main_id', '!=' , 17)->get();  // 流水號 17 是 22急診科
        foreach($doctors as $doctor)
        {
            $doctor->mainDivision;
            $doctor->hospital->city->region;
            $doctor->user;
        }
        return response()->json($doctors);
    }
    public function getDoctorInfo(Request $request)
    {
        $doctors = Medical::where('user_id', $request->val)->get();
        // dd($doctors);
        foreach($doctors as $doctor)
        {
            $doctor->user; 
            $doctor->mainDivision;
            $doctor->hospital;
        } 
        // dd($doctors);
        return response()->json($doctors);
    }
}
