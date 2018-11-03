<?php

namespace App\Http\Controllers\Shopcategory;

use App\Models\Shop;
use App\Models\ShopCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ShopCategoryController extends Controller
{
    //列表
    public  function index(){
        //使用阿里云对象存储
        //Storage::disk('oss');//使用阿里云oss存储文件
       // Storage::put('path/to/file/file.jpg', $contents); //first parameter is the target file path, second paramter is file content
        //Storage::putFile('path/to/file/file.jpg', 'local/path/to/local_file.jpg'); // upload file from local path
        //Storage::put('pic/dp.jpg',file_get_contents(public_path('img/dp.jpg')));
//        return "sss";
//            dd(Storage::url('pic/dp.jpg'));
       $shopcs=ShopCategory::paginate(3);
        return view('shopcate.list',compact('shopcs'));
    }
    //添加
    public function create(){

        return view('shopcate.add');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
//            'img'=>'required|file',
//            'status'=>'required'
        ]);
//        dd($request->input());
//        $path = $request->file('img')->store('public/shopcate');

       ShopCategory::create([
//            dd('23313'),
            'name'=>$request->name,
            'img'=>$request->img,
            'status'=>1,
        ]);
//        dd($path);
        return redirect()->route('shopcategory.index')->with('success','添加成功');
    }
    //更新
    public  function  edit(ShopCategory $shopcategory){

//        $shopcc=ShopCategory::where('id','=',$shopc)->first();
        return view('shopcate.edit',compact('shopcategory'));
    }
    public  function update(ShopCategory $shopcategory,Request $request){
//        dd($request->file());

        if(!$request->file()){
            $shopcategory->update([
                'name'=>$request->name,
                'status'=>$request->status
            ]);
        }
        $path = $request->file('img')->store('public/shopcate');

        $this->validate($request,[
            'name'=>'required',
             'img'=>'required|file',
            'status'=>'required'
        ],
            [
                'name.required'=>'用户名不能为空',

            ]
            );
//        dd($request->input());
        $shopcategory->update([
//            dd('23313'),
            'name'=>$request->name,
            'img'=>$path,
            'status'=>$request->status
        ]);
        return redirect()->route('shopcategory.index')->with('success','分类修改成功');
    }
    //删除
    public function destroy(ShopCategory $shopcategory){

        $shopcategory->delete();
        session()->flash('success','该分类已经被删除');
        return redirect()->route('shopcategory.index');
    }
    //接收webuloader文件上传
    public function upload(Request $request){
        $path=$request->file('file')->store('public/img');
        return ['path'=>Storage::url($path)];
    }
}
