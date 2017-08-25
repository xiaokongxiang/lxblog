<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <base href="/Public/Admin/">
    <!-- layui.css -->
    <link href="/Public/Admin/css/layui.css" rel="stylesheet" />
    <!-- font-awesome.css -->
    <link href="/Public/Admin/plugin/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!-- animate.css -->
    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet" />
    <!-- 本页样式 -->
    <link href="/Public/Admin/css/main.css" rel="stylesheet" />
    <link href="/Public/Admin/plugin/layui/font/iconfont.ttf">
    <link href="/Public/Admin/plugin/layui/font/iconfont.woff">
    
    <script src="https://img.hcharts.cn/jquery/jquery-1.8.3.min.js"></script>
    <script src="https://img.hcharts.cn/highcharts/highcharts.js"></script>
    <script src="https://img.hcharts.cn/highcharts/modules/exporting.js"></script>
    <script src="https://img.hcharts.cn/highcharts/modules/data.js"></script>
    <script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>

</head>
<body>
<div class="layui-layout layui-layout-admin">
    <!--顶部-->
    <div class="layui-header">
        <div class="ht-console">
            <div class="ht-user">
                <img src="/Public/Admin/images/jishuaifei.jpg" />
                <a class="ht-user-name">超级管理员</a>
            </div>
        </div>
        <span class="sys-title">伤心天地后台管理系统</span>
        <ul class="ht-nav">
            <li class="ht-nav-item">
                <a target="_blank" href="http://jishuaifei.com/">前台入口</a>
            </li>
            <li class="ht-nav-item">
                <a href="javascript:void(0)" data-url="<?php echo U('Index/delTel');?>" id="individuation"><i class="fa fa-tasks fa-fw" style="padding-right:5px;"></i>清除缓存</a>
            </li>
            <li class="ht-nav-item">
                <a href="<?php echo U('Index/delTel');?>" ><i class="fa fa-power-off fa-fw"></i>清除缓存</a>
            </li>
            <li class="ht-nav-item">
                <a href="<?php echo U('Index/out');?>" data-url="">注销</a>
            </li>
        </ul>
    </div>
    <!--侧边导航-->
    <div class="layui-side">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree" lay-filter="leftnav">
                <li class="layui-nav-item layui-this">
                    <a href="javascript: void(0)"><i class="fa fa-home"></i>首页</a>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript: void(0)"><i class="fa fa-file-text"></i>博文管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript: void(0)" data-url="<?php echo U('Article/add');?>" data-id="1">博文添加</a></dd>
                        <dd><a href="javascript: void(0)" data-url="<?php echo U('Article/show');?>" data-id="2">博文列表</a></dd>
                        <dd><a href="javascript: void(0)" data-url="<?php echo U('Article/recycly');?>" data-id="3">资源回收站</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:void(0)"><i class="fa fa-user"></i>标签管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript: void(0)" data-url="<?php echo U('Label/add');?>" data-id="4">标签添加</a></dd>
                        <dd><a href="javascript: void(0)" data-url="<?php echo U('Label/index');?>" data-id="5">标签展示</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript: void(0)"><i class="fa fa-user"></i>分类管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript: void(0)" data-url="<?php echo U('Classify/add');?>" data-id="6">分类添加</a></dd>
                        <dd><a href="javascript: void(0)" data-url="<?php echo U('Classify/index');?>" data-id="7">分类列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript: void(0)"><i class="fa fa-user"></i>管理员管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript: void(0)" data-url="<?php echo U('Admin/add');?>" data-id="8">管理员添加</a></dd>
                        <dd><a href="javascript: void(0)" data-url="<?php echo U('Admin/show');?>" data-id="9">管理员列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript: void(0)"><i class="fa fa-user"></i>评论管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" data-url="<?php echo U('Comment/show');?>" data-id="10">评论列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript: void(0)"><i class="fa fa-wrench"></i>友情管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript: void(0)" data-url="<?php echo U('Connect/index');?>" data-id="11">友情链接</a></dd>
                        <dd><a href="javascript: void(0)" data-url="<?php echo U('Connect/add');?>" data-id="12">添加友链</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript: void(0)"><i class="fa fa-wrench"></i>用户管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript: void(0)" data-url="<?php echo U('User/index');?>" data-id="13">用户列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript: void(0)"><i class="fa fa-cog"></i>系统管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript: void(0)">个人信息</a></dd>
                        <dd><a href="javascript: void(0)">退出登录</a></dd>
                        <dd><a href="javascript: void(0)" data-url="<?php echo U('Deploy/index');?>" data-id="16">系统设置</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript: void(0)"><i class="fa fa-info-circle"></i>管理员的日志</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript: void(0)" data-url="<?php echo U('Log/index');?>" data-id="12">操作日志</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
    <!--收起导航-->
    <div class="layui-side-hide layui-bg-cyan">
        <i class="fa fa-long-arrow-left fa-fw"></i>收起导航
    </div>
    <!--主体内容-->
    <div class="layui-body">
        <div style="margin:0;position:absolute;top:4px;bottom:0px;width:100%;" class="layui-tab layui-tab-brief" lay-filter="tab" lay-allowclose="true">
            <ul class="layui-tab-title">
                <li lay-id="0" class="layui-this">首页</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <p style="padding: 10px 15px; margin-bottom: 20px; margin-top: 10px; border:1px solid #ddd;display:inline-block;">
                        本次登陆
                        <span style="padding-left:1em;">IP：<?php echo ($login["login_ip"]); ?></span>
                        <span style="padding-left:1em;">管理员：
                             <td>
                                 <?php echo ($login["login_name"]); ?>
                             </td>
                        </span>
                        <span style="padding-left:1em;">时间：<?php echo (date('Y-m-d H:i:s',$login["login_time"])); ?>
                        <!--<?php echo (date('Y-m-d H:i:s',$login["login"]["time"])); ?>-->
                        </span>
                    </p>
                    <fieldset class="layui-elem-field layui-field-title">
                        <legend>统计信息</legend>
                        <div class="layui-field-box">
                            <div style="display: inline-block; width: 100%;">
                                <div class="ht-box layui-bg-blue">
                                    <p><?php echo ($userList); ?></p>
                                    <p>用户总数</p>
                                </div>
                                <div class="ht-box layui-bg-red">
                                    <p></p>
                                    <p>今日注册</p>
                                </div>
                                <div class="ht-box layui-bg-green">
                                    <p><?php echo ($loList); ?></p>
                                    <p>管理员总数</p>
                                </div>
                                <div class="ht-box layui-bg-orange">
                                    <p><?php echo ($arList); ?></p>
                                    <p>文章总数</p>
                                </div>
                                <div class="ht-box layui-bg-cyan">
                                    <p><?php echo ($coList); ?></p>
                                    <p>友链总数</p>
                                </div>
                                <div class="ht-box layui-bg-black">
                                    <p></p>
                                    <p>笔记总数</p>
                                </div>
                                <div id="container" style="min-width:400px;height:400px"></div>
                                <div class="message"></div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <!--底部信息-->
    <div class="layui-footer">
        <p style="line-height:44px;text-align:center;" - Design By LY</p>
    </div>
    <!--快捷菜单-->
    <div class="short-menu" style="display:none">
        <fieldset class="layui-elem-field layui-field-title">
            <legend style="color:#fff;padding-top:10px;padding-bottom:10px;">快捷菜单</legend>
            <div class="layui-field-box">
                <div style="width:832px;margin:0 auto;">
                    <div class="windows-tile windows-two">
                        <i class="fa fa-file-text"></i>
                        <span data-url="<?php echo U('Article/show');?>" data-id="1">文章管理</span>
                    </div>
                    <!--<div class="windows-tile windows-one">-->
                        <!--<i class="fa fa-volume-up"></i>-->
                        <!--<span data-url="" data-id="2">网站公告</span>-->
                    <!--</div>-->
                    <div class="windows-tile windows-one">
                        <i class="fa fa-comments-o"></i>
                        <span data-url="<?php echo U('Comment/show');?>" data-id="3">留言管理</span>
                    </div>
                    <div class="windows-tile windows-two">
                        <i class="fa fa-handshake-o"></i>
                        <span data-url="<?php echo U('Connect/index');?>" data-id="4">友情链接</span>
                    </div>
                    <div class="windows-tile windows-one">
                        <i class="fa fa-arrow-circle-right"></i>
                        <span data-url="<?php echo U('Deploy/index');?>" data-id="5">系统设置</span>
                    </div>
                    <div class="windows-tile windows-one">
                        <i class="fa fa-wrench"></i>
                        <span data-url="<?php echo U('Log/index');?>" data-id="6">操作日志</span>
                    </div>
                    <div class="windows-tile windows-one">
                        <i class="fa fa-tags"></i>
                        <span data-url="" data-id="7">资源管理</span>
                    </div>
                    <div class="windows-tile windows-one">
                        <i class="fa fa-pencil-square-o"></i>
                        <span data-url="" data-id="8">笔记管理</span>
                    </div>
                    <div class="windows-tile windows-two">
                        <i class="fa fa-hourglass-half"></i>
                        <span data-url="" data-id="9">时光轴管理</span>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </div>
        </fieldset>

    </div>

    <!--个性化设置-->
    <div class="individuation animated flipOutY layui-hide">
        <ul>
            <li><i class="fa fa-cog" style="padding-right:5px"></i>个性化</li>
        </ul>
        <div class="explain">
            <small>从这里进行系统设置和主题预览</small>
        </div>
        <div class="setting-title">设置</div>
        <div class="setting-item layui-form">
            <span>侧边导航</span>
            <input type="checkbox" lay-skin="switch" lay-filter="sidenav" lay-text="ON|OFF" checked>
        </div>
        <div class="setting-item layui-form">
            <span>管家提醒</span>
            <input type="checkbox" lay-skin="switch" lay-filter="steward" lay-text="ON|OFF" checked>
        </div>
        <div class="setting-title">主题</div>
        <div class="setting-item skin skin-default" data-skin="skin-default">
            <span>低调优雅</span>
        </div>
        <div class="setting-item skin skin-deepblue" data-skin="skin-deepblue">
            <span>蓝色梦幻</span>
        </div>
        <div class="setting-item skin skin-pink" data-skin="skin-pink">
            <span>姹紫嫣红</span>
        </div>
        <div class="setting-item skin skin-green" data-skin="skin-green">
            <span>一碧千里</span>
        </div>
    </div>
</div>

<script src="/Public/Admin/plugin/layui/layui.js"></script>
<!-- layui规范化用法 -->
<script type="text/javascript">
    layui.config({
        base: 'js/'
    }).use('main');
</script>
<script type="text/javascript">
    $(function () {
        // 获取 CSV 数据并初始化图表
        $.get('<?php echo U("Index/");?>', function (csv) {
            $('#container').highcharts({
                data: {
                    csv: csv
                },
                title: {
                    text: '纪帅飞日常访问量'
                },
                subtitle: {
                    text: '数据来源: 伤心天地'
                },
                xAxis: {
                    tickInterval: 7 * 24 * 3600 * 1000, // 坐标轴刻度间隔为一星期
                    tickWidth: 0,
                    gridLineWidth: 1,
                    labels: {
                        align: 'left',
                        x: 3,
                        y: -3
                    },
                    // 时间格式化字符
                    // 默认会根据当前的刻度间隔取对应的值，即当刻度间隔为一周时，取 week 值
                    dateTimeLabelFormats: {
                        week: '%Y-%m-%d'
                    }
                },
                yAxis: [{ // 第一个 Y 轴，放置在左边（默认在坐标）
                    title: {
                        text: null
                    },
                    labels: {
                        align: 'left',
                        x: 3,
                        y: 16,
                        format: '{value:.,0f}'
                    },
                    showFirstLabel: false
                }, {    // 第二个坐标轴，放置在右边
                    linkedTo: 0,
                    gridLineWidth: 0,
                    opposite: true,  // 通过此参数设置坐标轴显示在对立面
                    title: {
                        text: null
                    },
                    labels: {
                        align: 'right',
                        x: -3,
                        y: 16,
                        format: '{value:.,0f}'
                    },
                    showFirstLabel: false
                }],
                legend: {
                    align: 'left',
                    verticalAlign: 'top',
                    y: 20,
                    floating: true,
                    borderWidth: 0
                },
                tooltip: {
                    shared: true,
                    crosshairs: true,
                    // 时间格式化字符
                    // 默认会根据当前的数据点间隔取对应的值
                    // 当前图表中数据点间隔为 1天，所以配置 day 值即可
                    dateTimeLabelFormats: {
                        day: '%Y-%m-%d'
                    }
                },
                plotOptions: {
                    series: {
                        cursor: 'pointer',
                        point: {
                            events: {
                                // 数据点点击事件
                                // 其中 e 变量为事件对象，this 为当前数据点对象
                                click: function (e) {
                                    $('.message').html( Highcharts.dateFormat('%Y-%m-%d', this.x) + ':<br/>  访问量：' +this.y );
                                }
                            }
                        },
                        marker: {
                            lineWidth: 1
                        }
                    }
                }
            });
        });
    });
</script>
</body>
</html>