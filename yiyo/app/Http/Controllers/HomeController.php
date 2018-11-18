<?php

namespace App\Http\Controllers;
use App\Models\VIP;
use App\Models\Mission;
use App\Models\Call;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function consultation(Request $request) 
    {
        // dd($request->id);
        Mission::findOrFail($request->id)->update(['took_at'=>$request->took_at]);
        $id = $request->id;
        $vip = VIP::findOrFail($request->requester_id);
        $vip->user;
        $vip->group;
        $missions = Mission::where('id', $request->id)->get();
        $data = compact('vip', 'id', 'missions');
        return view('layouts.consultation', $data);
    }

    public function register(Request $request)
    {
        if (!isset($request->id)) {
            abort(400, 'method not allowed');
        }
        Mission::findOrFail($request->id)->update(['took_at'=>$request->took_at]);
        $id = $request->id;//mission id
        $vip = VIP::findOrFail($request->requester_id);
        $vip->user;
        $missions = Mission::where('id', $request->id)->get();
        $data = compact('vip', 'id', 'missions');
        return view('layouts.register', $data);
    }

    public function OpenTok(Request $request) 
    {
        // dd($request->id);
        $call = Call::findOrFail($request->id);
        $api_key = $call->api_key;
        $session_id =  $call->session_id;
        $token = $call->token;
        $data = compact('api_key', 'session_id', 'token');
        return view('opentok.opentok', $data);
    }

    public function executor(Request $request)
    {
        return view('layouts.executor');
    }
    
    public function status(Request $request)
    {
        $id = $request->id;
        $data = compact('id');
        return view('layouts.status', $data);
    }

    public function visit(Request $request) 
    {
        $took_at = $request->took_at;        
        $vip = VIP::findOrFail($request->requester_id);
        $vip->user;
        $data = compact('vip');
        return view('layouts.visit', $data);
    }
    
  

}
