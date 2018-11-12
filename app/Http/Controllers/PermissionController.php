<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //权限列表
    public function index(){
        $permissions=Permission::paginate(3);
        return view('permission.list',compact('permissions'));
    }

    //添加
    public function create(){
        return view('permission.create');
    }
    public function store(Request $request){
        Permission::create([
            'name'=>$request->name,
        ]);
        return redirect()->route('permission.index')->with('success','添加成功');
    }

    //修改
    public function edit(Permission $permission){
//        dd('sdc');
       return view('permission.edit',compact('permission'));
    }
    public function update(Permission $permission,Request $request){
        $permission->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('permission.index')->with('success','修改成功');
    }
    //删除
    public function destroy(Permission $permission){
        $permission->delete();
        return back()->with('success','删除成功');
    }
}
