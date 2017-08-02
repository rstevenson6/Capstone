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
