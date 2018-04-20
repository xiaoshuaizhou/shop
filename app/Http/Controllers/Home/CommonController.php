<?php

namespace App\Http\Controllers\Home;

use App\Models\Admin\Product;
use App\Reposities\Admin\CategoryReposity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    /**
     * @var \App\Reposities\Admin\CategoryReposity
     */
    public $categoryReposity;

    /**
     * CommonController constructor.
     * @param \App\Reposities\Admin\CategoryReposity $categoryReposity
     */
    public function __construct(CategoryReposity $categoryReposity)
    {
        $this->categoryReposity = $categoryReposity;
    }

    /**
     * 查询所有分类，两级
     * @return array
     */
    public function getMenu()
    {
        return $this->categoryReposity->getMenu();
    }

    /**
     * @return array
     */
    public function layout()
    {
        return  $this->categoryReposity->getMenu();
    }


}
