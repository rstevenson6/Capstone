<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('db_model');
    }

    public function index()
    {
        show_404();
    }

    public function getTermOneClasses()
    {
        $query = $this->db_model->loadClassesByTerm(1);
        echo json_encode($query->result());
    }

    public function getTermTwoClasses()
    {
        $query = $this->db_model->loadClassesByTerm(2);
        echo json_encode($query->result());
    }

    public function pushClasses()
    {
        $classes = $this->input->post('classes');

        $this->db->trans_start();
        foreach($classes as $class) {
            $subj = empty($class['subj']) ? null : $class['subj'];
            $courseNo = empty($class['courseNo']) ? null : $class['courseNo'];
            $section = empty($class['section']) ? null : $class['section'];
            $term = empty($class['term']) ? null : $class['term'];
            $actType = empty($class['actType']) ? null : $class['actType'];
            $days = empty($class['days']) ? null : $class['days'];
            $startTime = empty($class['startTime']) ? null : $class['startTime'];
            $endTime = empty($class['endTime']) ? null : $class['endTime'];
            $prof = empty($class['instructor']) ? null : $class['instructor'];
            $TA = empty($class['TAName']) ? null : $class['TAName'];

            switch ($class["type"]) {
                case 'insert':
                    $this->db_model->insertClass($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $prof, $TA);
                    break;

                case 'update':
                    $this->db_model->updateClass($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $prof, $TA);
                    break;

                case 'delete':

                    break;

                default:
                    # code...
                    break;
            }
        }

        $this->db->trans_complete();

        echo $this->db->trans_status();
    }

    public function insertClasses()
    {
        $classes = $this->input->post('classes');

        $this->db->trans_start();
        foreach($classes as $class) {
            $subj = empty($class['subj']) ? null : $class['subj'];
            $courseNo = empty($class['courseNo']) ? null : $class['courseNo'];
            $section = empty($class['section']) ? null : $class['section'];
            $term = empty($class['term']) ? null : $class['term'];
            $actType = empty($class['actType']) ? null : $class['actType'];
            $days = empty($class['days']) ? null : $class['days'];
            $startTime = empty($class['startTime']) ? null : $class['startTime'];
            $endTime = empty($class['endTime']) ? null : $class['endTime'];
            $prof = empty($class['instructor']) ? null : $class['instructor'];
            $TA = empty($class['TAName']) ? null : $class['TAName'];

            $this->db_model->insertClass($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $prof, $TA);
        }

        $this->db->trans_complete();

        echo $this->db->trans_status();
    }

    public function updateClasses()
    {
        $classes = $this->input->post('classes');

        $this->db->trans_start();
        foreach($classes as $class) {
            $subj = empty($class['subj']) ? null : $class['subj'];
            $courseNo = empty($class['courseNo']) ? null : $class['courseNo'];
            $section = empty($class['section']) ? null : $class['section'];
            $term = empty($class['term']) ? null : $class['term'];
            $actType = empty($class['actType']) ? null : $class['actType'];
            $days = empty($class['days']) ? null : $class['days'];
            $startTime = empty($class['startTime']) ? null : $class['startTime'];
            $endTime = empty($class['endTime']) ? null : $class['endTime'];
            $prof = empty($class['instructor']) ? null : $class['instructor'];
            $TA = empty($class['TAName']) ? null : $class['TAName'];

            $this->db_model->updateClass($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $prof, $TA);
        }

        $this->db->trans_complete();

        echo $this->db->trans_status();
    }

    public function insertClass()
    {
        $subj = empty($this->input->post('subj')) ? null : $this->input->post('subj');
        $courseNo = empty($this->input->post('courseNo')) ? null : $this->input->post('courseNo');
        $section = empty($this->input->post('section')) ? null : $this->input->post('section');
        $term = empty($this->input->post('term')) ? null : $this->input->post('term');
        $actType = empty($this->input->post('actType')) ? null : $this->input->post('actType');
        $days = empty($this->input->post('days')) ? null : $this->input->post('days');
        $startTime = empty($this->input->post('startTime')) ? null : $this->input->post('startTime');
        $endTime = empty($this->input->post('endTime')) ? null : $this->input->post('endTime');
        $prof = empty($this->input->post('instructor')) ? null : $this->input->post('instructor');
        $TA = empty($this->input->post('TAName')) ? null : $this->input->post('TAName');

        echo $this->db_model->insertClass($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $prof, $TA);
    }

    public function updateClass()
    {
        $subj = empty($class['subj']) ? null : $class['subj'];
        $courseNo = empty($class['courseNo']) ? null : $class['courseNo'];
        $section = empty($class['section']) ? null : $class['section'];
        $term = empty($class['term']) ? null : $class['term'];
        $actType = empty($class['actType']) ? null : $class['actType'];
        $days = empty($class['days']) ? null : $class['days'];
        $startTime = empty($class['startTime']) ? null : $class['startTime'];
        $endTime = empty($class['endTime']) ? null : $class['endTime'];
        $prof = empty($class['instructor']) ? null : $class['instructor'];
        $TA = empty($class['TAName']) ? null : $class['TAName'];

        echo $this->db_model->updateClass($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $prof, $TA);
    }

    public function getProfClasses()
    {
        $prof = $this->input->post('name');
        $query = $this->db_model->loadClassesByProf($prof);
        echo json_encode($query->result());
    }

    public function getTAClasses()
    {
        $TA = $this->input->post('name');
        $query = $this->db_model->loadClassesByTA($TA);
        echo json_encode($query->result());
    }

    public function getProfs()
    {
        $query = $this->db_model->loadProfKeys();
        echo json_encode($query->result());
    }

    public function getTAs()
    {
        $query = $this->db_model->loadTAKeys();
        echo json_encode($query->result());
    }
}
