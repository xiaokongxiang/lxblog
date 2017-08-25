<?php
return array(

    'TMPL_ACTION_ERROR'     =>  'Public/message', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  'Public/message',// 默认成功跳转对应的模板文件


     'HTML_CACHE_ON'     =>    true, // 开启静态缓存
    'HTML_CACHE_TIME'   =>    60,   // 全局静态缓存有效期（秒）
    'HTML_FILE_SUFFIX'  =>    '.shtml', // 设置静态缓存文件后缀
    'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则
        '*'=>array('{$_SERVER.REQUEST_URI|md5}'),
    )

);
?>
