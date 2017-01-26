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

        $this->load->view('admin/mou/dashboard/search_view',$data);
    }

    public function search_all(){
        $this->load->model('mou_model');
        $data['mou'] = $this->mou_model->get_mou_all();

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
        }else  if($select == '1'){   
            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_expired('0');
        }else  if($select == '2'){  
            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_expired('1');
        }else  if($select == '3'){
            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_expired('9');
        }else  if($select == '4'){

            $dateStart = $this->input->post('dateStart');
            $dateEnd = $this->input->post('dateEnd');

            $daystart = substr($dateStart, 0,2);
            $moutstart = substr($dateStart, 3,2);
            $yearstart = substr($dateStart, 6,4)-543;

            $totalDateStart = $yearstart."-".$moutstart."-".$daystart;

            $dayEnd = substr($dateEnd, 0,2);
            $moutEnd = substr($dateEnd, 3,2);
            $yearEnd = substr($dateEnd, 6,4)-543;

            $totalDateEnd = $yearEnd."-".$moutEnd."-".$dayEnd;


            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_sort_date($totalDateStart,$totalDateEnd);
           
        }else  if($select == '5'){

            $country = $this->input->post('country');
            
            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_country($country);
           
        }else  if($select == '6'){

            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_conti('mou_student');
           
        }else  if($select == '7'){

            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_conti('mou_teacher');
           
        }else  if($select == '8'){

            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_conti('mou_peple_research');
           
        }else  if($select == '9'){

            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_conti('mou_peple');
           
        }else  if($select == '10'){

            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_conti('data_print');
           
        }else  if($select == '12'){

            $oder_by = $this->input->post('oder_by');
            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_date_first('mou_first',$oder_by);
           
        }else  if($select == '13'){

            $oder_by = $this->input->post('oder_by');
            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_date_first('mou_last',$oder_by);
           
        }else  if($select == '14'){

            $oder_by = $this->input->post('oder_by');
            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_date_first('mou_expired',$oder_by);
           
        }else{
            $this->load->model('mou_model');
            $data['mou'] = $this->mou_model->get_mou_all();
        }

        // echo $totalDateStart."<br>".$totalDateEnd;
         $this->load->view('admin/mou/dashboard/dataTable_view',$data);
  
    }
}
