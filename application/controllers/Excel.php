<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Excel extends CI_Controller {

  var $_headers = [
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
  var $_headerCols = [];

  public function __construct()
  {
    parent::__construct();
    $this->load->model('db_model');
    $this->load->library('excel/phpexcel');
  }

  public function index()
  {
    $file = './files/edplan.xlsx';
    if (!file_exists($file)) {
      // TODO: display an error message saying the file was not found
      show_404();
      exit();
    }

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
          $this->_headerCols[strtolower($data_value)] = $column;
        }
      } else {
        if (in_array($column,$this->_headerCols)) {
          // Convert Excel time to readable time
          if ($column == $this->_headerCols['start time'] || $column == $this->_headerCols['end time']) {
            $arr_data[$row][$column] = PHPExcel_Style_NumberFormat::toFormattedString($objPHPExcel->getActiveSheet()->getCell($cell)->getCalculatedValue(), 'hh:mm:ss');
          } else {
            $arr_data[$row][$column] = $data_value;
          }
        }
      }
    }

    $output = array('header'=>$header,'arr_data'=>$arr_data);
    echo var_dump($output);
    $this->saveDataToDatabase($output);
    $data['data'] = $output;
  }

  private function saveDataToDatabase($data)
  {
    $profs=[]; // to keep trach of seen profs
    foreach ($data['arr_data'] as $items) {
      $profName=$dept=$unit=null;
      $profName = $items[$this->_headerCols['faculty name']];
      $dept = $items[$this->_headerCols['subject']];
      if (!in_array($profName,$profs) && isset($profName)) {
        // save prof to database | this needs to happen first because of forein key constraints
        $this->db_model->InsertProf($profName, $dept, $unit);
        array_push($profs,$profName);
      }
    }
    for ($i=2;$i<count($data['header'][1])+2;$i++) {
      $subj=$courseNo=$section=$term=$actType=$days=$startTime=$endTime=$instructor=$TAName=null;
      foreach ($this->_headerCols as $key => $value) {
        switch ($key) {
          case 'subject':
            $subj = $data['arr_data'][$i][$value];
            break;

          case 'course':
            $courseNo = $data['arr_data'][$i][$value];
            break;

          case 'section':
            $section = $data['arr_data'][$i][$value];
            break;

          case 'term':
            $term = $data['arr_data'][$i][$value];
            break;

          case 'primary act type':
            $actType = $data['arr_data'][$i][$value];
            break;

          case 'days':
            $days = $data['arr_data'][$i][$value];
            break;

          case 'start time':
            $startTime = $data['arr_data'][$i][$value];
            break;

          case 'end time':
            $endTime = $data['arr_data'][$i][$value];
            break;

          case 'faculty name':
            $instructor = $data['arr_data'][$i][$value];
            break;

          default:
            exit("Error: unknown key\n".debug_backtrace());
            break;
        }
      }
      // save class to database
      $this->db_model->InsertClass($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $instructor, $TAName);
    }
  }
}
