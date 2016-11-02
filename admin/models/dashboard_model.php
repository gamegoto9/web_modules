<?php

class Dashboard_model extends CI_Model {

    function _construct() {

        parent::_construct();
    }

    public function getData($type) {

        if ($type == "07") {
            $query = $this->db->query('SELECT SQL_CALC_FOUND_ROWS 
                student.student_id,name,lname,sub_name,major_name,level,type,year
                FROM student,subject,major
                WHERE student.study_sub_id = subject.study_sub_id and subject.major_id = major.major_id
                ORDER BY student.student_id DESC;');
        }
        return $query->result_array();
    }

    public function getDataByid($id) {
        $query = $this->db->get_where('student', array('id' => $id));
        return $query->row_array();
    }

    public function getData_duruble_goods($type) {


        $query = $this->db->get_where('durable_goods', array('address' => $type, 'status' => '1'));

        return $query->result_array();
    }
    
    public function getData_duruble_goods_new($type) {


//        $query = $this->db->get_where('durable_goods_2016', array('standard' => $type, 'status' => '1'));
        $query = $this->db->query('select * from durable_goods_2016 order by year desc');

        return $query->result_array();
    }

    public function getData_duruble_goods_new_type($type) {


        $query = $this->db->get_where('durable_goods_2016', array('standard' => $type, 'status' => '1'));
//        $query = $this->db->query('select * from durable_goods_2016 order by year desc');

        return $query->result_array();
    }

    public function getData_duruble_goods_new_type2($type,$query2) {


        $query = $this->db->query("SELECT * 
        FROM durable_goods_2016
        WHERE standard = '1' and
        status = '1' and
        id_goods NOT IN($query2)");
        // $query = $this->db->get_where('durable_goods_2016', array('standard' => $type, 'status' => '1'));

        return $query->result_array();
    }
    
    public function data_goods_new($id) {


        $query = $this->db->get_where('durable_goods_2016', array('id_goods' => $id));

        return $query->result_array();
    }

    public function getData_reTurn_goods() {

        $query = $this->db->query('SELECT
            durable_goods.id_goods_crru,
            durable_goods.name_goods,
            durable_goods.brand_goods,
            durable_goods.price,
            personal.`name`,
            detial_goods_return.date

            FROM
            detial_goods_return
            INNER JOIN durable_goods ON durable_goods.id_goods = detial_goods_return.id_goods
            INNER JOIN personal ON detial_goods_return.Pid = personal.Pid;');

        return $query->result_array();
    }

    public function getTypeDurableGoods() {
        $query = $this->db->get('type_durable_goods');
        return $query->result_array();
    }

}

?>
