<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RbacController extends Controller
{
    //rbac授权模型演示
    //权限管理（权限增删改查）【添加用户，修改用户，删除用户，查看用户，商家审核】
    //角色管理（角色的增删改查）【添加角色的时候，需要给角色赋予权限】
    //调整账户管理（添加和修改）【添加和修改账户，需要给用户赋予角色】
    public function index()
    {
        //权限
        //添加权限
        //$permission = Permission::create(['name' => 'edit articles']);
        //建议： 权限名称和路由名称一致  //权限叫users.add     路由 users.add

        //添加角色
        //$role = Role::create(['name' => 'writer']);

        //给角色赋予权限
//        方法1（优先）.$role->givePermissionTo($permission);
//        方法2.$permission->assignRole($role);
        //给角色添加多个权限
//        方法一 $role->syncPermissions($permissions);
//        方法二$permission->syncRoles($roles);

        //添加两个权限 添加商家 查看商家
//        Permission::create(['name'=>'添加商家']);
//        Permission::create(['name'=>'查看商家']);
        //添加一个角色 管理员
        $role=Role::create(['name' => '管理员']);

        //给管理员角色赋值 添加商家 查看商家 权限
        $permission1=Permission::where('name','添加商家')->first();
        $permission2=Permission::where('name','查看商家')->first();
        $permissions=[$permission1,$permission2];
        $role->syncPermissions($permissions);
        echo "操作成功";
    }
    //
    public function test(){
//        $role=Role::findById(16);
//        //给角色赋权限
//        $role->givePermissionTo('20');

        if(!Auth::user()->can('activity(查看活动列表)')){
            return 'fvref';
        }
        //给用户admin添加管理员角色
//        $admin=Admin::find(6);
//        $admin->assignRole('管理员');
////        //登录
//        Auth::login($admin);
//        $user=Auth::user();
//        dd($user->name);
        //查看用户是否有这个角色
//        dd($user->hasRole('管理员'));
        //查看用户的权限
//        dd($user->can('activity(查看活动列表)'));
        return view('test');
//        echo '操作完成';
    }
}
