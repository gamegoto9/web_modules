<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mou extends CI_Controller {

    function _construct() {
        parent::_construct();
        $this->load->library("tcpdf");
        


    }

    public function index() {
        $this->load->view('admin/mou/dashboard/home');
    }

    public function search_view(){

        $this->load->model('mou_model');
        $data['country'] = $this->mou_model->get_country();

        $this->load->model('mou_model');
        $data['university'] = $this->mou_model->get_university();

        $sql = "SELECT area
        FROM international_support
        WHERE area != ''
        GROUP BY area";
        $data['area'] = $this->db->query($sql);

        $this->load->view('admin/mou/dashboard/search_view',$data);
    }

    public function search_all(){
        $this->load->model('mou_model');
        $data['mou'] = $this->mou_model->get_mou_all();

        $data['area'] = '0';
        $this->load->view('admin/mou/dashboard/dataTable_view',$data);
    }

    public function get_mou_by_id(){
        $id = $this->input->post('id');
        
        $this->load->model('mou_model');
        $data['mou'] = $this->mou_model->get_mou_by_id($id);

        $this->load->view('admin/mou/dashboard/data_mou',$data);
    }

    public function search_query(){

        $select = $this->input->post('select');

        if($select == '0'){
            $university = $this->input->post('university');
            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_university($university);
            $data['area'] = '0';
        }else  if($select == '1'){   
            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_expired('0');
            $data['area'] = '0';
        }else  if($select == '2'){  
            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_expired('1');
            $data['area'] = '0';
        }else  if($select == '3'){
            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_expired('9');
            $data['area'] = '0';
        }else  if($select == '4'){

            $dateStart = $this->input->post('dateStart');
            $dateEnd = $this->input->post('dateEnd');
            $country = $this->input->post('country2');

            $daystart = substr($dateStart, 0,2);
            $moutstart = substr($dateStart, 3,2);
            $yearstart = substr($dateStart, 6,4)-543;

            $totalDateStart = $yearstart."-".$moutstart."-".$daystart;

            $dayEnd = substr($dateEnd, 0,2);
            $moutEnd = substr($dateEnd, 3,2);
            $yearEnd = substr($dateEnd, 6,4)-543;

            $totalDateEnd = $yearEnd."-".$moutEnd."-".$dayEnd;


            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_sort_date($totalDateStart,$totalDateEnd,$country);
            $data['area'] = '0';

        }else  if($select == '5'){
           $this->load->model('mou_model');

           $country = $this->input->post('country');

           if($country == 'จีน'){

            $status = $this->input->post('status');
            $monton = $this->input->post('monton');

                if($monton == '' && $status == ''){

                    $sql = "SELECT international_support.`name`,
                    international_support.international,
                    international_support.link,
                    international_support.id,
                    international_support.file,
                    international_support.area,
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
                                    international_support.note , international_support.mou_expired";

                }else if($monton == '' && $status != ''){

                    $sql = "SELECT international_support.`name`,
                    international_support.international,
                    international_support.link,
                    international_support.id,
                    international_support.file,
                    international_support.area,
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
                                    international_support.international = '$country' AND
                                    international_support.status = '$status'
                                    ORDER BY
                                    international_support.note , international_support.mou_expired";

                }else if($monton != '' && $status == ''){
                    
                    $sql = "SELECT international_support.`name`,
                    international_support.international,
                    international_support.link,
                    international_support.id,
                    international_support.file,
                    international_support.area,
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
                                    international_support.international = '$country' AND
                                    international_support.area = '$monton'
                                    ORDER BY
                                    international_support.note , international_support.mou_expired";

                }else if($monton != '' && $status != ''){
                    
                    $sql = "SELECT international_support.`name`,
                    international_support.international,
                    international_support.link,
                    international_support.id,
                    international_support.file,
                    international_support.area,
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
                                    international_support.international = '$country' AND
                                    international_support.area = '$monton' AND
                                    international_support.status = '$status'

                                    ORDER BY
                                    international_support.note , international_support.mou_expired";
                }


                           $data['area'] = '1';
                            $data['mou'] = $this->db->query($sql);

            }else{
                $data['mou'] = $this->mou_model->get_mou_country($country);
                $data['area'] = '0';
            }


                        

                    }else  if($select == '6'){

                        $this->load->model('mou_model');
                        $data['mou'] = $this->mou_model->get_mou_conti('mou_student');
                        $data['area'] = '0';

                    }else  if($select == '7'){

                        $this->load->model('mou_model');
                        $data['mou'] = $this->mou_model->get_mou_conti('mou_teacher');
                        $data['area'] = '0';

                    }else  if($select == '8'){

                        $this->load->model('mou_model');
                        $data['mou'] = $this->mou_model->get_mou_conti('mou_peple_research');
                        $data['area'] = '0';

                    }else  if($select == '9'){

                        $this->load->model('mou_model');
                        $data['mou'] = $this->mou_model->get_mou_conti('mou_peple');
                        $data['area'] = '0';

                    }else  if($select == '10'){

                        $this->load->model('mou_model');
                        $data['mou'] = $this->mou_model->get_mou_conti('data_print');
                        $data['area'] = '0';

                    }else  if($select == '12'){

                        $oder_by = $this->input->post('oder_by');
                        $this->load->model('mou_model');
                        $data['mou'] = $this->mou_model->get_mou_date_first('mou_first',$oder_by);
                        $data['area'] = '0';

                    }else  if($select == '13'){

                        $oder_by = $this->input->post('oder_by');
                        $this->load->model('mou_model');
                        $data['mou'] = $this->mou_model->get_mou_date_first('mou_last',$oder_by);
                        $data['area'] = '0';

                    }else  if($select == '14'){

                        $oder_by = $this->input->post('oder_by');
                        $this->load->model('mou_model');
                        $data['mou'] = $this->mou_model->get_mou_date_first('mou_expired',$oder_by);
                        $data['area'] = '0';

                    }else{
                        $this->load->model('mou_model');
                        $data['mou'] = $this->mou_model->get_mou_all();
                        $data['area'] = '0';
                    }

        // echo $totalDateStart."<br>".$totalDateEnd;
                   
                    $this->load->view('admin/mou/dashboard/dataTable_view',$data);

                }

                public function show_file_mou(){
                   $name = $this->input->post('id');

                   $baseURL = base_url('assets/upload/MOU/');

                   $fileURL = $baseURL.'/'.$name;

                   $data['file'] = $fileURL;

                   $this->load->view('admin/mou/dashboard/show_file_mou_view',$data);
               }
           }
