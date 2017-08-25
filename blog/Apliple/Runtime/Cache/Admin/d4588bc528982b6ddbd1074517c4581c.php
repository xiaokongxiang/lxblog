<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>表单</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="/Public/Admin/beginner/plugins/layui/css/layui.css" media="all" />

    <link rel="stylesheet" href="/Public/Admin/layui-v1.0.9_rls/layui/css/layui.css">

    <script src="/Public/Admin/jquery-1.js"></script>
    <script src="/Public/Admin/jquery.validate.min.js"></script>
    <script src="/Public/Admin/messages_zh.min.js"></script>

</head>

<body>
<div style="margin: 15px;">

    <form class="layui-form" action="<?php echo U('Article/add');?>" method="post" enctype="multipart/form-data" id="form">
        <div class="layui-form-item">
            <label class="layui-form-label">文章标题</label>
            <div class="layui-input-block">
                <input type="text" name="article_title" id="article_title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">作者</label>
            <div class="layui-input-block">
                <input type="text" name="article_author" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片</label>
            <div class="layui-input-block">
                <input type="file" name="article_img" class="layui-upload-file">

            </div>
            <!--<div class="layui-input-block">-->
            <!--<input type="file" name="article_img" class="layui-upload-file">-->
            <!--</div>-->

            <div class="layui-form-item">
                <label class="layui-form-label">分类</label>
                <div class="layui-input-block">
                    <select name="classify_id" lay-filter="aihao">
                        <?php if(is_array($Classify)): foreach($Classify as $key=>$v): ?><option value="<?php echo ($v["classify_id"]); ?>"><?php echo ($v["classify_name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">标签</label>
                <div class="layui-input-block">
                    <?php if(is_array($labelName)): foreach($labelName as $key=>$v): ?><input type="checkbox" name="label[]" title="<?php echo ($v["label_name"]); ?>" value="<?php echo ($v["label_id"]); ?>"><?php endforeach; endif; ?>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">编辑器</label>
                <div class="layui-input-block">
                    <textarea class="layui-textarea layui-hide" name="article_content" lay-verify="content" id="LAY_demo_editor"></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
    </form>
</div>
<script src="/Public/Admin/layer/layer.js"></script>

<!--<script src="/Public/Admin/layui-v1.0.9_rls/layui/layui.js"></script>-->
<script type="text/javascript" src="/Public/Admin/beginner/plugins/layui/layui.js"></script>
<script>
    layui.use(['form', 'layedit', 'laydate' , 'upload'], function() {
        var form = layui.form(),
                layer = layui.layer,
                layedit = layui.layedit,
                laydate = layui.laydate;

        //创建一个编辑器
        var editIndex = layedit.build('LAY_demo_editor');
        //上传
        layui.upload({
            url: '/admin.php/Article/uploadFile'
            ,success: function(res){
                console.log(res); //上传成功返回值，必须为json格式
            }
        });
    });
    $('#form').validate({
        rules:{
            article_title:{
                remote:{
                    url: "<?php echo U('Article/doAdd');?>",
                    type:'post',
                    data: {
                        article_title: function () {
                            return $("#article_title").val();
                        }
                    }
                }
            }
        },
        messages:{
            article_title:{
                remote:'标题已使用！'
            }
        },
        //重写错误信心，提示
        showErrors:function(errorMap,errorList){
            var msg = '';
            $.each(errorList,function(k,v){
                msg += (v.message +"\r\n");
            });
            if(msg != ''){
                layer.msg(msg);
            } //失去焦点
            onfocusout:false;
        }
    });





</script>


</body>

</html>