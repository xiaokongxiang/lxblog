<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class ConnectModel extends RelationModel
{
    //自动验证
    protected $_validate = array(
        array('connect_name', '', '网站名称已经存在！', 1, 'unique', 3), // 在新增的时候验证name字段是否唯一
    );

}