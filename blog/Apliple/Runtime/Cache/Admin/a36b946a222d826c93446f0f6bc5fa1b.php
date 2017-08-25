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
                                <td>网站名称</td>
                                <td><input type="text" name="connect_name" id="connect_name" value="<?php echo ($conDe["connect_name"]); ?>"/></td>
                            </tr>
                            <tr>
                                <td>网站地址</td>
                                <td><input type="text" name="connect_url" id="connect_url" value="<?php echo ($conDe["connect_url"]); ?>"/></td>
                            </tr>
                            <tr>
                                <td>排序</td>
                                <td><input type="text" name="connect_sost" id="connect_sost" value="<?php echo ($conDe["connect_sost"]); ?>"/></td>
                            </tr>
                            <tr align="center">
                                <input type="hidden" name="connect_id" value="<?php echo ($conDe["connect_id"]); ?>"/>
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