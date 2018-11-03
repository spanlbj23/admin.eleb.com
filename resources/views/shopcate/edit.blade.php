@extends('layout.default')

@section('contents')

    @include('layout._errors')
    <form method="post" style="width: 60%; margin: 0 auto;" action="{{ route('shopcategory.update',[$shopcategory]) }}" enctype="multipart/form-data">
        <h1>修改商家分类</h1>

        <div class="form-group">
            <label>分类名</label>
            <input type="text" name="name" class="form-control" value="{{ $shopcategory->name }}">
        </div>
        <div class="from-group">
            <lable>状态属性</lable>
            <label class="radio-inline">
                <input type="radio" name="status" id="inlineRadio1" value="1" @if($shopcategory->status==1) checked="checked" @endif> 显示
            </label>
            <label class="radio-inline">
                <input type="radio" name="status" id="inlineRadio2" value="0" @if($shopcategory->status==0) checked="checked" @endif> 隐藏
            </label>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" style="color: #419641;font-size:20px;padding-top: 20px;">修改商家分类图片：</label>
            <div class="col-sm-1 " style="width: 300px;!important"  onclick="test()">
                <input type="file" id="file" name="img"  style="display: none"                                  onchange="preview(this)"><br/>
                <img id="face" src="{{\Illuminate\Support\Facades\Storage::url($shopcategory->img)}}" class="img-thumbnail" alt="点击添加店铺图片" style="width: 300px;height: 190px;margin-top: -19px;"/>
            </div>


        </div>

        {{--<input id="captcha" class="form-control" name="captcha" >--}}
        {{--<img class="thumbnail captcha" src="{{ captcha_src('inverse') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">--}}

        {{ csrf_field() }}
        {{method_field('PUT')}}
        <button class="btn btn-primary btn-block" style="width: 50%; margin: 0 auto;">提交</button>
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