<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class ArticleModel extends RelationModel{
    //关联模式
    protected $_link = array(
         'Classify'=>array(
             'mapping_type'      => self::BELONGS_TO,
             'class_name'        => 'Classify', //分类的表
             'foreign_key'   => 'classify_id',  //关联的id
             'as_fields' => 'classify_name',   //要的字段
         ) ,
        'Login'=>array(
            'mapping_type'      => self::BELONGS_TO,
            'class_name'        => 'Login',  //管理员的表
            'foreign_key'   => 'login_id',   //关联的id
            'as_fields' => 'login_name',     //要的字段
        ),
        'Label' => array(
            'mapping_type'      =>  self::MANY_TO_MANY,     //多对多属性
            'class_name'        =>  'Label',                //关联表
            'mapping_name'      =>  'art_label',            //新字段名称
            'relation_table'    =>  'blogs_label_article',   //中间表名称
        )
    );
    //自动验证
    protected $_validate = array(
        array('article_title', '', '文章名称已经存在！', 1, 'unique', 3), // 在新增的时候验证name字段是否唯一
    );

}