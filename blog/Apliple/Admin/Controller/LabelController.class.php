<?php
namespace Admin\Controller;
use Think\Controller;
class LabelController extends CommonController {
    /*
     * index
     * 标签展示
     * **/
    public function index()
    {
        $labelDate = M('Label')->select();
        $this->assign('labelDate',$labelDate);
        $this->display();
    }
    /*
     * add
     * 标签添加
     * **/
    public function add()
    {
        if(IS_POST)
        {
            $name = I('post.label_name');
            $Label = D('Label');
            //验证
            if(!$Label->create()){
                $this->error($Label->getError());
            }else{
                $res =  M('Label')->add(['label_name'=>$name]);
                if($res){
                    ri('添加标签');
                    $this->success('添加成功!',U('Label/index'));
                }else{
                    $this->error('添加失败');
                }
            }
            } else
            {
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
                    $dataId = M('Label_article')->where(['label_id'=>$id])->find();
                    if($dataId == false){
                        $res = M('Label')->where(['label_id'=>$id])
                            ->delete();

                        if($res){
                            ri('删除标签');
                            $this->success('删除成功',U('Label/index'));
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
             * 前台数据判断
             * **/
             public function doAdd()
             {
                 $label_name = I('post.label_name');
                 $res = M('Label')->where(['label_name'=>$label_name])->find();
                 if($res){
                     echo 'false';
                 }else{
                     echo 'true';
                 }
             }
}