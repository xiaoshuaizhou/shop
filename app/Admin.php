<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Naux\Mail\SendCloudTemplate;

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
