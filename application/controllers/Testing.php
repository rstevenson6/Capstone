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
        // Save the debug mode
        $db_debug_mode = $this->db->db_debug;
        // Disable debugging for the tests
        //$this->db->db_debug = FALSE;
        
        // Begin transaction in testing mode
        $this->db->trans_start(TRUE);

        $this->runDbTests();

        // End transaction a roll-back to revert changes to db
        $this->db->trans_complete();

        // Restore debug mode
        $this->db->db_debug = $db_debug_mode;

        $this->load->view('tests');
    }

    private function runDbTests()
    {
        $this->insertClassTest();
        $this->insertProfTest();
        $this->insertTATest();
        $this->insertDuplicateClassTest();
        $this->deleteClassTest();
        $this->deleteProfTest();
        $this->deleteTATest();
        $this->updateClassTimeTest();
        $this->updateClassProfTest();
        $this->updateClassTATest();
    }

    private function insertClassTest()
    {
        $this->unit->run($this->db_model->insertClass("FAKE", "190", "001", 1, "LEC", "MWF", "09:30:00", "10:20:00", "Lawrence, Ramon", "Assistant, Teacher"), TRUE, "Insert Class Test");
    }

    private function insertProfTest()
    {
        $this->unit->run($this->db_model->insertProf("Doe, John", "COSC", 5), TRUE, "Insert Prof Test");
    }

    private function insertTATest()
    {
        $this->unit->run($this->db_model->insertTA("Doe, Jane", "CHEM", 3), TRUE, "Insert TA Test");
    }

    private function insertDuplicateClassTest()
    {
        $db_debug_mode = $this->db->db_debug;
	$this->db->db_debug = FALSE;

        $this->db_model->insertTA("Mr twin", "PHYS", 3);
        $this->db_model->insertTA("Mr twin", "PHYS", 3);
        
        $this->db->db_debug = $db_debug_mode;

        $this->unit->run($this->db->error()['code'], 1062, "Insert Duplicate Class Test");
    }

    private function deleteClassTest()
    {
        $this->db_model->insertClass("FAKE", "999", "001", 1, "LEC", "MWF", "09:30:00", "10:20:00", "Lawrence, Ramon", "Assistant, Teacher");
        $this->unit->run($this->db_model->deleteClass("FAKE", 999, "001"), TRUE, "Delete Class Test");
    }

    private function deleteProfTest()
    {
        $this->db_model->insertProf("Mr Fake", "COSC", 5);
        $this->unit->run($this->db_model->deleteProf("Mr Fake"), TRUE, "Delete Prof Test");
    }

    private function deleteTATest()
    {
        $this->db_model->insertTA("Mrs Fake", "CHEM", 3);
        $this->unit->run($this->db_model->deleteTA("Mrs Fake"), TRUE, "Delete TA Test");
    }

    private function updateClassTimeTest()
    {
        $this->db_model->insertClass("FAKE", "998", "001", 1, "LEC", "MWF", "09:30:00", "10:20:00", "Lawrence, Ramon", "Assistant, Teacher");
        $this->unit->run($this->db_model->updateClassTime("FAKE", "998", "001", "MWF", "08:30:00", "09:20:00"), TRUE, "Update Class Time Test");
    }

    private function updateClassProfTest()
    {
        $this->db_model->insertClass("FAKE", "997", "001", 1, "LEC", "MWF", "09:30:00", "10:20:00", "Lawrence, Ramon", "Assistant, Teacher");
        $this->unit->run($this->db_model->updateClassProf("FAKE", "997", "001", "Yu, James"), TRUE, "Update Class Prof Test");
    }

    private function updateClassTATest()
    {
        $this->db_model->insertTA("Doe, Jack", "CHEM", 3);
        $this->db_model->insertClass("FAKE", "996", "001", 1, "LEC", "MWF", "09:30:00", "10:20:00", "Lawrence, Ramon", "Assistant, Teacher");
        $this->unit->run($this->db_model->updateClassTA("FAKE", "996", "001", "Doe, Jack"), TRUE, "Update Class TA Test");
    }
}
