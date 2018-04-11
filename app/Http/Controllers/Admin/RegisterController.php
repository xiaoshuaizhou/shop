<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.register.index');
    }

    public function register(Request $request)
    {
        dd($request->all());
    }
}
