<?php


class TestingController extends CI_Controller
{

    public function __construct()
    {
        parent:: __construct();
        $this->load->library("unit_test");
    }

    public function index()
    {
        $this->unit->run(InsertClass(HIST, 100, "001", 1, "LEC", "MWF", "09:30:00", "10:20:00", "Lawrence, Ramon", "Assistant, Teacher"),"Success", "Insert Class Test");
        $this->unit->run(InsertProf("Doe, John", "COSC", 5), "Success", "Insert Prof Test");
        $this->unit->run(InsertTA("Doe, Jane", "CHEM", 3), "Success", "Insert TA Test");
        $this->unit->run(RemoveSection("PHIL", 331, "001"), "Success", "Remove Section Test");
        $this->unit->run(DeleteProf("Lowe-Walker, Ruth"), "Success", "Delete Prof Test");
        $this->unit->run(DeleteTA("Assistant, Teacher"), "Success", "Delete TA Test");
        $this->unit->run(updateSectionTime("STAT", 311, "001", "MWF", "08:30:00", "09:20:00"), "Success", "Update Time Test");
        $this->unit->run(updateSectionTeacher("Yu, James", "COSC", 304, "001"), true, "Update teacher test");
        $this->unit->run(updateSectionTA("Assistant, Teacher", "COSC", 304, "001"), true, "Update teacher test");

    }
}

?>