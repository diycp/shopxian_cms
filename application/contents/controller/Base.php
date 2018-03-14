<?php 
 
namespace app\contents\controller; 
use lib\base\SiteController; 
class Base extends SiteController{ 
    protected $df_style='default'; 
    function initialize() { 
        parent::initialize(); 
        $in_field=['cfg_contents_logo'=>'cms站点logo','cfg_contents_indexname'=>'cms主页链接名','cfg_contents_webname'=>'cms网站名称','cfg_contents_df_style'=>'cms模板风格','cfg_contents_powerby'=>'cms网站版权信息','cfg_contents_keywords'=>'cms站点默认关键字','cfg_contents_description'=>'cms站点描述','cfg_contents_beian'=>'cms网站备案号']; 
        $codes=appModel('base', 'BaseAppConfig')->where('code','in', array_keys($in_field))->cache(3)->column('value','code'); 
        $this->df_style=$codes['cfg_contents_df_style']; 
        $this->assign('cfg_logo', $codes['cfg_contents_logo']); 
        $this->assign('cfg_beian', $codes['cfg_contents_beian']); 
        $this->assign('cfg_description', $codes['cfg_contents_description']); 
        $this->assign('cfg_df_style', $codes['cfg_contents_df_style']); 
        $this->assign('cfg_indexname', $codes['cfg_contents_indexname']); 
        $this->assign('cfg_keywords', $codes['cfg_contents_keywords']); 
        $this->assign('cfg_powerby', $codes['cfg_contents_powerby']); 
        $this->assign('cfg_webname', $codes['cfg_contents_webname']); 
    } 
     
    protected function getModelName($db_name){ 
        $model_file=explode('_', $db_name); 
         $model='Model不存在'; 
        if($model_file&&  is_array($model_file)){ 
            $model=''; 
            foreach($model_file as $k2=>$v2){ 
                $model.=strtoupper($v2[0]).substr($v2, 1); 
            } 
        }     
        return $model; 
    } 
} 
