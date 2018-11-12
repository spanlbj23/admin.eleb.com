<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\User;
use Illuminate\Http\Request;
//审核控制器
class AuditController extends Controller
{
    //
    public function index(){
        $users=User::where('status','=',0)->paginate(3);
//        dd($users);
        return view('audit.list',compact('users'));
    }
    //审核通过
    public function update(User $user){
//        dd($resquest);
        $user->update([
//            dd('fwfvw'),
            'status'=>1,
        ]);

        return back()->with('success','审核通过');
    }
    //禁用
    public function ban(User $user){
        $user->update([
            'status'=>-1,
        ]);
        return back()->with('success','该账号已别禁用');
    }
//发送邮件的方法
    public function mail($name,$mail,$title,$content){
        \Illuminate\Support\Facades\Mail::send('mail',['name'=>$name,'content'=>$content],function($message)use($mail,$title){
            $message->to($mail)->subject($title);
        });
    }

}
