<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class LoginModel extends RelationModel{
    //自动验证
    protected $_validate = array(
        array('login_name', '', '管理员名称已经存在！', 1, 'unique', 1), // 在新增的时候验证name字段是否唯一
        array('login_psd','login_pwd','确认密码不正确',1,'confirm'), // 验证确认密码是否和密码一致
    );
}