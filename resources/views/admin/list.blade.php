@extends('layout.default')

@section('contents')
    <table class="table table-bordered table-striped">
        <h1>管理员列表</h1>
        <tr>
            <th>ID</th>
            <th>名称</th>
            <th>邮箱</th>
            <th>图片</th>
            <th>操作</th>
        </tr>
        @foreach ($admins as $admi)
            <tr>
                <td>{{ $admi->id }}</td>
                <td>{{ $admi->name }}</td>
                <td>{{ $admi->email }}</td>
                <td>@if($admi->img)<img src="{{\Illuminate\Support\Facades\Storage::url($admi->img)}}" style="width: 50px;">@endif</td>
                <td><a href="{{route('admin.create')}}" class="btn btn-info">添加</a>
                    <a href="{{ route('admin.edit',[$admi]) }}" class="btn btn-warning">修改</a>
                    <form method="post" action="{{ route('admin.destroy',[$admi]) }}" style="float: left;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $admins->links() }}
@endsection