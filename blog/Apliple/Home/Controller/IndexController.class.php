<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends  CommonController {
    public function index()
    {
        $config = config();
        $where = "is_del = 0";
       /* 根据时间查*/
        $articleList = D('Article')->order('article_id desc' )->relation(true)->where($where)->limit(8)->select();
        /*根据访问量*/
        $tiList = M('Article')->order('like_hits desc')->limit('8')->select();
        /*友情链接*/
        $con = M('Connect')->order('connect_sost desc')->select();
       /*分类查询*/
        $classify = M('Classify')->select();
        /*查询日志*/
        $logList = M('Log')->order('log_id desc')->limit('3')->select();
        $this->assign('config',$config);
        $this->assign('logList',$logList);
        $this->assign('con',$con);
        $this->assign('tiList',$tiList);
        $this->assign('classify',$classify);
        $this->assign('articleList',$articleList);
        $this->display();
    }
}