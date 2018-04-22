<?php

namespace App\Http\Controllers\Home;

use App\Reposities\Admin\ProductReposity;

class ProductController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $res = $this->layout();

        return view('home.product.index', compact('res'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function detail($id)
    {
        $product = ProductReposity::getProductById($id);
        $res = $this->layout();

        return view('home.product.detail' , compact('res', 'product'));
    }
}
