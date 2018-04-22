<?php

namespace App\Http\Controllers\Home;

use App\Reposities\Admin\CategoryReposity;
use App\Reposities\Admin\ProductReposity;
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
        $res = $this->getMenu();
        $data = $this->totalPrice(\Auth::guard('web')->id());
        $products = ProductReposity::getProductsByCateId($id);
        $allProducts = ProductReposity::getAllProduct();
        $ishot = ProductReposity::getHotProducts();
        $issale = ProductReposity::getSaleProducts();
        $istui = ProductReposity::getTuiProducts();


        return view('home.category.Index', compact('res', 'data','products', 'allProducts', 'ishot', 'issale', 'istui'));
    }
}
