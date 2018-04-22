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
    public function setPrefix($data, $p = '|------')
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

    /**
     * 根据主键查询数据
     * @param $id
     * @return mixed|static
     */
    public function getCateById($id)
    {
        return $this->category->where('cateid', $id)->first();
    }

    /**
     * @param $data
     * @return bool
     */
    public function update($data)
    {
        if (empty($data['cateid'])){
            return redirect()->withErrors('参数错误');
        }
        return $this->category->where('cateid', $data['cateid'])->update([
            'title' => $data['title'],
            'parent_id' => $data['parent_id']
        ]);
    }

    /**
     * @param $id
     * @return $this
     * @throws \Exception
     */
    public function delete($id)
    {
        if (empty($id)){
            return redirect()->back()->withErrors('参数错误');
        }

        $cate = $this->category->where('parent_id', $id)->first();
        if ($cate){
            return redirect()->back()->withErrors('改分类下有子类，不允许删除');
        }

        $res = $this->category->where('cateid', $id)->delete();
        if ($res){
            return redirect()->back()->withErrors('删除成功', 'success');
        }
    }

    /**
     * 查询所有分类，只展示三级
     * @return array
     */
    public static function getMenu()
    {
        $top = Category::where('parent_id', 0)->latest()->get();
        $data = [];
        foreach ($top as $k => $item) {
            $item['children'] = Category::where('parent_id', $item['cateid'])->latest()->get();
            $data[$k] = $item;
        }

        $info = [];
        foreach ($data as $datum => $value){
            foreach ($value['children'] as $key => $child ){
                $child['children'] = Category::where('parent_id', $child['cateid'])->latest()->get();
                $info[$key] = $child;
                $data[$datum] = $value;
            }
        }

        return $data;
    }














}