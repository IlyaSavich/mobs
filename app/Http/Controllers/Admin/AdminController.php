<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * Create a new controller instance
     * Only authorized user with admin rights can access resources
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    /**
     * Display start page in admin
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin.index');
    }
}
