<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Excel extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('excel/phpexcel');
  }

  public function index()
  {
    $file = './files/test.xlsx';
    $sheetName = 'Sheet2';

    $objReader = PHPExcel_IOFactory::createReaderForFile($file);
    $objReader->setLoadSheetsOnly($sheetName);

    //read file from path
    $objPHPExcel = $objReader->load($file);

    //get only the Cell Collection
    $objWorksheet = $objPHPExcel->getActiveSheet();

    $cell_collection = $objWorksheet->getCellCollection();
    //extract to a PHP readable array format
    foreach ($cell_collection as $cell) {
      $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
      $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
      $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

      //header will/should be in row 1 only. of course this can be modified to suit your need.
      if ($row == 1) {
        $header[$row][$column] = $data_value;
      } else {
        $arr_data[$row][$column] = $data_value;
      }
    }

    $output = array('header'=>$header,'arr_data'=>$arr_data);

    //send the data in an array format
    $data['data'] = $output;

    $this->load->view('temp/test_excel', $data);
  }
}
