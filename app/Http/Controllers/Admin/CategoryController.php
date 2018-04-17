<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Reposities\Admin\CategoryReposity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Admin
 */
class CategoryController extends Controller
{
    /**
     * @var CategoryReposity
     */
    public $categoryReposity;

    /**
     * CategoryController constructor.
     * @param $categoryReposity
     */
    public function __construct(CategoryReposity $categoryReposity)
    {
        $this->middleware('admin');
        $this->categoryReposity = $categoryReposity;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        return view('admin.category.list');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        $cats = $this->categoryReposity->setPrefix($this->categoryReposity->getTree($this->categoryReposity->categoryList()));

//        dd($cats);

        return view('admin.category.add', compact('cats'));
    }

    /**
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(CategoryRequest $request)
    {
        $this->categoryReposity->create($request->all());
        flash('添加分类成功','success');

        return redirect('/admin/category/list');
    }
}
