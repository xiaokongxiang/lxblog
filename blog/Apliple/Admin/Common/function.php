<?php
/*
 * delFile
 * 删除缓存
 * **/
function delFile($name)
{
    if(file_exists($name)){
        $nameList = opendir($name);
        while(($file = readdir($nameList) ) !== false){
            if($file == '.' || $file == '..'){
                continue;
            }
            if(is_dir($file)){
                delFile($name.$file.'/');
            }else{
                $res = unlink($name.$file);
                if(!$res){
                    return false;
                }
            }
        }
        return true;
        closedir($nameList);
    }
};
/*
 * up
 * 上传图片
 * */
function up(){
    $config = config();
    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =  $config['UPLOAD_SIZE']   ;// 设置附件上传大小
    $upload->exts      =     C('UPLOAD_EXTS');// 设置附件上传类型
    $upload->savePath  =      'Uploads/'; // 设置附件上传目录// 上传文件
    $info   =   $upload->uploadOne($_FILES['article_img']);

    if(!$info) {
        // 上传错误提示错误信息
       $upload->getError();
    } else{
        // 上传成功 获取上传文件信息

            $data = $info['savepath'].$info['savename'];
    }
    return $data;
}
/*
 * ri
 * 操作日志
 * **/
 function ri($data)
 {
     $dataLog = array(
         'log_ip'=>get_client_ip(),
         'log_time'=>time(),
         'log_coment'=>$data,
         'login_id'=>session('id')
     );
     M('Log')->add($dataLog);
 }
?>