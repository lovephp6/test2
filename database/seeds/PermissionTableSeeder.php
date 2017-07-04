<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Permission;

class PermissionTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //清空权限相关的数据表
        Permission::truncate();
        Role::truncate();
        User::truncate();
        DB::table('role_user')->delete();
        DB::table('Permission_role')->delete();

        //创建出事的管理员用户
        $dudu = User::create([
        		'name' => 'dudu',
        		'email' => '6494488500@qq.com',
        		'password' => bcrypt('123456')
        	]);
        // 创建初始的role（初始的角色设定）
        $admin = Role::create([
        	'name' => 'admin',
        	'display_name' => '管理员',
        	'description'	=> 'suoer admin role'
        	]);

        // 创建相应的初始权限
        // $manage_user = Permission::create([
        // 	'name' => 'manage_user',
        // 	'display_name' => '用户管理',
        // 	'description'	=> '管理用户权限'
        // 	]);
        $permissions = [
        	[
        		'name' => 'create_user',
        		'display_name' => '创建用户',
        	],
        	[
        		'name' => 'edit_user',
        		'display_name' => '编辑用户',
        	],
        	[
        		'name' => 'delete_user',
        		'display_name' => '删除用户',
        	],
        ];
        foreach ($permissions as $permission) {
        	$manage_user = Permission::create($permission);
        	// 给角色赋予相应的权限
       		 $admin->attachPermission($manage_user);
        }

       
        // 给用户赋予相应的角色
        $dudu->attachRole($admin);
       
    }
}
