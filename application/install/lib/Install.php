<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 18:24:39
            */
        
namespace app\install\lib; 
use think\Config; 
use think\Db; 
 
class Install { 
    private  $mysqli=NULL; 
    
    public function link($dbHost,$dbUser,$dbPwd,$dbName,$dbport){ 
       $this->mysqli=new \mysqli($dbHost, $dbUser, $dbPwd, $dbName,$dbport); 
       if(mysqli_connect_errno()) 
        { 
           echo 0;die; 
        } 
        $this->mysqli->set_charset('utf8'); 
        return $this->mysqli; 
         
         
    } 
    public function isExists($dbName){ 
        return $this->mysqli->query("create database if not exists `{$dbName}` "); 
    } 
    public function install($name){ 
        (new \app\base\controller\AdminApp(null, false))->updatDbstruct($name); 
         
        return 1; 
    } 
 
    public function intallDesktop($name){ 
        $app_config= include shopXianEnv('app_path').$name.DIRECTORY_SEPARATOR.'app.php'; 
        $row=appModel('base', 'BaseApp')->find($name); 
        if($row)appModel('base', 'BaseApp')->where(['app_id'=>$name])->update(['enabled'=>'true','app_name'=>$app_config['name'],'description'=>$app_config['description']]); 
         
        if($row==false)appModel('base', 'BaseApp')->isUpdate(false)->save(['app_id'=>$name,'enabled'=>'true','app_name'=>$app_config['name'],'description'=>$app_config['description']]); 
        if(file_exists(shopXianEnv('app_path').$name.DIRECTORY_SEPARATOR.'desktop.php')){ 
            $res = include shopXianEnv('app_path').$name.DIRECTORY_SEPARATOR.'desktop.php'; 
            $Update=new \app\base\command\Update(); 
            foreach($res as $k0=>$v0){ 
                $top_id= $Update->update($v0, 0); 
                if(isset($v0['menu'])){ 
                    foreach($v0['menu'] as $k1=>$v1){ 
                        $top_id1= $Update->update($v1, $top_id); 
                        if(isset($v1['menu'])){ 
                            foreach($v1['menu'] as $k2=>$v2){ 
                                $Update->update($v2, $top_id1); 
                            } 
                        } 
                    } 
                } 
            } 
        } 
    } 
 
    public function writeConf($post){ 
        return (new \app\base\command\Install())->writeConf($post); 
    } 
} 
