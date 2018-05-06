<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Naux\Mail\SendCloudTemplate;

/**
 * App\Admin
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $getip
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereGetip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'getip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 用户有哪些角色
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Admin\Role', 'admin_role_admin', 'admin_id', 'role_id')
            ->withPivot(['admin_id', 'role_id'])
            ->withTimestamps();
    }

    /**
     * 判断是否有那个角色
     * @param $roles
     * @return bool
     */
    public function isInRoles($roles)
    {
        return !!$roles->intersect($this->roles)->count();
    }

    /**
     * 分配权限
     * @param $role
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function assignRole($role)
    {
        return $this->roles()->save($role);
    }

    /**
     * 取消角色
     * @param $role
     * @return int
     */
    public function deleteRole($role)
    {
        return $this->roles()->detach($role);
    }

    /**
     * 用户是否有权限
     * @param $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->hasRole($permission->roles);

    }

    /**
     * 判断用户是否具有某个角色
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();
    }

    /**
     * 是不是管理员权限
     * @return mixed
     */
    public function isAdmin()
    {
        return $this->roles->contains('name', 'admin');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        // 模板变量
        $data = [
            'url' => url('admin/password/reset', $token)
        ];
        $template = new SendCloudTemplate('zhihu_app_register_rest', $data);

        \Mail::raw($template, function ($message) {
            $message->from(env('SEND_EMAIL_FROM'), config('app.name'));

            $message->to($this->email);
        });
    }
}
