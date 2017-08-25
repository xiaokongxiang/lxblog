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
    <script src="/Public/Admin/jquery-1.js"></script>
    <script src="/Public/Admin/jquery.validate.min.js"></script>
    <script src="/Public/Admin/messages_zh.min.js"></script>
</head>
<body>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="card-box">
            <!-- Row start -->
            <div class="am-g">
            </div>
            <!-- Row end -->
            <!-- Row start -->
            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form" action="" method="post" id="form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <td>网站的标题</td>
                                <td><input type="text" name="TITLE" id="TITLE" value="<?php echo ($config["TITLE"]); ?>"/></td>
                            </tr>
                            <tr>
                                <td>域名</td>
                                <td><input type="text" name="URL" id="UEL" value="<?php echo ($config["URL"]); ?>"/></td>
                            </tr>
                            <tr>
                                <td>分页显示的条数</td>
                                <td><input type="text" name="PAGE_SIZE" id="PAGE_SIZE" value="<?php echo ($config["PAGE_SIZE"]); ?>"/></td>
                            </tr>
                            <tr>
                                <td>上传的图片的大小</td>
                                <td><input type="text" name="UPLOAD_SIZE" id="UPLOAD_SIZE" value="<?php echo ($config["UPLOAD_SIZE"]); ?>"/></td>
                            </tr>
                            <tr>
                                <td>统计</td>
                                <td><input type="text" name="TONGJI" id="TONGJI" value="<?php echo ($config["TONGJI"]); ?>"/></td>
                            </tr>
                            <tr align="center">
                                <td colspan="2"><input type="submit" value="提交"/></td>
                            </tr>
                            </thead>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>