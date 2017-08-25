<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<style>
    .error{
        margin-top: 10px;
        color: red;
    background: yellow;
    }
</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo ($config["TITLE"]); ?></title>

    <script src="/Public/Admin/jquery-1.js"></script>
    <script src="/Public/Admin/jquery.validate.min.js"></script>
    <script src="/Public/Admin/messages_zh.min.js"></script>

    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="images/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/Public/Home/css1/amazeui.min.css" />
    <link rel="stylesheet" href="/Public/Home/css1/admin.css">
    <link rel="stylesheet" href="/Public/Home/css1/app.css">
</head>
<style>
    .yzm{
        font-size: 20px;
    }
</style>
<body data-type="login">

<div class="am-g myapp-login">
    <div class="myapp-login-logo-block  tpl-login-max">
        <div class="myapp-login-logo-text">
            <div class="myapp-login-logo-text">
                Register Admin<span> Login</span> <i class="am-icon-skyatlas"></i>

            </div>
        </div>
        <div class="am-u-sm-10 login-am-center">
            <form class="am-form" action="<?php echo U('User/add');?>" method="post" id="checkForm">
                <fieldset>
                    <div class="am-form-group">
                        <input type="text" class="" name="user" id="doc-ipt-email-1 user" placeholder="用户名" value="">
                    </div>
                    <div class="am-form-group">
                        <input type="password" class="user_pwd" name="admin_pwd" id="doc-ipt-email-1" placeholder="设置密码">
                    </div>
                    <div class="am-form-group">
                        <input type="password" name="user_apwd" class=""  id="doc-ipt-apwd-1" placeholder="确认密码">
                    </div>
                    <!--<div class="am-form-group">-->
                        <!--<input type="radio" name="user_sex" class="" id="doc-ipt-user_sex-0" value="0"/> <a style="color: red">男</a>-->
                        <!--<input type="radio" name="user_sex" class="" id="doc-ipt-user_sex-1" value="1"/> <a style="color: red">女</a>-->
                    <!--</div>-->
                    <!--<div class="am-form-group">-->
                      <!---->
                    <!--</div>-->
                    <div class="am-form-group">
                        <input type="email" name="user_email"  id="doc-ipt-user_emali-1" placeholder="请输入邮箱" width="470px">
                    </div>
                    <div class="am-form-group">
                        <input type="text" name="verify" placeholder="验证码" size="10"  class="verify">
                        <img src="<?php echo U('User/verify');?>" onclick="show(this)" width="470px" height="100px" >
                    </div>
                    <br />
                    <div class="am-form-group">
                        <input type="tel" name="user_tel" class="yzm" id="doc-ipt-user_tel-1" placeholder="输入11位的手机号码">
                        <button class="but" type="button">获取验证码</button>
                        <input type="hidden" name="code" class="code" id="doc-ipt-pwd-1" placeholder="验证码" >
                    </div>
                    <!--<div>-->
                        <!--<button class="but" type="button">获取验证码</button>-->
                        <!--<input type="hidden" name="gettel" class="code" id="doc-ipt-pwd-1" placeholder="输入短信验证码" >-->
                    <!--</div>-->

                    <p><button type="submit" class="am-btn am-btn-default">立即注册</button></p>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script style="/Public/Admin/layer/layer.js"></script>
<script>
//    验证码
    function show(obj){
        obj.src="<?php echo U('User/verify');?>?a="+Math.random();
    }

    //短信验证码
    $('.but').click(function(){
        $(this).next().prop('type','text');
        var telephone = $(this).prev().val();
        var verify=$('.verify').val();

        $.get('<?php echo U("User/verification");?>',{"telephone":telephone,"verify":verify}, function(data){
                    if(data==1)
                    {
                        alert('验证码错误');
                    }
                    if(data==-1)
                    {
                        alert('手机号为空');
                    }

                });
    })
    $(function(){
        $('#checkForm').validate({
            rules:{
                user:   {
                    required: true, minlength: 2,
                    remote:{
                        url:  "<?php echo U('User/do_add');?>",
                        type: 'post',
                        data:   {
                            user:function(){
                                return $(".user").val();
                            }
                        }
                    }

                },
                user_pwd:    {required: true, minlength: 6},
                user_apwd:  {required: true, equalTo: ".user_pwd"},
                code:         {required: true, minlength: 5},
                user_tel:         {required: true, minlength: 11}
            },
            messages:{
                user:{
                    required:   "<span style='color: red'>请输入用户名称</span>",
                    minlength:  "<span style='color: red'>名称必须由两个字母组成</span>",
                    remote:     "<span style='color: red'>名称已被使用</span>"
                },
                user_pwd:{
                    required:   "<span style='color: red'>请输入密码</span>",
                    minlength:  "<span style='color: red'>密码长度不能小于 6 个字母</span>"
                },
                user_apwd: {
                    required:   "<span style='color: red'>请确认密码</span>",
                    equalTo:    "<span style='color: red'>两次输入密码不一致</span>"
                },
                code:     {required: "<span style='color: red'>验证码为五个字符</span>"},
                user_tel:     {required: "<span style='color: red'>手机号码为11个字符</span>"}
            },


        });
    });
</script>