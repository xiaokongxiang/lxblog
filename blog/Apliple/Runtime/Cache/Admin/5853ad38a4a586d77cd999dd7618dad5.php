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
                            <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span><a href="<?php echo U('Connect/add');?>">友情添加</a> </button>
                        </div>
                    </div>
                </div>


            </div>
            <!-- Row end -->
            <!-- Row start -->
            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr align="center">
                                <td class="table-check"><input type="checkbox" /></td>
                                <td class="table-id">ID</td>
                                <td class="table-id">网站名称</td>
                                <td class="table-id">网址</td>
                                <td class="table-id">操作</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($conList)): foreach($conList as $key=>$v): ?><tr align="center">
                                    <td  class="table-title"><input type="checkbox" /></td>
                                    <td  class="table-title"><?php echo ($v["connect_id"]); ?></td>
                                    <td  class="table-title"><?php echo ($v["connect_name"]); ?></td>
                                    <td  class="table-title"><?php echo ($v["connect_url"]); ?></td>
                                    <td>
                                        <div class="am-btn-group am-btn-group-xs">
                                            <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span><a href="<?php echo U('Connect/up');?>?id=<?php echo ($v["connect_id"]); ?>"> 编辑</a></button>
                                            <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> <a href="<?php echo U('Connect/del');?>?id=<?php echo ($v["connect_id"]); ?>">删除</a></button>
                                        </div>
                                    </td>
                                </tr><?php endforeach; endif; ?>

                        </table>
                        </tbody>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>