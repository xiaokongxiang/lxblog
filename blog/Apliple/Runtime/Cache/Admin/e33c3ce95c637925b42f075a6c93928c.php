<?php if (!defined('THINK_PATH')) exit();?><html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理系统登陆</title>
    <script src="/Public/Admin/jquery-1.js"></script>
    <script src="/Public/Admin/jquery.validate.min.js"></script>
    <script src="/Public/Admin/messages_zh.min.js"></script>
    <link rel="stylesheet" href="/Public/Admin/css/layui.css">
    <link rel="stylesheet" href="/Public/Admin/css/login.css">
</head>
<style type="text/css">
    body {
        color: white;
    }
    .error{
        margin-left: 5px;
        color: red;
    }
</style>
<body>
<video class="video-player" preload="auto" autoplay="autoplay"  muted = "true" loop="loop" data-height="1080" data-width="1920" height="1080" width="1920">
    <!-- 此视频文件为腾讯所有，在此仅供样式参考，如用到商业用途，请自行更换为其他视频或图片，否则造成的任何问题使用者本人承担，谢谢 -->
</video>
<div class="video_mask"></div>
<div class="login">
    <h1>CMS 后台管理系统</h1></p>
    <form class="layui-form" action="<?php echo U('Login/index');?>" method="post" id="form">
        <div class="layui-form-item">
            <input type="text" name="login_name"   autocomplete="off"  value="" class="layui-input">
        </div>
        <div class="layui-form-item">
            <input type="password" name="login_pwd"   autocomplete="off" value="" class="layui-input">
        </div>
        <div class="layui-form-item">
            <input type="text" name="code"   autocomplete="off" value="" class="layui-input">
        </div>

            <img src="<?php echo U('Login/verify');?>" onclick="show(this)" >

        <!--<button class="layui-btn login_btn" lay-submit="" lay-filter="login">登陆系统</button>-->
        <input type="submit" value="登陆系统" class="layui-btn login_btn" lay-submit="" lay-filter="login"/>
    </form>
</div>
</body>
<script src="/Public/Admin/layer/layer.js"></script>
<script>
    function show(obj){
        obj.src="<?php echo U('Admin/Login/verify');?>?a="+Math.random();
    }
    $('#form').validate({
        rules:{
         login_name:{
             required:true
         },
            login_pwd:{
                required:true
            },
            code:{
                required:true
            }
        },
        messages:{
       login_name:{
           required:'请输入管理账号'
       },
            login_pwd:{
                required:'请输入密码'
            },
            code:{
                required:'请输入验证码'
            }
        },
            //重写错误信心，提示
         showErrors:function(errorMap,errorList){
              var msg = '';
             $.each(errorList,function(k,v){
                msg += (v.message +"\r\n");
             })
             if(msg != ''){
                 layer.msg(msg);
             } //失去焦点
             onfocusout:false;
        }


    }
    )
</script>
</html>