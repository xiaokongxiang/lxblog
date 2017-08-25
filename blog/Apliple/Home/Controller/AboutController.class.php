<?php
/*
 * About
 * 关于本站的控制器
 * 纪帅飞
 * 95346658@qq.con
 * **/
namespace Home\Controller;
use Think\Controller;
class AboutController extends CommonController {
    /*
     * index
     *关于本站的展示
     * **/
    public function index()
    {
        $config = config();
        $this->assign('config',$config);
        $this->display();
    }

}