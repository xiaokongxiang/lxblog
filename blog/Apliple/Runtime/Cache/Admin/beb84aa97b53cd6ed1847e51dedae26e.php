<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文件上传</title>
    <link rel="stylesheet" href="/Public/Admin/layui-v1.0.9_rls/layui/css/layui.css">
    <!--<link rel="stylesheet" href="css/global.css">-->
</head>
<body>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>设定上传文件的格式</legend>
</fieldset>

<input type="file" name="file" class="layui-upload-file">
<input type="file" name="file1" lay-type="file" class="layui-upload-file">
<input type="file" name="file1" lay-type="audio" class="layui-upload-file">
<input type="file" name="file2" lay-type="video" class="layui-upload-file">






<script src="/Public/Admin/layui-v1.0.9_rls/layui/layui.js"></script>
<script>
    layui.use('upload', function(){
        layui.upload({
            url: '' //上传接口
            ,success: function(res){ //上传成功后的回调
                console.log(res)
            }
        });

        layui.upload({
            url: '/test/upload.json'
            ,elem: '#test' //指定原始元素，默认直接查找class="layui-upload-file"
            ,method: 'get' //上传接口的http类型
            ,success: function(res){
                LAY_demo_upload.src = res.url;
            }
        });

    });
</script>
</body>
</html>