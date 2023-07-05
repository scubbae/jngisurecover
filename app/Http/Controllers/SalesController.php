<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Content;


class SalesController extends Controller
{
    public function index()
    {
        return view('sales.index');
    }
    public function upload()
    {
        return view('sales.upload');
    }
    public function document()
    {
        return view('sales.documents');
    }
    public function single($id)
    {
        return view('sales.single',['id'=>$id]);
    }
    public function archive()
    {
        return view('sales.archive');
    }
    public function logout()
    {
        session()->forget('login_id');
        return redirect('/');
    }

}
