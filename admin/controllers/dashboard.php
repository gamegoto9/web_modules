<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function _construct() {
        parent::_construct();
    }

    public function index() {
        $this->load->view('admin/dashboard/dashboard_view');
    }

    public function list_data() {


        //$this->load->model('student/website_model');
        //$data['rec_data'] = $this->website_model->getData();

        $data['start_row'] = $this->uri->segment(4, '0');
        $sql = "SELECT * FROM student ORDER BY id ";
        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด     



        $this->load->library('pagination');
        $config['base_url'] = site_url('admin/dashboard/list_data');
        $config['total_rows'] = $data['total_row'];
        $config['per_page'] = 10;
        $config['num_links'] = 6;
        $config['uri_segment'] = 4;
        $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
        $this->pagination->initialize($config);

        $start = $data['start_row'];
        $limit = $config['per_page'];

//Edit To Do --> ORDER BY id ให้เปลี่ยน field id เป็น field ที่ต้องการเรียงลำดับ
        $sql = $sql . " LIMIT $limit OFFSET $start";


        $data['recData'] = $this->db->query($sql);

        $data['is_search'] = FALSE;
        $data['txt_search'] = '';


        // echo $data['recData'];

        $this->load->view('admin/dashboard/list_data_view', $data);
    }

    public function show_student() {

        $this->load->model('dashboard_model');
        $data['record'] = $this->dashboard_model->getData();
        $data['type'] = "01";

        $this->load->view('admin/dashboard/test', $data);
    }

    public function show_drurbleGoods($type) {


        $this->load->model('dashboard_model');
        $data['record'] = $this->dashboard_model->getData_duruble_goods($type);
        $data['send'] = $type;

        $this->load->view('admin/dashboard/show_duruble_goods', $data);
    }

    public function DetialReturnGoods() {
        $this->load->model('dashboard_model');
        $data['reTurnGoods'] = $this->dashboard_model->getData_reTurn_goods();

        $this->load->view('admin/dashboard/show_duruble_goods_ruturn', $data);
    }

    public function DetialLendGoods($standard) {
        $this->load->model('dashboard_model');
        $data['reTurnGoods'] = $this->dashboard_model->getData_Lend_goods($standard);

        $data['standard'] = $standard;

        $this->load->view('admin/dashboard/show_duruble_goods_lend', $data);
    }

    public function detialLend(){
        $this->load->model('dashboard_model');
        $id = $this->input->post('id');
        $standard = $this->input->post('standard');
        $data['reTurnGoods'] = $this->dashboard_model->getdetiallend_all($id,$standard);

        $this->load->view('admin/dashboard/detial_lend', $data);
    }

    public function detial_goods($type) {

        if ($type == 'new1') {
            $this->load->model('dashboard_model');
            $data['record'] = $this->dashboard_model->getData_duruble_goods_new(1);
        } elseif ($type == 'new2') {
            $this->load->model('dashboard_model');
            $data['record'] = $this->dashboard_model->getData_duruble_goods_new(2);
            $data['type'] = '2';
        } else {

            $this->load->model('dashboard_model');
            $data['record'] = $this->dashboard_model->getData_duruble_goods($type);
        }
        $this->load->view('admin/dashboard/detial_goods', $data);
    }

    public function detial_goods_return() {
        $this->load->model('dashboard_model');
        $data['record'] = $this->dashboard_model->getData_reTurn_goods($type);


        $this->load->view('admin/dashboard/detial_goods_return', $data);
    }

    public function delete_data_student() {


//        $id = $this->input->post('id');
//        $condition = array('id' => $id);
//
//        $this->db->delete('student', $condition);

        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' => 'บันทึกเรียบร้อย'
            ));
    }

    public function delete_data_durable() {


        $id = $this->input->post('id');
        $key = $this->input->post('key');
        $user = $this->session->userdata('Pid');
        $name = $this->session->userdata('name');
        $date = date("Y-m-d h:i:sa");

        if ($key == "sphrd2345") {

            $data = array('status' => '0');

            $this->db->where('id_goods', $id);
            $this->db->update('durable_goods', $data);


            $data_insert = array('Pid' => $user,
                'id_goods' => $id,
                'date' => $date);

            $this->db->insert('detial_goods_return', $data_insert);


            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' => 'บันทึกเรียบร้อย (' . $name . $date . ')'
                ));
        } else {
            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => 'ผิดพลาด'
                ));
        }
    }

    public function checkCountMaterial() {


        $id = $this->input->post('id');
        $count = $this->input->post('qty_num');

        
        $this->load->model('dashboard_model');
        $data = $this->dashboard_model->getData_material_id($id)->row_array();
       
        if ($count > $data['qty']) {

            echo json_encode(array(
               'is_successful' => FALSE,
               'msg' => 'วัสดุมีจำนวนไม่เพียงพอ มีอยู่ '.$data['qty']
               ));
        }else{
            echo json_encode(array(
                'is_successful' => TRUE
                ));
        }

    }

    public function show_data_student() {
        $this->load->view('admin/dashboard/show_data_student');
    }

    public function test() {

        $db2 = $this->load->database('orasis', TRUE);
        $sql = "SELECT * FROM view_inter_student limit 100";
        $student_data = $db2->query($sql)->result_array();

        foreach ($student_data as $row) {
            echo $row['std_id'];
            echo "<br>";
        }
    }



    public function view_insert_goods() {

        $this->load->model('dashboard_model');
        $data['types'] = $this->dashboard_model->getTypeDurableGoods();
        $sql = "SELECT max(id_goods) as maxid FROM durable_goods";
        $data['maxid'] = $this->db->query($sql)->row_array();

        $this->load->view('admin/dashboard/insert_view', $data);
    }



    public function view_lend_goods() {

        $this->load->model('dashboard_model');
        $data['types'] = $this->dashboard_model->getTypeDurableGoods();
        $sql = "SELECT max(id_goods) as maxid FROM durable_goods";
        $data['maxid'] = $this->db->query($sql)->row_array();

        $this->load->view('admin/dashboard/insert_view', $data);
    }



    public function lend_goode_detial(){


        $Pid = $this->session->userdata('Pid');
        $id_goods = $this->input->post('id');
        $lendId = $this->input->post('lendId');
        $standard = $this->input->post('standard');
        $Ddate = date('Y-m-d');


        $sql = "insert into lend_goods_detial
        (lend_id,Pid,id_goods,Ddate,standard)
        values ('$lendId','$Pid','$id_goods','$Ddate','$standard')";


        $this->db->query($sql);

        $sql = "update durable_goods_2016
        set status = '2'
        where id_goods = '$id_goods'";

        $this->db->query($sql);

        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' => 'บันทึกเรียบร้อย'
            ));



    }

    public function lend_material_detial(){


        $Pid = $this->session->userdata('Pid');
        $id_goods = $this->input->post('id');
        $lendId = $this->input->post('lendId');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        $Ddate = date('Y-m-d');


        $sql = "insert into lend_material_2016
        (LmatId,Pid,MatId,Ddate,qty,price)
        values ('$lendId','$Pid','$id_goods','$Ddate','$qty','$price')";


        $this->db->query($sql);

        // $sql = "update durable_goods_2016
        // set status = '2'
        // where id_goods = '$id_goods'";

        // $this->db->query($sql);

        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' => 'บันทึกเรียบร้อย'
            ));



    }

    public function insert_goods() {



        $this->load->library('form_validation');

        $this->form_validation->set_rules('txtName', 'ชื่อ', 'required');
//        $this->form_validation->set_rules('txtId', 'รหัส', 'required');
        $this->form_validation->set_rules('txtBland', 'ยี่ห้อ/รุ่น', 'required');
        $this->form_validation->set_rules('txtIdCrru', 'รหัสครุภัณฑ์', 'required');
        $this->form_validation->set_rules('date1', 'วันที่', 'required');
        $this->form_validation->set_rules('price', 'ราคา', 'required');


        $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

        if ($this->form_validation->run() == FALSE) {

            $msg = form_error('txtName');
//            $msg.= form_error('txtId');
            $msg.= form_error('txtBland');
            $msg.= form_error('txtIdCrru');
            $msg.= form_error('date1');
            $msg.= form_error('price');

            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
                ));
        } else {


            //$data['name'] = $this->input->post('txtId');
            $data['name_goods'] = $this->input->post('txtName');
            $data['brand_goods'] = $this->input->post('txtBland');
            $data['id_goods_crru'] = $this->input->post('txtIdCrru');
            $data['address'] = $this->input->post('types');
            $data['date_start'] = $this->input->post('date1');
            $data['price'] = $this->input->post('price');
            $data['status'] = "1";

            $this->db->insert('durable_goods', $data);

            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' => 'บันทึกเรียบร้อย' . $data['date_start']
                ));
        }
    }


    public function insert_material_new() {



        $this->load->library('form_validation');

        $this->form_validation->set_rules('date1', 'วันที่', 'required');
//        $this->form_validation->set_rules('txtId', 'รหัส', 'required');
        //$this->form_validation->set_rules('txtNameMain', 'รายการ', 'required');
        $this->form_validation->set_rules('qty', 'จำนวน', 'required');
        $this->form_validation->set_rules('price', 'ราคา', 'required');


        $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

        if ($this->form_validation->run() == FALSE) {

            $msg = form_error('date1');
//            $msg.= form_error('txtId');
            

            $msg.= form_error('qty');
            $msg.= form_error('price');

            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
                ));
        } else {


            $date1 = $this->input->post('date1');
            $select_mat = $this->input->post('txtNameMain');
            $check = $this->input->post('gender');
            $input_name = $this->input->post('txtName');
            $qty = $this->input->post('qty');
            $price = $this->input->post('price');

            if($check == ""){


               $sql = "select max(MatId) as maxid from material_2016";
               $result1 = $this->db->query($sql)->result_array();

               foreach ($result1 as $row) {
                $maxid = $row['maxid'];

            }

            $maxid_full = $maxid + 1;

            $data4['MatId'] = $maxid_full;
            $data4['MatName'] = $select_mat;
            $data4['qty'] = $qty;
            $data4['price'] = $price;
            $data4['status_buy'] = '1';

            $this->db->insert('material_2016', $data4);


            $data5['MatId'] = $maxid_full;
            $data5['qty'] = $qty;
            $data5['price'] = $price;
            $data5['Ddate'] = $date1;

            $this->db->insert('buy_material_2016', $data5);



                // $sql = "select * from material_2016 where MatId = '$select_mat'";
                // $result = $this->db->query($sql)->result_array();

                // foreach ($result as $row) {
                //     $l_qty = $row['qty'];


                // }

                // $balance_qty = $qty + $l_qty;


                // $sql = "UPDATE material_2016 set qty=$balance_qty WHERE MatId=$select_mat";
                // $this->db->query($sql);


        }else{

            $sql = "select max(MatId) as maxid from material_2016";
            $result1 = $this->db->query($sql)->result_array();

            foreach ($result1 as $row) {
                $maxid = $row['maxid'];

            }

            $maxid_full = $maxid + 1;

            $data2['MatId'] = $maxid_full;

            $data2['MatName'] = $input_name;

            $this->db->insert('material_2016', $data2);


            $data3['MatId'] = $maxid_full;
            $data3['qty'] = $qty;
            $data3['price'] = $price;
            $data3['Ddate'] = $date1;

            $this->db->insert('buy_material_2016', $data3);


        }


            // $data['brand_goods'] = $this->input->post('txtBland');
            // $data['id_goods_crru'] = $this->input->post('txtIdCrru');
            // $data['address'] = $this->input->post('types');
            // $data['date_start'] = $this->input->post('date1');
            // $data['price'] = $this->input->post('price');
            // $data['status'] = "1";

            // $this->db->insert('durable_goods', $data);

        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' => 'บันทึกเรียบร้อย'
            ));
    }
}


public function insert_material_add() {



    $this->load->library('form_validation');

    $this->form_validation->set_rules('date1', 'วันที่', 'required');
    $this->form_validation->set_rules('qty', 'จำนวน', 'required');
    $this->form_validation->set_rules('price', 'ราคา', 'required');
    $this->form_validation->set_rules('txtName', 'รายชื่อรายการ', 'required');
    $this->form_validation->set_rules('matid', 'รหัส', 'required');


    $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

    if ($this->form_validation->run() == FALSE) {

        $msg = form_error('date1');
//            $msg.= form_error('txtId');


        $msg.= form_error('qty');
        $msg.= form_error('price');
        $msg.= form_error('txtName');
        $msg.= form_error('matid');

        echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => $msg
            ));
    } else {


        $date1 = $this->input->post('date1');
        $input_name = $this->input->post('txtName');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        $matid = $this->input->post('matid');


        $data['qty'] = $qty;
        $data['price'] = $price;
        $data['MatId'] = $matid;
        $data['Ddate'] = $date1;

        $this->db->insert('buy_material_2016', $data);



                // $sql = "select * from material_2016 where MatId = '$select_mat'";
                // $result = $this->db->query($sql)->result_array();

                // foreach ($result as $row) {
                //     $l_qty = $row['qty'];


                // }

                // $balance_qty = $qty + $l_qty;


                // $sql = "UPDATE material_2016 set qty=$balance_qty WHERE MatId=$select_mat";
                // $this->db->query($sql);




                // $sql = "select max(MatId) as maxid from material_2016";
                // $result1 = $this->db->query($sql)->result_array();

                // foreach ($result1 as $row) {
                //     $maxid = $row['maxid'];

                // }

                // $maxid_full = $maxid + 1;

                // $data2['MatId'] = $maxid_full;
                // $data2['qty'] = $qty;
                // $data2['price'] = $price;
                // $data2['MatName'] = $input_name;

                // $this->db->insert('material_2016', $data2);


                // $data3['MatId'] = $maxid_full;
                // $data3['qty'] = $qty;
                // $data3['price'] = $price;
                // $data3['Ddate'] = $date1;

                // $this->db->insert('buy_material_2016', $data3);



        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' => 'บันทึกเรียบร้อย'
            ));
    }
}

public function show_drurbleGoods_news($type) {


    $this->load->model('dashboard_model');
    $data['record'] = $this->dashboard_model->getData_duruble_goods_new($type);
    $data['send'] = 'new'.$type;


    $this->load->view('admin/dashboard/show_duruble_goods', $data);
}

public function show_material() {


    $this->load->model('dashboard_model');
    $data['record'] = $this->dashboard_model->getData_material();

    $this->load->view('admin/dashboard/show_material', $data);
}
public function buy_material() {
   $this->load->model('dashboard_model');
   $data['record'] = $this->dashboard_model->getData_material();

   $this->load->view('admin/dashboard/buy_material',$data);
}

public function table_buy_material() {
   $this->load->model('dashboard_model');
   $data['record'] = $this->dashboard_model->getData_material();

   $this->load->view('admin/dashboard/table_buy_material',$data);
}

public function lend_goode_seq(){

    $sql = "insert into lend_goods_seq values ('')";
    $this->db->query($sql);

}
public function lend_material_seq(){

    $sql = "insert into lend_material_seq values ('')";
    $this->db->query($sql);

}

public function show_lend_news($type) {


    $this->load->model('dashboard_model');
    $data['data'] = $this->dashboard_model->getData_duruble_goods_new_type($type);
    $data['maxid'] = $this->dashboard_model->getData_duruble_goods_maxid();
    if($type == 1){
        $data['type'] = 'เบิกครุภัณฑ์';
        $data['standard'] = '1';
    }else{
        $data['type'] = 'เบิกครุภัณฑ์ต่ำกว่าเกณฑ์';
        $data['standard'] = '2';
    }



    $this->load->view('admin/dashboard/lend_view', $data);
}

public function lend_material() {


    $this->load->model('dashboard_model');
        //$data['data'] = $this->dashboard_model->getData_duruble_goods_new_type($type);
    $data['maxid'] = $this->dashboard_model->getData_material_maxid();

    $data['type'] = 'เบิกวัสดุ';
    $data['standard'] = '1';

    
    $this->load->view('admin/dashboard/lend_material_view', $data);
}

public function select_goods() {

    $type = $this->input->post('id');
    $query = $this->input->post('query');
    $this->load->model('dashboard_model');

    $data['record'] = $this->dashboard_model->getData_duruble_goods_new_type2($type,$query);   

    $this->load->view('admin/dashboard/select_goods', $data);
}

public function select_material() {


    $query = $this->input->post('query');
    $this->load->model('dashboard_model');

    $data['record'] = $this->dashboard_model->getData_select_material($query);   

    $this->load->view('admin/dashboard/select_material', $data);
}


public function data_goods_news() {

    $id = $this->input->post('id');
    $this->load->model('dashboard_model');
    $data['record'] = $this->dashboard_model->data_goods_new($id);
    $data['send'] = '01';


    $this->load->view('admin/dashboard/data_goods', $data);
}

public function data_buy_not_in() {


    $id = $this->input->post('id');
    $this->load->model('dashboard_model');
    $data['record'] = $this->dashboard_model->getData_material();
    $data['send'] = '01';
    $data['MatId'] = $id;


    $this->load->view('admin/dashboard/buy_material_view', $data);
}

public function data_buy_list_in() {

    $id = $this->input->post('id');

    $sql = "SELECT
    e.MatId,
    e.MatName,

    if(cnt.qty IS NULL,e.qty,(e.qty + cnt.qty) - if(lend.qty IS NULL,0,lend.qty)) as qty,
        if(cnt.price IS NULL,e.price,cnt.price) as price,
            if(cnt.price IS NULL,e.price * e.qty,((e.price*e.qty) + (cnt.price*cnt.qty))-if((lend.price*lend.qty) IS NULL,0,(lend.price*lend.qty))) as price_totle

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

            where e.MatId = $id";

            $data['record'] = $this->db->query($sql);

            $data['send'] = '01';
            $data['MatId'] = $id;


            $this->load->view('admin/dashboard/buy_material_in_list', $data);
        }

        public function select_goods_id() {

            $id = $this->input->post('id');
            $this->load->model('dashboard_model');
            $data['record'] = $this->dashboard_model->data_goods_new($id);

            $data['is_successful'] = TRUE;


            echo json_encode($data);

       // $this->load->view('admin/dashboard/data_goods', $data);
        }

        public function select_material_id() {

            $id = $this->input->post('id');
            $this->load->model('dashboard_model');
            $data['record'] = $this->dashboard_model->getData_material_id($id)->result_array();

            $data['is_successful'] = TRUE;


            echo json_encode($data);

       // $this->load->view('admin/dashboard/data_goods', $data);
        }

        public function detial_lend_paple($lend_id,$standard){

            $this->load->model('dashboard_model');
            $data['reTurnGoods'] = $this->dashboard_model->getdetiallend($lend_id,$standard);

            if($standard == 1){
                $this->load->view('admin/dashboard/detial_lend_paple',$data);
            }else{
                $this->load->view('admin/dashboard/detial_lend_paple_low',$data);
            }

        }

        public function detial_lend_paple_now($lend_id){

            $this->load->model('dashboard_model');
            $standard = '1';
            $data['reTurnGoods'] = $this->dashboard_model->getdetiallend($lend_id,$standard);

        //if($standard == 1){
            $this->load->view('admin/dashboard/detial_lend_paple',$data);
       // }else{
        //    $this->load->view('admin/dashboard/detial_lend_paple_low',$data);
        //}



        }

        public function detial_lend_paple_material_now($lend_id){

            $this->load->model('dashboard_model');
            $data['reTurnGoods'] = $this->dashboard_model->getdetiallend_material($lend_id);

        //if($standard == 1){
            $this->load->view('admin/dashboard/detial_lend_paple',$data);
       // }else{
        //    $this->load->view('admin/dashboard/detial_lend_paple_low',$data);
        //}



        }
        public function sample2(){

            $this->load->view('admin/dashboard/test');

        }

        public function mer(){
            $sql = "SELECT Pid,Ddate,work1
            FROM work
            WHERE Pid IN('008','005')
            GROUP BY Pid,Ddate";

            $data['aaa'] = $this->db->query($sql);

            $this->load->view('admin/dashboard/mer',$data);
        }

    }
