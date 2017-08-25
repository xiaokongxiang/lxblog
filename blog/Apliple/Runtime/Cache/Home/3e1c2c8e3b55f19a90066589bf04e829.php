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

        <a class="blog-logo" href="home.html">纪帅飞</a>
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
<!-- 主体（一般只改变这里的内容） -->
<div class="blog-body">
    <div class="blog-container">
        <blockquote class="layui-elem-quote sitemap layui-breadcrumb shadow">
            <a href="home.html" title="网站首页">网站首页</a>
            <a><cite>关于本站</cite></a>
        </blockquote>
        <div class="blog-main">
            <div class="layui-tab layui-tab-brief shadow" lay-filter="tabAbout">
                <ul class="layui-tab-title">
                    <li lay-id="1">关于博客</li>
                    <li lay-id="2">关于作者</li>
                    <li lay-id="3" id="frinedlink">友情链接</li>
                    <li lay-id="4">留言墙</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item">
                        <div class="aboutinfo">
                            <div class="aboutinfo-figure">
                                <img src="/Public/Home/images/Logo_100.png" alt="阿飞天地" />
                            </div>
                            <p class="aboutinfo-nickname">阿飞天地</p>
                            <p class="aboutinfo-introduce">一个.NET程序员的个人博客，记录博主学习和成长之路，分享.PHP方面技术和源码</p>
                            <p class="aboutinfo-location"><i class="fa fa-link"></i>&nbsp;&nbsp;<a target="_blank" href="http://www.lyblogs.cn">www.jishuafie.cn</a></p>
                            <hr />
                            <div class="aboutinfo-contact">
                                <a target="_blank" title="网站首页" href="home.html"><i class="fa fa-home fa-2x" style="font-size:2.5em;position:relative;top:3px"></i></a>
                                <a target="_blank" title="文章专栏" href="article.html"><i class="fa fa-file-text fa-2x"></i></a>
                                <a target="_blank" title="资源分享" href="resource.html"><i class="fa fa-tags fa-2x"></i></a>
                                <a target="_blank" title="点点滴滴" href="timeline.html"><i class="fa fa-hourglass-half fa-2x"></i></a>
                            </div>

                            <fieldset class="layui-elem-field layui-field-title">
                                <legend>简介</legend>
                                <div class="layui-field-box aboutinfo-abstract">
                                    <p style="text-align:center;">你不知道你的影子多么调皮，总在我的眼前晃动，让我不能有一刻安宁。坏男孩从早上睁开朦胧眼睛的那一刻起，到枕着你的名字入眠进入梦乡，你的影子一直陪着我。</p>
                                    <h1>我的爱情</h1>
                                    <p style="text-align:center;">从看到你的那一刻起，我的心跳就告诉我你是我今生等待的人，是你给了我勇气和动力，我会用一生的努力来呵护这份心动的</p>
                                    <h1>我的爱</h1>
                                </div>
                            </fieldset>
                        </div>
                    </div><!--关于网站End-->
                    <div class="layui-tab-item">
                        <div class="aboutinfo">
                            <div class="aboutinfo-figure">
                                <img src="/Public/Home/images/jishuaifei.jpg" alt="Absolutely" />
                            </div>
                            <p class="aboutinfo-nickname">SHUAI FEI</p>
                            <p class="aboutinfo-introduce">一枚90后帅程序员，PHP开发工程师</p>
                            <p class="aboutinfo-location"><i class="fa fa-location-arrow"></i>&nbsp;河北 - 衡水</p>
                            <hr />
                            <div class="aboutinfo-contact">
                                <a target="_blank" title="QQ交流" href="javascript:layer.msg('启动QQ会话窗口')"><i class="fa fa-qq fa-2x"></i></a>
                                <a target="_blank" title="给我写信" href="javascript:layer.msg('启动邮我窗口')"><i class="fa fa-envelope fa-2x"></i></a>
                                <a target="_blank" title="新浪微博" href="javascript:layer.msg('转到你的微博主页')"><i class="fa fa-weibo fa-2x"></i></a>
                                <a target="_blank" title="码云" href="javascript:layer.msg('转到你的github主页')"><i class="fa fa-git fa-2x"></i></a>
                            </div>
                            <fieldset class="layui-elem-field layui-field-title">
                                <legend>简介</legend>
                                <div class="layui-field-box aboutinfo-abstract abstract-bloger">
                                    <p style="text-align:center;">SHUAI，阿飞天地，诞生于2017年8月22日，目前是一个码农，从事.PHP开发。</p>
                                    <h1>个人信息</h1>
                                    <p>未婚</p>
                                    <h1>个人介绍</h1>
                                    <p>一个比较善良的老男孩......</p>
                                    <h1 style="text-align:center;">QQ953436658</h1>
                                </div>
                            </fieldset>
                        </div>
                    </div><!--关于作者End-->
                    <div class="layui-tab-item">
                        <div class="aboutinfo">
                            <div class="aboutinfo-figure">
                                <img src="/Public/Home/images/handshake.png" alt="友情链接" />
                            </div>
                            <p class="aboutinfo-nickname">友情链接</p>
                            <p class="aboutinfo-introduce">Name：阿飞天地&nbsp;&nbsp;&nbsp;&nbsp;Site：www.jishuaifei</p>
                            <p class="aboutinfo-location">
                                <i class="fa fa-close"></i>经常宕机&nbsp;
                                <i class="fa fa-close"></i>不合法规&nbsp;
                                <i class="fa fa-close"></i>插边球站&nbsp;
                                <i class="fa fa-close"></i>红标报毒&nbsp;
                                <i class="fa fa-check"></i>原创优先&nbsp;
                                <i class="fa fa-check"></i>技术优先
                            </p>
                            <hr />
                            <div class="aboutinfo-contact">
                                <p style="font-size:2em;">互换友链，携手并进！</p>
                            </div>
                            <fieldset class="layui-elem-field layui-field-title">
                                <legend>Friend Link</legend>
                                <div class="layui-field-box">
                                    <ul class="friendlink">
                                        <li>
                                            <a target="_blank" href="http://www.layui.com/" title="Layui" class="friendlink-item">
                                                <p class="friendlink-item-pic"><img src="http://www.layui.com/favicon.ico" alt="Layui" /></p>
                                                <p class="friendlink-item-title">Layui</p>
                                                <p class="friendlink-item-domain">layui.com</p>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </fieldset>
                        </div>
                    </div><!--友情链接End-->
                    <div class="layui-tab-item">
                        <div class="aboutinfo">
                            <div class="aboutinfo-figure">
                                <img src="/Public/Home/images/messagewall.png" alt="留言墙" />
                            </div>
                            <p class="aboutinfo-nickname">留言墙</p>
                            <p class="aboutinfo-introduce">本页面可留言、吐槽、提问。欢迎灌水，杜绝广告！</p>
                            <p class="aboutinfo-location">
                                <i class="fa fa-clock-o"></i>&nbsp;<span id="time"></span>
                            </p>
                            <hr />
                            <div class="aboutinfo-contact">
                                <p style="font-size:2em;">沟通交流，拉近你我！</p>
                            </div>
                            <fieldset class="layui-elem-field layui-field-title">
                                <legend>Leave a message</legend>
                                <div class="layui-field-box">
                                    <div class="leavemessage" style="text-align:initial">
                                        <form class="layui-form blog-editor" action="">
                                            <div class="layui-form-item">
                                                <textarea name="editorContent" lay-verify="content" id="remarkEditor" placeholder="请输入内容" class="layui-textarea layui-hide"></textarea>
                                            </div>
                                            <div class="layui-form-item">
                                                <button class="layui-btn" lay-submit="formLeaveMessage" lay-filter="formLeaveMessage">提交留言</button>
                                            </div>
                                        </form>
                                        <ul class="blog-comment">
                                            <li>
                                                <div class="comment-parent">
                                                    <img src="/Public/Home/images/Logo_40.png" alt="不落阁" />
                                                    <div class="info">
                                                        <span class="username">阿飞天地</span>
                                                    </div>
                                                    <div class="content">
                                                        我为大家做了模拟留言与回复！试试吧！
                                                    </div>
                                                    <p class="info info-footer"><span class="time">2017-03-18 18:09</span><a class="btn-reply" href="javascript:;" onclick="btnReplyClick(this)">回复</a></p>
                                                </div>
                                                <hr />
                                                <div class="comment-child">
                                                    <img src="/Public/Home/images/Absolutely.jpg" alt="Absolutely" />
                                                    <div class="info">
                                                        <span class="username">Absolutely</span><span>这是用户回复内容</span>
                                                    </div>
                                                    <p class="info"><span class="time">2017-03-18 18:26</span></p>
                                                </div>
                                                <div class="comment-child">
                                                    <img src="/Public/Home/images/Absolutely.jpg" alt="Absolutely" />
                                                    <div class="info">
                                                        <span class="username">Absolutely</span><span>这是第二个用户回复内容</span>
                                                    </div>
                                                    <p class="info"><span class="time">2017-03-18 18:26</span></p>
                                                </div>
                                                <!-- 回复表单默认隐藏 -->
                                                <div class="replycontainer layui-hide">
                                                    <form class="layui-form" action="">
                                                        <div class="layui-form-item">
                                                            <textarea name="replyContent" lay-verify="replyContent" placeholder="请输入回复内容" class="layui-textarea" style="min-height:80px;"></textarea>
                                                        </div>
                                                        <div class="layui-form-item">
                                                            <button class="layui-btn layui-btn-mini" lay-submit="formReply" lay-filter="formReply">提交</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div><!--留言墙End-->
                </div>
            </div>
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