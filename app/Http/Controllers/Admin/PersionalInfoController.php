<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PersionalInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $user = \Auth::guard('admin')->user();

        return view('admin.persional.index');
    }

    public function changepersioninfo()
    {
        Auth::user();
    }
}
