@extends('layout.default')

@section('contents')
    <table class="table table-bordered table-striped">
        <h1>角色列表</h1>
        <tr>
            <th>ID</th>
            <th>角色名</th>
            <th>操作</th>
        </tr>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td><a href="{{route('role.create')}}" class="btn btn-info">添加</a>
                    <a href="{{ route('role.edit',[$role]) }}" class="btn btn-warning">修改</a>
                    <form method="post" action="{{ route('role.destroy',[$role]) }}" style="float: left;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $roles->links() }}
@endsection