<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;


class AgentController extends Controller
{
    public function index()
    {
        return view('agents.index');
    }
}
