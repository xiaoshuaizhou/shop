<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Reposities\ProductReposity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reposities\Admin\CategoryReposity;


/**
 * Class ProductController
 * @package App\Http\Controllers\Admin
 */
class ProductController extends Controller
{
    /**
     * @var \App\Reposities\Admin\CategoryReposity
     */
    public $categoryReposity;
    /**
     * @var
     */
    public $productReposity;

    /**
     * ProductController constructor.
     * @param \App\Reposities\Admin\CategoryReposity $categoryReposity
     * @param \App\Reposities\ProductReposity $productReposity
     */
    public function __construct(
        CategoryReposity $categoryReposity,
        ProductReposity $productReposity
    ){
        $this->middleware('admin');
        $this->categoryReposity = $categoryReposity;
        $this->productReposity = $productReposity;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        $products = $this->productReposity->getAllProducts();

        return view('admin.product.list', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        $cats = $this->categoryReposity->setPrefix($this->categoryReposity->getTree($this->categoryReposity->categoryList()));

        return view('admin.product.add', compact('cats'));
    }

    /**
     * 新增商品
     * @param \App\Http\Requests\ProductRequest $request
     * @return $this
     * @throws \League\Flysystem\FileExistsException
     */
    public function create(ProductRequest $request)
    {
        $file = $request->file('cover');
        $pics = $request->file('pics');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $pics = $this->upload($file, $fileName, $pics);
        $post = $request->all();
        $this->productReposity->create($pics , $post);

        return redirect('admin/product/list')->withErrors('添加成功', 'success');

    }

    /**
     * 上传到七牛云
     * @param $file
     * @param $fileName
     * @param $pics
     * @return array
     * @throws \League\Flysystem\FileExistsException
     */
    private function upload($file, $fileName, $pics)
    {
        $disk = \Storage::disk('qiniu');

        $disk->writeStream($fileName,  fopen($file->getRealPath(), 'r') );
        $coverUrl = $disk->getUrl($fileName);

        $picsArr = [];
        foreach ($pics as $k => $pic){
            $picsName = microtime() . '-' . $pic->getClientOriginalName();
            $disk->writeStream($picsName,  fopen($file->getRealPath(), 'r') );
            $picsArr[$k] = $disk->getUrl($picsName);
        }

        return ['cover' => $coverUrl , 'pics' => json_encode($picsArr)];
    }
}
