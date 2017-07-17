<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Excel extends CI_Controller {

  var $_headers = [
    'subject',
    'course',
    'section',
    'termm',
    'primary act type',
    'days',
    'start time',
    'end time',
    'faculty name'
  ];

  public function __construct()
  {
    parent::__construct();
    $this->load->library('excel/phpexcel');
    $this->load->library('excel/filters/myreadfilter');
  }

  public function test()
  {
    $data['msg'] = time();
    $this->load->view('temp/display', $data);
  }

  public function index($sheetName)
  {
    $sheetName = urldecode($sheetName);

    $file = './files/edplan.xlsx';
    if (!file_exists($file) || !isset($sheetName)) {
      return;
    }

    $objReader = PHPExcel_IOFactory::createReaderForFile($file);
    $objReader->setLoadSheetsOnly($sheetName);
    $objPHPExcel = $objReader->load($file);
    $objWorksheet = $objPHPExcel->getActiveSheet();

    $cell_collection = $objWorksheet->getCellCollection();
    foreach ($cell_collection as $cell) {
      $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
      $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
      $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
      if ($row == 1) {
        if (in_array(strtolower($data_value),$this->_headers)) {
          $header[$row][$column] = $data_value;
          $this->_headers[strtolower($data_value)] = $column;
        }
      } else {
        if (in_array($column,$this->_headers)) {
          if ($column == $this->_headers['start time'] || $column == $this->_headers['end time']) {
            $arr_data[$row][$column] = PHPExcel_Style_NumberFormat::toFormattedString($objPHPExcel->getActiveSheet()->getCell($cell)->getCalculatedValue(), 'hh:mm:ss');
          } else {
            $arr_data[$row][$column] = $data_value;
          }
        }
      }
    }

    $output = array('header'=>$header,'arr_data'=>$arr_data);
    $data['data'] = $output;
    $this->load->view('temp/test_excel', $data);
  }
}
