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

    public function loadClasses()
    {
        $sql = "SELECT * FROM class";
        $query = $this->db->query($sql);

        return $query;
    }

    public function loadClassesByTerm($term)
    {
        $sql = "SELECT * FROM class WHERE term = ?";
        $query = $this->db->query($sql, $term);

        return $query;
    }

    public function loadClassesByProf($prof)
    {
        $sql = "SELECT * FROM class WHERE instructor = ?";
        $query = $this->db->query($sql, $prof);

        return $query;
    }

    public function loadClassesByTA($TA)
    {
        $sql = "SELECT * FROM class WHERE TAName = ?";
        $query = $this->db->query($sql, $TA);

        return $query;
    }

    public function loadProfs()
    {
        $sql = "SELECT * FROM instructors";
        $query = $this->db->query($sql);

        return $query;
    }

    public function loadTAs()
    {
        $sql = "SELECT * FROM TA";
        $query = $this->db->query($sql);

        return $query;
    }

    public function loadClassKeys()
    {
        $sql = "SELECT subj, courseNo, section FROM class";
        $query = $this->db->query($sql);

        return $query;
    }

    public function loadProfKeys()
    {
        $sql = "SELECT name FROM instructors";
        $query = $this->db->query($sql);

        return $query;
    }

    public function loadTAKeys()
    {
        $sql = "SELECT name FROM TA";
        $query = $this->db->query($sql);

        return $query;
    }

    public function loadHeaders()
    {
        return $this->db->get('excelheader');
    }

    public function loadUsers()
    {
        return $this->db->get('user');
    }

    public function loadUser($userName)
    {
        return $this->db->get_where('user', array('userName' => $userName));
    }

    #INSERT FUNCTIONS: InsertClass, InsertProf, InsertTA

    public function insertClass($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $instructor, $TAName)
    {
        $sql = "INSERT into class VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->db->query($sql, array($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $instructor, $TAName));

        return $query;
    }

    public function insertProf($name, $dept, $unit)
    {
        $sql = "INSERT into instructors VALUES (?, ?, ?)";
        $query = $this->db->query($sql, array($name, $dept, $unit));

        return $query;
    }

    public function insertTA($name, $year, $faculty)
    {
        $sql = "INSERT into TA VALUES (?, ?, ?)";
        $query = $this->db->query($sql, array($name, $year, $faculty));

        return $query;
    }

    public function insertHeaders($header)
    {
        $data = array(
          'header' => $header
        );
        return $this->db->insert('excelheader', $data);
    }

    public function insertUsers($userName, $userRole)
    {
        $data = array(
          'userName' => $userName,
          'userRole' => $userRole
        );
        return $this->db->insert('user', $data);
    }

    #REMOVE FUNCTIONS: deleteClass

    public function deleteClass($subj, $courseNo, $section)
    {
        $sql = "DELETE FROM class WHERE subj = ? AND courseNo = ? AND section = ?";
        $query = $this->db->query($sql, array($subj, $courseNo, $section));

        return $query;
    }

    public function deleteProf($name)
    {
        $sql = "DELETE FROM instructors WHERE name = ?";
        $query = $this->db->query($sql, $name);

        return $query;
    }

    public function deleteTA($name)
    {
        $sql = "DELETE FROM TA WHERE name = ?";
        $query = $this->db->query($sql, $name);

        return $query;
    }

    public function deleteAllExcelData()
    {
        $query1 = $this->db->empty_table('instructors');
        $query2 = $this->db->empty_table('class');
        $query3 = $this->db->empty_table('ta');

        return $query1 && $query2 && $query3;
    }

    public function deletetHeader($header)
    {
        $data = array(
          'header' => $header
        );
        return $this->db->delete('excelheader', $data);
    }

    public function deleteUser($userName)
    {
        $data = array(
          'userName' => $userName
        );
        return $this->db->delete('user', $data);
    }

    #UPDATE FUNCTIONS: UpdateClass, UpdateClassProf, UpdateClassTA

    public function updateClass($subj, $courseNo, $section, $term, $actType, $days, $startTime, $endTime, $prof, $TA)
    {
        $sql = "UPDATE class SET term = ?, actType = ?, days = ?, startTime = ?, endTime = ?, instructor = ?, TAName = ? WHERE subj = ? AND courseNo = ? AND section = ?";
        $query = $this->db->query($sql, array($term, $actType, $days, $startTime, $endTime, $prof, $TA, $subj, $courseNo, $section));

        return $query;
    }

    public function updateClassTime($subj, $courseNo, $section, $days, $startTime, $endTime)
    {
        $sql = "UPDATE class SET days = ?, startTime = ?, endTime = ? WHERE subj = ? AND courseNo = ? AND section = ?";
        $query = $this->db->query($sql, array($days, $startTime, $endTime, $subj, $courseNo, $section));

        return $query;
    }

    public function updateClassProf($subj, $courseNo, $section, $name)
    {
        $sql = "UPDATE class SET instructor = ? WHERE subj = ? AND courseNo = ? AND section = ?";
        $query = $this->db->query($sql, array($name, $subj, $courseNo, $section));

        return $query;
    }

    public function updateClassTA($subj, $courseNo, $section, $name)
    {
        $sql = "UPDATE class SET TAName = ? WHERE subj = ? AND courseNo = ? AND section = ?";
        $query = $this->db->query($sql, array($name, $subj, $courseNo, $section));

        return $query;
    }

    public function updateHeader($header)
    {
        $this->db->set('header', $data);
        return $this->db->update('excelheader');
    }

    public function updateUsername($userName)
    {
        $this->db->set('userName', $data);
        return $this->db->update('user');
    }

    public function updateUserRole($userName, $userRole)
    {
        $this->db->set('userRole', $userRole);
        return $this->db->update('user');
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
