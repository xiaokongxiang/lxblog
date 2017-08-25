<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
   public function __construct()
   {
       parent::__construct();
       $id = session('id');
       if(empty($id)){
           $this->error('请先登陆！',U('Login/index'));
       }

          $this->config = config();
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
 * layui ajax
 * 上传
 * **/
    public function upload($img){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     31457280 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
        $upload->rootPath  =      './'; // 设置附件上传目录
        // 上传文件
        $info   =   $upload->upload();
        $return = ['isError'=>0,'msg'=>'','data'=>''];

        if(!$info)
        {
            // 上传错误提示错误信息
            $return['isError']=1;

            $return['msg']=$upload->getError();
        }
        else
        {
            $imgPath=$info[$img]['savepath']. $info['img']['savename'];
            $return['isError']=0;
            $return['data']=$imgPath;
        }
        return $return;
    }
}