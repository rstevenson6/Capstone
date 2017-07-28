<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testing extends CI_Controller
{

    public function __construct()
    {
        parent:: __construct();
        $this->load->library("unit_test");
        $this->load->model("db_model");
    }

    public function index()
    {
        $this->unit->run($this->db_model->InsertClass("HIST", 100, "001", 1, "LEC", "MWF", "09:30:00", "10:20:00", "Lawrence, Ramon", "Assistant, Teacher"),TRUE, "Insert Class Test");
        $this->unit->run($this->db_model->InsertProf("Doe, John", "COSC", 5), TRUE, "Insert Prof Test");
        $this->unit->run($this->db_model->InsertTA("Doe, Jane", "CHEM", 3), TRUE, "Insert TA Test");
        $this->unit->run($this->db_model->RemoveSection("PHIL", 331, "001"), TRUE, "Remove Section Test");
        $this->unit->run($this->db_model->DeleteProf("Lowe-Walker, Ruth"), TRUE, "Delete Prof Test");
        $this->unit->run($this->db_model->DeleteTA("Assistant, Teacher"), TRUE, "Delete TA Test");
        $this->unit->run($this->db_model->updateSectionTime("STAT", 311, "001", "MWF", "08:30:00", "09:20:00"), TRUE, "Update Time Test");
        $this->unit->run($this->db_model->updateSectionProf("COSC", 304, "001", "Yu, James"), TRUE, "Update teacher test");
        $this->unit->run($this->db_model->updateSectionTA("COSC", 304, "001", "Assistant, Teacher"), TRUE, "Update teacher test");
        $this->load->view('tests');
    }
}
