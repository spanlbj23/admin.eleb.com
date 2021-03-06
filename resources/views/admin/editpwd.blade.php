@extends('layout.default')

@section('contents')

    @include('layout._errors')
    <form method="post" style="width: 60%; margin: 0 auto;" action="{{ route('admin.updatepwd',[$admin]) }}" enctype="multipart/form-data">
        <h1>修改密码</h1>
        <div class="form-group">
            <label>管理员</label>
            <input type="text" name="name" class="form-control" readonly="readonly" value="{{$admin ->name }}">
        </div>
        <div class="form-group">
            <label>邮箱</label>
            <input type="text" name="email" readonly="readonly" class="form-control" value="{{$admin ->email }}">
        </div>
       <div class="form-group">
            <label>请输入旧密码</label>
            <input type="password" name="password" class="form-control"  value="">
        </div>
       <div class="form-group">
            <label>请输入新密码</label>
            <input type="password" name="newpwd" class="form-control"  value="{{old('newpwd')}}">
            </div>
        <div class="form-group">
           <label>确认新密码</label>
            <input type="password" name="newpwd_confirmation" class="form-control"  value="{{old('newpwd_confirmation')}}">
        </div>
        {{--<div class="form-group">--}}
            {{--<label class="col-sm-2 control-label" style="color: #419641;font-size:20px;padding-top: 20px;">修改管理员头像：</label>--}}
            {{--<div class="col-sm-1 " style="width: 300px;!important"  onclick="test()">--}}
                {{--<input type="file" id="file" name="img"  style="display: none"                                  onchange="preview(this)"><br/>--}}
                {{--<img id="face" src="{{\Illuminate\Support\Facades\Storage::url($admin->img)}}" class="img-thumbnail" alt="点击修改管理员头像" style="width: 300px;height: 190px;margin-top: -19px;"/>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{ csrf_field() }}

        <button class="btn btn-primary btn-block" style="width: 50%; margin: 0 auto;">确认修改</button>
    </form>
@stop
<script>
    function test(){
        var $file = document.getElementById('file');
        $file.click();
    }

    function preview(obj) {
        // 获取input上传的图片数据;
        var file = obj.files[0];
        // 得到bolb对象路径，可当成普通的文件路径一样使用，赋值给src;
        url = window.URL.createObjectURL(file);
        //预览
        var face = document.getElementById('face');
        face.src = url;
    }
</script>