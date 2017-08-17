<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Excel extends CI_Controller {

  var $_headers=[];

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in')) {
			redirect('index');
		}

    $this->load->model('db_model');
    $this->load->library('excel/Lib_PHPExcel');
    $this->load->library('excel_import_logic');
    $this->load->helper('file');

    $headers = $this->db_model->loadHeaders()->result_array();
    foreach ($headers as $row) {
      array_push($this->_headers, $row['header']);
    }
  }

  public function import()
  {
    //$file = './files/test_excel_files/edplan.xlsx'; // temp: for testing
    $file = $_SESSION['file'];
    if (!isset($file) || !file_exists($file)) {
      show_404();
      exit();
    }

    $this->db_model->deleteAllExcelData();
    $output = $this->excel_import_logic->extractExcelData($file,$this->_headers);

    if (!$this->_saveDataToDatabase($output)) {
      show_404();
    }

    // delete file
    unlink($file);

    // remove file path
    unset($_SESSION['file']);

    redirect('/timetable');
  }

  public function export()
  {
    $query = $this->db_model->loadClasses();

    if(!$query)  {
      return false;
    }

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
    $objPHPExcel->setActiveSheetIndex(0);

    $fields = $query->list_fields();
    $objPHPExcel->getActiveSheet()->fromArray($fields, null, "A1");
    $objPHPExcel->getActiveSheet()->fromArray($query->result_array(), null, "A2");
    $objPHPExcel->setActiveSheetIndex(0);

    // Sending headers to force the user to download the file
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="edplan_'.date('dMy').'.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    //$objWriter->save('./files/edplan_'.date('dMy').'.xlsx'); //uncoment to save a local copy
    $objWriter->save('php://output');
  }

  // Currently does NOT import TAs
  private function _saveDataToDatabase($data)
  {
    $this->db->trans_start();
    $profs=[]; // to keep trach of seen profs
    foreach ($data['arr_data'] as $items) {
      $profName=$dept=$unit=null;
      $profName = $items[$data['headerCols']['faculty name']];
      $dept = $items[$data['headerCols']['subject']];
      if (!in_array($profName,$profs) && isset($profName)) {
        // save prof to database | this needs to happen first because of foreign key constraints
        $this->db_model->insertProf($profName, $dept, $unit);
        array_push($profs,$profName);
      }
    }
    for ($i=2;$i<count($data['header'][1])+2;$i++) {
      $subj=$courseNo=$section=$term=$actType=$days=$startTime=$endTime=$instructor=$TAName=null;
      try {
        foreach ($data['headerCols'] as $key => $value) {
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
              throw new Exception("Error: unknown key", 1);
              break;
          }
        }
      } catch (Exception $e) {
        echo "Exception: ", $e->getMessage(),"\n";
        return false;
      }
      // save class to database
      $this->db_model->insertClass($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $instructor, $TAName);
    }
    $this->db->trans_complete();
    return true;
  }
}
