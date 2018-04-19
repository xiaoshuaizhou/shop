<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Admin\Product;
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
    )
    {
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
        $this->productReposity->create($pics, $post);

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

        $disk->writeStream($fileName, fopen($file->getRealPath(), 'r'));
        $coverUrl = $disk->getUrl($fileName);

        $picsArr = [];
        foreach ($pics as $k => $pic) {
            $picsName = microtime() . '-' . $pic->getClientOriginalName();
            $disk->writeStream($picsName, fopen($pic->getRealPath(), 'r'));
            $picsArr[$k] = $disk->getUrl($picsName);
        }

        return ['cover' => $coverUrl, 'pics' => json_encode($picsArr)];
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $cats = $this->categoryReposity->setPrefix($this->categoryReposity->getTree($this->categoryReposity->categoryList()));
        $product = $this->productReposity->getProductById($id);

        return view('admin.product.edit', compact('cats', 'product'));
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function update(Request $request)
    {
        $file = $request->file('cover');
        $pics = $request->file('pics');
        $post = $request->all();

        if (!is_null($file) || !is_null($pics)){
            if (!is_null($file)){
                $fileName = time() . '-' . $file->getClientOriginalName();
            }else{
                $fileName = '';
            }
            $pics = $this->removeAndUpload($file, $fileName, $pics, $request->id);
            $this->productReposity->update($request->id, $pics, $post);
        }else{
            $this->productReposity->update($request->id , '', $post);

        }


        return redirect('admin/product/list')->withErrors('修改成功', 'success');

    }

    /**
     * @param $product
     * @param $file
     * @param $fileName
     * @param $pics
     * @return array
     * @throws \League\Flysystem\FileExistsException
     */
    private function removeAndUpload($file, $fileName, $pics, $id)
    {
        $disk = \Storage::disk('qiniu');

        if (!empty($fileName)){

            $disk->writeStream($fileName, fopen($file->getRealPath(), 'r'));
            $coverUrl = $disk->getUrl($fileName);
        }else{
            $product = Product::where('productid', $id)->first();
            $coverUrl = $product->cover;
        }

        if (!is_null($pics)) {
            $picsArr = [];
            foreach ($pics as $k => $pic) {
                $picsName = microtime() . '-' . $pic->getClientOriginalName();
                $disk->writeStream($picsName, fopen($pic->getRealPath(), 'r'));
                $picsArr[$k] = $disk->getUrl($picsName);
            }
            return ['cover' => $coverUrl, 'pics' => json_encode($picsArr)];

        } else {
            return ['cover' => $coverUrl];
        }
    }


}
