<?php

namespace App\Http\Controllers\Admin;

use App\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;

/**
 * Class RoleController
 * @package App\Http\Controllers\Admin
 */
class RoleController extends Controller
{
    /**
     * 角色列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::paginate(2);

        return view('admin.user.Rolelist', compact('roles'));
    }

    /**
     * 创建角色
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.user.Addrole');
    }

    public function roleByManager(Admin $admin)
    {
        $roles = Role::all();
        $myRoles = $admin->roles;

        return view('admin.user.RolePermissioninfo', compact('roles', 'myRoles', 'role', 'admin'));

    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $this->validate(\request(), [
            'name' => 'required|min:3',
            'descr' => 'required'
        ]);
        Role::create([
            'name' => \request('name'),
            'descr' => \request('descr')
        ]);

        return redirect('/admin/roles');
    }

    /**
     * 角色和权限的关系页面
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permission(Role $role)
    {
        $permissions = Permission::all();
        $myPermissions = $role->permissions;

        return view('admin.user.RolesPermission', compact('permissions', 'myPermissions', 'role'));
    }

    /**
     * 储存和删除角色和权限的行为
     * @param AdminRole $adminRole
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePermission(Role $role)
    {
        $this->validate(\request(), [
            'permissions' => 'required|array'
        ]);

        $permissions = Permission::with('roles')->findMany(\request('permissions'));
        $myPermissions = $role->permissions;
        //对已经存在的权限
        $addPermissions = $permissions->diff($myPermissions);

        foreach ($addPermissions as $addPermission) {
            $role->grantPermission($addPermission);
        }

        $deletePermissions = $myPermissions->diff($permissions);
        foreach ($deletePermissions as $deletePermission) {
            $role->deletePermission($deletePermission);
        }

        return redirect()->back();
    }
}
