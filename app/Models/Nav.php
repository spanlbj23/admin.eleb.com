<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Nav extends Model
{
//    //获取导航菜单
//    public static function getNavs(){
//        $html='';
//        //生成导航菜单组
//        //1.获取所有一级菜单
////        $navs = Nav::where('pid',0)->get();
//        $navs=[
//            [
//                'id'=>'1',
//                'name'=>'haha管理',
//                'url'=>''
//            ],
//            [
//                'id'=>'2',
//                'name'=>'文章管理',
//                'url'=>''
//            ]
//        ];
//        //遍历一级菜单生成html
//        foreach ($navs as $nav){
//            $html.=' <li class="dropdown">
//                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"                        aria-haspopup="true" aria-expanded="false">'.$nav['name'].'<span                                       class="caret"></span></a>
//                    <ul class="dropdown-menu">';
//            //获取该一级菜单的子菜单
////            $children= Nav::where('pid',$nav['id'])-
//            $children=[
//                [
//                    'id'=>'3',
//                    'name'=>'添加管理',
//                    'url'=>'user/add'
//                ],
//                [
//                    'id'=>'4',
//                    'name'=>'45615管理',
//                    'url'=>'role/create'
//                ]
//            ];
//            foreach($children as $child){
//                $html.='<li><a href="'.$child['url'].'">'.$child['name'].'</a></li>';
//            }
////            <li><a href="">二级菜单1</a></li>
////                        <li><a href="">二级菜单2</a></li>
//
//                   $html.= '</ul></li>';
//        }
//
//        return $html;
//    }

//导航菜单
    protected $fillable=[
        'name',
        'permission_id',
        'pid',
        'url'
    ];
    public static function getNavs(){
        $html = '';
        $nav_html = '';
        //获取所有一级菜单
        $navs = Nav::where('pid',0)->get();
//        dd($navs);
        //遍历一级菜单，生成html
        foreach ($navs as $nav){
            //获取该一级菜单的子菜单
            $children_html = '';
            $children = Nav::where('pid',$nav['id'])->get();
            foreach ($children as $child){
                if(Auth::user()->can($child['url'])) {
                    $children_html .= '<li><a href="'.$child['url'].'">'.$child['name'] . '</a></li>';
                }
            }
            if($children_html){
                $nav_html .= '<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$nav['name'].'<span class="caret"></span></a>
                <ul class="dropdown-menu">';
                $nav_html .= $children_html;
                $nav_html .= '</ul></li>';
            }
        }
        $html .= $nav_html;
//        dd($html);
        return $html;
    }
}
