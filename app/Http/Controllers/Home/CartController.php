<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Reposities\Home\ProductReposity;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @var ProductReposity
     */
    public $productReposity;

    /**
     * CartController constructor.
     * @param ProductReposity $productReposity
     */
    public function __construct(ProductReposity $productReposity)
    {
        $this->productReposity = $productReposity;
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->productReposity->getAllProductsInCart(\Auth::guard('web')->id());
//        $totalPrice = $data->map(function ($product){
//            return ($product->price * $product->productnum);
//        })->sum();
//        dd($totalPrice);

        return view('home.cart.Index', compact('data'));
    }
    /**
     * @param Request $request
     * @param int $id
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(Request $request, $id = 0)
    {
        $userid = \Auth::guard('web')->id();

        if (($request->method() == 'POST')) {
            $post = $request->all();
            $product = ProductReposity::getProductById($request->get('productid'));

            $num = $post['productnum'];
            $data['cart'] = $post;
            $data['cart']['userid'] = $userid;
        }
        if (($request->method() == 'GET')) {
            $product = ProductReposity::getProductById($id);
            $price = $product->issale ? $product->saleprice : $product->price;
            $num = 1;
            $data['cart'] = ['productid' => $id, 'productnum' => $num, 'price' => $price, 'userid' => $userid];
        }
        $res = $this->productReposity->updateOrInsertCart($data);
        if ($res){
            return redirect('/cart/index');
        }else{
            return redirect()->withErrors('加入购物车失败');
        }
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function changecount(Request $request)
    {
        $cartid = $request->get('cartid');
        $productnum = $request->get('productnum');

        return $this->productReposity->changeProductCount($cartid, $productnum);
    }

    /**
     * @param $cartid
     * @return bool|null
     * @throws \Exception
     */
    public function destroy($cartid)
    {
        $this->productReposity->destroy($cartid);

        return redirect()->back();
    }
}
