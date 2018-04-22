<?php

namespace App\Http\Controllers\Home;

class IndexController extends CommonController
{
    public function index()
    {
        $menus = $this->getMenu();
        $data = $this->totalPrice(\Auth::guard('web')->id());

        return view('home.index.index', compact('menus', 'data'));
    }
}
