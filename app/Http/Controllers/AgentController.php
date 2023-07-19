<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;


class AgentController extends Controller
{
    public function index()
    {
        return view('agents.index');
    }
    public function logout()
    {
        Session::forget('agent_id');
        Session::forget('agent');
        Session::forget('login');
        return redirect('/');
    }
}
