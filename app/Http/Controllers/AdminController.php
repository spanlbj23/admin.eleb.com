<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    //管理员列表
    public function index(){
       $admins= Admin::paginate(5);
//       dd($admins);
//        dd('sss');
        return view('admin.list',compact('admins'));

    }
    //添加管理员
    public function create(){
        $roles=Role::all();
        $permissions=Permission::all();
        return view('admin.create',compact('permissions','roles'));
    }
    public function store(Request  $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
//            'img'=>'required|file'
        ]);
        $path=$request->file('img')->store('public/shopcate');
        $admin=Admin::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>bcrypt($request->password),
           'img'=>$path,
        ]);
        $admin->syncRoles($request->role);
        return redirect()->route('login')->with('success','管理员用户添加成功');

    }
    //修改管理员
    public function edit(Admin $admin){
        $roles=Role::all();
//        dd($admin);
//        dd($roles);
        return view('admin.edit',compact('roles','admin'));
    }
    public function update(Admin $admin,Request $request){
        if(!$request->file()){
            $admin->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
            $admin->syncroles($request->role);
        }
        $path=$request->file('img')->store('public/shopcate');
        $this->validate($request ,[
            'name'=>'required',
            'email'=>'required',
        ]);
       $admin->update([
           'name'=>$request->name,
           'email'=>$request->email,
           'img'=>$path,
       ]);
        $admin->syncRoles($request->role);
       return redirect()->route('admin.index')->with('success','管理员修改成功');

    }
    //删除管理员
    public function destroy(Admin $admin){
        $admin->delete();
        session()->flash('success','该管理员已被删除');
        return redirect()->route('admin.index');
    }
    //管理员主界面
    public function indexm(){
        //获取已登录的用户信息
//        dd('主页面');
        $users= Auth::user();
//        dd($user->name);
        return view('session.index',['user'=>$users]);

    }
    //显示一条管理员数据
    public function show(Admin $admin){
//            dd($admin);
            return view('admin.editpwd',compact('admin'));
    }
    public function updatepwd(Admin $admin,Request $request){
//        dd($request->file());
//        dd($admin);
//        if(!$request->file()){
//            $admin->update([
//                'password'=>$request->password,
//            ]);
//        }
//       $path=$request->file('img')->store('public/shopcate');
        $this->validate($request ,[
            'password'=>'required',
            'newpwd'=>'required',
            'newpwd_confirmation'=>'required'
        ],[
            'password.required'=>'请输入旧密码',
            'newpwd.required'=>'请输入新密码',
            'newpwd_confirmation'=>'请确认新密码',
            'newpwd.confirm'=>'两次密码不一致',
            'newpwd_confirmation.same'=>'两次密码不一致'
        ]);
        if(Hash::check($request->password,auth()->user()->password)){
           auth()->user()->update([
                'password' => bcrypt($request->newpwd),
//                'img'=>$path,

            ]);
//

            return redirect()->route('admin.index')->with('success','管理员密码修改成功');
        }else{
            //return "111";
//           return redirect()->route('admin.updatepwd')->with('success','旧密码错误');
           return back()->with('success','旧密码错误'.$request->password.auth()->user()->password);
        }

    }

}
