<?php

namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    /*
     * index
     * 进入首页
     * **/
    public function index()
    {
        $id = session('id');
        $login = M('Login')->where(['login_id'=>$id])->find();
        $userList = M('User')->count();
        $loList = M('Login')->count();
        $arList = M('Article')->count();
        $coList = M('Connect')->count();
        $this->assign('login',$login);
        $this->assign('userList',$userList);
        $this->assign('arList',$arList);
        $this->assign('coList',$coList);
        $this->assign('loList',$loList);
        $this->display();
    }
    /*
     * out
     * 退出
     * **/
   public function out()
   {
       session_destroy();
       ri('退出登陆');
       $this->success('注销成功',U('Login/index'));
   }
    /*
     * delTel
     * 清除缓存
     * **/
    public function delTel()
    {

        if(delFile(HTML_PATH)){
            ri('删除缓存');
           $this->success('删除缓存！');
        }else{
         $this->error('删除缓存失败');
        }
    }
    /*
     * visit
     * 日常访问
     * **/
    public function visit()
    {
        $str = 'Day,访问量（PV）,访问用户（UV）'."\n";
        for($i = 0; $i<7; $i++){
            $oneDay = $i * 24 * 3600;
            //开始时间
            $stime = strtotime(date('Y-m-d')) - $oneDay;
            //结束时间
            $etime = strtotime(date('Y-m-d')) + 24 * 3600 - 1 - $oneDay;
            //时间
            $map[]  = ['time'=>['egt',$stime]];
            $map[]  = ['time'=>['elt',$etime]];
            //pv
            $dayPV = M('Visit')->where($map)->count();
            //UV
            $dayUV = M('Visit')->field('ip')->where($map)->group('ip')->select();
            $dayNum = count($dayUV);
            unset($map);
            $str .= date('Y/m/d',$stime) .',' .$dayPV .',' . $dayNum. "\n";

        }
        echo $str;
    }
}