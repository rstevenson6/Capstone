<?php

class Database_Functions
{
    #LOAD FUNCTIONS: LoadClasses LoadProfs, LoadTAs

    public function LoadClasses()
    {   $sql ="SELECT subj, courseNo, section FROM class ORDER BY subj DESC";
        $query = $this->db->query($sql);

        return $query;
    }

    public function LoadProfs()
    {   $sql = "SELECT * FROM instructors";
        $query = $this->db->query($sql);

        return $query;
    }

    public function LoadTAs()
    {   $sql = "SELECT * FROM TA";
        $query = $this->db->query($sql);

        return $query;
    }

    #INSERT FUNCTIONS: InsertClass, InsertProf, InsertTA
    public function InsertClass($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $instructor, $TAName)
    {
        $sql = "INSERT into class VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->db->query($sql, array($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $instructor, $TAName));

        if ($query == True) {
            return 'Success';
        } else {
            return 'failure';
        }

    }

    public function InsertProf($name, $dept, $unit)
    {   $sql = "INSERT into instructors VALUES (?, ?, ?)";
        $query = $this->db->query($sql, array($name, $dept, $unit));

        if ($query == True) {
            return 'Success';
        } else {
            return 'failure';
        }
    }

    public function InsertTA($name, $year, $faculty)
    {   $sql = "INSERT into TA VALUES (?, ?, ?)";
        $query = $this->db->query($sql, array($name, $year, $faculty));

        if ($query == True) {
            return 'Success';
        } else {
            return 'failure';
        }
    }

    #REMOVE FUNCTIONS: removeSection

    public function RemoveSection($subj, $courseNo, $section)
    {   $sql = "DELETE FROM class WHERE subj = ? AND courseNo = ? AND section = ?";
        $query = $this->db->query($sql, array($subj, $courseNo, $section));

        if ($query == True) {
            return 'Success';
        } else {
            return 'failure';
        }
    }

    public function DeleteProf($name)
    {   $sql ="DELETE FROM instructors WHERE name = ?";
        $query = $this->db->query($sql, $name);

        if ($query == True) {
            return 'Success';
        } else {
            return 'failure';
        }
    }

    public function DeleteTA($name)
    {   $sql = "DELETE FROM TA WHERE name = ?";
        $query = $this->db->query($sql, $name);

        if ($query == True) {
            return 'Success';
        } else {
            return 'failure';
        }
    }

    #UPDATE FUNCTIONS: UpdateSection

    public function updateSectionTime($subj, $courseNo, $section, $days, $startTime, $endTime){
        $sql = "UPDATE class SET days = ?, startTime = ?, endTime = ? WHERE subj = ? AND courseNo = ? AND section = ?";
        $query = $this->db->query(array($sql, array($days, $startTime, $endTime,$subj, $courseNo, $section)));

        if ($query == True) {
            return 'Success';
        } else {
            return 'failure';
        }
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
    public function updateSectionTeacher($name, $subj, $courseNo, $section)
    {
        $sql = "UPDATE class SET instructor = ?, WHERE subj = ? AND courseNo = ? AND section = ?";
        $query = $this->db->query(array($sql, array($name, $subj, $courseNo, $section)));

        return $query;
    }

    public function updateSectionTA($subj, $courseNo, $section, $name)
    {
        $sql = "UPDATE class SET TAName = ?, WHERE subj = ? AND courseNo = ? AND section = ?";
        $query = $this->db->query(array($sql, array($name, $subj, $courseNo, $section)));

        return $query;
    }
}