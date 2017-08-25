<?php

namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    /*
     * show
     * 文章管理首页
     * **/
    public function show()
    {
        $search = I('get.search');
        $class = I('get.class');
        $start_time =strtotime(I('get.start_time')) ;

        $add_time =strtotime(I('get.add_time')) ;
//        $where['article_start'] = array('eq',1);
        $where['is_del'] = array('eq',0);
        /*标题*/
        if(!empty($search)){
            $where['article_title'] = array('like',"%$search%");
        }
        /*分类id*/
        if(!empty($class)){
            $where['classify_id'] = array('eq',$class);
        }
        /*开始时间*/
        if(!empty($start_time)){
            $where['add_time'][] = array('egt',$start_time);
        }
        /*结束时间*/
       if(!empty($add_time)){
           $where['add_time'][] = array('elt',$add_time);
       }
        $p = I('get.p',1);
        $data = M('Article')->where($where)->count();
         /*调用分页类*/
        $pages = $this->getPage($data);
        $articleList = D('Article')->page($p.','.$this->config['PAGE_SIZE'])->relation(true)->where($where)->order('article_id desc')->select();
        /*查询所有的分类*/
        $clss = M('Classify')->select();
        $this->assign('clss',$clss);
        $this->assign('pages',$pages);
        $this->assign('articleList',$articleList);
        $this->display();
    }
    /*
     * add
     * 文章添加
     * **/
    public function add()
    {
        if(IS_POST){

            $data['article_title'] = I('post.article_title');
            $data['article_author'] = I('post.article_author');
            $data['classify_id'] = I('post.classify_id');
            $label = I('post.label');
            $data['article_content'] = I('post.article_content');
            $img =  I('post.article_img');
            $data['article_img'] = substr($img,9);
            $data['login_id'] = session('id');
            $data['add_time'] = time();
//            $Article = D('Article');
//            if($Article->create()){
//                $this->error( $Article->getError());
//            }else{
                $res = M('Article')->add($data);
                if($res){
                    foreach($label as $key=>$val){
                        M('Label_article')->add(['label_id'=>$val,'article_id'=>$res]);
                    }
                    ri('文章添加');
                    $this->success('文章添加成功',U('Article/show'));
                }else{
                    $this->error('添加失败');
                }
//            }

        }else{
            $labelName = M('Label')->select();
            $Classify = M('Classify')->select();
            $this->assign('labelName',$labelName);
            $this->assign('Classify',$Classify);
            $this->display();
        }

    }
    /*
     * upd
     * 修改
     * **/
    public function up()
    {     if(IS_POST)
            {
                $data = I('post.');
                $id = I('post.id');
                $res = M('Article')->where(['article_id'=>$id])->save($data);
                if($res){
                    ri('修改文章');
                    $this->success('修改成功',U('Article/show'));
                }else{
                    $this->error('修改失败');
                }
            }else
            {
                $id = I('get.id');
                $data = D('Article')->where(['article_id'=>$id])->relation(true)->find();
                $Classify = M('Classify')->select();
                $this->assign('Classify',$Classify);
                $this->assign('data',$data);
                $this->display();
            }

    }
    /*
     * update
     * 修改状态文章发布还不发
     * **/
    public function update()
    {
        $val = I('get.val');
        $id = I('get.id');
        if($val == 0 ){
            M('Article')->where(['article_id'=>$id])->save(['article_start'=>0]);
            echo '0';
        }else{
            M('Article')->where(['article_id'=>$id])->save(['article_start'=>1]);
            echo '1';
        }
    }
    /*
     * uploadFile
     * 上传文件
     * **/
    public function  getUpload()
    {
        $return = $this->upload('img');

        if ($return['isError']) {
            $res = ["code" => 0, "msg" => $return['msg'], "data" => ''];
        } else {
            $res = ["code" => 1, "msg" => "", "data" => ["src" => $return['data']]];
        }
        echo json_encode($res);
    }

    /*
     * copy
     * 复制
     * **/
    public function copy()
    {
        $id = I('get.id');
        $arList = M('Article')->where(['article_id'=>$id])->field('article_id',true)->find();
        $laList = M('Label_article')->where(['article_id'=>$id])->select();
        $resID = M('Article')->add($arList);

        foreach($laList as $key=>$val){
            $res = M('Label_article')->add(['label_id'=>$val['label_id'],'article_id'=>$resID]);

        }
        if($res)
        {
            ri('复制文章成功');
            $this->success('复制成功',U('Article/show'));
        }else{
            $this->error('复制失败');
        }
    }
    /*
     * do_add
     * 前台验证
     * **/
    public function doAdd()
    {
        $name = I('post.article_title');
        $res = M('Article')->where(['article_title'=>$name])->find();
        if($res){
            echo 'false';
        }else{
            echo 'true';
        }
    }
    /*
     * delete
     * 回收
     * **/
    public function del()
    {
          $id = I('get.id');
          $res = M('Article')->where(['article_id'=>$id])->save(['is_del'=>1]);

        if($res){
            M('Recycly')->add(['ar_id'=>$id]);
            ri('回收文章');
            $this->success('回收成功',U('Article/show'));
        }else{
            $this->error('回收失败');
        }
    }
    /*
     * recycly
     * 回收站
     * **/
    public function recycly()
    {
        $reList = M('Recycly r')->join('Blogs_article a on r.ar_id = a.article_id')->select();
        $this->assign('reList',$reList);
        $this->display('re_show');
    }
    /*
     * restore
     * 还原
     * **/
    public function restore()
    {
        $id = I('get.id');
        $res = M('Article')->where(['article_id'=>$id])->save(['is_del'=>0]);

        if($res){
            M('Recycly')->where(['ar_id'=>$id])->delete();
            ri('还原文章');
            $this->success('还原成功',U('Article/recycly'));
        }else{
            $this->error('还原失败');
        }

    }
    /*
     * re_del
     * 回收站删除
     * **/
    public function reDel()
    {
        $id = I('get.id');
        $res  = M('Label_article')->where(['article_id'=>$id])->delete();

        $res = M('Article')->where(['article_id'=>$id])->delete();
        M('Recycly')->where(['ar_id'=>$id])->delete();
        if($res){
            ri('删除文章');
            $this->success('删除成功',U('Article/recycly'));
        }else{
            $this->error('删除失败');
        }
    }
}