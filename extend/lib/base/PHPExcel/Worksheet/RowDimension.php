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
 */       class PHPExcel_Worksheet_RowDimension extends PHPExcel_Worksheet_Dimension  {            private $rowIndex;              private $height = -1;               private $zeroHeight = false;              public function __construct($pIndex = 0)      {                   $this->rowIndex = $pIndex;                     parent::__construct(null);      }              public function getRowIndex()      {          return $this->rowIndex;      }              public function setRowIndex($pValue)      {          $this->rowIndex = $pValue;          return $this;      }              public function getRowHeight()      {          return $this->height;      }              public function setRowHeight($pValue = -1)      {          $this->height = $pValue;          return $this;      }              public function getZeroHeight()      {          return $this->zeroHeight;      }              public function setZeroHeight($pValue = false)      {          $this->zeroHeight = $pValue;          return $this;      }  }  