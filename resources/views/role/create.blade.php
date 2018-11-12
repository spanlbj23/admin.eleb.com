@extends('layout.default')

@section('contents')
    <div style="margin:0 auto; width: 60%;">
        <h2 class="bg-primary">------添加角色-------</h2>
        @include('layout._errors')
        <form method="post" action="{{route('role.store')}}" >
            <div class="form-group">
                <label>角色</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label>添加权限</label><br/>
                @foreach($permissions as $permission)
                    <input type="checkbox"   name="permission[]"  value="{{$permission->name}}">{{$permission->name}} <strong>/</strong>
                @endforeach
            </div>
                {{csrf_field()}}
            <button class="btn btn-primary btn-block">提交</button>
        </form>
    </div>
    @stop
