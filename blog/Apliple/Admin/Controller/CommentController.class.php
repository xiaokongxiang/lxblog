<?php

namespace Admin\Controller;
use Think\Controller;
class CommentController extends CommonController {
      /*
       * index
       * 评论和回复的展示页面
       * **/
    public function show()
    {
        $comList = D('Comment')->select();
        foreach($comList as $key=>$val){
            $comList[$key]['mon'] = D('Comment')->where(['replay_id'=>$val['comment_id']])->relation(true)->select();
        }
        $this->assign('comList',$comList);
        $this->display();
    }
    /*
     * del
     * 删除
     * **/
    public function del()
    {
        $id = I('get.id');
        $res  = M('Comment')->where(['comment_id'=>$id])->delete();
        if($res)
        {
            ri('删除评论');
            $this->success('删除成功',U('Comment/show'));
        }else
        {
            $this->error('删除失败');
        }
    }

}