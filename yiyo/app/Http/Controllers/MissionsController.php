<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Past_Hospitals;
use App\Models\Progress;
use App\Models\VIP;
use Illuminate\Http\Request;

class MissionsController extends Controller
{
    public function getMission()
    {
        $missions = Mission::all();
        // dd($missions);
        return $missions;
    }

    public function getChildId(Request $request)
    {
        $returns = array();
        $childMissions = Mission::where('parent_id',$request->missionId)->orderBy('issued_at','asc')->get();
        foreach($childMissions as $mission)
        {
            $mission->requester->member;
            $mission->status;
            $mission->type;
            array_push($returns, $mission);
        }
        return response()->json($returns);
    }

    public function status(Request $request)
    {
        $returns = array();
        $missions = Mission::where('requester_id', $request->vipId)->where('id',$request->missionId)->get();
        foreach($missions as $mission)
        {   
            $mission->requester->member;
            $mission->type;
            $mission->status;
            array_push($returns,$mission);
        }
        $childMissions = Mission::where('parent_id',$request->missionId)->orderBy('issued_at','asc')->get();
        foreach($childMissions as $mission)
        {
            $mission->requester->member;
            $mission->status;
            $mission->type;
            array_push($returns, $mission);
        }
        return response()->json($returns);
    }
    public function executor($id)
    {       $returns =  array();
            $missions = Mission::where('provider_id', $id)->orderBy('status_id', 'asc')->orderBy('issued_at', 'asc')->get();
            foreach($missions as $mission)
            {
                $mission->requester->member;
                $mission->status;
                $mission->type;
                array_push($returns, $mission);
            }
            return response()->json($returns);
    }
    public function concernMissionList()
    {
        $missions = Mission::where('status_id', 3)->where('parent_id',0)->orderBy('finished_at', 'asc')->get();
        
        foreach($missions as $mission)
        {   
            $mission->status;
            $mission->type;
            $mission->requester->member;   
        }
        return response()->json($missions);
    }

    public function handleMissionList()
    {
        $missions = Mission::where('status_id', '!=' , 3)->orderBy('type_id', 'desc')->orderBy('issued_at', 'asc')->get();
        foreach($missions as $mission)
        {
            $mission->messages;
            $mission->requester->member;
            $mission->type;
            $mission->status;
        }
       
        return response()->json($missions);
    }
    public function handle2MissionList()
    {
        $missions = Mission::where('status_id',  3)->orderBy('type_id', 'desc')->orderBy('issued_at', 'asc')->get();
        foreach($missions as $mission)
        {
            $mission->messages;
            $mission->requester->member;
            $mission->type;
            $mission->status;
        }
       
        return response()->json($missions);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $missions = Mission::all();
       return response()->json($missions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('missions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mission = Mission::create($request->all());
        return response()->json(['status'=>'ok', 'message'=> 'store success', 'data'=> $mission]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mission = Mission::findOrFail($id);
        $mission->requester->member;
        $mission->messages;
        $mission->type;
        $mission->status;
        return response()->json($mission);
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
        $mission = Mission::findOrFail($id);
        $data = compact('mission');
        return responese()->view('mission.edit', $data, 200);
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
        Mission::findOrFail($id)->update($request->all());
        return response()->json(['status'=>'ok', 'message'=>'update success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Mission::findOrFail($id)->delete();
       return response()->json(['status'=>'ok', 'message'=>'delete success']);
    }

    public function complete(Request $request)
    {
        Mission::findOrFail($request->user_id)->close();
        $hospitals = Past_Hospitals::create(collect($request)->only([
            'user_id',
            'hospital',
            'division',
            'name',
            'finished_at',
        ])->toArray());
        return response()->json(['status' => 'ok', 'message' => 'mission closed']);
    }

    public function subMission(Request $request)
    {
        $mission = Mission::findOrFail($request->id);
        $sub = $mission->children()->create(collect($request)->only([
            'requester_id',
            'provider_id',
            'type_id',
            'status_id',
            'method',
            'group_name',
            'vip_card_no',
            'type_name',
            'requester_name',
            'provider_name',
            'status_name',
            'description',
            'mission_score',
            'provider_score',
            'suggestion',
            'date',
            'issued_at',
            'took_at',
            'finished_at'
        ])->toArray());
        // $sub->update(['requester_id'=> $mission->provider_id]);
        // $sub->update(['requester_name'=>$mission->provider_name]);
        $vipdata = VIP::findOrFail($request->vip_id);
        $sub->update(['requester_id' => $vipdata->id]);
        
        $data = compact('sub', 'vipdata');
        // dd($data);
        return response()->json($data);
    }
    public function toDoctor(Request $request)
    {
        $vipdata = VIP::findOrFail($request->id);
        $vipdata->user;
        $sub = Mission::findOrFail($request->missionId);
        $data = compact('vipdata', 'sub');
        return view('layouts.doctor', $data);
    }

    public function getMissions(Request $request)
    { 
        $missions = Mission::where('provider_id', $request->id)->get();
        return response()->json($missions);
    }

    public function getMissionsbyVIP(Request $request)
    { 
        $missions = Mission::where('requester_id', $request->id)->get();
        return response()->json($missions);
    }

    ////app api
    // 醫師 App 任務列表
    public function doctorMission($id)
    {       
        $returns =  array();
        $missions = Mission::where('provider_id', $id)->orderBy('issued_at', 'asc')->orderBy('status_id', 'asc')->get();
        foreach($missions as $mission)
        {
            $mission->status;
            $mission->type;
            $mission->status;
            array_push($returns, $mission);
        }
        return response()->json($returns);
    }

    // vip App 任務列表
    public function vipMission($id)
    {       
        $returns =  array();
        $missions = Mission::where('requester_id', $id)->orderBy('issued_at', 'asc')->orderBy('status_id', 'asc')->get();
        foreach($missions as $mission)
        {
            $mission->status;
            $mission->type;
            $mission->status;
            array_push($returns, $mission);
        }
        return response()->json($returns);
    }
    
}
