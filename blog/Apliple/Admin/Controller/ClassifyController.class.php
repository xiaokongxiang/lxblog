<?php
namespace Admin\Controller;
use Think\Controller;
class ClassifyController extends CommonController {
    /*
     * index
     * 分类的展示
     * **/
    public function index()
    {
          $clList = M('Classify')->select();
          $this->assign('clList',$clList);
          $this->display();
    }
    /*
     * add
     * 添加
     * **/
    public function add()
    {
        if(IS_POST){
           $name = I('post.classify_name');
            $Classify = D('Classify');
            if(!$Classify->create()){
              $this->error( $Classify->getError());
            }else{
               $res = M('Classify')->add(['classify_name'=>$name]);
                if($res)
                {
                    ri('分类添加');
                    $this->success('添加成功',U('Classify/index'));
                }else{
                    $this->error('添加失败');
                }

            }
        }else{
            $this->display();
        }
    }
    /*
     * up
     * 修改
     * **/
    public function up()
    {
        $id = I('get.id');
        $clName = M('Classify')->where(['classify_id'=>$id])->find();
        $this->assign('clName',$clName);
        $this->display();
    }
    /*
     * alter
     * 修改接到值修改数据库
     * **/
    public function alter()
    {
        $id = I('post.classify_id');
        $name = I('post.classify_name');
        $Classify = D('Classify');
        if(!$Classify->create()){
            $this->error( $Classify->getError());
        }else{
            $res = M('Classify')->where(['classify_id'=>$id])->save(['classify_name'=>$name]);
            if($res){
                ri('分类修改');
                $this->success('修改成功',U('Classify/index'));
            }else{
                $this->error('修改失败');
            }
        }
    }
    /*
     * detele
     * 删除
     * **/
    public function detele()
    {
        $id = I('get.id');
        $clId = M('Article')->where(['classify_id'=>$id])->find();
        if($clId == false){
            $res = M('Classify')->where(['classify_id'=>$id])
                ->delete();

            if($res){
                ri('分类删除');
                $this->success('删除成功',U('Classify/index'));
            }else
            {
                $this->error('已经选择不能删除');
            }
        }else{
            $this->error('已经选择不能删除');
        }
    }
    /*
     * do_add
     * 判断前台数据
     * **/
    public function doAdd()
    {
      $classify_name = I('post.classify_name');
        $res = M('Classify')->where(['classify_name'=>$classify_name])->find();
        if($res){
            echo 'false';
        }else{
            echo 'true';
        }
    }
}