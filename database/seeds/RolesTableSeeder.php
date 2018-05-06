<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $admin               = new Role([
            'name' => 'admin',
            'display_name' => '超级管理员',
            'description' => '超级管理员'
        ]);
        $admin->name         = 'admin';
        $admin->display_name = '超级管理员';
        $admin->description  = '超级管理员';
        $admin->save();

//        Role::create([
//            'name' => 'admin',
//            'display_name' => '超级管理员',
//            'description' => '超级管理员'
//        ]);
//        Role::create([
//            'name' => 'user',
//            'display_name' => '普通管理员',
//            'description' => '普通管理员'
//        ]);


//
        $owner               = new Role([
            'name' => 'user',
            'display_name' => '普通管理员',
            'description' => '普通管理员'
        ]);
        $owner->name         = 'user';
        $owner->display_name = '普通管理员';
        $owner->description  = '普通管理员';
        $owner->save();

        /*
        * 超级管理员
        */
        $allPermission = array_column(Permission::all()->toArray(),'id');
        $admin->perms()->sync($allPermission);

        /*
        * 普通管理员
        */
        $createUser = Permission::where('display_name','添加菜单')->first();
        $loginBackend = Permission::where('name','admin.system.login')->first();
        $owner->attachPermissions([$createUser,$loginBackend]);

    }
}
