<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;


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
        Session::forget('sales_id');
        Session::forget('sales');
        Session::forget('login');
        return redirect('/');
    }

}
