<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <!--<meta http-equiv="Content-Type" content="text/html; Charset=gb2312">-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="zh-CN">

    <!--<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>-->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title><?php echo ($config["TITLE"]); ?></title>
    <link rel="shortcut icon" href="/Public/Home/images/Logo_40.png" type="image/x-icon">
    <!--Layui-->
    <link href="/Public/Home/plug/layui/css/layui.css" rel="stylesheet" />
    <!--font-awesome-->
    <link href="/Public/Home/plug/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!--全局样式表-->
    <link href="/Public/Home/css/global.css" rel="stylesheet" />
    <!-- 首页样式表 -->
    <link href="/Public/Home/css/home.css" rel="stylesheet" />
    <!--文章样式表-->
    <link href="/Public/Home/css/article.css" rel="stylesheet" />
    <!-- 详情样式表 -->
    <link href="/Public/Home/css/detail.css" rel="stylesheet" />
    <!-- 资源样式表 -->
    <link href="/Public/Home/css/resource.css" rel="stylesheet" />
    <!-- 时间样式表 -->
    <link href="/Public/Home/css/timeline.css" rel="stylesheet" />
    <!-- 本站样式表 -->
    <link href="/Public/Home/css/about.css" rel="stylesheet" />
    <!-- 详情样式表 -->
    <link href="/Public/Home/css/detail.css" rel="stylesheet" />
    <?php echo ($config["TONGJI"]); ?>
</head>
<body>
<!-- 导航 -->
<nav class="blog-nav layui-header">
    <div class="blog-container">
        <!-- QQ互联登陆 -->
        <!--<a href="javascript:;" class="blog-user" >-->
        <!--<i class="fa fa-qq">登陆</i>-->
        <!--</a>-->
        <!--<a href="javascript:;" class="blog-user layui-hide" data-url="<?php echo U('Index/index');?>">-->

        <!--</a>-->

        <a class="blog-logo" href="home.html">李鑫</a>
        <!-- 导航菜单 -->
        <ul class="layui-nav" lay-filter="nav">
            <li class="layui-nav-item">
                <a href="<?php echo U('Index/index');?>"><i class="fa fa-home fa-fw"></i>&nbsp;网站首页</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo U('Article/index');?>"><i class="fa fa-file-text fa-fw"></i>&nbsp;文章专栏</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo U('Resource/index');?>"><i class="fa fa-tags fa-fw"></i>&nbsp;资源分享</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo U('TimeLine/index');?>"><i class="fa fa-hourglass-half fa-fw"></i>&nbsp;点点滴滴</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo U('About/index');?>"><i class="fa fa-info fa-fw"></i>&nbsp;关于本站</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo U('User/index');?>"><i class=""></i>&nbsp;注册</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo U('User/wait');?>"><i class="fa fa-qq"></i>&nbsp;登陆</a>
            </li>
        </ul>
        <!-- 手机和平板的导航开关 -->
        <a class="blog-navicon" href="javascript:;">
            <i class="fa fa-navicon"></i>
        </a>
    </div>
</nav>
<style>
    .article-abstract{
        width:460px;
        border:1px #ddd;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>
<!-- 主体（一般只改变这里的内容） -->
<div class="blog-body">
    <div class="blog-container">
        <blockquote class="layui-elem-quote sitemap layui-breadcrumb shadow">
            <a href="<?php echo U('Article/index');?>" title="网站首页">网站首页</a>
            <a><cite>文章专栏</cite></a>
        </blockquote>
        <div class="blog-main">
            <div class="blog-main-left">
                <?php if(is_array($articleList)): foreach($articleList as $key=>$v): ?><div class="article shadow">
                    <div class="article-left">
                        <img src="/Public/<?php echo ($v["article_img"]); ?>"  style="width: 100px;height: 100px;" alt="" />
                    </div>
                    <div class="article-right">
                        <div class="article-title">
                            <a href="<?php echo U('Article/show');?>?id=<?php echo ($v["article_id"]); ?>&name=<?php echo ($v["article_title"]); ?>"><?php echo ($v["article_title"]); ?></a>
                        </div>
                        <div class="article-abstract">
                            <?php echo ($v["article_content"]); ?>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="article-footer">
                        <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo (date('Y-m-d H:i:s',$v["add_time"])); ?></span>
                        <span class="article-author"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo ($v["article_author"]); ?></span>

                        <?php if(is_array($v['art_label'])): foreach($v['art_label'] as $key=>$n): ?><span><i class="fa fa-tag"></i>&nbsp;&nbsp;<a href="#"><?php echo ($n["label_name"]); ?></a></span><?php endforeach; endif; ?>
                        <span class="article-viewinfo"><i class="fa fa-eye"></i>&nbsp;<?php echo ($v["like_hits"]); ?></span>
                        <span class="article-viewinfo"><i class="fa fa-commenting"></i>&nbsp;<?php echo ($v["article_start"]); ?></span>
                    </div>
                </div><?php endforeach; endif; ?>
            </div>
            <div class="blog-main-right">
                <div class="blog-search">
                    <form class="layui-form" action="<?php echo U('Article/index');?>" method="get">
                        <div class="layui-form-item">
                            <div class="search-keywords  shadow">
                                <input type="text" name="search" placeholder="输入关键词搜索" autocomplete="off" class="layui-input">
                            </div>
                            <div class="search-submit  shadow">
                                <a class="search-btn" lay-submit="formSearch" lay-filter="formSearch">
                                    <input type="submit" value="搜搜" style="width: 43px;height: 35px"/></a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="article-category shadow">
                    <div class="article-category-title">分类导航</div>
                    <?php if(is_array($classify)): foreach($classify as $key=>$v): ?><a href="<?php echo U('Article/index');?>?id=<?php echo ($v["classify_id"]); ?>"><?php echo ($v["classify_name"]); ?></a><?php endforeach; endif; ?>
                    <div class="clear"></div>
                </div>
                <div class="blog-module shadow">
                    <div class="blog-module-title">作者推荐</div>
                    <ul class="fa-ul blog-module-ul">
                        <?php if(is_array($tiList)): foreach($tiList as $key=>$v): ?><li><i class="fa-li fa fa-hand-o-right"></i><a href="<?php echo U('Article/show');?>?id=<?php echo ($v["article_id"]); ?>&name=<?php echo ($v["article_title"]); ?>"><?php echo ($v["article_title"]); ?></a></li><?php endforeach; endif; ?>

                    </ul>
                </div>
                <div class="blog-module shadow">
                    <div class="blog-module-title">随便看看</div>
                    <ul class="fa-ul blog-module-ul">
                        <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">一步步制作时光轴（一）（HTML篇）</a></li>
                        <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">ASP.NET MVC制作404跳转（非302和200）</a></li>
                        <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">ASP.NET MVC 防范跨站请求伪造（CSRF）</a></li>
                        <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">一步步制作时光轴（三）（JS篇）</a></li>
                        <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">基于laypage的layui扩展模块（pagesize.js）！</a></li>
                        <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">一步步制作时光轴（二）（CSS篇）</a></li>
                        <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">写了个Win10风格快捷菜单！</a></li>
                        <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">常用正则表达式</a></li>
                    </ul>
                </div>
                <!--右边悬浮 平板或手机设备显示-->
                <div class="category-toggle"><i class="fa fa-chevron-left"></i></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- 底部 -->
<footer class="blog-footer">
    <p><span></span><span>&copy;</span><span>2017</span><a href="http://www.lyblogs.cn">阿飞天地</a><span>JI SHUAI FEI </span></p>
    <p><a href="http://www.miibeian.gov.cn/" target="_blank">北京市昌平区</a></p>
</footer>
<!--侧边导航-->
<ul class="layui-nav layui-nav-tree layui-nav-side blog-nav-left layui-hide" lay-filter="nav">
    <li class="layui-nav-item">
        <a href="home.html"><i class="fa fa-home fa-fw"></i>&nbsp;网站首页</a>
    </li>
    <li class="layui-nav-item">
        <a href="article.html"><i class="fa fa-file-text fa-fw"></i>&nbsp;文章专栏</a>
    </li>
    <li class="layui-nav-item">
        <a href="resource.html"><i class="fa fa-tags fa-fw"></i>&nbsp;资源分享</a>
    </li>
    <li class="layui-nav-item">
        <a href="timeline.html"><i class="fa fa-road fa-fw"></i>&nbsp;点点滴滴</a>
    </li>
    <li class="layui-nav-item layui-this">
        <a href="about.html"><i class="fa fa-info fa-fw"></i>&nbsp;关于本站</a>
    </li>
</ul>
<!--分享窗体-->
<div class="blog-share layui-hide">
    <div class="blog-share-body">
        <div style="width: 200px;height:100%;">
            <div class="bdsharebuttonbox">
                <a class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                <a class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                <a class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                <a class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
            </div>
        </div>
    </div>
</div>
<!--遮罩-->
<div class="blog-mask animated layui-hide"></div>
<!-- layui.js -->
<script src="/Public/Home/plug/layui/layui.js"></script>
<!-- 全局脚本 -->
<script src="/Public/Home/js/global.js"></script>
<!-- 本页脚本 -->
<script src="/Public/Home/js/about.js"></script>
<!-- 比较好用的代码着色插件 -->
<script src="/Public/Home/js/prettify.js"></script>
<!-- 本页脚本 -->
<script src="/Public/Home/js/detail.js"></script>
<!-- 本页脚本 -->
<script src="/Public/Home/js/home.js"></script>
<!-- 本页脚本 -->
<script type="text/javascript">
    layui.use('jquery', function () {
        var $ = layui.jquery;

        $(function () {
            $('.monthToggle').click(function () {
                $(this).parent('h3').siblings('ul').slideToggle('slow');
                $(this).siblings('i').toggleClass('fa-caret-down fa-caret-right');
            });
            $('.yearToggle').click(function () {
                $(this).parent('h2').siblings('.timeline-month').slideToggle('slow');
                $(this).siblings('i').toggleClass('fa-caret-down fa-caret-right');
            });
        });
    });
</script>
</body>