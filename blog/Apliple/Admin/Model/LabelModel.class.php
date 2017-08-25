<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class LabelModel extends RelationModel{
    //自动验证
    protected $_validate = array(
        array('label_name', '', '标签名称已经存在！', 1, 'unique', 1), // 在新增的时候验证name字段是否唯一
    );
}