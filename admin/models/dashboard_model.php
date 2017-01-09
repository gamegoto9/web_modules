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

    public function getData_material() {


//        $query = $this->db->get_where('durable_goods_2016', array('standard' => $type, 'status' => '1'));
        $query = $this->db->query('SELECT
            e.MatId,
            e.MatName,
            if(e.qty IS NULL,cnt.qty - if(lend.qty IS NULL,0,lend.qty),(e.qty + if(cnt.qty IS NULL,0,cnt.qty)) - if(lend.qty IS NULL,0,lend.qty)) as qty,


                if(cnt.price IS NULL,e.price,if(e.price IS NULL,cnt.price,e.price)) as price,


                    if(cnt.price IS NULL,if(e.price IS NULL,0,e.price) * if(e.qty IS NULL,0,e.qty),((if(e.price IS NULL,0,e.price)*if(e.qty IS NULL,0,e.qty)) + (cnt.price*cnt.qty))-if((lend.price*lend.qty) IS NULL,0,(lend.price*lend.qty))) as price_totle

                        FROM
                    material_2016 AS e
                    LEFT JOIN (
                    select sum(qty) as qty,price,MatId
                    from buy_material_2016
                    GROUP BY MatId
                    ) AS cnt ON cnt.MatId= e.MatId
                    LEFT JOIN (
                    select sum(qty) as qty,price,MatId
                    from lend_material_2016
                    GROUP BY MatId
                    ) AS lend ON lend.MatId= e.MatId

                    GROUP BY e.MatId');

        return $query;
    }

    public function getData_duruble_goods_new_type($type) {


        $query = $this->db->get_where('durable_goods_2016', array('standard' => $type, 'status' => '1'));
//        $query = $this->db->query('select * from durable_goods_2016 order by year desc');

        return $query->result_array();
    }

    public function getData_duruble_goods_new_type2($type,$query2) {


        $query = $this->db->query("SELECT * 
            FROM durable_goods_2016
            WHERE status = '1' and
            id_goods NOT IN($query2)");
        // $query = $this->db->get_where('durable_goods_2016', array('standard' => $type, 'status' => '1'));

        return $query->result_array();
    }

    public function getData_select_material($query2) {


        $query = $this->db->query("SELECT
            e.MatId,
            e.MatName,
            if(e.qty IS NULL,cnt.qty - if(lend.qty IS NULL,0,lend.qty),(e.qty + if(cnt.qty IS NULL,0,cnt.qty)) - if(lend.qty IS NULL,0,lend.qty)) as qty,


                if(cnt.price IS NULL,e.price,if(e.price IS NULL,cnt.price,e.price)) as price,


                    if(cnt.price IS NULL,if(e.price IS NULL,0,e.price) * if(e.qty IS NULL,0,e.qty),((if(e.price IS NULL,0,e.price)*if(e.qty IS NULL,0,e.qty)) + (cnt.price*cnt.qty))-if((lend.price*lend.qty) IS NULL,0,(lend.price*lend.qty))) as price_totle

                        FROM
                    material_2016 AS e
                    LEFT JOIN (
                    select sum(qty) as qty,price,MatId
                    from buy_material_2016
                    GROUP BY MatId
                    ) AS cnt ON cnt.MatId= e.MatId
                    LEFT JOIN (
                    select sum(qty) as qty,price,MatId
                    from lend_material_2016
                    GROUP BY MatId
                    ) AS lend ON lend.MatId= e.MatId
                    WHERE e.MatId NOT IN($query2)
                    GROUP BY e.MatId
                    ");
        // $query = $this->db->get_where('durable_goods_2016', array('standard' => $type, 'status' => '1'));

        return $query->result_array();
    }


    public function getData_duruble_goods_maxid(){
        $query = $this->db->query("SELECT max(lend_id) as maxID from lend_goods_seq");
        // $query = $this->db->get_where('durable_goods_2016', array('standard' => $type, 'status' => '1'));

        return $query->row();
    }

    public function getData_get_goods_maxid(){
        $query = $this->db->query("SELECT max(get_id) as maxID from get_goods_seq");
        // $query = $this->db->get_where('durable_goods_2016', array('standard' => $type, 'status' => '1'));

        return $query->row();
    }

    public function getData_get_material_maxid(){
        $query = $this->db->query("SELECT max(get_material_id) as maxID from get_material_seq");
        // $query = $this->db->get_where('durable_goods_2016', array('standard' => $type, 'status' => '1'));

        return $query->row();
    }

    public function getData_return_goods_maxid(){
        $query = $this->db->query("SELECT max(return_id) as maxID from return_goods_seq");
        // $query = $this->db->get_where('durable_goods_2016', array('standard' => $type, 'status' => '1'));

        return $query->row();
    }


    public function getData_return_material_maxid(){
        $query = $this->db->query("SELECT max(return_id) as maxID from return_material_seq");
        // $query = $this->db->get_where('durable_goods_2016', array('standard' => $type, 'status' => '1'));

        return $query->row();
    }

    public function getData_material_maxid(){
        $query = $this->db->query("SELECT max(lend_id) as maxID from lend_material_seq");
        // $query = $this->db->get_where('durable_goods_2016', array('standard' => $type, 'status' => '1'));

        return $query->row();
    }
    
    public function data_goods_new($id) {


        $query = $this->db->get_where('durable_goods_2016', array('id_goods' => $id));

        return $query->result_array();
    }

    public function getData_material_id($id){


        $query = $this->db->query("SELECT
            e.MatId,
            e.MatName,
            if(e.qty IS NULL,cnt.qty - if(lend.qty IS NULL,0,lend.qty),(e.qty + if(cnt.qty IS NULL,0,cnt.qty)) - if(lend.qty IS NULL,0,lend.qty)) as qty,


                if(cnt.price IS NULL,e.price,if(e.price IS NULL,cnt.price,e.price)) as price,


                    if(cnt.price IS NULL,if(e.price IS NULL,0,e.price) * if(e.qty IS NULL,0,e.qty),((if(e.price IS NULL,0,e.price)*if(e.qty IS NULL,0,e.qty)) + (cnt.price*cnt.qty))-if((lend.price*lend.qty) IS NULL,0,(lend.price*lend.qty))) as price_totle

                        FROM
                    material_2016 AS e
                    LEFT JOIN (
                    select sum(qty) as qty,price,MatId
                    from buy_material_2016
                    GROUP BY MatId
                    ) AS cnt ON cnt.MatId= e.MatId
                    LEFT JOIN (
                    select sum(qty) as qty,price,MatId
                    from lend_material_2016
                    GROUP BY MatId
                    ) AS lend ON lend.MatId= e.MatId
                    WHERE e.MatId = '$id'");

        return $query;
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

    public function getData_Lend_goods($standard) {

        $query = $this->db->query("SELECT
            e.lend_id as lend_id,
            e.Ddate as Ddate,
            cnt.colCount as count,
            personal.`name` as name,
            SUM(dg.price) as sum
            FROM
            lend_goods_detial AS e
            INNER JOIN (
            select lend_id,count(lend_id) as colCount
            from lend_goods_detial e2 
            group by lend_id
            ) AS cnt ON cnt.lend_id= e.lend_id
            INNER JOIN personal ON e.Pid = personal.Pid
            INNER JOIN (
            select price,id_goods
            from durable_goods_2016 e3 
            ) AS dg ON dg.id_goods= e.id_goods
            WHERE e.standard = '$standard'
            GROUP BY e.lend_id");

        return $query->result_array();
    }


    public function getData_Get_goods() {

        $query = $this->db->query("SELECT
            get_goods_detial.get_id,
            get_goods_detial.Ddate_get,
            get_goods_detial.name_get,
            get_goods_detial.major_get,
            personal.`name`,
            count(*) as count,
            get_goods_detial.status
            FROM
            get_goods_detial
            INNER JOIN personal ON get_goods_detial.Pid = personal.Pid
            GROUP BY get_goods_detial.get_id");

        return $query->result_array();
    }

    public function getData_Get_material() {

        $query = $this->db->query("SELECT
            get_material_detial.get_material_id,
            get_material_detial.Ddate_get,
            get_material_detial.name_get,
            get_material_detial.major_get,
            personal.`name`,
            sum(qty) as count,
            get_material_detial.`status`
            FROM
            get_material_detial
            INNER JOIN personal ON get_material_detial.Pid = personal.Pid
            GROUP BY get_material_detial.get_material_id");

        return $query->result_array();
    }

    public function getData_Lend_Material() {

        $query = $this->db->query("SELECT
            lend_material_2016.LmatId,
            sum(lend_material_2016.qty) as count,
            sum(lend_material_2016.price) as sum,
            lend_material_2016.Ddate,
            personal.`name`
            FROM
            lend_material_2016
            INNER JOIN personal ON lend_material_2016.Pid = personal.Pid
            GROUP BY lend_material_2016.LmatId
            ");

        return $query->result_array();
    }

    public function getTypeDurableGoods() {
        $query = $this->db->get('type_durable_goods');
        return $query->result_array();
    }

    public function getdetiallend($id,$standard){
        $sql = "
        SELECT
        lend_goods_detial.lend_id,
        lend_goods_detial.id_goods,
        if(lend_goods_detial.standard = '1','ครุภัณฑ์','ครุภัณฑ์ต่ำกว่าเกณฑ์') as standard,
            lend_goods_detial.Ddate,
        personal.`name`,
        durable_goods_2016.price,
        durable_goods_2016.name_goods,
        durable_goods_2016.brand_goods,
        durable_goods_2016.id_buy,
        personal.Position,
        durable_goods_2016.id_goods_crru
        FROM
        lend_goods_detial
        INNER JOIN personal ON lend_goods_detial.Pid = personal.Pid
        INNER JOIN durable_goods_2016 ON lend_goods_detial.id_goods = durable_goods_2016.id_goods
        WHERE lend_id = '$id' and durable_goods_2016.standard = '$standard'";

        $query = $this->db->query($sql);
        return $query;




    }

    public function getdetiallend_material($id){
        $sql = "SELECT
        lend_material_2016.MatId,
        material_2016.MatName,
        lend_material_2016.qty,
        lend_material_2016.Ddate,
        lend_material_2016.price,
        personal.`name`,
        lend_material_2016.LmatId
        FROM
        lend_material_2016
        INNER JOIN material_2016 ON material_2016.MatId = lend_material_2016.MatId
        INNER JOIN personal ON lend_material_2016.Pid = personal.Pid
        WHERE LmatId = '$id'";

        $query = $this->db->query($sql);
        return $query;

    }

    public function getdetiallend_all($id,$standard){
        $sql = "
        SELECT
        lend_goods_detial.lend_id,
        lend_goods_detial.id_goods,
        if(lend_goods_detial.standard = '1','ครุภัณฑ์','ครุภัณฑ์ต่ำกว่าเกณฑ์') as standard,
            lend_goods_detial.Ddate,
        personal.`name`,
        durable_goods_2016.price,
        durable_goods_2016.name_goods,
        durable_goods_2016.brand_goods,
        durable_goods_2016.id_buy,
        personal.Position,
        durable_goods_2016.id_goods_crru
        FROM
        lend_goods_detial
        INNER JOIN personal ON lend_goods_detial.Pid = personal.Pid
        INNER JOIN durable_goods_2016 ON lend_goods_detial.id_goods = durable_goods_2016.id_goods
        WHERE lend_id = '$id'";

        $query = $this->db->query($sql);
        return $query;




    }

    public function getdetialGet_all($id){
        $sql = "SELECT
        get_goods_detial.get_id,
        get_goods_detial.Ddate_get,
        get_goods_detial.name_get,
        get_goods_detial.major_get,
        personal.`name`,
        get_goods_detial.id_goods,
        durable_goods_2016.name_goods,
        durable_goods_2016.id_goods_crru,
        get_goods_detial.Ddate_return,
        get_goods_detial.note,
        get_goods_detial.standard,
        get_goods_detial.status
        FROM
        get_goods_detial
        INNER JOIN personal ON get_goods_detial.Pid = personal.Pid
        INNER JOIN durable_goods_2016 ON get_goods_detial.id_goods = durable_goods_2016.id_goods
        WHERE get_id = '$id'";

        $query = $this->db->query($sql);
        return $query;




    }

    public function getdetialReturn_material_all($id){
        $sql = "SELECT
        get_material_detial.get_material_id,
        get_material_detial.Pid,
        get_material_detial.MatId,
        get_material_detial.Ddate_get,
        get_material_detial.Ddate_return,
        get_material_detial.name_get,
        get_material_detial.major_get,
        get_material_detial.note,
        get_material_detial.tel,
        get_material_detial.position_get,
        get_material_detial.qty,
        get_material_detial.price,
        get_material_detial.`status`,
        material_2016.MatName,
        personal.`name`
        FROM
        get_material_detial
        INNER JOIN material_2016 ON get_material_detial.MatId = material_2016.MatId
        INNER JOIN personal ON get_material_detial.Pid = personal.Pid
        WHERE get_material_id = '$id'";

        $query = $this->db->query($sql);
        return $query;




    }

}

?>
