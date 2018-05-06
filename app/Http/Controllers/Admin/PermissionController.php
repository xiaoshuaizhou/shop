<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminPermission;
use App\Models\Admin\Permission;

class PermissionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $permissions = Permission::paginate(2);

        return view('admin.user.Permissionlist', compact('permissions'));
    }

    /**
     * 增加权限
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.user.Permissionadd');
    }

    /**
     * 创建权限
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $this->validate(\request(),[
            'name' => 'required|min:3',
            'descr' => 'required'
        ]);

        Permission::create(['name' => request()->name, 'descr' => request()->descr]);

        return redirect('/admin/permissions');
    }
}
