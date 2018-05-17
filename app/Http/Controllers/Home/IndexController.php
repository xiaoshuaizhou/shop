<?php

namespace App\Http\Controllers\Home;

/**
 * Class IndexController
 * @package App\Http\Controllers\Home
 */
class IndexController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $menus = $this->getMenu();
        $data = $this->totalPrice(\Auth::guard('web')->id());

        return view('home.index.Index', compact('menus', 'data'));
    }
}
