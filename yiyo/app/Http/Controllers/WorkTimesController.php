<?php

namespace App\Http\Controllers;

use App\Models\WorkTime;
use Illuminate\Http\Request;

// class MyWT {
//     public $date;
//     public $period;
// }


class WorkTimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // $worktime = new WorkTime;
        // $worktime->medical_id = $request->medical_id;
        // $worktime->date = strtotime($request->date);
        // $worktime->period = $request->period;
        // $worktime->save();
        $worktime = WorkTime::create($request->all());
        return response()->json(['status' => 'ok', 'message' => 'store success', 'data' => $worktime]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkTime  $workTime
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $medical_worktime = WorkTime::where([
            ['medical_id', $id],
        ])
        ->get();

        // foreach($medical_worktime as $value) {
        //     date('Y-m-d', $value->date);
        // }
        return response()->json($medical_worktime);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkTime  $workTime
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkTime $workTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkTime  $workTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkTime $workTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkTime  $workTime
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //id = medical_id
        // WorkTime::findOrFail($id)
        WorkTime::where([
            ['medical_id', $id],
        ])
        ->delete();
        
        return response()->json(['status' => 'ok', 'message' => 'delete success']);
    }
}
