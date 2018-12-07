<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Auth;

class AuthController extends Controller
{
    /**
     * call-center authentication
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function callCenterLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $request->validate($rules, [
            'email.required' => 'please enter the email',
            'email.email' => 'invalid email',
            'password.required' => 'please enter the password'
        ]);
        $attempt = Auth::attempt([
            'type' => 'call-center',
            'email_main' => $request->email,
            'password' => $request->password
            ]);
        if ($attempt) {
            return redirect('call-centers/index')->with(['status' => 'success', 'message' => 'login success']);
        }
        return back()->with(['status' => 'error', 'message' => 'wrong email or password']);
    }

    /**
     * medical authentication
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function medicalLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $request->validate($rules, [
            'email.required' => 'please enter the email',
            'email.email' => 'invalid email',
            'password.required' => 'please enter the password'
        ]);
        $attempt = Auth::attempt([
            'type' => 'medical',
            'email_main' => $request->email,
            'password' => $request->password
        ]);
        if ($attempt) {
            return redirect('medicals/index')->with(['email' => $request->email,'status' => 'success', 'message' => 'login success']);
        }
        return back()->with(['status' => 'error', 'message' => 'wrong email or password']);
    }

    /**
     * vip authentication
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function vipLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $request->validate($rules, [
            'email.required' => 'please enter the email',
            'email.email' => 'invalid email',
            'password.required' => 'please enter the password'
        ]);
        $attempt = Auth::attempt([
            'type' => 'vip',
            'email_main' => $request->email,
            'password' => $request->password
        ]);
        if ($attempt) {
            return redirect('vips/index')->with(['status' => 'success', 'message' => 'login success']);
        }
        return back()->with(['status' => 'error', 'message' => 'wrong email or password']);
    }

    /**
     * logout
     * @return Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('vips/login')->with(['status' => 'ok', 'message' => 'logout success']);
    }
}
