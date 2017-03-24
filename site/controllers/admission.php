<?php

session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admission extends CI_Controller {

    function __construct() {
        parent::__construct();

        $val_lang = $this->session->userdata('language');

        switch ($val_lang) {
            case "english" : $lang_ = "en";
            break;
            case "thai" : $lang_ = "th";
            break;
            case "chaina" : $lang_ = "cn";
            break;
        }

        if (!($this->session->userdata('language'))) {
            $this->session->set_userdata('language', 'english');
        }
    }

    public function lang__() {

        $val_lang = $this->session->userdata('language');



        switch ($val_lang) {
            case "english" : $lang_title = "en";
            break;
            case "thai" : $lang_title = "th";
            break;
            case "chaina" : $lang_title = "ch";
            break;
        }

        return $lang_title;
    }
    public function data_admission(){
        $this->load->view('site/admission/data_admission');
    }

    public function data_users($id){


        $sql = "SELECT
        admission.title,
        admission.passport_id,
        admission.date_birth,
        admission.`name`,
        admission.nation,
        admission.country,
        admission.religion,
        admission.blood,
        admission.educational,
        admission.tel,
        admission.address,
        admission.educational_file,
        if(admission.sex = '0','Female','Male') as sex,
            admission.email,
        admission.levId,
        admission.subjectId,
        admission.majorId,
        if(admission.type_std_id = '0','MOU','Walk In') as type_std_id,
            admission.universityId,
        admission.file,
        subject_student.sub_name_en,
        Level_of_Study.lev_of_name,
        major_student.maj_name_en
        FROM
        admission
        INNER JOIN Level_of_Study ON admission.levId = Level_of_Study.lev_of_id
        INNER JOIN subject_student ON admission.subjectId = subject_student.sub_id
        INNER JOIN major_student ON admission.majorId = major_student.maj_id
        WHERE admission.passport_id = '$id'
        ";
        $data['data'] = $this->db->query($sql)->row_array();
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
        {
            $data['row'] = 1;
        }else{
            $data['row'] = 0;
        }


        $this->load->view('site/admission/data_users',$data);
        //echo $id;
    }

    public function edit_form($id){

        $db2 = $this->load->database('orasis', TRUE);

        $data['passport_id'] = $id;

        if($data['passport_id'] == ""){
           $this->load->view('site/admission/home');
       }else{

        $sql = "SELECT * 
        FROM Level_of_Study
        ORDER BY lev_of_id ASC";

        $data['level'] = $this->db->query($sql)->result_array();



        $sql = "SELECT * 
        FROM view_inter_nation
        ORDER BY id ASC";

        $data['nations'] = $db2->query($sql)->result_array();

        $sql = "SELECT * 
        FROM view_inter_religion
        WHERE religion_name_en != ''
        ORDER BY id ASC";

        $data['religions'] = $db2->query($sql)->result_array();

        $sql = "SELECT * 
        FROM view_inter_race
        ORDER BY id ASC";

        $data['races'] = $db2->query($sql)->result_array();

        $sql = "SELECT * 
        FROM view_inter_deform
        WHERE deform_name_en != ''
        ORDER BY id ASC";

        $data['deforms'] = $db2->query($sql)->result_array();

        $sql = "SELECT * 
        FROM view_inter_talent
        ORDER BY id ASC";

        $data['talents'] = $db2->query($sql)->result_array();

        $sql = "SELECT * 
        FROM view_inter_old_education_level
        WHERE old_edu_lev_id != '80'
        ORDER BY id ASC";

        $data['levels'] = $db2->query($sql)->result_array();

/*
        $sql = "SELECT
        admission.title,
        admission.passport_id,
        admission.date_birth,
        admission.`name`,
        admission.nation,
        admission.country,
        admission.religion,
        admission.blood,
        admission.educational,
        admission.tel,
        admission.address,
        admission.educational_file,
        if(admission.sex = '0','Female','Male') as sex,
            admission.email,
        admission.sex,
        admission.levId,
        admission.subjectId,
        admission.majorId,
        admission.type_std_id,
        admission.universityId,
        admission.file,
        subject_student.sub_name_en,
        Level_of_Study.lev_of_name,
        major_student.maj_name_en
        FROM
        admission
        INNER JOIN Level_of_Study ON admission.levId = Level_of_Study.lev_of_id
        INNER JOIN subject_student ON admission.subjectId = subject_student.sub_id
        INNER JOIN major_student ON admission.majorId = major_student.maj_id
        WHERE admission.passport_id = '$id'
        ";
*/

        $sql = "SELECT * FROM admission_news WHERE admission_news.passport_id = '$id'";

        $data['data'] = $this->db->query($sql)->row_array();

/*
        $sql = "SELECT * 
        FROM Level_of_Study
        ORDER BY lev_of_id ASC";

        $data['level'] = $this->db->query($sql)->result_array();
*/
        $this->load->model('dashboard_model');
        $data['university'] = $this->dashboard_model->get_university();
        

        $this->load->view('site/admission/edit_view',$data);
    }
}

public function index() {


        // $sql = "SELECT * FROM new_data_std ORDER BY id DESC LIMIT 5;";
        // $data['news_std'] = $this->db->query($sql)->result_array();

        // $sql = "SELECT * FROM new_data_tec ORDER BY id DESC LIMIT 5;";
        // $data['news_tec'] = $this->db->query($sql)->result_array();

    $lang = new Admission();
    $new_lang = $lang->lang__();


    $data['lang'] = "title_" . $new_lang;
    $this->load->view('site/admission/home');
}

public function select_name_study(){

    $db2 = $this->load->database('orasis', TRUE);

    $id = $this->input->post('id');
    $maj_id = $this->input->post('maj_id');


    if($id == '00'){
        $sql = "SELECT
        major_orasis_certificate.id,
        major_orasis_certificate.maj_id,
        major_orasis_certificate.maj_name_th,
        major_orasis_certificate.maj_name_en,
        major_orasis_certificate.lev_id,
        major_orasis_certificate.lev_name_en,
        major_orasis_certificate.lev_name_st,
        major_orasis_certificate.maj_id_inter,
        major_student.maj_name_en as fac_name_en
        FROM
        major_orasis_certificate
        INNER JOIN major_student ON major_orasis_certificate.maj_id_inter = major_student.maj_id
        WHERE major_orasis_certificate.maj_id = '$maj_id'";
        $data['db'] = 1;
        $data['data_value'] = $this->db->query($sql)->result_array();
        
    }else{
        $sql = "SELECT * 
        FROM view_inter_open_major
        WHERE id = '$id'";
        $data['db'] = 2;
        $data['data_value'] = $db2->query($sql)->result_array();
        
    }

    

    echo json_encode(array(
        'is_successful' => TRUE,
        'data' => $data
        ));
}


public function form_data(){

    $db2 = $this->load->database('orasis', TRUE);

    $data['passport_id'] = $this->input->post('txt_citizen_id');

    if($data['passport_id'] == ""){
       $this->load->view('site/admission/home');
   }else{

    $sql = "SELECT * 
    FROM Level_of_Study
    ORDER BY lev_of_id ASC";

    $data['level'] = $this->db->query($sql)->result_array();



    $sql = "SELECT * 
    FROM view_inter_nation
    ORDER BY id ASC";

    $data['nations'] = $db2->query($sql)->result_array();

    $sql = "SELECT * 
    FROM view_inter_religion
    WHERE religion_name_en != ''
    ORDER BY id ASC";

    $data['religions'] = $db2->query($sql)->result_array();

    $sql = "SELECT * 
    FROM view_inter_race
    ORDER BY id ASC";

    $data['races'] = $db2->query($sql)->result_array();

    $sql = "SELECT * 
    FROM view_inter_deform
    WHERE deform_name_en != ''
    ORDER BY id ASC";

    $data['deforms'] = $db2->query($sql)->result_array();

    $sql = "SELECT * 
    FROM view_inter_talent
    ORDER BY id ASC";

    $data['talents'] = $db2->query($sql)->result_array();

    $sql = "SELECT * 
    FROM view_inter_old_education_level
    WHERE old_edu_lev_id != '80'
    ORDER BY id ASC";

    $data['levels'] = $db2->query($sql)->result_array();


    $this->load->model('dashboard_model');
    $data['university'] = $this->dashboard_model->get_university();

    $this->load->view('site/admission/form_data',$data);
}
}

public function select_MOU(){
    $this->load->model('dashboard_model');
    $data['university'] = $this->dashboard_model->get_university();

    $this->load->view('site/admission/table_mou',$data);
}

public function get_select_MOU(){
   
    $id = $this->input->post('id');
    $sql = "select * from international_support WHERE id = '$id'";
    $data = $this->db->query($sql)->result_array();

    echo json_encode(array(
        'is_successful' => TRUE,
        'data' => $data
        ));
}

public function select_passport(){
    $id = $this->input->post('id');

    $sql = "select * from admission_news WHERE passport_id = '$id'";
    $result = $this->db->query($sql);

    if($result->num_rows() > 0){
        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' => 'Passport Number Already!'
            ));
    }else{
        echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => 'ข้อมูลไม่ซ้ำใช้งานได้'
            ));
    }
    
}

public function insert_adminssion(){

    $data['title'] = $this->input->post('title');
    $data['sex'] = $this->input->post('sex');
    $data['passport_id'] = $this->input->post('citizen_id');
    $passport_id = $this->input->post('citizen_id');

    $data['sname'] = $this->input->post('name_en');
    $data['mname'] = $this->input->post('middle_name');
    $data['fname'] = $this->input->post('first_name');

    $data['date_birth'] = $this->input->post('birth');
    $data['nation'] = $this->input->post('nation_id');
    $data['race'] = $this->input->post('race_id');

    // $data['country'] = $this->input->post('country_id');

    $data['religion'] = $this->input->post('religion_id');
    $data['blood'] = $this->input->post('blood_type');

    $data['blood'] = $this->input->post('blood_type');
    $data['deform_id'] = $this->input->post('deform_id');

    $data['deform_other'] = $this->input->post('deformed_other');

    $data['talent'] = $this->input->post('talent');

    $data['email'] = $this->input->post('email');
    $data['tel'] = $this->input->post('tel');
    $data['address'] = $this->input->post('address');

    $data['old_lev_id'] = $this->input->post('certi');
    $data['old_degree_id'] = $this->input->post('old_degree_id');
    $data['old_major_id'] = $this->input->post('old_major_id');
    $data['old_school_name'] = $this->input->post('school_end');
    $data['old_country_name'] = $this->input->post('country_end');

    $data['trancript_code'] = $this->input->post('trancript_code');
    $data['old_gpax'] = $this->input->post('old_gpax');

    $data['type_std_id'] = $this->input->post('type_std');
    

    if($data['type_std_id'] == 1){
        $data2['type_std_id'] = "WALK IN";
        $data['universityId_mou'] = "0";

        $data['lev_id'] = $this->input->post('lev_id_walk_in');
        $data['major_id'] = $this->input->post('subject_id_walk_in');
        $data['fac_id'] = $this->input->post('major_id_walk_in');

        $data['id_open_major'] = $this->input->post('id_open_walk_in');

        $data['lev_of_id'] = $this->input->post('degree_id_walk_in');

        $data2['name'] = $data['sname'] .' '. $data['mname'] .' '. $data['fname'];
        $data2['passport_id'] = $this->input->post('citizen_id');

        $data2['subject'] = $this->input->post('subject3_walk_in');
        $data2['major'] = $this->input->post('major_walk_in');

        $degree_id_walk_in = $this->input->post('degree_id_walk_in');

        if($degree_id_walk_in == 2){
            $data['id_db'] = '2';
        }else{
            $data['id_db'] = '1';
        }



    }else{

        $data2['type_std_id'] = "MOU";

        $data['universityId_mou'] = $this->input->post('university_id');
        $data['lev_id'] = $this->input->post('lev_id');
        $data['major_id'] = $this->input->post('subject_id');
        $data['fac_id'] = $this->input->post('major_id');

        $data['id_open_major'] = $this->input->post('id_open');

        $data['lev_of_id'] = $this->input->post('degree_id');

        $data2['name'] = $data['sname'] .' '. $data['mname'] .' '. $data['fname'];
        $data2['passport_id'] = $this->input->post('citizen_id');

        $data2['subject'] = $this->input->post('subject3');
        $data2['major'] = $this->input->post('major');

        $degree_id = $this->input->post('degree_id');

        if($degree_id == 2){
            $data['id_db'] = '2';
        }else{
            $data['id_db'] = '1';
        }

    }

    
    

    if($passport_id == ""){
     $this->load->view('site/admission/home');
 }else{

    $i = 0;
    foreach ($_FILES as $key => $value) {
        $i++;
        $config['upload_path'] = './assets/upload/admission/';
        $part = $config['upload_path'];
        $config['allowed_types'] = '*';
        $config['max_size'] = '8388608';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] = $passport_id;
        $this->load->library('upload', $config);
            //$this->upload->do_upload($lend_id)
        $this->upload->initialize($config);

        // if($i == 2){    
        if(!empty($_FILES['file']['name'])){

            if (!empty($value['tmp_name']) && $value['size'] > 0) {
                if (!$this->upload->do_upload($key)) {
                    $msg = $this->upload->display_errors();
                    echo json_encode(array(
                        'is_successful' => FALSE,
                        'msg' => $msg
                        ));
                } else {
                    $name = $this->upload->data();

                    $data['old_file'] = base_url() . 'assets/upload/admission/'.$name['file_name'];

                }
            }

        }else{

                //echo "NO";
            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => 'ไม่ได้เพื่มไฟล์'
                ));

            form_data($passport_id);
        }
        // }else if($i == 1){
        //     if(!empty($_FILES['file_cer']['name'])){
        //         if (!empty($value['tmp_name']) && $value['size'] > 0) {

        //             $config['file_name'] = 'certi_'.$passport_id;
        //             $this->load->library('upload', $config);
        //             $this->upload->initialize($config);

        //             if (!$this->upload->do_upload($key)) {
        //                 $msg = $this->upload->display_errors();

        //                 echo json_encode(array(
        //                     'is_successful' => FALSE,
        //                     'msg' => $msg
        //                     ));
        //             } else {
        //                 $name_cer = $this->upload->data();

        //                 $data['educational_file'] = base_url() . 'assets/upload/admission/'.$name_cer['file_name'];
        //             }
        //         }else{
        //             form_data($passport_id);
        //         }

        //     }else{
        //         form_data($passport_id);
        //     }

        // }
    }

    if($data['old_file'] != ""){
        $this->db->insert('admission_news', $data); 
        $this->load->view('site/admission/complate',$data2);
    }
}
}


public function edit_adminssion(){

   $data['title'] = $this->input->post('title');
   $data['passport_id'] = $this->input->post('citizen_id');
   $passport_id = $this->input->post('citizen_id');
   $data['name'] = $this->input->post('name_en');
   $data['date_birth'] = $this->input->post('birth');
   $data['nation'] = $this->input->post('nation_id');
   $data['country'] = $this->input->post('country_id');
   $data['religion'] = $this->input->post('religion_id');
   $data['blood'] = $this->input->post('blood_type');
   $data['sex'] = $this->input->post('sex');
   $data['email'] = $this->input->post('email');
   $data['tel'] = $this->input->post('tel');
   $data['address'] = $this->input->post('address');

   $data['levId'] = $this->input->post('degree_id');
   $data['subjectId'] = $this->input->post('subject_id');
   $data['majorId'] = $this->input->post('major_id');
   $data['type_std_id'] = $this->input->post('type_std');

   $data['universityId'] = $this->input->post('university_id');

   $data['educational'] = $this->input->post('certi');

   $data2['name'] = $this->input->post('name_en');
   $data2['passport_id'] = $this->input->post('citizen_id');

   $data2['subject'] = $this->input->post('subject3');
   $data2['major'] = $this->input->post('major');

   if($data['type_std_id'] == 1){
    $data2['type_std_id'] = "WALK IN";
    $data['universityId'] = "0";
}else{
    $data2['type_std_id'] = "MOU";
}

if($passport_id == ""){
 $this->load->view('site/admission/home');
}else{

    $i = 0;
    foreach ($_FILES as $key => $value) {
        $i++;
        $config['upload_path'] = './assets/upload/admission/';
        $part = $config['upload_path'];
        $config['allowed_types'] = '*';
        $config['max_size'] = '8388608';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] = $passport_id;
        $this->load->library('upload', $config);
            //$this->upload->do_upload($lend_id)
        $this->upload->initialize($config);

        if($i == 2){    
            if(!empty($_FILES['file']['name'])){

                if (!empty($value['tmp_name']) && $value['size'] > 0) {
                    if (!$this->upload->do_upload($key)) {
                        $msg = $this->upload->display_errors();
                        echo json_encode(array(
                            'is_successful' => FALSE,
                            'msg' => $msg
                            ));
                    } else {
                        $name = $this->upload->data();

                        $file_file = base_url() . 'assets/upload/admission/'.$name['file_name'];

                    }
                }else{
                    edit_form($passport_id);
                //echo "OK";
                // echo json_encode(array(
                //     'is_successful' => TRUE,
                //     'msg' => 'บันทึกเรียบร้อย'
                //     ));
                }

            }else{

                $file_file = "";

            }
        }else if($i == 1){
            if(!empty($_FILES['file_cer']['name'])){
                if (!empty($value['tmp_name']) && $value['size'] > 0) {

                    $config['file_name'] = 'certi_'.$passport_id;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload($key)) {
                        $msg = $this->upload->display_errors();
                        echo json_encode(array(
                            'is_successful' => FALSE,
                            'msg' => $msg
                            ));
                    } else {
                        $name_cer = $this->upload->data();

                        $educational_file = base_url() . 'assets/upload/admission/'.$name_cer['file_name'];
                    }
                }else{
                    edit_form($passport_id);
                }

            }else{

                $educational_file = "";
            }

        }
    }

    if($file_file != "" && $educational_file != ""){
        $data['file'] = $file_file;
        $data['educational_file'] = $educational_file;

        $this->db->where('passport_id', $passport_id);
        $this->db->update('admission', $data);  
        $this->load->view('site/admission/complate_edit',$data2);
    }else{
        $this->db->where('passport_id', $passport_id);
        $this->db->update('admission', $data);  
        $this->load->view('site/admission/complate_edit',$data2);
    }
}

}

public function select_major(){
    $id = $this->input->post('id');
    $sql = "SELECT
    subject_student.sub_id,
    major_student.maj_name_en,
    major_student.maj_name_th
    FROM
    subject_student
    INNER JOIN major_student ON subject_student.maj_id = major_student.maj_id
    WHERE subject_student.sub_id = '$id'";

    $data['majors'] = $this->db->query($sql)->result_array();

        // echo json_encode(array(
        //     'is_successful' => TRUE,
        //     'data' => $data
        //     ));
        // $this->load->view('site/admission/table_major',$data);
}


public function select_degree(){

    $db2 = $this->load->database('orasis', TRUE);

    $id = $this->input->post('id');
    $sql = "SELECT *
    FROM
    view_inter_old_education_degree
    WHERE old_edu_degree_name_en != '' 
    and old_edu_lev_id = '$id'";

    $data = $db2->query($sql)->result_array();

    echo json_encode(array(
        'is_successful' => TRUE,
        'data' => $data
        ));
}

public function select_old_major(){

    $db2 = $this->load->database('orasis', TRUE);

    $id = $this->input->post('id');
    $sql = "SELECT *
    FROM
    view_inter_old_education_major
    WHERE old_edu_degree_id = '$id'";

    $data = $db2->query($sql)->result_array();

    echo json_encode(array(
        'is_successful' => TRUE,
        'data' => $data
        ));
}

public function select_level(){

    $id = $this->input->post('id');

    $type_id = $this->input->post('type_id');

    $db2 = $this->load->database('orasis', TRUE);

    $data['type_id'] = $type_id;

    if($id == '1'){

        // $sql = "SELECT
        // detial_subject.detial_id,
        // detial_subject.sub_id,
        // subject_student.sub_name_th,
        // subject_student.sub_name_en,
        // subject_student.maj_id,
        // detial_subject.lev_id,
        // detial_subject.lev_of_id,
        // major_student.maj_name_th,
        // major_student.maj_name_en
        // FROM
        // detial_subject
        // INNER JOIN subject_student ON detial_subject.sub_id = subject_student.sub_id
        // INNER JOIN major_student ON subject_student.maj_id = major_student.maj_id
        // WHERE detial_subject.lev_of_id = $id";
        if($type_id == '1'){
            $sql = "SELECT major_orasis_certificate.maj_id as sub_id, 
            major_orasis_certificate.maj_name_th as sub_name_th,
            major_orasis_certificate.maj_name_en as sub_name_en,
            major_orasis_certificate.lev_id,
            major_orasis_certificate.lev_name_en,
            major_orasis_certificate.lev_name_st,
            major_student.maj_name_th,
            major_student.maj_name_en,
            major_orasis_certificate.maj_id_inter
            FROM major_orasis_certificate
            INNER JOIN major_student ON major_orasis_certificate.maj_id_inter = major_student.maj_id
            WHERE major_orasis_certificate.id != '5'
            ";
        }else{
            $sql = "SELECT major_orasis_certificate.maj_id as sub_id, 
            major_orasis_certificate.maj_name_th as sub_name_th,
            major_orasis_certificate.maj_name_en as sub_name_en,
            major_orasis_certificate.lev_id,
            major_orasis_certificate.lev_name_en,
            major_orasis_certificate.lev_name_st,
            major_student.maj_name_th,
            major_student.maj_name_en,
            major_orasis_certificate.maj_id_inter
            FROM major_orasis_certificate
            INNER JOIN major_student ON major_orasis_certificate.maj_id_inter = major_student.maj_id
            ";
        }


        $data['levels'] = $this->db->query($sql)->result_array();
        $data['isData'] = 1;
        $data['db'] = 1;
        // echo json_encode(array(
        //     'is_successful' => TRUE,
        //     'data' => $data
        //     ));

        $this->load->view('site/admission/dataTable_major_view',$data);
    }else if($id == '2'){

        $sql = "SELECT *
        FROM
        view_inter_open_major";

        $data['levels'] = $db2->query($sql)->result_array();
        $data['isData'] = 1;
        $data['db'] = 2;
        $this->load->view('site/admission/dataTable_major_view',$data);
    }else{
        $data['isData'] = 0;

        $this->load->view('site/admission/dataTable_major_view',$data);
    }
}

public function test(){

    $this->load->view('site/admission/includes/test');
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
