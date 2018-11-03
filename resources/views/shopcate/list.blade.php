@extends('layout.default')

@section('contents')
    <table class="table table-bordered table-striped">
        <h1>商铺分类管理</h1>
        <tr>
            <th>ID</th>
            <th>名称</th>
            <th>图片</th>
            <th>状态</th>
            {{--<th>test</th>--}}
            <th>操作</th>
        </tr>
        @foreach ($shopcs as $shopc)
            <tr>
                <td>{{ $shopc->id }}</td>
                <td>{{ $shopc->name }}</td>
                <td><img src="{{$shopc->img}}" style="width: 50px;"></td>
                <td>{{ $shopc->status}}</td>
                {{--<td>{{$shopc->name}}</td>--}}
                <td><a href="{{route('shopcategory.create')}}" class="btn btn-info">添加</a>
                    <a href="{{ route('shopcategory.edit',[$shopc]) }}" class="btn btn-warning">修改</a>
                    <form method="post" action="{{ route('shopcategory.destroy',[$shopc]) }}" style="float: left;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $shopcs->links() }}
@endsection