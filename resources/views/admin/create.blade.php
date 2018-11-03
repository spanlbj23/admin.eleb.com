@extends('layout.default')

@section('contents')
    <div style="margin:0 auto; width: 60%;">
        <h2 class="bg-primary">------新增管理员账号-------</h2>
        @include('layout._errors')
        <form method="post" action="{{route('admin.store')}}" enctype="multipart/form-data">
            <div class="form-group">
                <label>账户名</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" >
            </div>
             <div class="form-group">
                <label>密码</label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}">
            </div>
            <div class="form-group">
                <label>邮箱</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}" >
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="color: #419641;font-size:20px;padding-top: 20px;">添加管理员头像图片：</label>
                <div class="col-sm-1 " style="width: 300px;!important"  onclick="test          ()">
                    <input type="file" id="file" name="img"  style="display: none"                                  onchange="preview(this)"><br/>
                    <img id="face" src="/img/dp.jpg" class="img-circle" alt="点击添加店铺图片" style="width: 300px;height: 190px;margin-top: -19px;"/>
                </div>


            </div>
            {{--<div class="form-group">--}}
            {{--<label>内容</label>--}}
            {{--<textarea name="content" class="form-control" rows="3">{{ old('content') }}</textarea>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label>发布日期</label>--}}
            {{--<input type="date" name="publish_date" class="form-control" value="{{ old('publish_date') }}">--}}
            {{--</div>--}}
            {{--<input id="captcha" class="form-control" name="captcha" >--}}
            {{--<img class="thumbnail captcha" src="{{ captcha_src('inverse') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">--}}


            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button>
        </form>
    </div>
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