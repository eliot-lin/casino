<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::all();
        return response()->json($hospitals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('hospitals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hospitals = Hospital::create($request->all());
        return response()->json(['status' => 'ok', 'message' => 'store success', 'data' => $hospitals]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospitals = Hospital::findOrFail($id);
        return response()->json($hospitals);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospitals = Hospital::findOrFail($id);
        $data = compact('hospital');
        return response()->view('hospital.edit', $data, 200);
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
        Hospital::findOrFail($id)->update($request->all());
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
        Hospital::findOrFail($id)->delete();
        return response()->json(['status' => 'ok', 'message' => 'delete success']);
    }
    public function findHospital(Request $request)
    {
        $hospital = Hospital::where('name', "123")->get(); 
        $hospitals = Hospital::create(collect($request)->only([
            'hospital',
        ])->toArray());
        dd($request);
        return response()->json($hospital);
    }
}
