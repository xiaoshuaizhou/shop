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
}