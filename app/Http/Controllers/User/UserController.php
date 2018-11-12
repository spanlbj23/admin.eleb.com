<?php

namespace App\Http\Controllers\User;

use App\Models\Shop;
use App\Models\ShopCategory;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

//    public function login(){
//        return "login";
//    }
    //列表
    public function index(){
//            $shops=Shop::all();
            $users=User::where('status','=',0)->paginate(3);
//            dd($users);
            return view('user.list',compact('users','shops'));
    }
    //用户注册
    public function create(){
//        dd('123jij');
        $shopcate=ShopCategory::all();
//        dd($shopcate->);
        return view('user.create',compact('shopcate'));
    }
    public function store(Request $request) {
//        dd($request->all());
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required',
            'email'=>'required',
            'shop_name'=>'required',
            'shop_img'=>'required|file'
        ],
        [
            'name.required'=>'用户名不合法',
            'password.required'=>'密码不合法',
            'shop_name'=>'店铺名不合法',
            ]);
        //处理上传文件
        DB::begintransaction();
        try{
        $path=$request->file('shop_img')->store('public/shopsimg');
        $data=Shop::create([
            'shop_name'=>$request->shop_name,
            'shop_category_id'=>$request->shop_category_id,
            'brand'=>$request->brand,
            'on_time'=>$request->on_time,
            'fengniao'=>$request->fengniao,
            'bao'=>$request->bao,
            'piao'=>$request->piao,
            'zhun'=>$request->zhun,
            'shop_img'=>$path,
            'status'=>0
        ]);
//        dd($data->id);
//        dd($request->input());
        User::create([
            'name'=>$request->name,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            'shop_id'=>$data->id,
            'status'=>0
      ]);
        return redirect()->route('user.index')->with('success','您的信息已经提交审核，么么哒');

    }
        catch (\Exception $e) {
            DB::rollback();
            //如果失败,跳转;*
            return redirect()->route('user.register')->with('danger', '提交失败,请重新提交申请');
        }
    }
    //修改
        public function edit(){

        }

        public function update(){

        }

        public function destroy(){

        }


//    public function index(){
//      //获取已登录的用户信息
//        $user= Auth::user();
//        return view('session.index',['user'=>$user]);
//    }
}
//
