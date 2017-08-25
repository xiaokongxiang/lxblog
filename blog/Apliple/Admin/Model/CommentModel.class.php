<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class CommentModel extends RelationModel
{
    //关联模式
    protected $_link = array(
        'User' => array(
            'mapping_type' => self::BELONGS_TO,
            'class_name' => 'User', //分类的表
            'foreign_key' => 'user_id',  //关联的id
        )
    );
}
?>