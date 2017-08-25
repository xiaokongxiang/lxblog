<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController {

    public function show()
    {
        $p = I('get.p',1);
        $data = D('Login')->count();
        /*调用分页类*/
        $pages = $this->getPage($data);
        $loginName = M('Login') ->page($p.','.C('PAGE_SIZE'))->select();
        $this->assign('loginName',$loginName);
        $this->assign('pages',$pages);
        $this->display();
    }
 
    public function add()
    {
        if(IS_POST){
            $login_name = I('post.login_name');
            $login_pwd = I('post.login_pwd');
            $login_psd = I('post.login_psd');
            $Login = D('Login');
            //验证
            if(!$Login->create()){
                $this->error( $Login->getError());
            }else{
                $res = M('login')->add(['login_name'=>$login_name,'login_pwd'=>md5($login_pwd)]);
                if($res){
                    ri('添加管理员');
                    $this->success('添加成功',U('Admin/show'));
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
        $loginDate = M('Login')->where(['login_id'=>$id])->find();
        $this->assign('loginDate',$loginDate);
        $this->display();
    }

     public function update()
     {
         $id = I('post.login_id');
         $login_pwd = I('post.login_pwd');
         $login_psd = I('post.login_psd');
         $res = M('Login')->where(['login_id'=>$id])->find();
         //验证盐为空
         if(empty($res['login_salt'])){
           $data = M('Login')->where(['login_pwd'=>md5($login_psd)])->save(['login_pwd'=>md5($login_pwd)]);
             if($data)
             {
                 ri('修改管理员');
                 $this->success('添加成功',U('Admin/show'));
             }else{
                 $this->error('旧密码不对还不能一样！！');
             }

         }else{
             $data = M('Login')->where(['login_pwd'=>md5(md5($login_psd).$res['login_salt'])])->save(['login_pwd'=>md5(md5($login_pwd).$res['login_salt'])]);
             if($data)
             {
                 ri('修改管理员');
                 $this->success('添加成功',U('Admin/show'));
             }else{
                 $this->error('旧密码不对还不能一样！');
             }
         }
     }
    /*
     * detele
     * 删除
     * **/
    public function delete()
    {
        $id = I('get.id');
        $clList = M('Article')->where(['login_id'=>$id])->find();
        if($clList == false){
            $res = M('Login')->where(['login_id'=>$id])->delete();
            if($res){
                ri('删除管理员');
                $this->success('删除成功',U('Admin/show'));
            }else{
                $this->error('删除失败');
            }
        }else{
            $this->error('文章里已经有了');
        }
     }
    /*
     * do_add
     * 判断前台数据
     * **/
    public function doAdd()
    {
        $login_name = I('post.login_name');
        $res = M('Login')->where(['login_name'=>$login_name])->find();
        if($res){
            echo 'false';
        }else{
            echo 'true';
        }
    }
}