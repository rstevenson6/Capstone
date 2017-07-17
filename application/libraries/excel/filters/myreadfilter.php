<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MyReadFilter implements PHPExcel_Reader_IReadFilter
{
  private $_columns = [];

  public function setColumn($columns)
  {
    $this->_columns = $columns;
  }

  public function readCell($column, $row, $worksheetName = '') {
    return true;

    if (in_array($column,$this->_columns)) {
      return true;
    }
    return false;
  }
}
