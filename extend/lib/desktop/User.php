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

 * 时间: 2018-03-17 23:28:45
 */   namespace lib\desktop;  use think\Session;  use think\Db;    class User {            public function getuser(){          return Session::get();      }            public function add($data){          $data['pwd']= password_encode(http_build_query($data));          if(isset($data['uid'])){              $return=Admin::where(['uid'=>$data['uid']])->update($data);          }else{              $return=Admin::save($data);          }          return $return;      }            public static function verify_pwd($data){          $where=['uname'=>$data['uname']];          $admin= appModel('desktop', 'DesktopUser')->where($where)->find();          if($admin){              $admin=$admin->toArray();              if(!password_verify(sha1(sha1(sha1(http_build_query($data)))), $admin['pwd']))$admin=false;          }          return $admin;      }  }  