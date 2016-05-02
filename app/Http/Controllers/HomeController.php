<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Show the welcome file
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.page');
    }
}
