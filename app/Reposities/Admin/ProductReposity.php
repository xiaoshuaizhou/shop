<?php

namespace App\Reposities\Admin;


use App\Models\Admin\Product;

class ProductReposity
{
    public $product;

    /**
     * ProductReposity constructor.
     * @param $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @param $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function create($pics, $data)
    {
        $post['cateid'] = $data['cateid'];
        $post['title'] = $data['title'];
        $post['descr'] = $data['descr'];
        $post['num'] = $data['num'];
        $post['price'] = $data['price'];
        $post['ishot'] = $data['ishot'];
        $post['istui'] = $data['istui'];
        $post['ison'] = $data['ison'];
        $post['issale'] = $data['issale'];
        $post['saleprice'] = $data['saleprice'];
        $post['cover'] = $pics['cover'];
        $post['pics'] = $pics['pics'];

        return $this->product->create($post);
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllProducts()
    {
        return $this->product->paginate(1);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getHotProducts()
    {
        return Product::where('ishot', 1)->latest()->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getSaleProducts()
    {
        return Product::where('issale', 1)->latest()->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getTuiProducts()
    {
        return Product::where('istui', 1)->latest()->get();
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
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllProduct()
    {
        return Product::latest()->paginate(1);
    }

    /**
     * @param $id
     * @param $pics
     * @param $data
     * @return bool
     */
    public function update($id, $pics, $data)
    {
        $post['cateid'] = $data['cateid'];
        $post['title'] = $data['title'];
        $post['descr'] = $data['descr'];
        $post['num'] = $data['num'];
        $post['price'] = $data['price'];
        $post['ishot'] = $data['ishot'];
        $post['istui'] = $data['istui'];
        $post['ison'] = $data['ison'];
        $post['issale'] = $data['issale'];
        $post['saleprice'] = $data['saleprice'];
        if (isset($pics['cover'])){
            $post['cover'] = $pics['cover'];
        }
        if (isset($pics['pics'])){
            $post['pics'] = $pics['pics'];
        }

        return !! $this->product->where('productid', $id)->update($post);
    }

    /**
     * @param $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete($id)
    {
        return $this->product->where('productid', $id)->delete();
    }

    /**
     * @param $id
     * @return bool
     */
    public function onIson($id)
    {
        return $this->product->where('productid', $id)->update(['ison' => '1']);
    }

    /**
     * @param $id
     * @return bool
     */
    public function downIson($id)
    {
        return $this->product->where('productid', $id)->update(['ison' => '0']);
    }

    /**
     * @param $id
     * @return \Illuminate\Support\Collection
     */
    public static function getProductsByCateId($id)
    {
        return Product::where('cateid', $id)->latest()->get();
    }

}