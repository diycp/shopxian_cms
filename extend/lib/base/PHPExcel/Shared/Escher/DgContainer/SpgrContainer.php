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
 */       class PHPExcel_Shared_Escher_DgContainer_SpgrContainer  {            private $parent;              private $children = array();              public function setParent($parent)      {          $this->parent = $parent;      }              public function getParent()      {          return $this->parent;      }              public function addChild($child)      {          $this->children[] = $child;          $child->setParent($this);      }              public function getChildren()      {          return $this->children;      }              public function getAllSpContainers()      {          $allSpContainers = array();            foreach ($this->children as $child) {              if ($child instanceof PHPExcel_Shared_Escher_DgContainer_SpgrContainer) {                  $allSpContainers = array_merge($allSpContainers, $child->getAllSpContainers());              } else {                  $allSpContainers[] = $child;              }          }            return $allSpContainers;      }  }  