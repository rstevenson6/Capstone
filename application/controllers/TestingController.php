<?php


class TestingController extends CI_Controller
{

    public function __construct()
    {
        parent:: __construct();
        $this->load->library("unit_test");
        $this->load->database();
    }

    public function index()
    {
        $this->unit->run(InsertClass("HIST", 100, "001", 1, "LEC", "MWF", "09:30:00", "10:20:00", "Lawrence, Ramon", "Assistant, Teacher"),TRUE, "Insert Class Test");
        $this->unit->run(InsertProf("Doe, John", "COSC", 5), TRUE, "Insert Prof Test");
        $this->unit->run(InsertTA("Doe, Jane", "CHEM", 3), TRUE, "Insert TA Test");
        $this->unit->run(RemoveSection("PHIL", 331, "001"), TRUE, "Remove Section Test");
        $this->unit->run(DeleteProf("Lowe-Walker, Ruth"), TRUE, "Delete Prof Test");
        $this->unit->run(DeleteTA("Assistant, Teacher"), TRUE, "Delete TA Test");
        $this->unit->run(updateSectionTime("STAT", 311, "001", "MWF", "08:30:00", "09:20:00"), TRUE, "Update Time Test");
        $this->unit->run(updateSectionProf("COSC", 304, "001", "Yu, James"), TRUE, "Update teacher test");
        $this->unit->run(updateSectionTA("COSC", 304, "001", "Assistant, Teacher"), TRUE, "Update teacher test");

    }
}

?>