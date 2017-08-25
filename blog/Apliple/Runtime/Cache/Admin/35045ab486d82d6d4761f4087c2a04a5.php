<?php if (!defined('THINK_PATH')) exit();?><link rel="shortcut icon" href="/Public/Admin/images/Logo_40.png" type="image/x-icon">
<!-- layui.css -->
<link href="/Public/Admin/plugin/layui/css/layui.css" rel="stylesheet" />
<!-- font-awesome.css -->
<link href="/Public/Admin/plugin/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<!-- animate.css -->
<link href="/Public/Admin/css/animate.min.css" rel="stylesheet" />
<!-- 本页样式 -->
<link href="/Public/Admin/css/main.css" rel="stylesheet" />
<style>
</style>
<script src="/Public/Admin/js/jq.js"></script>
<link rel="stylesheet" href="/Public/Admin/markdown/css/editormd.css"/>
<script src="/Public/Admin/markdown/editormd.js"></script>
<form class="layui-form" action="<?php echo U('Article/add');?>" method="post" enctype="multipart/form-data" id="ff">
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
        <label class="layui-form-label">文章图片</label>
        <div class="layui-input-block">
            <input type="file" name="img" class="layui-upload-file" id="img">
            <input type="hidden" class="tupian" name="article_img" value="">
            <img src="" alt="" width="20px" height="20px" id='img_show'>
        </div>
    </div>
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
    </div>


    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">文章内容</label>
    </div>
    <!--编辑器-->
    <div id="test-editormd">
        <textarea style="display:none;" id="ts" name="article_content"></textarea>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="submit" value="立即提交" class="layui-btn" lay-submit lay-filter="formDemo"/>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<script src="/Public/Admin/jquery-1.js"></script>
<script src="/Public/Admin/jquery.validate.min.js"></script>
<script src="/Public/Admin/messages_zh.min.js"></script>

<script src="/Public/Admin/layer/layer.js"></script>
<script src="/Public/Admin/plugin/layui/layui.js"></script>
<script>
    //文件上传
    layui.use('upload', function(){
        layui.upload({
            elem:'#img'
            ,url: '<?php echo U("Article/getUpload");?>'
            ,method: 'post' //上传接口的http类型
            ,before: function(input){
                //返回的参数item，即为当前的input DOM对象
                console.log(input);
            }
            ,success: function(res){


                if(res.code==1){
                    var imgpath=res.data.src;
                    $(".tupian").val(imgpath);
                    $("#img_show").attr('src',imgpath.substr(1));
                }else{
                    layer.msg(res.msg);
                }
            }
        });
    });
//    $('#form').validate({
//        rules:{
//            article_title:{
//                remote:{
//                    url: "<?php echo U('Article/doAdd');?>",
//                    type:'post',
//                    data: {
//                        article_title: function () {
//                            return $("#article_title").val();
//                        }
//                    }
//                }
//            }
//        },
//        messages:{
//            article_title:{
//                remote:'标题已使用！'
//            }
//        },
//        //重写错误信心，提示
//        showErrors:function(errorMap,errorList){
//            var msg = '';
//            $.each(errorList,function(k,v){
//                msg += (v.message +"\r\n");
//            });
//            if(msg != ''){
//                layer.msg(msg);
//            } //失去焦点
//            onfocusout:false;
//        }
//    });
</script>
<script>
    //    $(function(){
    //        $("#ff").validate({
    //            rules:{
    //                article_name:{
    //                    required:true,
    //                    remote:{
    //                        url: "<?php echo U('Admin/Article/do_add');?>",     //后台处理程序
    //                        type: "post",               //数据发送
    //                        dataType: "json",           //接受数据格式
    //                        data:{                      //要传递的数据
    //                            article_name: function(){
    //                                return $("#article_name").val();
    //                            }
    //                        }
    //                    }
    //                }
    //            },
    //            messages:{
    //                article_name:{
    //                    required:"标题必须填",
    //                    remote:"标题已经存在"
    //                }
    //            },
    //            //重写错误信心，提示
    //            showErrors:function(errorMap,errorList){
    //                console.log(errorMap,errorList);
    //                var msg = '';
    //                $.each(errorList,function(k,v){
    //                    msg += (v.message +"\r\n");
    //                })
    //                if(msg != ''){
    //                    layer.msg(msg);
    //                } //失去焦点
    //                onfocusout:false;
    //            }
    //        })
    //    })

    //Demo
    layui.use('form', function(){
        var form = layui.form();
        var url = U('Article/add');

        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
    //    调用编辑器
    var testEditor;
    $(function(){
        testEditor = editormd("test-editormd", {
            width   : "1500",
            height  : 540,
            syncScrolling : "single",
            path    : "/Public/Admin/markdown/lib/"
        });
    });
</script>