<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('admin.master');
        }else{
            return redirect()->route('login');
        }
    }
}
