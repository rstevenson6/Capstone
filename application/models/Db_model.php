<?php

class Db_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    #LOAD FUNCTIONS: LoadClasses LoadProfs, LoadTAs

    public function loadClass($subj, $courseNo, $section)
    {
        $sql = "SELECT * FROM class WHERE subj = ? AND courseNo = ? AND section = ?";
        $query = $this->db->query($sql, array($subj, $courseNo, $section));

        return $query;
    }

    public function loadProf($name)
    {
        $sql = "SELECT * FROM instructors WHERE name = ?";
        $query = $this->db->query($sql, $name);

        return $query;
    }

    public function loadTA($name)
    {
        $sql = "SELECT * FROM TA WHERE name = ?";
        $query = $this->db->query($sql, $name);

        return $query;
    }

    public function LoadClasses()
    {
        $sql = "SELECT * FROM class";
        $query = $this->db->query($sql);

        return $query;
    }

    public function LoadClassesByTerm($term)
    {
        $sql = "SELECT * FROM class WHERE term = ?";
        $query = $this->db->query($sql, $term);

        return $query;
    }

    public function LoadProfs()
    {
        $sql = "SELECT * FROM instructors";
        $query = $this->db->query($sql);

        return $query;
    }

    public function LoadTAs()
    {
        $sql = "SELECT * FROM TA";
        $query = $this->db->query($sql);

        return $query;
    }

    public function LoadClassKeys()
    {
        $sql = "SELECT subj, courseNo, section FROM class";
        $query = $this->db->query($sql);

        return $query;
    }

    public function LoadProfKeys()
    {
        $sql = "SELECT name FROM instructors";
        $query = $this->db->query($sql);

        return $query;
    }

    public function LoadTAKeys()
    {
        $sql = "SELECT name FROM TA";
        $query = $this->db->query($sql);

        return $query;
    }


    #INSERT FUNCTIONS: InsertClass, InsertProf, InsertTA

    public function InsertClass($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $instructor, $TAName)
    {
        $sql = "INSERT into class VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->db->query($sql, array($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $instructor, $TAName));

        return $query;
    }

    public function InsertProf($name, $dept, $unit)
    {
        $sql = "INSERT into instructors VALUES (?, ?, ?)";
        $query = $this->db->query($sql, array($name, $dept, $unit));

        return $query;
    }

    public function InsertTA($name, $year, $faculty)
    {
        $sql = "INSERT into TA VALUES (?, ?, ?)";
        $query = $this->db->query($sql, array($name, $year, $faculty));

        return $query;
    }


    #REMOVE FUNCTIONS: removeSection

    public function RemoveSection($subj, $courseNo, $section)
    {
        $sql = "DELETE FROM class WHERE subj = ? AND courseNo = ? AND section = ?";
        $query = $this->db->query($sql, array($subj, $courseNo, $section));

        return $query;
    }

    public function DeleteProf($name)
    {
        $sql = "DELETE FROM instructors WHERE name = ?";
        $query = $this->db->query($sql, $name);

        return $query;
    }

    public function DeleteTA($name)
    {
        $sql = "DELETE FROM TA WHERE name = ?";
        $query = $this->db->query($sql, $name);

        return $query;
    }


    #UPDATE FUNCTIONS: UpdateSection, UpdateSectionTeacher, UpdateSectionTa

    public function updateSectionTime($subj, $courseNo, $section, $days, $startTime, $endTime)
    {
        $sql = "UPDATE class SET days = ?, startTime = ?, endTime = ? WHERE subj = ? AND courseNo = ? AND section = ?";
        $query = $this->db->query(array($sql, array($days, $startTime, $endTime, $subj, $courseNo, $section)));

        return $query;
    }

    public function updateSectionProf($subj, $courseNo, $section, $name)
    {
        $sql = "UPDATE class SET instructor = ? WHERE subj = ? AND courseNo = ? AND section = ?";
        $query = $this->db->query(array($sql, array($name, $subj, $courseNo, $section)));

        return $query;
    }

    public function updateSectionTA($subj, $courseNo, $section, $name)
    {
        $sql = "UPDATE class SET TAName = ? WHERE subj = ? AND courseNo = ? AND section = ?";
        $query = $this->db->query(array($sql, array($name, $subj, $courseNo, $section)));

        return $query;
    }
    #Search Queries:

    public function searchProf($name){
        $sql = "SELECT * FROM instructors WHERE NAME LIKE %?%;";
        $query = $this->db->query(array($sql,$name));

        return $query;
    }

    public function searchTA($name){
        $sql = "SELECT * FROM TA WHERE NAME LIKE %?%;";
        $query = $this->db->query(array($sql,$name));

        return $query;
    }
}

?>