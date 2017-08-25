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
</head>
<body>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="card-box">
            <!-- Row start -->
            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                </div>
            </div>
            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr align="center">
                                <td><input type="checkbox" /></td>
                                <td >姓名</td>
                                <td >用户名</td>
                                <td>性别</td>
                                <td>爱的状态</td>
                                <td>年龄</td>
                                <td>手机号</td>
                                <td>电子邮件</td>
                                <td>添加时间</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($user)): foreach($user as $key=>$v): ?><tr align="center">
                                    <td><input type="checkbox" /></td>
                                    <td><?php echo ($v["user_name"]); ?></td>
                                    <td><a href="#"><?php echo ($v["user"]); ?></a></td>
                                    <td>
                                        <?php if($v['user_sex'] == 0): ?>男
                                            <?php else: ?>
                                            女<?php endif; ?>
                                        </td>
                                    <td>
                                        <?php if($v['love_start'] == 0): ?>单身
                                            <?php elseif($v['love_start'] == 1): ?>
                                            未婚
                                            <?php else: ?>
                                            已婚<?php endif; ?>
                                    </td>
                                    <td><?php echo ($v["user_age"]); ?></td>
                                    <td><?php echo ($v["user_tel"]); ?></td>
                                    <td><?php echo ($v["user_email"]); ?></td>
                                    <td><?php echo (date('Y-m-d H:i:s',$v["user_time"])); ?></td>
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