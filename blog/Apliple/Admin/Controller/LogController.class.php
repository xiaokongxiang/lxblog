<?php
namespace Admin\Controller;
use Think\Controller;
class LogController extends CommonController {
        /*
         * index
         * 日志的展示
         * **/
     public function index()
     {
         $p = I('get.p',1);
         $data = M('Log')->count();
         /*调用分页类*/
         $pages = $this->getPage($data);
         $logDate = M('Log l')->join('blogs_login n on l.login_id = n.login_id')->page($p.','.$this->config['PAGE_SIZE'])->select();
         $this->assign('logDate',$logDate);
         $this->assign('pages',$pages);
         $this->display();
     }
         /*
         * del
          * 删除一个月的记录
         * **/
    public function del()
    {
        $moth = I('get.moth');
        $time =time()-$moth*3600*24*30;
        $where['log_time'] = array('elt',$time);
        $data= M('Log')->where($where)->delete();
        if($data)
        {
            ri('删除日志记录');
            $this->success('删除成功',U('Log/index'));
        }else
        {
            $this->error('删除失败');
        }
    }
}