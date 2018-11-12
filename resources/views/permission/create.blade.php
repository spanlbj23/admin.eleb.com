@extends('layout.default')

@section('contents')
    <div style="margin:0 auto; width: 60%;">
        <h2 class="bg-primary">------添加权限-------</h2>
        @include('layout._errors')
        <form method="post" action="{{route('permission.store')}}" >
            <div class="form-group">
                <label>权限名</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    {{csrf_field()}}
                </select>
            </div>
            <button class="btn btn-primary btn-block">提交</button>
        </form>
    </div>
    @stop
