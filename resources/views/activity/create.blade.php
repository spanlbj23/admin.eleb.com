@extends('layout.default')
@include('vendor.ueditor.assets')
@section('contents')
    <div style="margin:0 auto; width: 60%;">
        <h2 class="bg-primary">------新增活动-------</h2>
        @include('layout._errors')
        <form method="post" action="{{route('activity.store')}}" enctype="multipart/form-data">
            <div class="form-group">
                <label>活动名称</label>
                <input type="text" name="title" class="form-control" value="{{old('title')}}" >
            </div>
            <div class="form_group">
                <lable>活动时间:</lable>
                <input type="datetime-local" name="start_time" value="">-------
                <input type="datetime-local" name="end_time" value="">
            </div>

             <div class="form-group">
                <label>活动详情</label>
                 <!-- 实例化编辑器 -->
                 <script type="text/javascript">
                     var ue = UE.getEditor('container');
                     ue.ready(function() {
                         ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                     });
                 </script>

                 <!-- 编辑器容器 -->
                 <script id="container" name="content" type="text/plain"></script>
            </div>
            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button>
        </form>
    </div>
    @stop

