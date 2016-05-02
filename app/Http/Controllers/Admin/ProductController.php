<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    /**
     * Create a new controller instance
     * Only authorized user with admin rights can access resources
     * Set CategoryService instance for working with category
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
}
