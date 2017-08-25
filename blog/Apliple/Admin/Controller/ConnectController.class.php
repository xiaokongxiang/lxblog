<?php

namespace Admin\Controller;
use Think\Controller;
class ConnectController extends CommonController {
    /*
     * index
     * 展示友情的页面
     * **/
    public function index()
    {
        $conList = M('Connect')->select();
        $this->assign('conList',$conList);
        $this->display();
    }
    /*
     * add
     * 添加的友情
     * **/
    public function add()
    {
        if(IS_POST){
            $param = I('post.');
             $Connect = D('Connect');
            if(!$Connect->create()){
                $this->error($Connect->getError());
            }else{
                $res = M('Connect')->add($param);
                if($res){
                     ri('添加友情连接！');
                    $this->success('添加成功',U('Connect/index'));
                }else{
                   $this->error('添加失败');
                }
            }
        }else{
            $this->display();
        }


    }
    /*
     * del
     * 删除
     * **/
    public function del()
    {
      $id = I('get.id');
      $res = M('Connect')->where(['connect_id'=>$id])->delete();
        if($res){
            ri('删除友情链接');
            $this->success('删除成功',U('Connect/index'));
        }else{
            $this->error('删除失败');
        }
    }
    /*
     * doAdd
     * 前台验证数据
     * **/
    public function doAdd()
    {
        $connectName = I('post.connect_name');
        $res = M('Connect')->where(['connect_name'=>$connectName])->find();
        if($res){
            echo 'false';
        }else{
            echo 'true';
        }
    }
    /*
     * up
     * 修改
     * **/
    public function up()
    {
        if(IS_POST){
           $param = I('post.');
            $res = M('Connect')->where(['connect_id'=>$param['connect_id']])
                               ->save(['connect_name'=>$param['connect_name'],
                                        'connect_url'=>$param['connect_url'],
                                        'connect_sost'=>$param['connect_sost']]);
            if($res){
                ri('修改友情链接');
                $this->success('修改成功',U('Connect/index'));
            }else{
                $this->error('修改失败');
            }
        }else{
            $id = I('get.id');
            $conDe = M('Connect')->where(['connect_id'=>$id])->find();
            $this->assign('conDe',$conDe);
            $this->display();
        }

    }
}