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
        $cats = $this->categoryReposity->setPrefix($this->categoryReposity->getTree($this->categoryReposity->categoryList()));

        return view('admin.category.list', compact('cats'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        $cats = $this->categoryReposity->setPrefix($this->categoryReposity->getTree($this->categoryReposity->categoryList()));

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

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $cats = $this->categoryReposity->setPrefix($this->categoryReposity->getTree($this->categoryReposity->categoryList()));
        $cat = $this->categoryReposity->getCateById($id);

        return view('admin.category.edit', compact('cats', 'cat'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->categoryReposity->update($request->all());
        flash('修改成功')->success()->important();

        return redirect('admin/category/list');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->categoryReposity->delete($id);

        return redirect()->back();
    }
}
