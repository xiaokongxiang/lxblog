<?php
/*
 * visit
 * 记录日常的访问
 * */
function visit()
{

    $name = session('userName');
    $name = isset($name) ? $name : '';
    $data = ['ip'=>get_client_ip(),'time'=>time(),
        'url'=>$_SERVER['REQUEST_URI'],
        'agent'=>$_SERVER['HTTP_USER_AGENT'],
        'user'=>$name];
    M('Visit')->add($data);
}
?>