<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * 获取角色表里超级管理员的数据
         */
        $adminRole = Role::where('name','admin')->first();
        /*
        * 获取角色表里普通管理员的数据
        */
        $userRole = Role::where('name','user')->first();

        $admin = factory(\App\Admin::class)->create([
            'name' => 'phpsix',
            'email' => 'phpsix@163.com',
            'password' => bcrypt('123456'),
        ])->each(function($u) use ($adminRole)
        {
            $u->attachRole($adminRole);
        });

        $users = factory(\App\Admin::class, 1)->create([
            'name' => 'test1',
            'email' => 'test@trest.com',
            'password' => bcrypt('123456')
        ])->each(function($u) use ($userRole){
            $u->roles()->attach($userRole->id);
        });
    }
}
