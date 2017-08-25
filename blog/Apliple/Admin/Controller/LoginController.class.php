<?php

namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
         /*
          * index
          * 判断管理员
          * **/
        public function index()
        {
           if(IS_POST)
           {
               $name = I('post.login_name');
               $pwd = I('post.login_pwd');
               $code = I('post.code');
               $checkCode = $this->checkVerify($code);
               if(!$checkCode){
                   $this->error('验证码有误',U('Login/index'));exit;
               }
               $dataList = M('Login')->where(['login_name'=>$name])->find();
               //判断盐是否为空
               if(empty($dataList['login_salt']))
               {
                  if($dataList['login_pwd'] != md5($pwd))
                  {
                      $this->error('账号有误！',U('Login/index'));exit;
                  }else
                  {
                      //在session存id
                      session('id',$dataList['login_id']);
                      //生成盐
                      $salt = rand(1,999999);
                      //拼接盐和加密后密码
                      $loginPwd = md5(md5($pwd).$salt);
                      //获取当前的时间
                      $time = time();
                      //获取当前ip
                      $ip = get_client_ip();
                      //修改
                      M('Login')->where(['login_id'=>$dataList['login_id']])
                                ->save(['login_pwd'=>$loginPwd,'login_salt'=>$salt,'login_time'=>$time,'login_ip'=>$ip]);
                      ri('管理员登陆');
                      $this->success('登陆成功',U('Index/index'));
                  }
               }else
               {
                   //盐不为空的时候
                   if($dataList['login_pwd'] != md5(md5($pwd).$dataList['login_salt']))
                   {
                       $this->error('账号有误！',U('Login/index'));exit;
                   }else
                   {
                       //在session存id
                       session('id',$dataList['login_id']);
                       //获取当前的时间
                       $time = time();
                       //获取当前ip
                       $ip = get_client_ip();
                       M('Login')->where(['login_id'=>$dataList['login_id']])
                           ->save(['login_time'=>$time,'login_ip'=>$ip]);
                       ri('管理员登陆');
                       $this->success('登陆成功',U('Index/index'));
                   }
               }
           }else
           {
               $this->display('login');
           }

        }
           //验证验
        public function verify()
        {
            $config = array('fontSize'	=>	30,		// 验证码字体大小
                'length'	=>	3,     	// 验证码位数
                'useNoise'	=>	true, 	// 关闭验证码杂点
                'imageH'	=>  50,		// 高度
                'imageW'	=>  200		// 宽度
            );
            $Verify =     new \Think\Verify();
            $Verify->codeSet = '0123456789';
            $Verify->useImgBg = true;
            $Verify->entry();
        }
        // 验证 验证码是否正确
        protected function checkVerify($code, $id = '')
        {
            $verify = new \Think\Verify();
            return $verify->check($code, $id);
        }

}