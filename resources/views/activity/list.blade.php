@extends('layout.default')

@section('contents')
    <table class="table table-bordered table-striped">
        <h1>活动列表</h1>
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>活动开始时间</th>
            <th>活动详情</th>
            <th>操作</th>
        </tr>
        @foreach ($activity as $act)
            <tr>
                <td>{{ $act->id }}</td>
                <td>{{ $act->title }}</td>
                <td>{{ $act->start_time }}</td>
                <td>{{ $act->end_time}}</td>
                <td><a href="{{route('activity.create')}}" class="btn btn-info">添加</a>
                    <a href="{{ route('activity.edit',[$act]) }}" class="btn btn-warning">修改</a>
                    <form method="post" action="{{ route('activity.destroy',[$act]) }}" style="float: left;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                {{--</td>--}}
            </tr>
        @endforeach
    </table>
    {{ $activity->links() }}
@endsection