<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Progress;
use Illuminate\Http\Request;

class ProgressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $progresses = Progress::all();
        return response()->json($progresses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $progresses = Progress::create($request->all());
        return response()->json(['status' => 'ok', 'message' => 'store success', 'data' => $progresses]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Progress::findOrFail($id)->delete();
        return response()->json(['status' => 'ok', 'message' => 'delete success']);
    }

    public function getProgressByMissionID($id)
    {
        $progresses = Progress::where('mission_id', $id)->orderBy('issued_at', 'asc')->get();
        return response()->json($progresses);
    }
}
