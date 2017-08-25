<?php

namespace Admin\Controller;
use Think\Controller;
class DeployController extends CommonController {
    /*index
     *配置的首页
     * **/
    public function index()
    {
        if(IS_POST){
            $param = I('post.');
            foreach($param as $key=>$val){
                $res = M('Deploy')->where(['key'=>$key])->save(['value'=>$val]);
                    if($res ===false){
                        $this->error('失败');
                    }
            }
            ri('修改配置');
            S('config',null);
            $this->success('成功',U('Deploy/index'));
        }else{
            $config = $this->config;
            $this->assign('config',$config);
            $this->display();
        }

    }

}