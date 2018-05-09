<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserProfileRequest;
use App\Reposities\Admin\UserProfileReposity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{
    /**
     * @var UserProfileReposity
     */
    public $userModel;

    /**
     * UserController constructor.
     * @param UserProfileReposity $userProfileReposity
     */
    public function __construct(UserProfileReposity $userProfileReposity)
    {
        $this->userModel = $userProfileReposity;
        $this->middleware('admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->userModel->getAllUsers();

        return view('admin.user.Index', compact('users'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('admin.user.Add');
    }

    /**
     * @param UserProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(UserProfileRequest $request)
    {
        $res = $this->userModel->create($request->all());
        if (!$res){
            flash('添加失败')->error();
            return redirect()->back();
        }else{
            flash('添加成功')->success();
            return redirect('/admin/user');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->userModel->delete($id);

        return redirect()->back();
    }
}
