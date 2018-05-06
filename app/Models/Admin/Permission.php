<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'admin_permissions';

    protected $fillable = ['name', 'descr'];
    /**
     * 权限和角色的多对多关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Admin\Permission', 'admin_permission_role', 'permission_id', 'role_id')
            ->withPivot(['permission_id', 'role_id'])
            ->withTimestamps();
    }
}
