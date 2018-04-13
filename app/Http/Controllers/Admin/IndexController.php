<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class IndexController
 * @package App\Http\Controllers\Admin
 */
class IndexController extends Controller
{
    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.index.index');
    }
}
