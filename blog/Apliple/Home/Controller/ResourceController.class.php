<?php
/*
 * Resource
 * 资源的的控制器
 * 纪帅飞
 * 95346658@qq.con
 * **/
namespace Home\Controller;
use Think\Controller;
class ResourceController extends  CommonController {
    /*
     * index
     * 资源的展示
     * **/
    public function index()
    {
        $config = config();
        $this->assign('config',$config);
        $this->display();
    }

}