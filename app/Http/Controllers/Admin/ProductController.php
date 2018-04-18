<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function list()
    {
        return view('admin.product.list');

    }

    public function add()
    {
        return view('admin.product.add');

    }

    public function create()
    {

    }
}
