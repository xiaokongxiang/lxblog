<?php
/*
 * Article
 * 文章的控制器
 * 纪帅飞
 * 95346658@qq.con
 * **/
namespace Home\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    /*
     * index
     * 文章的展示
     * **/
    public function index()
    {
        $config = config();
        /*搜索的值*/
        $search = I('get.search');
        /*分类id*/
        $id = I('get.id');

        /*没有回收的文章*/
        $where['is_del'] = array('eq',0);
        if(!empty($id)){
            $where['classify_id'] = array('eq',$id);
        }
        if(!empty($search)){
            $where['article_title'] = array('like',"%$search%");
        }

//        $p = I('get.p',1);
//        $data = M('Article')->where($where)->count();
//        /*调用分页类*/
//        $pages = $this->getPage($data);
        $articleList = D('Article')->order('article_id desc' )->relation(true)->where($where)->limit('5')->select();
        $classify = M('Classify')->select();
        /*根据访问量*/
        $tiList = M('Article')->order('like_hits desc')->limit('8')->select();
        $this->assign('tiList',$tiList);
        $this->assign('classify',$classify);
        $this->assign('articleList',$articleList);
        $this->assign('config',$config);
//        $this->assign('pages',$pages);
        $this->display();
    }
    /*
     * 文章详情
     * **/
    public function show()
    {
        header("content-type:text/html;charset=utf-8");
        $classify = M('Classify')->select();
        $config = config();
       /*接收标题的值*/
        $name = I('get.name');
        $id = I('get.id');
        $this->assign('classify',$classify);
        $arList = M('Article')->where(['article_id'=>$id])->find();
        $cleList = M('Article')->where("article_title like '%$name%'")->select();
        $this->assign('arList',$arList);
        $this->assign('cleList',$cleList);
        $this->assign('config',$config);
        $this->display();
    }
        /*
    * getPage
    * 自定义分页
    */
    protected function getPage($count)
    {
        // 实例化分页类 传入总记录数和每页显示的记录数
        $Page = new \Think\Page($count,$this->config['PAGE_SIZE']);
        $Page -> setConfig('prev','上一页');
        $Page -> setConfig('next','下一页');
        $pages = $Page->show();
        return $pages;
    }
    /*
     * setIC
     * 自增文章访问量
     * **/
    public function setIc()
    {
        $id = I('get.id');
        M('Article')->where(['article_id'=>$id])->setInc('like_hits');
        echo '1';
    }
}