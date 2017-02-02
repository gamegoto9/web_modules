<?php

class Mou_model extends CI_Model {

    function _construct() {

        parent::_construct();
    }

    function get_country() {
     $query = $this->db->query('
        SELECT
        international_support.international
        FROM
        international_support
        GROUP BY 
        international_support.international
        ');

     return $query;
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

 function get_mou_all(){
    $query = $this->db->query('SELECT international_support.`name`,
        international_support.international,
        international_support.link,
        international_support.id,
        international_support.file,
        if(international_support.mou_student = "1","/","") as student,
            if(international_support.mou_peple_research = "1","/","") as peple_re,  
                if(international_support.mou_teacher = "1","/","") as teacher,
                    if(international_support.mou_peple = "1","/","") as peple,
                        if(international_support.data_print = "1","/","") as print,  

                            international_support.mou_first,
                        international_support.mou_last,
                        if(international_support.mou_expired = "0000-00-00","",international_support.mou_expired) as expired,
                            international_support.mou_dis,
                        if(international_support.`status` = "0","หมดอายุ", if(international_support.`status` = "1","ยังไม่หมดอายุ", if(international_support.`status` = "9","ไม่ระบุวันหมดอายุ",""))) as note,
                            international_support.`status`
                        FROM
                        international_support
                        ORDER BY
                        international_support.international');

    return $query;
}

function get_mou_university($university){
    $query = $this->db->query("SELECT international_support.`name`,
        international_support.international,
        international_support.link,
        international_support.id,
        international_support.file,
        if(international_support.mou_student = '1','/','') as student,
            if(international_support.mou_peple_research = '1','/','') as peple_re,  
                if(international_support.mou_teacher = '1','/','') as teacher,
                    if(international_support.mou_peple = '1','/','') as peple,
                        if(international_support.data_print = '1','/','') as print,  

                            international_support.mou_first,
                        international_support.mou_last,
                        if(international_support.mou_expired = '0000-00-00','',international_support.mou_expired) as expired,
                            international_support.mou_dis,
                        if(international_support.`status` = '0','หมดอายุ', if(international_support.`status` = '1','ยังไม่หมดอายุ', if(international_support.`status` = '9','ไม่ระบุวันหมดอายุ',''))) as note,
                            international_support.`status`
                        FROM
                        international_support
                        WHERE
                        international_support.id = '$university'
                        ORDER BY
                        international_support.international");

    return $query;
}

function get_mou_expired($status){
    $query = $this->db->query("SELECT international_support.`name`,
        international_support.international,
        international_support.link,
        international_support.id,
        international_support.file,
        if(international_support.mou_student = '1','/','') as student,
            if(international_support.mou_peple_research = '1','/','') as peple_re,  
                if(international_support.mou_teacher = '1','/','') as teacher,
                    if(international_support.mou_peple = '1','/','') as peple,
                        if(international_support.data_print = '1','/','') as print,  

                            international_support.mou_first,
                        international_support.mou_last,
                        if(international_support.mou_expired = '0000-00-00','',international_support.mou_expired) as expired,
                            international_support.mou_dis,
                        if(international_support.`status` = '0','หมดอายุ', if(international_support.`status` = '1','ยังไม่หมดอายุ', if(international_support.`status` = '9','ไม่ระบุวันหมดอายุ',''))) as note,
                            international_support.`status`
                        FROM
                        international_support
                        WHERE
                        international_support.status = '$status'
                        ORDER BY
                        international_support.international");

    return $query;
}

function get_mou_sort_date($dateStart,$dateEnd,$country){

    if($country == ''){
        $country_query ='';
    }else{
        $country_query = "AND international_support.international = "."'".$country."'";
     }
    $query = $this->db->query("SELECT international_support.`name`,
        international_support.international,
        international_support.link,
        international_support.id,
        international_support.file,
        if(international_support.mou_student = '1','/','') as student,
            if(international_support.mou_peple_research = '1','/','') as peple_re,  
                if(international_support.mou_teacher = '1','/','') as teacher,
                    if(international_support.mou_peple = '1','/','') as peple,
                        if(international_support.data_print = '1','/','') as print,  

                            international_support.mou_first,
                        international_support.mou_last,
                        if(international_support.mou_expired = '0000-00-00','',international_support.mou_expired) as expired,
                            international_support.mou_dis,
                        if(international_support.`status` = '0','หมดอายุ', if(international_support.`status` = '1','ยังไม่หมดอายุ', if(international_support.`status` = '9','ไม่ระบุวันหมดอายุ',''))) as note,
                            international_support.`status`
                        FROM
                        international_support
                        WHERE
                        international_support.mou_expired NOT IN('000-00-00','') AND
                        international_support.mou_expired BETWEEN '$dateStart' AND '$dateEnd'
                        $country_query
                        ORDER BY
                        expired ASC");

    return $query;
}

function get_mou_country($country){
    $query = $this->db->query("SELECT international_support.`name`,
        international_support.international,
        international_support.link,
        international_support.id,
        international_support.file,
        if(international_support.mou_student = '1','/','') as student,
            if(international_support.mou_peple_research = '1','/','') as peple_re,  
                if(international_support.mou_teacher = '1','/','') as teacher,
                    if(international_support.mou_peple = '1','/','') as peple,
                        if(international_support.data_print = '1','/','') as print,  

                            international_support.mou_first,
                        international_support.mou_last,
                        if(international_support.mou_expired = '0000-00-00','',international_support.mou_expired) as expired,
                            international_support.mou_dis,
                        if(international_support.`status` = '0','หมดอายุ', if(international_support.`status` = '1','ยังไม่หมดอายุ', if(international_support.`status` = '9','ไม่ระบุวันหมดอายุ',''))) as note,
                            international_support.`status`
                        FROM
                        international_support
                        WHERE
                        international_support.international = '$country'
                        ORDER BY
                        international_support.international");

    return $query;
}

function get_mou_conti($column){
    $query = $this->db->query("SELECT international_support.`name`,
        international_support.international,
        international_support.link,
        international_support.id,
        international_support.file,
        if(international_support.mou_student = '1','/','') as student,
            if(international_support.mou_peple_research = '1','/','') as peple_re,  
                if(international_support.mou_teacher = '1','/','') as teacher,
                    if(international_support.mou_peple = '1','/','') as peple,
                        if(international_support.data_print = '1','/','') as print,  

                            international_support.mou_first,
                        international_support.mou_last,
                        if(international_support.mou_expired = '0000-00-00','',international_support.mou_expired) as expired,
                            international_support.mou_dis,
                        if(international_support.`status` = '0','หมดอายุ', if(international_support.`status` = '1','ยังไม่หมดอายุ', if(international_support.`status` = '9','ไม่ระบุวันหมดอายุ',''))) as note,
                            international_support.`status`
                        FROM
                        international_support
                        WHERE
                        $column = '1'
                        ORDER BY
                        international_support.international");

    return $query;
}

function get_mou_date_first($date,$order_by){
    $query = $this->db->query("SELECT international_support.`name`,
        international_support.international,
        international_support.link,
        international_support.id,
        international_support.file,
        if(international_support.mou_student = '1','/','') as student,
            if(international_support.mou_peple_research = '1','/','') as peple_re,  
                if(international_support.mou_teacher = '1','/','') as teacher,
                    if(international_support.mou_peple = '1','/','') as peple,
                        if(international_support.data_print = '1','/','') as print,  

                            international_support.mou_first,
                        international_support.mou_last,
                        if(international_support.mou_expired = '0000-00-00','',international_support.mou_expired) as expired,
                            international_support.mou_dis,
                        if(international_support.`status` = '0','หมดอายุ', if(international_support.`status` = '1','ยังไม่หมดอายุ', if(international_support.`status` = '9','ไม่ระบุวันหมดอายุ',''))) as note,
                            international_support.`status`
                        FROM
                        international_support
                        ORDER BY
                        international_support.$date $order_by");

    return $query;
}

 function get_mou_by_id($id) {
     $query = $this->db->query("SELECT * FROM international_support WHERE id = $id");

     return $query;
 }


}

?>
