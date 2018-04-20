<?php

namespace App\Http\Controllers\Home;

class IndexController extends CommonController
{
    public function index()
    {
        $menus = $this->getMenu();

        return view('home.index.index', compact('menus'));
    }
}
