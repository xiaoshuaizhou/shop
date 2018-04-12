<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormShowcaseController extends Controller
{
    public function index()
    {
        return view('admin.formshowcase.index');
    }

    public function formwizard()
    {
        return view('admin.formshowcase.formwizard');

    }
}
