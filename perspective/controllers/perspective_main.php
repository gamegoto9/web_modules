<?php

session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perspective_main extends CI_Controller {

    function __construct() {
        parent::__construct();



        $val_lang = $this->session->userdata('language');

        if (!($this->session->userdata('language'))) {
            $this->session->set_userdata('language', 'english');
        }
    }

    public $maxid = "";

    public function index() {



////        $sql = "SELECT * FROM news_data ORDER BY id DESC LIMIT 5;";
////        $data['news'] = $this->db->query($sql)->result_array();
////
////        $sql = "SELECT * 
////	 	FROM fund_data
////	 	ORDER BY id DESC 
////	 	LIMIT 4";
////       $data['fund'] = $this->db->query($sql)->result_array();
////
////        $sql = "SELECT th_news.Nid,Ntext,title,link,link2,Ndate
////	 	FROM th_news LEFT JOIN images_new_new
////                   ON th_news.Nid = images_new_new.Nid
////	 	ORDER BY Nid DESC 
////	 	LIMIT 7;";
////        $data['activity'] = $this->db->query($sql)->result_array();
////         $sql = "SELECT th_news.Nid,Ntext,title,parth_img,Ndate
////	 	FROM th_news,images_2014
////                where th_news.Nid = images_2014.Nid
////	 	ORDER BY Nid DESC 
////	 	LIMIT 7;";
////       $data['activity'] = $this->db->query($sql)->result_array();
        //echo $this->session->userdata('language');







        $this->load->view('perspective/main');
    }

    public function regis() {
        $this->load->view('perspective/register_view');
    }

    public function show_view() {

        $sql = "select * 
              from new_perspective
              GROUP BY  Gid,Pid
              ORDER BY fname";

        $data['recData'] = $this->db->query($sql)->result_array();

        $this->load->view('perspective/show_view', $data);
    }

    public function save_regis() {

        $data['email'] = $this->input->post('email');
        $this->load->helper('email');

        if (valid_email($data['email'])) {




            $this->load->library('form_validation');

            $this->form_validation->set_rules('fname', 'ชื่อ', 'trim|required');
            $this->form_validation->set_rules('lname', 'นามสกุล', 'trim|required');
            $this->form_validation->set_rules('tel', 'เบอร์โทร', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('boss', 'หัวหน้ากลุ่ม', 'trim');

            $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

            if ($this->form_validation->run() == FALSE) {

                $msg = form_error('fname');
                $msg.= form_error('lname');
                $msg.= form_error('tel');
                $msg.= form_error('email');
                $msg.= form_error('boss');


                echo json_encode(array(
                    'is_successful' => FALSE,
                    'msg' => $msg
                ));
            } else {

                //$id = $this->input->post('id');
                $data['fname'] = $this->input->post('fname');
                $data['lname'] = $this->input->post('lname');
                $data['tel'] = $this->input->post('tel');
                $data['email'] = $this->input->post('email');
                $data['boss'] = $this->input->post('boss');

                //$where = array('id' => $id);
                //$this->db->update('student', $data, $where);

                echo json_encode(array(
                    'is_successful' => TRUE,
                    'msg' => 'บันทึกเรียบร้อย',
                    'list_data' => $data
                ));
            }

            //echo 'email is valid';
        } else {
            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => "รูปแบบ Email ไม่ถูกต้อง"
            ));
        }
    }

    public function getmax() {
        $sql = "SELECT max(Gid) as maxid
        FROM new_perspective";

        $gid = $this->db->query($sql)->row();

        $max = $gid->maxid + 1;

        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' => $max
        ));
    }

    public function submit_form1() {




        $this->load->library('form_validation');


        $this->form_validation->set_rules('fname', 'ชื่อ', 'trim|required');
        $this->form_validation->set_rules('lname', 'นามสกุล', 'trim|required');
        $this->form_validation->set_rules('tel', 'เบอร์โทร', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('boss', 'หัวหน้ากลุ่ม', 'required');
        $this->form_validation->set_rules('group_name', 'ชื่อกลุ่ม', 'trim|required');
        $this->form_validation->set_rules('advisor', 'อาจารย์ที่ปรึกษา', 'trim|required');

        $this->form_validation->set_message('required', 'กรุุณาป้อน %s');
        $this->form_validation->set_message('trim', 'กรุุณาป้อน %s');

        if ($this->form_validation->run() == FALSE) {

            $msg = form_error('fname');
            $msg.= form_error('lname');
            $msg.= form_error('tel');
            $msg.= form_error('email');
            $msg.= form_error('boss');
            $msg.= form_error('group_name');
            $msg.= form_error('advisor');


            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
            ));
        } else {

//$id = $this->input->post('id');
            $data['fname'] = $this->input->post('fname');
            $data['lname'] = $this->input->post('lname');
            $data['tel'] = $this->input->post('tel');
            $data['email'] = $this->input->post('email');
            $data['boss'] = $this->input->post('boss');

            $data['group_name'] = $this->input->post('group_name');
            $data['advisor'] = $this->input->post('advisor');


            $maxid = $this->input->post('groupid');

            //$max = $this->maxid;

            $query = array(
                'Gname' => $data['group_name'],
                'Gid' => $maxid,
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'Bossid' => $data['boss'],
                'advisors' => $data['advisor'],
                'tel' => $data['tel'],
                'email' => $data['email']
            );




            $this->db->insert('new_perspective', $query);

//$where = array('id' => $id);
//$this->db->update('student', $data, $where);

            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' => $maxid,
                'list_data' => $data
            ));
        }
    }

    public function data_list_found_out() {


        $data['start_row'] = $this->uri->segment(4, '0');
        $sql = "SELECT th_news.Nid,Ntext,title,link,link2,Ndate
FROM th_news LEFT JOIN images_new_new
ON th_news.Nid = images_new_new.Nid
ORDER BY Nid DESC";
        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด   


        $this->load->library('pagination');
        $config['base_url'] = site_url('site/inter2015/data_list_found_out');
        $data['baseUrl'] = $this->config->base_url();
        $config['total_rows'] = $data['total_row'];
        $config['per_page'] = 5;
        $config['num_links'] = 4;
        $config['uri_segment'] = 4;

        $config['is_ajax_paging'] = TRUE; // default FALSE
        $config['paging_function'] = 'getDriverList'; // Your jQuery paging
//config for bootstrap pagination class integration
        $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;


        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';


        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';


        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';


        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';


        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $this->pagination->initialize($config);
        $data["paginationLinks"] = $this->pagination->create_links();


        $start = $data['start_row'];
        $limit = $config['per_page'];

        //Edit To Do --> ORDER BY id ให้เปลี่ยน field id เป็น field ที่ต้องการเรียงลำดับ
        $sql = $sql . " LIMIT $limit OFFSET $start";


        $data['recData'] = $this->db->query($sql)->result_array();

        $data['is_search'] = FALSE;
        $data['txt_search'] = '';

        $data['code'] = '2';

        $this->load->view('site/2015/includes/test', $data);
    }

    public function data_list_found_in() {


        $data['start_row'] = $this->uri->segment(4, '0');
        $sql = "SELECT th_news.Nid,Ntext,title,link,link2,Ndate
    FROM th_news LEFT JOIN images_new_new
    ON th_news.Nid = images_new_new.Nid
    ORDER BY Nid DESC";
        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด   


        $this->load->library('pagination');
        $config['base_url'] = site_url('site/inter2015/data_list_found_in');
        $data['baseUrl'] = $this->config->base_url();
        $config['total_rows'] = $data['total_row'];
        $config['per_page'] = 5;
        $config['num_links'] = 4;
        $config['uri_segment'] = 4;

        $config['is_ajax_paging'] = TRUE; // default FALSE
        $config['paging_function'] = 'getDriverList'; // Your jQuery paging
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;


        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';


        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';


        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';


        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';


        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $this->pagination->initialize($config);
        $data["paginationLinks"] = $this->pagination->create_links();


        $start = $data['start_row'];
        $limit = $config['per_page'];

        //Edit To Do --> ORDER BY id ให้เปลี่ยน field id เป็น field ที่ต้องการเรียงลำดับ
        $sql = $sql . " LIMIT $limit OFFSET $start";


        $data['recData'] = $this->db->query($sql)->result_array();

        $data['is_search'] = FALSE;
        $data['txt_search'] = '';

        $data['code'] = '1';

        $this->load->view('site/2015/includes/test', $data);
    }

    public function data_controller() {


        $this->load->view('site/dashboard/data_inter_view');
    }

    public function list_services() {


        $this->load->view('site/dashboard/list_service_view');
    }

    public function list_exchange() {


        $this->load->view('site/dashboard/list_exchange_view');
    }

    public function list_km() {



        $this->load->view('site/dashboard/list_km_view', $data);
    }

    public function list_international($count) {

        if ($count == "1") {
            $sql = "select * from international_support";

            $data['mou'] = $this->db->query($sql)->result_array();

            $this->load->view('site/dashboard/detial_MOU', $data);
        }
        //$this->load->model('student/website_model');
        //$data['rec_data'] = $this->website_model->getData();

        $data['start_row'] = $this->uri->segment(4, '0');
        $sql = "select * from international_support order by id asc";
        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด     



        $this->load->library('pagination');
        $config['base_url'] = site_url('site/dashboard/list_international');
        $config['total_rows'] = $data['total_row'];
        $config['per_page'] = 30;
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


        //         echo $data['recData'];


        $this->load->view('site/dashboard/list_international_view', $data);
    }

    public function list_download() {


        //$this->load->model('student/website_model');
        //$data['rec_data'] = $this->website_model->getData();

        $data['start_row'] = $this->uri->segment(4, '0');
        $sql = "SELECT  *  
                FROM file_data
                ORDER BY id DESC";
        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด     



        $this->load->library('pagination');
        $config['base_url'] = site_url('site/dashboard/list_download');
        $config['total_rows'] = $data['total_row'];
        $config['per_page'] = 15;
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


        //         echo $data['recData'];


        $this->load->view('site/dashboard/list_download_view', $data);
    }

    public function list_news() {


        //$this->load->model('student/website_model');
        //$data['rec_data'] = $this->website_model->getData();

        $data['start_row'] = $this->uri->segment(4, '0');
        $sql = "SELECT * FROM news_data ORDER BY id DESC";
        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด     



        $this->load->library('pagination');
        $config['base_url'] = site_url('site/dashboard/list_news');
        $config['total_rows'] = $data['total_row'];
        $config['per_page'] = 15;
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


        //         echo $data['recData'];


        $this->load->view('site/dashboard/list_news_view', $data);
    }

    public function check_login() {

        $db2 = $this->load->database('orasis', TRUE);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'ชื่อ', 'required');
        $this->form_validation->set_rules('sex', 'เพศ', 'required');

        $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

        if ($this->form_validation->run() == FALSE) {

            $msg = form_error('name');
            $msg.= form_error('sex');


            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
            ));
        } else {
            $data['name'] = $this->input->post('name');
            $data['sex'] = $this->input->post('sex');

            //            $sql = "select * from personal where username = '".$data['name']."' and password = '".$data['name']."'";
            $query = $this->db->get_where('personal', array('username' => $data['name'], 'password' => $data['sex']));

            $rowcount = $query->num_rows();

            if ($rowcount > 0) {
                //                $result = array('user','status','name','Pid');

                foreach ($query->result_array() as $row) {
                    //                    $result = array(
                    //                    'user' => $data['name'],
                    //                    'status' => $row['status'],
                    //                    'name' => $row['name'],
                    //                    'Pid' => $row['Pid']
                    //                    );
                    $_SESSION['user'] = $data['name'];
                    $_SESSION['status'] = $row['status'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['Pid'] = $row['Pid'];

                    $dataArray = array(
                        'user' => $data['name'],
                        'status' => $row['status'],
                        'name' => $row['name'],
                        'Pid' => $row['Pid']
                    );

                    $this->session->set_userdata($dataArray);
                }

                //                $this->session->set_userdata($result);

                echo json_encode(array(
                    'is_successful' => TRUE,
                    'msg' => $_SESSION['user']
                ));
            } else {
                echo json_encode(array(
                    'is_successful' => FALSE,
                    'msg' => 'ข้อมูลไม่ถูกต้อง'
                ));
            }
        }
    }

    public function list_activity() {


        //$this->load->model('student/website_model');
        //$data['rec_data'] = $this->website_model->getData();

        $data['start_row'] = $this->uri->segment(4, '0');
        $sql = "SELECT th_news.Nid,Ntext,title,link,link2,Ndate
                                FROM th_news LEFT JOIN images_new_new
                                ON th_news.Nid = images_new_new.Nid
                                ORDER BY Nid DESC";
        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด     



        $this->load->library('pagination');
        $config['base_url'] = site_url('site/dashboard/list_activity');
        $config['total_rows'] = $data['total_row'];
        $config['per_page'] = 15;
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


        //         echo $data['recData'];


        $this->load->view('site/dashboard/list_activity_view', $data);
    }

    public function list_scholarships() {




        $data['start_row'] = $this->uri->segment(4, '0');

        $sql = "SELECT * 
                                        FROM fund_data
                                        ORDER BY id DESC";

        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด     



        $this->load->library('pagination');
        $config['base_url'] = site_url('site/dashboard/list_scholarships');
        $config['total_rows'] = $data['total_row'];
        $config['per_page'] = 15;
        $config['num_links'] = 6;
        $config['uri_segment'] = 4;
        $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
        $this->pagination->initialize($config);

        $start = $data['start_row'];
        $limit = $config['per_page'];

        //Edit To Do --> ORDER BY id ให้เปลี่ยน field id เป็น field ที่ต้องการเรียงลำดับ
        $sql = $sql . " LIMIT $limit OFFSET $start";


        $data['recData'] = $this->db->query($sql)->result_array();

        $data['is_search'] = FALSE;
        $data['txt_search'] = '';


        echo $data['total_row'];




        $this->load->view('site/dashboard/list_scholarships_view', $data);
    }

    public function spark_2015() {
        $db2 = $this->load->database('orasis', TRUE);

        $sql = "SELECT DISTINCT(count(*)) as count
                                                FROM view_inter_student
                                                WHERE year_in = '2556'";

        $data['student2556'] = $db2->query($sql);

        $sql = "SELECT DISTINCT(count(*)) as count
                                                FROM student_language
                                                WHERE year_in='2556'";

        $data['student2556_inter'] = $this->db->query($sql);


        $sql = "SELECT DISTINCT(count(*)) as count
                                                FROM view_inter_student
                                                WHERE year_in = '2557'";

        $data['student2557'] = $db2->query($sql);

        $sql = "SELECT DISTINCT(count(*)) as count
                                                FROM student_language
                                                WHERE year_in='2557'";

        $data['student2557_inter'] = $this->db->query($sql);






        $this->load->view('site/dashboard/spark', $data);
    }

    public function list_exten() {
        $this->load->view('site/dashboard/list_exten_view');
    }

    public function personal() {
        $this->load->view('site/dashboard/personal_view');
    }

    public function about() {
        $this->load->view('site/dashboard/about_view');
    }

    public function view_passport() {
        $this->load->view('site/dashboard/list_passport_view');
    }

    public function view_visa() {
        $this->load->view('site/dashboard/list_visa');
    }

    public function km() {

        $this->load->model('dashboard_model');
        $data['km'] = $this->dashboard_model->ListKm();

        $this->load->view('site/dashboard/km_view', $data);
    }

    public function gms() {

        $this->load->model('dashboard_model');
        $data['km'] = $this->dashboard_model->ListKm();

        $this->load->view('site/dashboard/gms_view', $data);
    }

    public function view_notvisa() {


        //        $data['start_row'] = $this->uri->segment(4, '0');
        //        $sql = "select * from nation_visa order by n_id asc";
        //        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด     
        //
                                                //
                                                //
                                                //        $this->load->library('pagination');
        //        $config['base_url'] = site_url('site/dashboard/view_notvisa');
        //        $config['total_rows'] = $data['total_row'];
        //        $config['per_page'] = 30;
        //        $config['num_links'] = 6;
        //        $config['uri_segment'] = 4;
        //        $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
        //        $this->pagination->initialize($config);
        //
                                                        //        $start = $data['start_row'];
        //        $limit = $config['per_page'];
        //
                                                        ////Edit To Do --> ORDER BY id ให้เปลี่ยน field id เป็น field ที่ต้องการเรียงลำดับ
        //        $sql = $sql . " LIMIT $limit OFFSET $start";
        //
                                                        //
                                                        //        $data['recData'] = $this->db->query($sql);
        //
                                                        //        $data['is_search'] = FALSE;
        //        $data['txt_search'] = '';

        $this->load->view('site/dashboard/list_notvisa_view');
    }

    public function show_student() {

        $this->load->model('dashboard_model');
        $data['record'] = $this->dashboard_model->getData();

        $this->load->view('admin/dashboard/test', $data);
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

    public function sam() {
        $this->load->view('site/dashboard/sam');
    }

    public function gallery($id) {


        $sql = "select th_news.Nid,images_2014.parth_img
                                                        from th_news,images_2014
                                                        where th_news.Nid = images_2014.Nid 
                                                        and th_news.Nid = $id";

        $data['activity'] = $this->db->query($sql)->result_array();

        $sql = "SELECT Nid,Ntext,title,Ndate
                                                        FROM th_news
                                                        where Nid = $id;";
        $data['data'] = $this->db->query($sql)->result_array();






        $this->load->view('site/dashboard/activity_view', $data);
    }

    public function showlist_work() {
        //        $sql = "select *
        //                from work_2015";
        //        
        //        $data['work'] = $this->db->query($sql)->result_array();

        $this->load->view('site/calendar/default');
    }

    function th() {
        $this->session->set_userdata('language', 'thai');

        redirect($this->session->userdata('LASTURL'));
    }

    function en() {
        $this->session->set_userdata('language', 'english');

        redirect($this->session->userdata('LASTURL'));
    }

    function ch() {
        $this->session->set_userdata('language', 'chaina');

        redirect($this->session->userdata('LASTURL'));
    }

}
