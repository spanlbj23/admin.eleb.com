@extends('layout.default')

@section('contents')

    @include('layout._errors')
    <form method="post" style="width: 60%; margin: 0 auto;" action="{{ route('permission.update',[$permission]) }}" enctype="multipart/form-data">
        <h1>修改权限</h1>
        <div class="form-group">
            <label>管理员</label>
            <input type="text" name="name" class="form-control" value="{{$permission ->name }}">
        </div>
        {{ csrf_field() }}
        {{method_field('PUT')}}
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