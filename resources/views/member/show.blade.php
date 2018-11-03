@extends('layout.default')

@section('contents')
    <div style="margin:0 auto; width: 60%;">
        <h2 class="bg-primary">------会员详情-------</h2>
        @include('layout._errors')
        <form method="post" action="{{route('member.index')}}" enctype="multipart/form-data">
            <div class="form-group">
                <label>账号名</label>
                <input type="text" name="username" readonly="readonly" class="form-control" value="{{$member->username}}" >
            </div>
            <div class="form-group">
                <label>联系电话</label>
                <input type="text" name="tel" class="form-control" readonly="readonly" value="{{$member->tel}}" >
            </div>
            <div class="form-group">
                <label>注册账号时间</label>
                <input type="text" name="created_at" readonly="readonly" class="form-control" value="{{$member->created_at}}">
            </div>
            <div class="form-group">
                <label>状态</label>
                @if($member->status==0) 禁用  @elseif($member->status==1) 正常 @endif
            </div>
            {{ csrf_field() }}
            {{--{{method_field('PUT')}}--}}
            <button class="btn btn-primary btn-block">返回</button>
        </form>
    </div>
    @stop
