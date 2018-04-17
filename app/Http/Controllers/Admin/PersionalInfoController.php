<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Reposities\Admin\UserProfileReposity;
use App\User;
use Illuminate\Http\Request;

class PersionalInfoController extends Controller
{
    /**
     * @var User
     */
    public $userModel;

    /**
     * UserProfileReposity constructor.
     * @param $userModel
     */
    public function __construct(UserProfileReposity $userModel)
    {
        $this->middleware('admin');

        $this->userModel = $userModel;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $admin = $this->userModel->getUserById($id);

        return view('admin.persional.index', compact('admin'));
    }

    /**
     * 修改用户信息
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function changepersioninfo(Request $request)
    {
        $res = $this->userModel->changeProfileByPass($request->all());
        if ($res){
            return redirect()->back()->withErrors('修改成功');
        }else{
            return redirect()->back()->withErrors('修改失败');
        }
    }
}
