<?php

namespace App\Reposities\Home;


use App\Models\Admin\Product;
use App\Models\Home\Cart;

class ProductReposity
{
    /**
     * @var Product
     */
    public $product;

    /**
     * @var Cart
     */
    public $car;
    /**
     * ProductReposity constructor.
     * @param $product
     */
    public function __construct(
        Product $product,
        Cart $cart
    ){
        $this->product = $product;
        $this->car = $cart;
    }
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|static
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public static function getProductById($id)
    {
        return Product::where('productid', $id)->firstOrFail();
    }

    /**
     * @param $data
     * @return $this|bool|\Illuminate\Database\Eloquent\Model
     */
    public function updateOrInsertCart($data)
    {
        $cart = $this->car->where('productid', $data['cart']['productid'])->where('userid', $data['cart']['userid'])->first();

        if (is_null($cart)){
            return $this->car->create($data['cart']);
        }else{
            return $this->car
                ->where('productid', $data['cart']['productid'])
                ->where('userid', $data['cart']['userid'])
                ->increment('productnum' ,  $data['cart']['productnum']);
        }
    }

    /**
     * 查询所有商品
     * @param $userid
     * @return \Illuminate\Support\Collection
     */
    public function getAllProductsInCart($userid)
    {
        return $this->car->with('product')->where('userid', $userid)->get();
    }

    /**
     * @param $cartid
     * @param $productNum
     * @return bool
     */
    public function changeProductCount($cartid, $productNum)
    {
        return $this->car->where('cartid', $cartid)->update([
            'productnum' => $productNum
        ]);
    }

    /**
     * @param $cartid
     * @return bool|null
     * @throws \Exception
     */
    public function destroy($cartid)
    {
        return $this->car->where('cartid', $cartid)->delete();
    }

}