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
        $res = $this->getMenu();
        $data = $this->totalPrice(\Auth::guard('web')->id());

        return view('home.product.Index', compact('res', 'data'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function detail($id)
    {
        $product = ProductReposity::getProductById($id);
        $res = $this->getMenu();
        $data = $this->totalPrice(\Auth::guard('web')->id());

        return view('home.product.Detail' , compact('res', 'product', 'data'));
    }
}
