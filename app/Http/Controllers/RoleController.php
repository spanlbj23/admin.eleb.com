<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //角色控制器
    //列表
    public function index(){
        $roles=Role::paginate(3);
        return view('role.list',compact('roles'));
    }
    //新增

    public function create(){
        $permissions=Permission::all();
        return view('role.create',compact('permissions'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => [
                'required',
                Rule::unique('roles')->ignore($request->name),
            ],
        ],[
            'name.required'=>'请输入有效字符',
            'name.unique'=>'该角色已经存在'
        ]);
//        dd($request->all(),$request->name,$request->permission);
        $role = Role::create([
            'name'=>$request->name,
        ]);
        $role->syncPermissions($request->permission);
        return redirect()->route('role.index')->with('success','添加成功');
    }
    //修改
    public function edit(Role $role){
        $permissions=Permission::all();
        return view('role.edit',compact('permissions','role'));
    }
    public function update(Role $role,Request $request){
//        dd($request->all());
        $this->validate($request,[
           'name'=>'required'
        ]);
        $role->update([
            'name'=>$request->name,
        ]);
        $role->syncPermissions($request->permission);
        return redirect()->route('role.index')->with('success','修改成功');
    }
    //删除
    public function destroy(Role $role){
        $role->delete();
        return redirect()->route('role.index')->with('success','删除成功');
    }
}

