@extends('layout.default')
@section('contents')
    <!--引入CSS-->
    <link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">

    <!--引入JS-->
    <script type="text/javascript" src="/webuploader/webuploader.js"></script>

    @include('layout._errors')
    <form method="post" style="width: 60%; margin: 0 auto;" action="{{ route('shopcategory.store') }}" >
        <h1>添加商家分类</h1>

        <div class="form-group">
            <label>分类名</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="from-group">
            <lable>是否是默认分类</lable>
            <label class="radio-inline">
                <input type="radio" name="is_selected" id="inlineRadio1" value="1"> 是
            </label>
            <label class="radio-inline">
                <input type="radio" name="is_selected" id="inlineRadio2" value="1"> 否
            </label>
        </div>
        <div class="form-group">
            <label>分类图片</label>
            <input type="hidden" name="img" id="img">
        </div>
        <div id="uploader-demo">
            <!--用来存放item-->
            <div id="fileList" class="uploader-list"></div>
            <div id="filePicker">选择图片</div>
        </div>
        <img id="pic" style="width:200px;" />

        {{--<div class="form-group">--}}
            {{--<label class="col-sm-2 control-label" style="color: #419641;font-size:20px;padding-top: 20px;">添加商家分类图片：</label>--}}
            {{--<div class="col-sm-1 " style="width: 300px;!important"  onclick="test          ()">--}}
                {{--<input type="file" id="file" name="img"  style="display: none"                                  onchange="preview(this)"><br/>--}}
                {{--<img id="face" src="/img/dp.jpg" class="img-thumbnail" alt="点击添加店铺图片" style="width: 300px;height: 190px;margin-top: -19px;"/>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{ csrf_field() }}
        <button class="btn btn-primary btn-block" style="width: 60%; margin: 0 auto;">提交</button>
    </form>
    <script>
        // 初始化Web Uploader
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            // swf: BASE_URL + '/js/Uploader.swf',

            // 文件接收服务端。
            server: '{{route('upload')}}',

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            },
            formData:{
                _token:"{{csrf_token()}}"
            }
        });
        uploader.on( 'uploadSuccess', function( file,response ) {
            //$( '#'+file.id ).addClass('upload-state-done');
            console.log(response.path);//图片地址
            //将上传成功的图片显示
            $("#pic").attr('src',response.path);
            //将图片地址写入输入框
            $("#img").val(response.path);
        });
    </script>
    @stop



{{--<script>--}}
    {{--function test(){--}}
        {{--var $file = document.getElementById('file');--}}
        {{--$file.click();--}}
    {{--}--}}

    {{--function preview(obj) {--}}
        {{--// 获取input上传的图片数据;--}}
        {{--var file = obj.files[0];--}}
        {{--// 得到bolb对象路径，可当成普通的文件路径一样使用，赋值给src;--}}
        {{--url = window.URL.createObjectURL(file);--}}
        {{--//预览--}}
        {{--var face = document.getElementById('face');--}}
        {{--face.src = url;--}}
    {{--}--}}
{{--</script>--}}