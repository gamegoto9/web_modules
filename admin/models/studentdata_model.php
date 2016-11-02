<?php

class Studentdata_model extends CI_Model {

    function _construct() {

        parent::_construct();
    }

    function insert_data() {
        $data = array(
            'passport_number' => "555",
            
        );
        $this->db->insert('student_2015', $data);

        return $this->db->insert_id();
        
       // $this->db->insert('student_2016', $data);
//        $afftectedRows = $this->db->affected_rows();
//
//        if ($afftectedRows > 0) {
//            return TRUE;
//        } else {
//            return FALSE;
//        }
    }

}

?>
