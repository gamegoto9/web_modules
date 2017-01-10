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

    public function DetialGetGoods() {
        $this->load->model('dashboard_model');
        $data['reTurnGoods'] = $this->dashboard_model->getData_Get_goods();


        $this->load->view('admin/dashboard/show_get_goods', $data);
    }

    public function DetialLendMaterial() {
        $this->load->model('dashboard_model');
        $data['reTurnGoods'] = $this->dashboard_model->getData_Lend_Material();



        $this->load->view('admin/dashboard/show_duruble_goods_lend_material', $data);
    }


    public function data_detial_material(){



        $id = $this->input->post('id');

        $sql = "select * from material_2016 where MatId = '$id'";         
        $data['record'] = $this->db->query($sql)->result_array();

        $sql = "select * from buy_material_2016 where MatId = '$id' order by Ddate asc";         
        $data['buyMaterial'] = $this->db->query($sql)->result_array();

        $sql = "SELECT
        lend_material_2016.LmatId,
        lend_material_2016.qty,
        lend_material_2016.price,
        personal.`name`,
        lend_material_2016.Ddate
        FROM
        lend_material_2016
        INNER JOIN personal ON lend_material_2016.Pid = personal.Pid
        WHERE MatId = '$id'";         
        $data['lends'] = $this->db->query($sql)->result_array();

        $this->load->view('admin/dashboard/data_material', $data);

    }
    public function detialLend(){
        $this->load->model('dashboard_model');
        $id = $this->input->post('id');
        $standard = $this->input->post('standard');
        $data['reTurnGoods'] = $this->dashboard_model->getdetiallend_all($id,$standard);

        $this->load->view('admin/dashboard/detial_lend', $data);
    }

    public function detialGet(){
        $this->load->model('dashboard_model');
        $id = $this->input->post('id');
        $data['reTurnGoods'] = $this->dashboard_model->getdetialGet_all($id);

        $this->load->view('admin/dashboard/detial_get', $data);
    }


    public function detialGetReturn(){
        $this->load->model('dashboard_model');
        $id = $this->input->post('id');
        $data['reTurnGoods'] = $this->dashboard_model->getdetialGet_all($id);
        $data['maxid'] = $this->dashboard_model->getData_return_goods_maxid();

        $this->load->view('admin/dashboard/detial_get_form', $data);
    }

    public function detialReturnMaterial(){
        $this->load->model('dashboard_model');
        $id = $this->input->post('id');
        $data['reTurnGoods'] = $this->dashboard_model->getdetialReturn_material_all($id);
        $data['maxid'] = $this->dashboard_model->getData_return_material_maxid();

        $this->load->view('admin/dashboard/detial_get_material_form', $data);
    }

    public function detialLendMaterial2(){
        $this->load->model('dashboard_model');
        $id = $this->input->post('id');

        $data['reTurnGoods'] = $this->dashboard_model->getdetiallend_material($id);

        $this->load->view('admin/dashboard/detial_lend_material', $data);
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
        $txtName = $this->input->post('txtName');


        $Ddate = date('Y-m-d');

        if($txtName == ""){
            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => "กรุุณาป้อน ชื่อผู้ครอบครอง"
                ));

        }else{


            $sql = "insert into lend_goods_detial
            (lend_id,Pid,id_goods,Ddate,standard)
            values ('$lendId','$Pid','$id_goods','$Ddate','$standard')";


            $this->db->query($sql);

            $sql = "update durable_goods_2016
            set status = '2',address='$txtName'
            where id_goods = '$id_goods'";

            $this->db->query($sql);

            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' => 'บันทึกเรียบร้อย'
                ));

        }

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

        $this->form_validation->set_rules('id_buy', 'รหัสการซื้อ', 'required');
        $this->form_validation->set_rules('name_buy', 'ร้านค้าที่ซื้อ', 'required');


        $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

        if ($this->form_validation->run() == FALSE) {

            $msg = form_error('txtName');
//            $msg.= form_error('txtId');
            $msg.= form_error('txtBland');
            $msg.= form_error('txtIdCrru');
            $msg.= form_error('date1');
            $msg.= form_error('price');
            $msg.= form_error('id_buy');
            $msg.= form_error('name_buy');

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
            $data['year'] = date("Y");
            $data['standard'] = "1";
            $data['status'] = "1";
            $data['id_buy'] = $this->input->post('id_buy');
            $data['name_buy'] = $this->input->post('name_buy');

            $this->db->insert('durable_goods_2016', $data);

            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' => 'บันทึกเรียบร้อย' . $data['date_start']
                ));
        }
    }



    public function insert_repair() {



        $this->load->library('form_validation');

        $this->form_validation->set_rules('date1', 'วันที่', 'required');
//        $this->form_validation->set_rules('txtId', 'รหัส', 'required');
        $this->form_validation->set_rules('txtSubject', 'รายละเอียด', 'required');
        $this->form_validation->set_rules('price', 'จำนวนเงิน', 'required');
        $this->form_validation->set_rules('txtid', 'รหัสครุภัณฑ์', 'required');
        $this->form_validation->set_rules('note', 'หมายเหตุ', 'required');




        $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

        if ($this->form_validation->run() == FALSE) {

            $msg = form_error('date1');
            $msg.= form_error('txtSubject');
            $msg.= form_error('price');
            $msg.= form_error('txtid');
            $msg.= form_error('note');


            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
                ));
        } else {



            $data['id_goods'] = $this->input->post('txtid');
            $data['Ddate'] = $this->input->post('date1');
            $data['price'] = $this->input->post('price');
            $data['note'] = $this->input->post('note');
            $data['subject'] = $this->input->post('txtSubject');
            $data['Pid'] = $this->session->userdata('Pid');


            $this->db->insert('durable_goods_repair', $data);

            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' => 'บันทึกเรียบร้อย'
                ));
        }
    }


    public function insert_material_new() {



        $prices = $this->input->post('price');
        $qtys = $this->input->post('qty');
        $tnames = $this->input->post('tname');
        $tvalues = $this->input->post('tvalue');

        $numids = $this->input->post('numid');
        $namebuys = $this->input->post('namebuy');
        $date_buys = $this->input->post('date_buy');

        $rows = $this->input->post('row');
        

        for($i=0;$i<$rows;$i++){
            $price = $prices[$i];
            $qty = $qtys[$i];
            $tname = $tnames[$i];
            $tvalue = $tvalues[$i];

            if($tvalue == ""){
             $sql = "select max(MatId) as maxid from material_2016";
             $result1 = $this->db->query($sql)->result_array();

             foreach ($result1 as $row) {
                $maxid = $row['maxid'];

            }

            $maxid_full = $maxid + 1;

            $data4['MatId'] = $maxid_full;
            $data4['MatName'] = $tname;

            $data4['status_buy'] = '1';
            $data4['year'] = date("Y");

            $this->db->insert('material_2016', $data4);


            $data5['MatId'] = $maxid_full;
            $data5['qty'] = $qty;
            $data5['price'] = $price;
            $data5['Ddate'] = $date_buys;
            $data5['id_buy'] = $numids;
            $data5['market_name'] = $namebuys;

            $this->db->insert('buy_material_2016', $data5);



        }else{

            $data3['MatId'] = $tvalue;
            $data3['qty'] = $qty;
            $data3['price'] = $price;
            $data3['Ddate'] = $date_buys;
            $data3['id_buy'] = $numids;
            $data3['market_name'] = $namebuys;

            $this->db->insert('buy_material_2016', $data3);


        }
    }

    echo json_encode(array(
        'is_successful' => TRUE,
        'msg' => 'บันทึกเรียบร้อย'
        ));
}

public function insert_get_goods() {

    $get_id = $this->input->post('get_id');
    $standards = $this->input->post('standard');
    $id_goodss = $this->input->post('id_goods');
    $Ddate_get = $this->input->post('date_get');
    $tel = $this->input->post('tel');

    $Ddate_return = $this->input->post('date_return');
    $name_get = $this->input->post('name_get');
    $major_get = $this->input->post('major_get');
    $note = $this->input->post('note');

    $rows = $this->input->post('row');

    for($i=0;$i<$rows;$i++){
        $standard = $standards[$i];
        $id_goods = $id_goodss[$i];

        $data3['get_id'] = $get_id;
        $data3['Pid'] = $this->session->userdata('Pid');
        $data3['standard'] = $standard;
        $data3['id_goods'] = $id_goods;
        $data3['Ddate_get'] = $Ddate_get;
        $data3['Ddate_return'] = $Ddate_return;
        $data3['name_get'] = $name_get;
        $data3['major_get'] = $major_get;
        $data3['note'] = $note;
        $data3['tel'] = $tel;
        $data3['status'] = '1';

        $this->db->insert('get_goods_detial', $data3);

        $this->db->where('id_goods', $id_goods);
        $data4['status'] = '4';
        $data4['address'] = $name_get;
        $this->db->update('durable_goods_2016', $data4); 

    }

    echo json_encode(array(
        'is_successful' => TRUE,
        'msg' => 'บันทึกเรียบร้อย'
        ));
}

public function insert_get_material() {

    $get_material_id = $this->input->post('get_id');
    $lmatId = $this->input->post('lmatId');
    $id_goodss = $this->input->post('id_goods');
    $Ddate_get = $this->input->post('date_get');
    $tel = $this->input->post('tel');
    $position = $this->input->post('position');

    $Ddate_return = $this->input->post('date_return');
    $name_get = $this->input->post('name_get');
    $major_get = $this->input->post('major_get');
    $note = $this->input->post('note');

    $qtys = $this->input->post('qty');
    $prices = $this->input->post('price');

    $rows = $this->input->post('row');

    $data1['lend_id'] = '0';
    $this->db->insert('lend_material_seq', $data1);

    $data2['get_material_id'] = '0';
    $this->db->insert('get_material_seq', $data2);

    for($i=0;$i<$rows;$i++){

        $id_goods = $id_goodss[$i];
        $qty = $qtys[$i];
        $price = $prices[$i];

        $data3['get_material_id'] = $get_material_id;
        $data3['Pid'] = $this->session->userdata('Pid');

        $data3['MatId'] = $id_goods;
        $data3['Ddate_get'] = $Ddate_get;
        $data3['Ddate_return'] = $Ddate_return;
        $data3['name_get'] = $name_get;
        $data3['position_get'] = $position;
        $data3['major_get'] = $major_get;
        $data3['note'] = $note;
        $data3['tel'] = $tel;
        $data3['status'] = '1';
        $data3['qty'] = $qty;
        $data3['price'] = $price;

        $this->db->insert('get_material_detial', $data3);


        $data4['LmatId'] = $lmatId;
        $data4['MatId'] = $id_goods;     
        $data4['qty'] = $qty;
        $data4['price'] = $price;
        $data4['Ddate'] = date('Y-m-d');
        $data4['Pid'] = $this->session->userdata('Pid');
        $data4['status'] = '2';
        
        $this->db->insert('lend_material_2016', $data4);

    }

    echo json_encode(array(
        'is_successful' => TRUE,
        'msg' => 'บันทึกเรียบร้อย'.$prices[0]
        ));
}

public function insert_return_goods() {

    $get_id = $this->input->post('get_id');
    $id_datas = $this->input->post('value_data');
    $maxid = $this->input->post('max');
    $Ddate_return = $this->input->post('dateRe');
    $name = $this->input->post('name');


    $rows = $this->input->post('rows');

    $data2['return_id'] = '1';
    $this->db->insert('return_goods_seq', $data2);

    for($i=0;$i<$rows;$i++){
        $id_data = $id_datas[$i];
        

        $data3['get_id'] = $get_id;
        $data3['Pid'] = $this->session->userdata('Pid');
        $data3['return_id'] = $maxid;
        $data3['id_goods'] = $id_data;
        $data3['Ddate_return'] = $Ddate_return;
        $data3['name_return'] = $name;
        $data3['note'] = '';
        

        $this->db->insert('return_goods_detial', $data3);

        $this->db->where('id_goods', $id_data);
        $data4['status'] = '1';
        $data4['address'] = 'วิเทศฯ';
        $this->db->update('durable_goods_2016', $data4);

        $data5['status'] = '0';
        $this->db->update('get_goods_detial', $data5, array('id_goods' => $id_data,'get_id' => $get_id));

    }

    echo json_encode(array(
        'is_successful' => TRUE,
        'msg' => 'บันทึกเรียบร้อย'.$rows
        ));
}

public function insert_return_material() {

    $get_id = $this->input->post('get_id');
    $id_datas = $this->input->post('value_data');
    $maxid = $this->input->post('max');
    $Ddate_return = $this->input->post('dateRe');
    $name = $this->input->post('name');
    $qtys = $this->input->post('qty');
    $prices = $this->input->post('price');
    $note = $this->input->post('note');

    $rows = $this->input->post('rows');

    $data2['return_id'] = '0';
    $this->db->insert('return_material_seq', $data2);

    for($i=0;$i<$rows;$i++){
        $id_data = $id_datas[$i];
        $qty = $qtys[$i];
        $price = $prices[$i];
        
        $data3['get_material_id'] = $get_id;
        $data3['Pid'] = $this->session->userdata('Pid');
        $data3['return_id'] = $maxid;
        $data3['MatId'] = $id_data;
        $data3['Ddate_return'] = $Ddate_return;
        $data3['name_return'] = $name;
        $data3['note'] = $note;  
        $data3['qty'] = $qty;      
        $this->db->insert('return_material_detial', $data3);

        
        $data4['MatId'] = $id_data;
        $data4['qty'] = $qty;
        $data4['price'] = $price;
        $data4['Ddate'] = $Ddate_return;
        $data4['id_buy'] = $get_id;
        $data4['market_name'] = 'จากการ ยืมพัสดุ';
        $data4['status_buy'] = '2';
        $this->db->insert('buy_material_2016', $data4);


        $data5['status'] = '0';
        $this->db->update('get_material_detial', $data5, array('MatId' => $id_data,'get_material_id' => $get_id));



    }

    echo json_encode(array(
        'is_successful' => TRUE,
        'msg' => 'บันทึกเรียบร้อย'
        ));
}


public function insert_material_add() {



    $this->load->library('form_validation');
    $this->form_validation->set_rules('idbuy', 'เลขที่การซื้อ', 'required');
    $this->form_validation->set_rules('date1', 'วันที่', 'required');
    $this->form_validation->set_rules('qty', 'จำนวน', 'required');
    $this->form_validation->set_rules('price', 'ราคา', 'required');
    $this->form_validation->set_rules('txtName', 'รายชื่อรายการ', 'required');
    $this->form_validation->set_rules('matid', 'รหัส', 'required');
    $this->form_validation->set_rules('market_name', 'ชื่อร้านค้า', 'required');



    $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

    if ($this->form_validation->run() == FALSE) {

        $msg = form_error('date1');
//            $msg.= form_error('txtId');

        $msg.= form_error('idbuy');
        $msg.= form_error('qty');
        $msg.= form_error('price');
        $msg.= form_error('txtName');
        $msg.= form_error('matid');
        $msg.= form_error('market_name');

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
        $idbuy = $this->input->post('idbuy');
        $market_name = $this->input->post('market_name');


        $data['qty'] = $qty;
        $data['price'] = $price;
        $data['MatId'] = $matid;
        $data['Ddate'] = $date1;
        $data['id_buy'] = $idbuy;
        $data['market_name'] = $market_name;

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

public function show_drurbleGoods_repair($type) {


    $this->load->model('dashboard_model');
    $data['record'] = $this->dashboard_model->getData_duruble_goods_new($type);
    $data['send'] = 'new'.$type;


    $this->load->view('admin/dashboard/show_duruble_goods_repair', $data);
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

public function get_goods_seq(){

    $sql = "insert into get_goods_seq values ('0')";
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

public function get_goods($type) {


    $this->load->model('dashboard_model');
    $data['data'] = $this->dashboard_model->getData_duruble_goods_new_type($type);
    $data['maxid'] = $this->dashboard_model->getData_get_goods_maxid();
    if($type == 1){
        $data['type'] = 'ยืม ครุภัณฑ์';
        $data['standard'] = '1';
    }else{
        $data['type'] = 'ยืม ครุภัณฑ์ต่ำกว่าเกณฑ์';
        $data['standard'] = '2';
    }



    $this->load->view('admin/dashboard/get_goods_view', $data);
}

public function get_material($type) {


    $this->load->model('dashboard_model');
   // $data['data'] = $this->dashboard_model->getData_duruble_goods_new_type($type);
    $data['maxid'] = $this->dashboard_model->getData_get_material_maxid();
    $data['maxid2'] = $this->dashboard_model->getData_material_maxid();
    // if($type == 1){
    //     $data['type'] = 'ยืม ครุภัณฑ์';
    //     $data['standard'] = '1';
    // }else{
    //     $data['type'] = 'ยืม ครุภัณฑ์ต่ำกว่าเกณฑ์';
    //     $data['standard'] = '2';
    // }



    $this->load->view('admin/dashboard/get_material_view', $data);
}

public function return_goods() {


    $this->load->model('dashboard_model');
    $data['reTurnGoods'] = $this->dashboard_model->getData_Get_goods();


    $this->load->view('admin/dashboard/show_get_goods_return', $data);
}

public function return_meterial() {


    $this->load->model('dashboard_model');
    $data['reTurnGoods'] = $this->dashboard_model->getData_Get_material();


    $this->load->view('admin/dashboard/show_get_material_return', $data);
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


public function insert_goods_repair() {

    $id = $this->input->post('id');
    $this->load->model('dashboard_model');
    $data['record'] = $this->dashboard_model->data_goods_new($id);
    $data['send'] = '01';


    $this->load->view('admin/dashboard/repair_goods_form', $data);
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
            $this->load->view('admin/dashboard/detial_lend_material_paple',$data);
       // }else{
        //    $this->load->view('admin/dashboard/detial_lend_paple_low',$data);
        //}



        }

        public function detial_lend_paple_material_center($lend_id){

            $sql = "SELECT Ddate FROM buy_material_2016 WHERE Ddate = '$lend_id' ORDER BY Ddate asc";
            

            //$this->load->view('admin/dashboard/detial_lend_material_paple',$data);




        }
        public function detial_lend_paple_goods_center($id){

            $sql = "SELECT * FROM durable_goods_2016 WHERE id_goods = '$id'";
            $data['reTurnGoods'] = $this->db->query($sql);

            $sql = "SELECT
            durable_goods_repair.id_goods,
            durable_goods_repair.Ddate,
            durable_goods_repair.price,
            durable_goods_repair.note,
            durable_goods_repair.`subject`,
            durable_goods_repair.Pid,
            durable_goods_2016.name_goods,
            durable_goods_2016.brand_goods,
            durable_goods_2016.id_goods_crru
            FROM
            durable_goods_repair
            INNER JOIN durable_goods_2016 ON durable_goods_repair.id_goods = durable_goods_2016.id_goods
            WHERE durable_goods_repair.id_goods = '$id'";
            $data['reTurnGoods_repair'] = $this->db->query($sql);

            $this->load->view('admin/dashboard/detial_lend_goods_paple_center',$data);




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

        public function detial_get_goods_paple($id){
            $sql = "SELECT
            get_goods_detial.get_id,
            get_goods_detial.Pid,
            get_goods_detial.standard,
            get_goods_detial.id_goods,
            get_goods_detial.Ddate_get,
            get_goods_detial.Ddate_return,
            get_goods_detial.name_get,
            get_goods_detial.major_get,
            get_goods_detial.note,
            get_goods_detial.tel,
            durable_goods_2016.name_goods,
            durable_goods_2016.brand_goods,
            durable_goods_2016.id_goods_crru
            FROM
            get_goods_detial
            INNER JOIN durable_goods_2016 ON get_goods_detial.id_goods = durable_goods_2016.id_goods
            WHERE get_id = '$id'
            ";
            $data['reTurnGoods'] = $this->db->query($sql);

            $this->load->view('admin/dashboard/detial_get_goods_paple',$data);

        }

        public function detial_get_material_paple($id){
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
            get_material_detial.qty,
            get_material_detial.position_get,
            get_material_detial.`status`,
            material_2016.MatName
            FROM
            get_material_detial
            INNER JOIN material_2016 ON get_material_detial.MatId = material_2016.MatId
            WHERE get_material_id = '$id'";
            $data['reTurnGoods'] = $this->db->query($sql);

            $this->load->view('admin/dashboard/detial_get_material_paple',$data);

        }

    }
