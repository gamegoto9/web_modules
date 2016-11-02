<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends CI_Controller {

    function _construct() {
        parent::_construct();
        $this->load->library("tcpdf");
    }

    public function index() {
        $this->load->view('admin/student/dashboard/dashboard_view');
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

        $db2 = $this->load->database('orasis', TRUE);
        //$this->load->model('dashboard_model');
        //$data['record'] = $this->dashboard_model->getData_duruble_goods($type);


        if ($type == "01") {

            $sql = "SELECT year_in,count(DISTINCT std_id) as amount
            FROM view_inter_student
            where lev_name_en != 'Certificate'
            GROUP BY year_in
            ORDER BY year_in DESC";

            $data['student'] = $db2->query($sql)->result_array();
            $data['send1'] = "02";
        } else if ($type == "02") {

            $sql = "SELECT year_in,count(DISTINCT std_id) as amount
            FROM student_language
            GROUP BY year_in
            ORDER BY year_in DESC";

            $data['student'] = $this->db->query($sql)->result_array();


            $sql = "SELECT year_in,count(DISTINCT std_id) as amount
            FROM view_inter_student
            where lev_name_en = 'Certificate'
            GROUP BY year_in
            ORDER BY year_in DESC";

            $data['student2'] = $db2->query($sql)->result_array();


            $data['send1'] = "03";
        }



        $this->load->view('admin/student/dashboard/show_student_year', $data);
    }

    public function show_data_student_year($year) {

        $db2 = $this->load->database('orasis', TRUE);

        if ($year == "02") {
            $sql = "SELECT DISTINCT *
                    FROM view_inter_student
                    where lev_name_en != 'Certificate'
                    ORDER BY year_in desc";

            $data['student'] = $db2->query($sql)->result_array();
            $data['send'] = "02";
        } else if ($year == "03") {
            $sql = "SELECT student_language.std_id,passport_id,std_fname_en,std_lname_en,sub_name_th,maj_name_th,lev_name_st,inter_type_name_th,nation_name_th
                    from  student_language LEFT JOIN detial_subject USING(detial_id),subject_student,major_student,level_student
                    where  
			
			detial_subject.sub_id = subject_student.sub_id AND
			subject_student.maj_id = major_student.maj_id AND
			detial_subject.lev_id = level_student.lev_id";

            $data['student'] = $this->db->query($sql)->result_array();

            $sql = "SELECT DISTINCT *
                    FROM view_inter_student
                    where lev_name_en = 'Certificate'
                    ORDER BY year_in desc";

            $data['student2'] = $db2->query($sql)->result_array();

            $data['send'] = "03";
        }

        $this->load->view('admin/student/dashboard/show_data_student', $data);
    }

    public function show_data_std1($year) {

        $db2 = $this->load->database('orasis', TRUE);
        $sql = "SELECT DISTINCT *
            FROM view_inter_student
            WHERE year_in = '$year' and lev_name_en != 'Certificate' ";

        $data['student'] = $db2->query($sql)->result_array();
        $data['send'] = "02";
        $this->load->view('admin/student/dashboard/show_data_student', $data);
    }

    public function show_data_std2($year) {


        $sql = "SELECT student_language.std_id,birthday,nation_id,year_in,date_in,std_status_name_th,pname_en,passport_id,std_fname_en,std_lname_en,sub_name_th,maj_name_th,lev_name_st,inter_type_name_th,nation_name_th
                from  student_language LEFT JOIN detial_subject USING(detial_id),subject_student,major_student,level_student
                where  
			
			detial_subject.sub_id = subject_student.sub_id AND
			subject_student.maj_id = major_student.maj_id AND
			detial_subject.lev_id = level_student.lev_id AND
			year_in = '$year'";
        $data['student'] = $this->db->query($sql)->result_array();



        $db2 = $this->load->database('orasis', TRUE);
        $sql = "SELECT DISTINCT *
            FROM view_inter_student
            WHERE year_in = '$year' and lev_name_en = 'Certificate' ";

        $data['student2'] = $db2->query($sql)->result_array();


        $data['send'] = "03";
        $this->load->view('admin/student/dashboard/show_data_student', $data);
    }

    public function insert_img() {


        for ($i = 1; $i <= 44; $i++) {

            $data = array(
                'id_img' => '',
                'Nid' => '36',
                'parth_img' => 'http://crruinter.crru.ac.th/bootstrap/-/upload/2015-03-06-' . $i . '.jpg'
            );



            $this->db->insert('images_2014', $data);
        }
    }

    public function checkMA_student($count) {
        $db2 = $this->load->database('orasis', TRUE);

        if ($count == "01" || $count == "0") {
            $sql = "SELECT fac_name_th,lev_name_en,nation_id,nation_name_th,count(DISTINCT std_id) as count
                FROM view_inter_student
                WHERE std_status_id = 'MA' and fac_name_th !='' and fac_name_th != 'คณะที่รับผิดชอบโปรแกรม'
                GROUP BY fac_name_th,lev_name_en,nation_id,nation_name_th
                ORDER BY fac_name_th ASC";

            $data['student'] = $db2->query($sql)->result_array();
            $data['send'] = "0";
        } else if ($count == "03" || $count == "5") {
            $sql = "select maj_name_th,lev_name_en,nation_id,nation_name_th,count(DISTINCT std_id) AS count
                    from student_language,detial_subject,subject_student,major_student,level_student
                    where student_language.detial_id = detial_subject.detial_id and
			detial_subject.sub_id = subject_student.sub_id and
			subject_student.maj_id = major_student.maj_id and
			detial_subject.lev_id = level_student.lev_id and
                        std_status_id = 'MA'
                    group by maj_name_th,lev_name_en,nation_id,nation_name_th
                    order by maj_name_th asc";

            $data['student'] = $this->db->query($sql)->result_array();
            $data['send'] = "5";
        }

        if ($count == "01" || $count == "03") {
            $this->load->view('admin/student/dashboard/show_student_MA', $data);
        } else {
            $this->load->view('admin/student/dashboard/detial_student_MA', $data);
        }
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



        if ($key == "sphrd2345") {

            $condition = array('id_goods' => $id);
            $this->db->delete('durable_goods', $condition);

            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' => 'บันทึกเรียบร้อย'
            ));
        } else {
            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => 'ผิดพลาด'
            ));
        }
    }

    public function show_data_student($std_id) {
        //$this->load->view('admin/dashboard/show_data_student');
        $db2 = $this->load->database('orasis', TRUE);
        $sql = "SELECT * FROM view_inter_student WHERE std_id = '$std_id'";
        $data['student'] = $db2->query($sql)->result_array();
        $student_data = $db2->query($sql);
        $data['send'] = "01";
        if ($student_data->num_rows() <= 0) {
            $sql = "SELECT student_language.std_id,birthday,nation_id,year_in,date_in,std_status_name_th,pname_en,passport_id,std_fname_en,std_lname_en,sub_name_th,maj_name_th,lev_name_st,inter_type_name_th,nation_name_th
            from  student_language LEFT JOIN detial_subject USING(detial_id),subject_student,major_student,level_student
            where  
			
			detial_subject.sub_id = subject_student.sub_id AND
			subject_student.maj_id = major_student.maj_id AND
			detial_subject.lev_id = level_student.lev_id and
                        std_id = '$std_id'";
            $data['student'] = $this->db->query($sql)->result_array();
            $data['send'] = "02";
        }





        $this->load->view('admin/student/dashboard/data_student', $data);
    }

    public function confrim_student() {
        $this->load->view('admin/student/dashboard/confirm_student');
    }

    public function select_data_type($id, $type) {




        $sql = "SELECT student_language.std_id,passport_id,std_fname_en,std_lname_en,sub_name_th,maj_name_th,lev_name_st,inter_type_name_th,nation_name_th,std_status_name_th,std_status_id
        from  student_language LEFT JOIN detial_subject USING(detial_id),subject_student,major_student,level_student
                    where  
			
			detial_subject.sub_id = subject_student.sub_id AND
			subject_student.maj_id = major_student.maj_id AND
			detial_subject.lev_id = level_student.lev_id AND
                        student_language.$id = '$type'";



        $data['student'] = $this->db->query($sql)->result_array();


        $newdataType = array(
            'sc_type1' => $id,
            'sc_type2' => $type
        );

        $this->session->set_userdata($newdataType);

        $this->load->view('admin/student/dashboard/confirm_student_data', $data);
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

    public function Logout() {
        $this->session->sess_destroy();

        header("Refresh : 0;url = http://crruinter.crru.ac.th/admin/logout.php");
    }

    public function select_type() {
        $id = $this->input->post('id');

        $sql = "select $id as colum1 from student_language group by $id order by $id desc";

        $data = $this->db->query($sql)->result_array();

        echo json_encode(array(
            'is_successful' => TRUE,
            'data' => $data
        ));
    }

    public function conf_studentAll() {


        $id = $this->input->post('id');
        $key = $this->input->post('key');
        $user = $this->session->userdata('Pid');
        $name = $this->session->userdata('name');
        $date = date("Y-m-d h:i:sa");

        if ($key == "sphrd2345") {

//            $data = array('std_status_id' => '0E',
//                'std_status_name_th' => 'อนุมัติผล');
//
//            $this->db->where('std_id', $id);
//            $this->db->update('student_language', $data);

            $sql = "update student_language"
                    . " set std_status_name_th = 'อนุมัติผล',"
                    . "std_status_id = '0E'"
                    . "where std_id in ($id)";

            $this->db->query($sql);
//            $data_insert = array('conf_id' => 0,
//                'Pid' => $user,
//                'std_id' => $id,
//                'Ddate' => $date);
//            $this->db->insert('confirm_student', $data_insert);


            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' => 'บันทึกเรียบร้อย' . $sql
            ));
        } else {
            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => 'ผิดพลาด'
            ));
        }
    }

    public function conf_student() {


        $id = $this->input->post('id');
        $key = $this->input->post('key');
        $user = $this->session->userdata('Pid');
        $name = $this->session->userdata('name');
        $date = date("Y-m-d h:i:sa");

        if ($key == "sphrd2345") {

            $data = array('std_status_id' => '0E',
                'std_status_name_th' => 'อนุมัติผล');

            $this->db->where('std_id', $id);
            $this->db->update('student_language', $data);


            $data_insert = array('conf_id' => 0,
                'Pid' => $user,
                'std_id' => $id,
                'Ddate' => $date);
            $this->db->insert('confirm_student', $data_insert);


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

}
