<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo ($config["TITLE"]); ?></title>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/demo.css" />
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/component.css" />
    <!--[if IE]>
    <script src="/Public/Home/js/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="container demo-1">
    <div class="content">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <div class="logo_box">
                <h3>欢迎你</h3>
                <form action="#" name="f" method="post">
                    <div class="input_outer">
                        <span class="u_user"></span>
                        <input name="user" class="text" id="user" style="color: #FFFFFF !important" type="text" placeholder="请输入账户">
                    </div>
                    <div class="input_outer">
                        <span class="us_uer"></span>
                        <input name="user_pwd" class="text" id="pwd" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
                    </div>
                    <div class="mb2"><a class="act-but submit" href="javascript:;" style="color: #FFFFFF">登录</a></div>
                    <a class="act-but" href="<?php echo U('User/find');?>" style="color: ">找回密码</a>
                </form>
            </div>
        </div>
    </div>
</div><!-- /container -->
<script src="/Public/Home/js/TweenLite.min.js"></script>
<script src="/Public/Home/js/EasePack.min.js"></script>
<script src="/Public/Home/js/rAF.js"></script>
<script src="/Public/Home/js/demo-1.js"></script>
<script src="/Public/Admin/jquery-1.js"></script>
<script type="text/javascript">

    $(function(){
        $(".submit").click(function(){
            var user=$("#user").val();
            var pwd=$("#pwd").val();
            $.ajax({
                url:"<?php echo U('User/wait');?>",
                data:{user:user,user_pwd:pwd},
                type:"post",
                success:function(res){
                    if(res==0){
                        alert("账号或者密码有误");die;
                    }else{
                        location.href="<?php echo U('Index/index');?>";
                    }

                }
            })
        })

    });
</script>
</body>
</html>