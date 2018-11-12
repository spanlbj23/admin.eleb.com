@extends('layout.default')

@section('contents')

    {{--<form class="navbar-form navbar-left" action="{{route('menu.index')}}" method="get">--}}
        {{--<div class="form-group">--}}
            {{--<label>d：</label>--}}
            {{--<select name="category_id"  class="form-control">--}}
                {{--<option value="">菜品分类</option>--}}
                {{--@foreach ($Categorys as $Category)--}}
                    {{--<option value="{{$Category->id}}"   @if(old('category_id')==$Category->id)selected="selected"@endif>{{$Category->name}}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<input type="text" name='goods_name' class="form-control" placeholder="菜品名称">--}}
            {{--<input type="text" name="price1" class="form-control" placeholder="价格区间"> ---}}
            {{--<input type="text" name="price2" class="form-control" placeholder="价格区间">--}}
        {{--</div>--}}
        {{--<button type="submit" class="btn btn-success">搜索菜品</button>--}}
    {{--</form>--}}
    <table class="table table-bordered table-striped">
        <h1 style="color: #449d44;">-------会员列表-------</h1>
        <tr>
            <th>ID</th>
            <th>收货人</th>
            <th>订单编号</th>
            <th>下单时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach ($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->username }}</td>
                <td>{{ $member->tel }}</td>
                <td>{{ $member->created_at }}</td>
                <td>@if($member->status==1) <span style="color:#009900;">正常</span> @elseif($member->status==0)  <span style="color:#aa1111;">禁用</span> @endif  </td>
                <td><a href="{{route('member.show',[$member])}}" class="btn btn-info">会员详细信息</a>@if($member->status==1) <a href="{{ route('member.edit',[$member]) }}" class="btn btn-warning">禁用</a>  @endif
                    @if($member->status==0) <a href="{{ route('member.jiejin',[$member]) }}" class="btn btn-success">解禁</a> @else <a type="hidden"></a> @endif
                {{--</td>--}}
                {{--{{method_field('PUT')}}--}}
            </tr>
        @endforeach
    </table>
    {{ $members->links() }}
@endsection