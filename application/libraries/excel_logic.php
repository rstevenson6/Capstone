<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Excel_logic
{
  var $_headers = [ //temp XXX // Change to use databse headers
    'subject',
    'course',
    'section',
    'term',
    'primary act type',
    'days',
    'start time',
    'end time',
    'faculty name'
  ];
  
  public function extractExcelData($file)
  {
    $objReader = PHPExcel_IOFactory::createReaderForFile($file);
    $objPHPExcel = $objReader->load($file);
    $objWorksheet = $objPHPExcel->getActiveSheet();

    $cell_collection = $objWorksheet->getCellCollection();
    foreach ($cell_collection as $cell) {
      $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
      $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
      $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
      if ($row == 1) { // Row 1 contains headers
        //If the header is in the predefined header list..
        if (in_array(strtolower($data_value),$this->_headers)) {
          $header[$row][$column] = $data_value;
          $headerCols[strtolower($data_value)] = $column;
        }
      } else {
        if (in_array($column,$headerCols)) {
          // Convert Excel time to readable time
          if ($column == $headerCols['start time'] || $column == $headerCols['end time']) {
            $arr_data[$row][$column] = PHPExcel_Style_NumberFormat::toFormattedString($objPHPExcel->getActiveSheet()->getCell($cell)->getCalculatedValue(), 'hh:mm:ss');
          } else {
            $arr_data[$row][$column] = $data_value;
          }
        }
      }
    }

    return array('header'=>$header,'arr_data'=>$arr_data,'headerCols'=>$headerCols);
  }
}
