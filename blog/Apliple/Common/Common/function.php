<?php
        /*
         *config
         * 公共的配置
         * **/
        function config()
        {
            $config = S('config');
                if($config){
                    return $config;
                }else{
                    $data = M('Deploy')->select();
                    foreach($data as $key=>$val){
                        $config[$val['key']] = $val['value'];
                    }
                    S('config',$config);
                    return $config;
                }

        }
?>