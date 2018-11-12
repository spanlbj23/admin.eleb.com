@extends('layout.default')

@section('contents')

    {{--<form class="navbar-form navbar-left" action="{{route('menu.index')}}" method="get">--}}
        {{--<div class="form-group">--}}
            {{--<label>按菜品分类显示列表：</label>--}}
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
        <h1 style="color: #449d44;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  -------商铺列表-------</h1>
        <tr>
            <th>ID</th>
            <th>店名</th>
            <th>店铺分类</th>
            <th>评分 <img src="" alt="" class="glyphicon glyphicon-star"> </th>
            <th>店铺图片</th>
            <th>品牌</th>
            <th>准时达</th>
            <th>蜂鸟配送</th>
            <th>保标记</th>
            <th>票标记</th>
            <th>准标记</th>
            <th>起送金额</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->shop->shop_name }}</td>
                <td>{{ $user->shop->shop_category_id }}</td>
                <td>{{ $user->shop->shop_rating }}</td>
                <td>@if($user->shop->shop_img)<img src="{{\Illuminate\Support\Facades\Storage::url($user->shop->shop_img)}}" style="width: 50px;">@endif</td>

                <td>@if($user->shop->brand==1) 是 @else 否 @endif</td>
                <td>@if($user->shop->on_time==1) 是 @else 否 @endif</td>
                <td>@if($user->shop->fengniao ==1) 是 @else 否 @endif</td>
                <td>@if($user->shop->bao==1) 是 @else 否 @endif</td>
                <td>@if($user->shop->piao==1) 是 @else 否 @endif</td>
                <td>@if($user->shop->zhun==1) 是 @else 否 @endif</td>
                <td>{{ $user->shop->start_send }}</td>
                <td>@if($user->status==1) 正常 @else 待审核 @endif  </td>
                <td><a href="{{route('user.create')}}" class="btn btn-info">添加</a>
                    <a href="{{ route('user.edit',[$user]) }}" class="btn btn-warning">修改</a>
                    <a href="" class="btn btn-info">禁用</a>
                    {{ csrf_field() }}
                </td>
            </tr>
        @endforeach
    </table>
    {{ $users->links() }}
@endsection