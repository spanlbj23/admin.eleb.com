@extends('layout.default')

@section('contents')
    <div style="margin:0 auto; width: 60%;">
        <h2 class="bg-primary">------修改角色-------</h2>
        @include('layout._errors')
        <form method="post" action="{{route('role.update',[$role])}}" >
            <div class="form-group">
                <label>角色</label>
                <input type="text" class="form-control" name="name" value="{{$role->name}}">
            </div>
            <div class="form-group">
                <label>修改权限</label><br/>
                @foreach($permissions as $permission)
                    <input type="checkbox"   name="permission[]"  value="{{$permission->name}}" @if($role->HasPermissionTo($permission))checked @endif>{{$permission->name}} <strong>/</strong>
                @endforeach
            </div>
                {{csrf_field()}}
                {{method_field('PUT')}}
            <button class="btn btn-primary btn-block">提交</button>
        </form>
    </div>
    @stop
