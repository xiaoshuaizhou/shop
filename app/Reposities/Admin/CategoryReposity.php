<?php

namespace App\Reposities\Admin;


use App\Models\Admin\Category;

/**
 * Class CategoryReposity
 * @package App\Reposities\Admin
 */
class CategoryReposity
{
    /**
     * @var Category
     */
    public $category;

    /**
     * categoryReposity constructor.
     * @param $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @param $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function create($data)
    {
        return $this->category->create($data);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function categoryList()
    {
        return $this->category->get();
    }

    /**
     * 无限极分类
     * @param $cates
     * @param int $pid
     * @return array
     */
    public function getTree($cates, $pid=0)
    {
        $tree = [];
        foreach ($cates as $cate){
            if ($cate['parent_id'] == $pid){
                $tree[] = $cate;
                $tree = array_merge($tree, $this->getTree($cates, $cate['cateid']));
            }
        }

        return $tree;
    }

    /**
     * 无限极分类设置前缀
     * @param $data
     * @param string $p
     * @return array
     */
    public function setPrefix($data, $p = '|--')
    {
        $tree = [];
        $num = 1;
        $prefix = [0 => 1];
        while ($val = current($data)){
            $key = key($data);
            if ($key > 0){
                if ($data[$key - 1]['parent_id'] != $val['parent_id']){
                    $num++;
                }
            }
            if (array_key_exists($val['parent_id'], $prefix)){
                $num = $prefix[$val['parent_id']];
            }
            $val['title'] = str_repeat($p, $num) . $val['title'];
            $prefix[$val['parent_id']] = $num;
            $tree[] = $val;

            next($data);
        }

        return $tree;
    }

}