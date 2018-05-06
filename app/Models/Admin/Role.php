<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'descr'];
    protected $table = 'admin_roles';

    /**
     * 定义角色和权限的多对多的关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Admin\Permission', 'admin_permission_role', 'role_id','permission_id')
            ->withPivot(['role_id', 'permission_id'])
            ->withTimestamps();
    }

    /**
     * 给角色赋予权限
     * @param $permission
     * @return Model
     */
    public function grantPermission($permission)
    {
        return $this->permissions()->save($permission);
    }

    /**
     * 角色取消权限
     * @param $permission
     * @return int
     */
    public function deletePermission($permission)
    {
        return $this->permissions()->detach($permission);
    }

    public function hasPermission($permission)
    {
        if (is_string($permission)){
            return $this->permissions->contains('name', $roles);
        }
        return $this->permissions->contains($permission);
    }
}
