<?php

namespace App\Http\Controllers\Home;

use App\Reposities\Admin\CategoryReposity;
use App\Reposities\ProductReposity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends CommonController
{

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $res = $this->layout();
        $products = ProductReposity::getProductsByCateId($id);

        return view('home.category.Index', compact('res', 'products'));
    }
}
