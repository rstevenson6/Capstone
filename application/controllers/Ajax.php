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

    public function getClasses()
    {
        $query = $this->db_model->loadClasses();
        echo json_encode($query->result());
    }
}
