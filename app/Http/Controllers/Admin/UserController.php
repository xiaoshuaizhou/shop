<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function profile()
    {
        return view('admin.user.profile');
    }

    public function add()
    {
        return view('admin.user.add');
    }
}
