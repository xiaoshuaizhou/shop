<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Naux\Mail\SendCloudTemplate;

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    private function sendPasswordResetNotification($token)
    {
        // 模板变量
        $data = [
            'url' => url('/password/reset', $token)
        ];
        $template = new SendCloudTemplate('zhihu_app_register_rest', $data);

        \Mail::raw($template, function ($message) {
            $message->from(env('SEND_EMAIL_FROM'), config('app.name'));

            $message->to($this->email);
        });
    }

}
