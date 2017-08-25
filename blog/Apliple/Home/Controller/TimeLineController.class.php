<?php
/*
 * Timeline
 * 时光的的控制器
 * 纪帅飞
 * 95346658@qq.con
 * **/
namespace Home\Controller;
use Think\Controller;
class TimeLineController extends  CommonController {
    /*
     * index
     * 时光的展示
     * **/
    public function index()
    {
        $config = config();
        $this->assign('config',$config);
        $this->display();
    }

}