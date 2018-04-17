<?php

namespace App\Http\Controllers\Home;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function verify($token)
    {
        $user = User::where('token', '=', $token)->first();
        if (is_null($user)){
            flash('邮箱验证失败', 'danger');
            return redirect('/');
        }
        $user->is_active = 1;
        $user->token = str_random(60);
        $user->save();

        Auth::login($user);
        flash('邮箱验证成功', 'success');

        return redirect('/');
    }
}
