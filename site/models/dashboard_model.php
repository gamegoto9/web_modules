<?php

class Dashboard_model extends CI_Model {

    function _construct() {

        parent::_construct();
    }

    public function getData() {
        $query = $this->db->query('SELECT SQL_CALC_FOUND_ROWS 
student.student_id,name,lname,sub_name,major_name,level,type,year
	 		FROM student,subject,major
			WHERE student.study_sub_id = subject.study_sub_id and subject.major_id = major.major_id
	 		ORDER BY student.student_id DESC;');
        return $query->result_array();
    }

    public function getDataByid($id) {
        $query = $this->db->get_where('student', array('id' => $id));
        return $query->row_array();
    }

    public function getData1() {
        $query = $this->db->query('SELECT SQL_CALC_FOUND_ROWS 
student.student_id,name,lname,sub_name,major_name,level,type,year
	 		FROM student,subject,major
			WHERE student.study_sub_id = subject.study_sub_id and subject.major_id = major.major_id
	 		ORDER BY student.student_id DESC;');
        return $query->result_array();
    }

    function get_university() {
     $query = $this->db->query('
        SELECT
        international_support.name,
        international_support.id
        FROM
        international_support
        GROUP BY 
        international_support.name
        ');

     return $query;
 }

    
    
    public function ListKm() {
        
        
        $km = $this->db->query('SELECT * FROM km');
        return $km->result_array();
    }

}

?>
