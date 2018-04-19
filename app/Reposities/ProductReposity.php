<?php

namespace App\Reposities;


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
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function getProductById($id)
    {
        return $this->product->where('productid', $id)->firstOrFail();
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
}