<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //会员列表
    public function index(){
//        dd('fw ');
        $members=Member::paginate(3);
//        dd($orders);
        return view('member/list',compact('members'));
    }
    //会员详情
    public function  show(Member $member)
    {
        return view('member.show',compact('member'));
    }
    public function store(){
        $members=Member::paginate(3);
        return view('member/list',compact('members'));
    }

    //禁用会员
    public function  edit(Member $member){
        $member->update([
            'status'=>0
        ]);
        return back()->with('danger','该账号已经被禁用');
    }
    //解禁会员
    public function  jiejin(Member $member){
//        dd('fvv');
        $member->update([
            'status'=>1
        ]);
        return back()->with('success','该账号又可以用了');
    }


}
