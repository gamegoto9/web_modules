<?php

session_start();
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Inter2017_2 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $val_lang = $this->session->userdata('language');

        switch ($val_lang) {
            case "english":$lang_ = "en";
                break;
            case "thai":$lang_ = "th";
                break;
            case "chaina":$lang_ = "cn";
                break;
        }

        if (!($this->session->userdata('language'))) {
            $this->session->set_userdata('language', 'english');
        }
    }

    public function lang__()
    {
        $val_lang = $this->session->userdata('language');

        switch ($val_lang) {
            case "english":$lang_title = "en";
                break;
            case "thai":$lang_title = "th";
                break;
            case "chaina":$lang_title = "ch";
                break;
        }

        return $lang_title;
    }

    public function index()
    {

        $sql = "SELECT news_data.id,title_th,title_en,title_ch,Ddate,note,name
                FROM news_data,news_file
                WHERE news_data.id = news_file.id
                ORDER BY news_data.id DESC
                LIMIT 5;";

        $data['news'] = $this->db->query($sql)->result_array();

        $sql              = "SELECT * FROM new_data_std ORDER BY id DESC LIMIT 5;";
        $data['news_std'] = $this->db->query($sql)->result_array();

        $sql              = "SELECT * FROM new_data_tec ORDER BY id DESC LIMIT 5;";
        $data['news_tec'] = $this->db->query($sql)->result_array();

        $lang     = new Inter2017_2();
        $new_lang = $lang->lang__();

        $data['lang'] = "title_" . $new_lang;
////
        $user_language = $this->session->userdata('language');

        switch ($user_language) {
            case "english":$lang_ = "en";
                break;
            case "thai":$lang_ = "th";
                break;
            case "chaina":$lang_ = "cn";
                break;
        }

        $sql = "SELECT fund_data.id,title_" . $lang_ . " as title,Ddate,note,fund_file.name as file,multi_file
        FROM fund_data,fund_file
                WHERE fund_data.id = fund_file.id
        ORDER BY fund_data.id DESC
        limit 3";
        $data['fond_out'] = $this->db->query($sql)->result_array();

        $sql = "SELECT fund_data_in.id,title_" . $lang_ . " as title,Ddate,note,fund_file_in.name as file,multi_file
        FROM fund_data_in,fund_file_in
                WHERE fund_data_in.id = fund_file_in.id
        ORDER BY fund_data_in.id DESC
        limit 3";
        $data['fond_in'] = $this->db->query($sql)->result_array();

        $sql = "SELECT t1.Nid,
         Ndate,
         title,
         Ntext,
         t2.parth_img
         FROM ".$lang_."_news  as t1  LEFT JOIN
            (select parth_img,".$lang_."_news.Nid
            from images_2014,".$lang_."_news
            WHERE images_2014.Nid = ".$lang_."_news.Nid) as t2 ON t2.Nid= t1.Nid
         GROUP BY t1.Nid
         ORDER BY t1.Nid DESC
         LIMIT 4
         ";
         $data['activitys'] = $this->db->query($sql)->result_array();

        //        $sql = "SELECT *
        //         FROM fund_data
        //         ORDER BY id DESC
        //         LIMIT 4";
        //        $data['fund'] = $this->db->query($sql)->result_array();
        ////
        ////        $sql = "SELECT th_news.Nid,Ntext,title,link,link2,Ndate
        ////         FROM th_news LEFT JOIN images_new_new
        ////                   ON th_news.Nid = images_new_new.Nid
        ////         ORDER BY Nid DESC
        ////         LIMIT 7;";
        ////        $data['activity'] = $this->db->query($sql)->result_array();
        ////         $sql = "SELECT th_news.Nid,Ntext,title,parth_img,Ndate
        ////         FROM th_news,images_2014
        ////                where th_news.Nid = images_2014.Nid
        ////         ORDER BY Nid DESC
        ////         LIMIT 7;";
        ////       $data['activity'] = $this->db->query($sql)->result_array();
        //echo $this->session->userdata('language');

        $this->load->view('site/2017_2/home', $data);
    }

    public function activity_menu()
    {

        $user_language     = $this->session->userdata('language');
        $data['start_row'] = $this->input->post('page');

        switch ($user_language) {
            case "english":$lang_ = "en";
                break;
            case "thai":$lang_ = "th";
                break;
            case "chaina":$lang_ = "cn";
                break;
        }

        if ($data['start_row'] != 0) {
            $start = ($data['start_row'] - 1) * 3;
        } else {

            $start = 0;
        }

        $data['start_row'] = $this->input->post('page');
        $sql               = "SELECT " . $lang_ . "_news.Nid,Ntext,title,link,link2,Ndate
        FROM " . $lang_ . "_news LEFT JOIN images_new_new
                    ON " . $lang_ . "_news.Nid = images_new_new.Nid
        ORDER BY Nid DESC";
        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด

        $limit = 3;

//Edit To Do --> ORDER BY id ให้เปลี่ยน field id เป็น field ที่ต้องการเรียงลำดับ
        $sql = $sql . " LIMIT $limit OFFSET $start";

        $data['recData'] = $this->db->query($sql)->result_array();

        $this->load->view('site/2015/activity_munu', $data);
    }

    public function data_list_found_out()
    {

        $data['start_row'] = $this->input->post('page');

        if ($data['start_row'] != 0) {
            $start = ($data['start_row'] - 1) * 5;
        } else {

            $start = 0;
        }
        $user_language = $this->session->userdata('language');

        switch ($user_language) {
            case "english":$lang_ = "en";
                break;
            case "thai":$lang_ = "th";
                break;
            case "chaina":$lang_ = "cn";
                break;
        }

        $sql = "SELECT fund_data.id,title_" . $lang_ . ",Ddate,note,fund_file.name as file,multi_file
        FROM fund_data,fund_file
                WHERE fund_data.id = fund_file.id
        ORDER BY fund_data.id DESC";
        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด

        $limit = 15;

//Edit To Do --> ORDER BY id ให้เปลี่ยน field id เป็น field ที่ต้องการเรียงลำดับ
        $sql = $sql . " LIMIT $limit OFFSET $start";

        $data['title']   = "title_" . $lang_;
        $data['recData'] = $this->db->query($sql);
        $this->load->view('site/2017_2/tab_content2', $data);
    }

    public function data_list_found_in()
    {

        $data['start_row'] = $this->input->post('page');

        if ($data['start_row'] != 0) {
            $start = ($data['start_row'] - 1) * 5;
        } else {

            $start = 0;
        }

        $user_language = $this->session->userdata('language');

        switch ($user_language) {
            case "english":$lang_ = "en";
                break;
            case "thai":$lang_ = "th";
                break;
            case "chaina":$lang_ = "cn";
                break;
        }

        $sql = "SELECT fund_data_in.id,title_" . $lang_ . ",Ddate,note,fund_file_in.name as file,multi_file
        FROM fund_data_in,fund_file_in
                WHERE fund_data_in.id = fund_file_in.id
        ORDER BY fund_data_in.id DESC";
        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด

        $limit = 15;

//Edit To Do --> ORDER BY id ให้เปลี่ยน field id เป็น field ที่ต้องการเรียงลำดับ
        $sql = $sql . " LIMIT $limit OFFSET $start";

        $data['title']   = "title_" . $lang_;
        $data['recData'] = $this->db->query($sql);
        $this->load->view('site/2017_2/tab_content2', $data);
    }

    public function data_controller()
    {

        $this->load->view('site/dashboard/data_inter_view');
    }

    public function list_services()
    {

        $this->load->view('site/dashboard/list_service_view');
    }

    public function list_exchange()
    {

        $this->load->view('site/dashboard/list_exchange_view');
    }

    public function list_km()
    {

        $this->load->view('site/dashboard/list_km_view', $data);
    }

    public function list_international()
    {
        

        // if ($count == "1") {
        //     $sql = "select * from international_support";

        //     $data['mou'] = $this->db->query($sql)->result_array();

        //     $this->load->view('site/dashboard/detial_MOU', $data);
        // }
        //$this->load->model('student/website_model');
        //$data['rec_data'] = $this->website_model->getData();

        $data['start_row'] = $this->uri->segment(4, '0');
        $sql               = "select * from international_support order by id asc";
        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด

        $this->load->library('pagination');
        $config['base_url']      = site_url('site/Inter2017_2/list_international/');
        $config['total_rows']    = $data['total_row'];
        $config['per_page']      = 30;
        $config['num_links']     = 6;
        $config['uri_segment']   = 4;
        $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
        $this->pagination->initialize($config);

        $start = $data['start_row'];
        $limit = $config['per_page'];

//Edit To Do --> ORDER BY id ให้เปลี่ยน field id เป็น field ที่ต้องการเรียงลำดับ
        $sql = $sql . " LIMIT $limit OFFSET $start";

        $data['recData'] = $this->db->query($sql);

        $data['is_search']  = false;
        $data['txt_search'] = '';

//         echo $data['recData'];

        $this->load->view('site/2017_2/mou_view', $data);
    }

    public function list_download()
    {

        //$this->load->model('student/website_model');
        //$data['rec_data'] = $this->website_model->getData();

        $data['start_row'] = $this->uri->segment(4, '0');
        $sql               = "SELECT  *
            FROM file_data
            ORDER BY id DESC";
        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด

        $this->load->library('pagination');
        $config['base_url']      = site_url('site/dashboard/list_download');
        $config['total_rows']    = $data['total_row'];
        $config['per_page']      = 15;
        $config['num_links']     = 6;
        $config['uri_segment']   = 4;
        $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
        $this->pagination->initialize($config);

        $start = $data['start_row'];
        $limit = $config['per_page'];

//Edit To Do --> ORDER BY id ให้เปลี่ยน field id เป็น field ที่ต้องการเรียงลำดับ
        $sql = $sql . " LIMIT $limit OFFSET $start";

        $data['recData'] = $this->db->query($sql);

        $data['is_search']  = false;
        $data['txt_search'] = '';

//         echo $data['recData'];

        $this->load->view('site/dashboard/list_download_view', $data);
    }

    public function list_news()
    {

        //$this->load->model('student/website_model');
        //$data['rec_data'] = $this->website_model->getData();

        $data['start_row'] = $this->uri->segment(4, '0');
        $sql               = "SELECT * FROM news_data ORDER BY id DESC";
        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด

        $this->load->library('pagination');
        $config['base_url']      = site_url('site/dashboard/list_news');
        $config['total_rows']    = $data['total_row'];
        $config['per_page']      = 15;
        $config['num_links']     = 6;
        $config['uri_segment']   = 4;
        $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
        $this->pagination->initialize($config);

        $start = $data['start_row'];
        $limit = $config['per_page'];

//Edit To Do --> ORDER BY id ให้เปลี่ยน field id เป็น field ที่ต้องการเรียงลำดับ
        $sql = $sql . " LIMIT $limit OFFSET $start";

        $data['recData'] = $this->db->query($sql);

        $data['is_search']  = false;
        $data['txt_search'] = '';

//         echo $data['recData'];

        $this->load->view('site/dashboard/list_news_view', $data);
    }

    public function login_view(){
        $this->load->view('site/login');
    }

    public function check_login()
    {

        //$db2 = $this->load->database('orasis', TRUE);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'ชื่อ', 'required');
        $this->form_validation->set_rules('sex', 'เพศ', 'required');

        $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

        if ($this->form_validation->run() == false) {

            $msg = form_error('name');
            $msg .= form_error('sex');

            echo json_encode(array(
                'is_successful' => false,
                'msg'           => $msg,
            ));
        } else {
            $data['name'] = $this->input->post('name');
            $data['sex']  = $this->input->post('sex');

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
                    $_SESSION['user']   = $data['name'];
                    $_SESSION['status'] = $row['status'];
                    $_SESSION['name']   = $row['name'];
                    $_SESSION['Pid']    = $row['Pid'];

                    $dataArray = array(
                        'user'   => $data['name'],
                        'status' => $row['status'],
                        'name'   => $row['name'],
                        'Pid'    => $row['Pid'],
                    );

                    $this->session->set_userdata($dataArray);
                }

//                $this->session->set_userdata($result);

                echo json_encode(array(
                    'is_successful' => true,
                    'msg'           => $_SESSION['user'],
                ));
            } else {
                echo json_encode(array(
                    'is_successful' => false,
                    'msg'           => 'ข้อมูลไม่ถูกต้อง',
                ));
            }
        }
    }

    public function list_activity()
    {

        //$this->load->model('student/website_model');
        //$data['rec_data'] = $this->website_model->getData();

        $user_language = $this->session->userdata('language');

        switch ($user_language) {
            case "english":$lang_ = "en";
                break;
            case "thai":$lang_ = "th";
                break;
            case "chaina":$lang_ = "cn";
                break;
        }

        $data['start_row'] = $this->uri->segment(4, '0');
        $sql = "SELECT t1.Nid,
         Ndate,
         title,
         Ntext,
         t2.parth_img
         FROM ".$lang_."_news  as t1  LEFT JOIN
            (select parth_img,".$lang_."_news.Nid
            from images_2014,".$lang_."_news
            WHERE images_2014.Nid = ".$lang_."_news.Nid) as t2 ON t2.Nid= t1.Nid
         GROUP BY t1.Nid
         ORDER BY t1.Nid DESC";

        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด

        $this->load->library('pagination');
        $config['base_url']      = site_url('site/inter2017_2/list_activity');
        $config['total_rows']    = $data['total_row'];
        $config['per_page']      = 8;
        $config['num_links']     = 6;
        $config['uri_segment']   = 4;
        $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
        $this->pagination->initialize($config);

        $start = $data['start_row'];
        $limit = $config['per_page'];

//Edit To Do --> ORDER BY id ให้เปลี่ยน field id เป็น field ที่ต้องการเรียงลำดับ
        $sql = $sql . " LIMIT $limit OFFSET $start";

        $data['recData'] = $this->db->query($sql);

        $data['is_search']  = false;
        $data['txt_search'] = '';

//         echo $data['recData'];

        $this->load->view('site/2017_2/activitys_view', $data);
    }

    public function list_scholarships()
    {

        $data['start_row'] = $this->uri->segment(4, '0');

        $sql = "SELECT *
        FROM fund_data
        ORDER BY id DESC";

        $data['total_row'] = $this->db->query($sql)->num_rows(); //นับแถวทั้งหมด

        $this->load->library('pagination');
        $config['base_url']      = site_url('site/dashboard/list_scholarships');
        $config['total_rows']    = $data['total_row'];
        $config['per_page']      = 15;
        $config['num_links']     = 6;
        $config['uri_segment']   = 4;
        $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
        $this->pagination->initialize($config);

        $start = $data['start_row'];
        $limit = $config['per_page'];

//Edit To Do --> ORDER BY id ให้เปลี่ยน field id เป็น field ที่ต้องการเรียงลำดับ
        $sql = $sql . " LIMIT $limit OFFSET $start";

        $data['recData'] = $this->db->query($sql)->result_array();

        $data['is_search']  = false;
        $data['txt_search'] = '';

        echo $data['total_row'];

        $this->load->view('site/dashboard/list_scholarships_view', $data);
    }

    public function spark_2015()
    {
        $db2 = $this->load->database('orasis', true);

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

    public function list_exten()
    {
        $this->load->view('site/dashboard/list_exten_view');
    }

    public function personal()
    {
        $this->load->view('site/2017_2/abount_personal');
    }

    public function scholarships(){
        $this->load->view('site/2017_2/scholarships_view');
    }

    public function about()
    {
        $this->load->view('site/2017_2/abount_view');
    }

    public function passport()
    {
        $this->load->view('site/2017_2/passport_view');
    }

    public function view_visa()
    {
        $this->load->view('site/dashboard/list_visa');
    }

    public function km()
    {

        $this->load->model('dashboard_model');
        $data['km'] = $this->dashboard_model->ListKm();

        $this->load->view('site/dashboard/km_view', $data);
    }

    public function gms()
    {

        $this->load->model('dashboard_model');
        $data['km'] = $this->dashboard_model->ListKm();

        $this->load->view('site/dashboard/gms_view', $data);
    }

    public function view_notvisa()
    {

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

    public function show_student()
    {

        $this->load->model('dashboard_model');
        $data['record'] = $this->dashboard_model->getData();

        $this->load->view('admin/dashboard/test', $data);
    }

    public function delete_data_student()
    {

//        $id = $this->input->post('id');
        //        $condition = array('id' => $id);
        //
        //        $this->db->delete('student', $condition);

        echo json_encode(array(
            'is_successful' => true,
            'msg'           => 'บันทึกเรียบร้อย',
        ));
    }

    public function show_data_student()
    {
        $this->load->view('admin/dashboard/show_data_student');
    }

    public function test()
    {

        $db2          = $this->load->database('orasis', true);
        $sql          = "SELECT * FROM view_inter_student limit 100";
        $student_data = $db2->query($sql)->result_array();

        foreach ($student_data as $row) {
            echo $row['std_id'];
            echo "<br>";
        }
    }

    public function sam()
    {
        $this->load->view('site/dashboard/sam');
    }

    public function gallery($id)
    {

        $sql = "select th_news.Nid,images_2014.parth_img
                from th_news,images_2014
                where th_news.Nid = images_2014.Nid
                and th_news.Nid = $id";

        $data['activity'] = $this->db->query($sql)->result_array();

        $sql = "SELECT Nid,Ntext,title,Ndate
        FROM th_news
                where Nid = $id;";
        $data['data'] = $this->db->query($sql)->row_array();

        $this->load->view('site/2017_2/activitys_view_data', $data);
    }

    public function showlist_work()
    {
//        $sql = "select *
        //                from work_2015";
        //
        //        $data['work'] = $this->db->query($sql)->result_array();

        $this->load->view('site/calendar/default');
    }


    public function relations(){
        $sql = "SELECT news_data.id,title_th,title_en,title_ch,Ddate,note,name
                FROM news_data,news_file
                WHERE news_data.id = news_file.id
                ORDER BY news_data.id DESC
                ";

        $data['news'] = $this->db->query($sql)->result_array();

        $sql              = "SELECT * FROM new_data_std ORDER BY id DESC;";
        $data['news_std'] = $this->db->query($sql)->result_array();

        $sql              = "SELECT * FROM new_data_tec ORDER BY id DESC;";
        $data['news_tec'] = $this->db->query($sql)->result_array();

        $lang     = new Inter2017_2();
        $new_lang = $lang->lang__();

        $data['lang'] = "title_" . $new_lang;

        $this->load->view('site/2017_2/relations_view', $data);

    }













    public function th()
    {
        $this->session->set_userdata('language', 'thai');

        redirect($this->session->userdata('LASTURL'));
    }

    public function en()
    {
        $this->session->set_userdata('language', 'english');

        redirect($this->session->userdata('LASTURL'));
    }

    public function ch()
    {
        $this->session->set_userdata('language', 'chaina');

        redirect($this->session->userdata('LASTURL'));
    }

}
