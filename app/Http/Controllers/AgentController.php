<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;


class AgentController extends Controller
{
    public function index()
    {
        return view('agent.index');
    }
    public function upload()
    {
        return view('agent.upload');
    }
    public function document()
    {
        return view('agent.documents');
    }
    public function archive()
    {
        return view('agent.archive');
    }
    public function logout()
    {
        session()->forget('login_id');
        return redirect('/');
    }
}
