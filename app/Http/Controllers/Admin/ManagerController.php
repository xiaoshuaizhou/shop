<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Requests\ChangeEmailRequest;
use App\Http\Requests\ChangePassRequest;
use App\Http\Requests\ManagerRequest;
use App\Models\Admin\Role;
use App\Reposities\Admin\ManagerReposity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    public $adminRepositoy;
    public function __construct(
        ManagerReposity $managerReposity
    ){
        $this->middleware('admin');
        $this->adminRepositoy = $managerReposity;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $managers = $this->adminRepositoy->getAllManagers();
        return view('admin.user.indexmanager', compact('managers'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('admin.user.addmanager');
    }

    /**
     * @param ManagerRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(ManagerRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'getip' => ip2long(getIp()),
        ];

        $res = $this->adminRepositoy->create($data);
        if ($res) {
             flash('添加成功')->success();
             return redirect('/admin/manager/index');

        }else{
             flash('添加失败')->error();
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function detroy($id)
    {
        $res = $this->adminRepositoy->destroy($id);
        if ($res) {
            flash('删除成功')->success();
            return redirect('/admin/manager/index');

        }else{
            flash('删除失败')->error();
            return redirect()->back();
        }
    }

    /**
     * 修改邮箱视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changeemail()
    {
        $user = \Auth::guard('admin')->user();

        return view('admin.user.changeemail', compact('user'));
    }

    /**
     * 修改邮箱
     * @param ChangeEmailRequest $request
     */
    public function changeemailpost(ChangeEmailRequest $request)
    {
        $res = $this->adminRepositoy->changeEmail($request->all());

        return $this->flash($res);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changepass()
    {
        $user = \Auth::guard('admin')->user();

        return view('admin.user.changepass', compact('user'));
    }

    /**
     * @param ChangePassRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function changepasspost(ChangePassRequest $request)
    {
        $res = $this->adminRepositoy->changePass($request->all());

        return $this->flash($res);
    }

    /**
     * @param $res
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function flash($res)
    {
        if (!$res){
            flash('编辑失败，请检查用户名和密码')->error();
            return redirect()->back();
        }else{
            flash('修改成功')->success();
            return redirect('/admin/manager/index');
        }
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile($id)
    {
        $user = Admin::findOrFail($id);

        return view('admin.user.profile', compact('user'));
    }

    /**
     * 用户角色页
     * @param Admin $admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function role(Admin $admin)
    {
        $roles = Role::all();
        $myRoles = $admin->roles;
        $manegers = Admin::all();

        return view('admin.user.role', compact('manegers', 'roles', 'myRoles', 'admin'));

    }

    /**
     * 增加或删除管理员角色
     * @param Admin $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeRole(Admin $admin)
    {
        $this->validate(\request(), [
            'roles' => 'required|array'
        ]);
        $roles = Role::findMany(\request('roles'));
        $myRoles = $admin->roles;
        //要增加的角色
        $addRoles = $roles->diff($myRoles);
        foreach ($addRoles as $addRole) {
            $admin->assignRole($addRole);
        }
        //要删除的角色
        $deleteRoles = $myRoles->diff($roles);
        foreach ($deleteRoles as $deleteRole) {
            $admin->deleteRole($deleteRole);
        }

        return redirect()->back();
    }
}
