<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class ClassifyModel extends RelationModel
{
    //自动验证
    protected $_validate = array(
        array('classify_name', '', '分类名称已经存在！', 1, 'unique', 3), // 在新增的时候验证name字段是否唯一
    );

}