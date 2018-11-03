@extends('layout.default')

@section('contents')
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>店铺名</th>
            <th>申请人</th>
            <th>状态</th>
            {{--<th>test</th>--}}
            <th>操作</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->shop->shop_name }}</td>
                <td>{{$user->name}}</td>
                <td style="color: #e38d13;">待审核</td>
                <td><a href="{{route('audit.update',[$user])}}" class="btn btn-info">通过</a><a href="{{route('audit.ban',[$user])}}" class="btn btn-danger">禁用</a>

                </td>
                </td>
            </tr>
            {{ csrf_field() }}
        @endforeach
    </table>
     {{ $users->links() }}
@endsection