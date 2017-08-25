<?php
namespace Home\Model;
use Think\Model\RelationModel;
class ArticleModel extends RelationModel{
    //关联模式
    protected $_link = array(
         'Classify'=>array(
             'mapping_type'      => self::BELONGS_TO,
             'class_name'        => 'Classify',
             'foreign_key'   => 'classify_id',
             'as_fields' => 'classify_name',
         ) ,
        'Login'=>array(
            'mapping_type'      => self::BELONGS_TO,
            'class_name'        => 'Login',
            'foreign_key'   => 'login_id',
            'as_fields' => 'login_name',
        ),
        'Label' => array(
            'mapping_type'      =>  self::MANY_TO_MANY,     //多对多属性
            'class_name'        =>  'Label',                //关联表
            'mapping_name'      =>  'art_label',            //新字段名称
            'relation_table'    =>  'blogs_label_article',   //中间表名称
        ),
        'Comment'=>array(
            'mapping_type'      => self::BELONGS_TO,
            'class_name'        => 'Comment',
            'foreign_key'   => 'article_id',
        )
    );


}