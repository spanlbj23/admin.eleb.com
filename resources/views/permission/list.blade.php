@extends('layout.default')

@section('contents')
    <table class="table table-bordered table-striped">
        <h1>权限列表</h1>
        <tr>
            <th>ID</th>
            <th>名称</th>
            <th>操作</th>
        </tr>
        @foreach ($permissions as $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td><a href="{{route('permission.create')}}" class="btn btn-info">添加</a>
                    <a href="{{ route('permission.edit',[$permission]) }}" class="btn btn-warning">修改</a>
                    <form method="post" action="{{ route('permission.destroy',[$permission]) }}" style="float: left;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $permissions->links() }}
@endsection