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

 * 时间: 2018-03-17 23:28:31
 */  
namespace app\contents\controller; 
 
class Index extends Base{     
    public function index(){ 
        $this->assign('outermost_cid', 0); 
        return $this->template('contents', $this->df_style, 'index',[],[],true); 
    } 
    public function wap(){ 
        $domain=request()->domain().explode('index.php', $_SERVER['SCRIPT_NAME'])[0]; 
        $css_dir=''; 
        $dir='template/'.$this->site_type.'/'; 
        $css_dir=$dir.'css'; 
        echo $domain.$css_dir; 
        print_r($_SERVER); 
        die; 
        return $this->showTpl(); 
    } 
} 
