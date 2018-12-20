<?php

namespace App\Http\Controllers;

use App\Models\VIP;
use App\MemberInfo;

use Illuminate\Http\Request;

class VIPsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vips = VIP::all();
        return response()->json($vips);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return response()->view('vips.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vip = VIP::create($request->all());
        return response()->json(['status' => 'ok', 'message' => 'store success', 'data' => $vip]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vip = VIP::findOrFail($id);
        return response()->json($vip);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vip = VIP::findOrFail($id);
        $data = compact('vip');
        return response()->view('vips.edit', $data, 200);
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
      VIP::findOrFail($id)->update($request->all());
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
        VIP::findOrFail($id)->delete();
        return reponse()->json(['status' => 'ok', 'message' => 'delete success']);
    }
    public function getVIP(Request $request)
    { 
        $vip = VIP::where('user_id', $request->id)->get();
        return response()->json($vip);
    }
}
