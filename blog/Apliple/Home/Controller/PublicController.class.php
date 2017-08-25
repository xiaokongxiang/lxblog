<?php
/*
 * Public
 * 控制器
 * 纪帅飞
 * 953436658@qq.com
 */
namespace Admin\Controller;
use Think\Controller;
class PublicController extends CommonController {
     public function top()
     {
         $config = config();
          $this->assign('config',$config);
         $this->display();
     }
}