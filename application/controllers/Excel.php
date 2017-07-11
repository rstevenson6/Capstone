<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Excel extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('excel_lib');
  }

  public function index()
  {
    $file = './files/test.xlsx';

    //read file from path
    $objPHPExcel = PHPExcel_IOFactory::load($file);

    //get only the Cell Collection
    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

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

    //send the data in an array format
    $data['header'] = $header;
    $data['values'] = $arr_data;
    $output = new \stdClass(); // http://bit.ly/2u6tt24
    $output->header = $header;
    $output->arr_data = $arr_data;
    $data['data'] = json_encode($output);

    $this->load->view('temp/test_excel', $data);
  }

  public function loadtest()
  {
    $this->load->view('temp/test_excel');
  }
}
