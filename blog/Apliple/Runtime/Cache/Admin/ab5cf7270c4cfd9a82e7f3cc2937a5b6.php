<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台模板</title>
    <link rel="stylesheet" href="/Public/Admin/css2/amazeui.css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/Admin/css2/core.css" />
    <link rel="stylesheet" href="/Public/Admin/css2/menu.css" />
    <link rel="stylesheet" href="/Public/Admin/css2/index.css" />
    <link rel="stylesheet" href="/Public/Admin/css2/admin.css" />
    <link rel="stylesheet" href="/Public/Admin/css2/page.css" />
    <link href="/Public/Admin/plugins/layui/css/layui.css" rel="stylesheet" />
    <link rel="stylesheet" href="/Public/Admin/beginner/plugins/layui/css/layui.css" media="all" />
</head>
<body>
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="card-box">
                <!-- Row start -->
                <div class="am-g">
                    <div class="am-u-sm-12 am-u-md-6">
                        <div class="am-btn-toolbar">
                            <div class="am-btn-group am-btn-group-xs">
                                <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span><a href="<?php echo U('Article/add');?>">新增文章</a> </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="am-g">
                    <div class="am-u-sm-12">
                        <form action="<?php echo U('Article/show');?>" method="get">
                            <div class="layui-inline">
                               
                                <div class="layui-input-inline">
                                <select class="layui-input" name="class">
                                    <option value="">请选择</option>
                                    <?php if(is_array($clss)): foreach($clss as $key=>$n): ?><option value="<?php echo ($n["classify_id"]); ?>"><?php echo ($n["classify_name"]); ?></option><?php endforeach; endif; ?>
                                </select>
                                </div>
                                 <label class="layui-form-label">关键词</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="search" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-input-inline">
                                <input id="d11" type="text" onClick="WdatePicker()" name="start_time" placeholder="开始时间" class="layui-input"/>
                                </div>
                                <div class="layui-input-inline">
                                    <input id="d11" type="text" onClick="WdatePicker()" name="add_time" placeholder="结束时间" class="layui-input"/>
                                </div>
                                <div class="layui-input-inline" style="width:auto">
                                    <button class="layui-btn" lay-submit="" lay-filter="formSearch">搜索</button>
                                </div>
                            </div>
                            <!--<input type="text" name="search"/>-->
                            <!--<input type="submit" value="搜搜 "/>-->
                        </form>
                        <form class="am-form">
                            <table class="am-table am-table-striped am-table-hover table-main">
                                <thead>
                                <tr align="center">
                                    <td><input type="checkbox" /></td>
                                    <td >ID</td>
                                    <td >标题</td>
                                    <td>作者</td>
                                    <td>添加时间</td>
                                    <td>分类</td>
                                    <td>分布或不发布</td>
                                    <td>点击量</td>
                                    <td>管理员</td>
                                    <td>操作</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($articleList)): foreach($articleList as $key=>$v): ?><tr align="center" data-id="<?php echo ($v["article_id"]); ?>">
                                    <td><input type="checkbox" /></td>
                                    <td><?php echo ($v["article_id"]); ?></td>
                                    <td><a href="#"><?php echo ($v["article_title"]); ?></a></td>
                                    <td><?php echo ($v["article_author"]); ?></td>
                                    <td><?php echo (date('Y-m-d H:i:s',$v["add_time"])); ?></td>
                                    <td><?php echo ($v["classify_name"]); ?></td>
                                    <td class="radio">
                                        <!--<div class="layui-form-item">-->
                                            <!--<label class="layui-form-label">关-开</label>-->
                                            <!--<div class="layui-input-block">-->
                                                <!--<input type="checkbox" checked="" name="open" lay-skin="switch" lay-filter="switchTest" title="开关">-->
                                            <!--</div>-->
                                        <input type="radio" name="article_start" value="0" <?php if($v['article_start'] == 0): ?>checked<?php endif; ?>/>关
                                        <input type="radio" name="article_start" value="1" <?php if($v['article_start'] == 1): ?>checked<?php endif; ?>/>开
                                    </td>
                                    <!--<td align="center"><a href="javascript:void(0)" id="fa">发布</a></td>-->
                                    <td><?php echo ($v["like_hits"]); ?></td>
                                    <td><?php echo ($v["login_name"]); ?></td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> <a href="<?php echo U('Article/up');?>?id=<?php echo ($v["article_id"]); ?>">编辑</a></button>
                                                <button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> <a href="<?php echo U('Article/copy');?>?id=<?php echo ($v["article_id"]); ?>">复制</a></button>
                                                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> <a href="<?php echo U('Article/del');?>?id=<?php echo ($v["article_id"]); ?>">回收站</a></button>
                                            </div>
                                        </div>
                                    </td>
                                </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                     </form>

                    </div>
                </div>
            </div>
        </div>
    <div class="yahoo2" >
        <?php echo ($pages); ?>
    </div>
</div>
<script language="javascript" type="text/javascript" src="/Public/Admin/carlender/WdatePicker.js"></script>
<script src="/Public/Admin/jquery-1.js" ></script>
<script type="text/javascript">
$(function(){
    $("input[type='radio']").click(function(){
        var val = $(this).val();
        var id = $(this).parents('tr').data('id');

        $.ajax({
            type: "get",
            url: "<?php echo U('Article/update');?>",
            data: 'val='+val+'&id='+id,
            success: function(msg){
               if(msg == 0){
                   alert('文章正在抢修中');
               }else{
                   alert('上线成功')
               }
            }
        });
    })
})
</script>