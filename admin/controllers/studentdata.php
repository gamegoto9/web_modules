<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Studentdata extends CI_Controller {

    function _construct() {
        parent::_construct();
        $this->load->library("tcpdf");
        $this->load->model('studentdata_model');
    }

    public function index() {
        $this->load->view('admin/student/dashboard/home_view_student');
    }

    public function home_student() {

        $this->load->view('admin/student/dashboard/home_view_student');
    }

    public function add_DataStudent() {
        $sql = "select *"
        . "from subject_student";
        $data['subjects'] = $this->db->query($sql)->result_array();

        $this->load->view('admin/student/dashboard/add_student_form', $data);
    }

    public function insert_data_student() {



        $this->load->library('form_validation');

        $this->form_validation->set_rules('passport', 'รหัสหนังสือเดินทาง :Passport Number', 'required');
//        $this->form_validation->set_rules('txtId', 'รหัส', 'required');
        $this->form_validation->set_rules('fname', 'ชื่อ : Name', 'required');
        $this->form_validation->set_rules('lname', 'นามสกุล : Last Name', 'required');
        $this->form_validation->set_rules('startdate', 'วันที่ออกหนังสือเดินทาง : Passport Start', 'required');
        $this->form_validation->set_rules('enddate', 'วันหมดอายุของหนังสือเดินทาง : Passport End', 'required');
        $this->form_validation->set_rules('birthday', 'วันเกิด : Birthday', 'required');
        $this->form_validation->set_rules('visaend', 'วันหมดอายุของวีซ่า : Visa expired', 'required');
        $this->form_validation->set_rules('stdId', 'รหัสนักศึกษา : Studen ID', 'required');


        $this->form_validation->set_message('required', 'กรุุณาป้อน Input %s');

        if ($this->form_validation->run() == FALSE) {

            $msg = form_error('passport');
//            $msg.= form_error('txtId');
            $msg.= form_error('fname');
            $msg.= form_error('lname');
            $msg.= form_error('startdate');
            $msg.= form_error('enddate');
            $msg.= form_error('birthday');
            $msg.= form_error('visaend');
            $msg.= form_error('stdId');

            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
                ));
        } else {


            //$data['name'] = $this->input->post('txtId');
            $data1['passport_number'] = $this->input->post('passport');
            $data1['citizen_id'] = $this->input->post('passport');
            $data1['pname_st'] = $this->input->post('title_name');
            $data1['std_fname_th'] = $this->input->post('fname');
            $data1['std_lname_th'] = $this->input->post('lname');
            $data1['sub_id'] = $this->input->post('major');
            $data1['passport_statdate'] = $this->input->post('startdate');
            $data1['passport_enddate'] = $this->input->post('enddate');
            $data1['passport_status'] = $this->input->post('type');
            $data1['date_birth'] = $this->input->post('birthday');
            $data1['visa_enddate'] = $this->input->post('visaend');
            $data1['stdId'] = $this->input->post('stdId');
            $data1['sid'] = $this->input->post('stdId');
            $data1['year_in'] = '25' . substr($data1['stdId'], 0, 2);
            $data1['Ddate'] = date("Y-m-d");


            //$query = $this->db->get_where('student_2016', array('passport_number' => $data1['passport_number']));
            $sql = "select * from student_2016 where sid = '" . $data1['stdId'] . "'";
            $rowcount = $this->db->query($sql)->num_rows();

            if ($rowcount > 0) {
                echo json_encode(array(
                    'is_successful' => FALSE,
                    'msg' => 'มีข้อมูลอยู่แล้ว'
                    ));
            } else {

                $this->db->insert('student_2016', $data1);
                echo json_encode(array(
                    'is_successful' => TRUE,
                    'msg' => 'บันทึกเรียบร้อย : Save data success'
                    ));
            }
        }
    }

    public function liststudent() {
        $sql = "SELECT
        student_2016.passport_number,
        student_2016.pname_st,
        student_2016.std_fname_th,
        student_2016.std_lname_th,
        subject_student.sub_name_th,
        subject_student.sub_name_en,
        student_2016.stdId,
        student_2016.sid
        FROM
        student_2016
        INNER JOIN subject_student ON student_2016.sub_id = subject_student.sub_id
        GROUP BY
        student_2016.passport_number
        ORDER BY
        student_2016.stdId ASC";
        $data['student'] = $this->db->query($sql)->result_array();

        $this->load->view('admin/student/dashboard/list_data_student_table', $data);
    }

    public function show_data_student($stdId, $view) {

        $sql = "select * from student_2016 where sid = '$stdId'";
        $data['students'] = $this->db->query($sql)->row_array();
        $data['view'] = $view;

        $sql = "select *"
        . "from subject_student";
        $data['subjects'] = $this->db->query($sql)->result_array();

        $this->load->view('admin/student/dashboard/add_student_form', $data);
    }

    public function edit_data_student() {



        $this->load->library('form_validation');

        $this->form_validation->set_rules('passport', 'รหัสหนังสือเดินทาง :Passport Number', 'required');
//        $this->form_validation->set_rules('txtId', 'รหัส', 'required');
        $this->form_validation->set_rules('fname', 'ชื่อ : Name', 'required');
        $this->form_validation->set_rules('lname', 'นามสกุล : Last Name', 'required');
        $this->form_validation->set_rules('startdate', 'วันที่ออกหนังสือเดินทาง : Passport Start', 'required');
        $this->form_validation->set_rules('enddate', 'วันหมดอายุของหนังสือเดินทาง : Passport End', 'required');
        $this->form_validation->set_rules('birthday', 'วันเกิด : Birthday', 'required');
        $this->form_validation->set_rules('visaend', 'วันหมดอายุของวีซ่า : Visa expired', 'required');
        $this->form_validation->set_rules('stdId', 'รหัสนักศึกษา : Studen ID', 'required');


        $this->form_validation->set_message('required', 'กรุุณาป้อน Input %s');

        if ($this->form_validation->run() == FALSE) {

            $msg = form_error('passport');
//            $msg.= form_error('txtId');
            $msg.= form_error('fname');
            $msg.= form_error('lname');
            $msg.= form_error('startdate');
            $msg.= form_error('enddate');
            $msg.= form_error('birthday');
            $msg.= form_error('visaend');
            $msg.= form_error('stdId');

            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
                ));
        } else {

            $sid = $this->input->post('stdId');
            $data1['stdId'] = $this->input->post('stdId1');
            $data1['passport_number'] = $this->input->post('passport');
            $data1['citizen_id'] = $this->input->post('passport');
            $data1['pname_st'] = $this->input->post('title_name');
            $data1['std_fname_th'] = $this->input->post('fname');
            $data1['std_lname_th'] = $this->input->post('lname');
            $data1['sub_id'] = $this->input->post('major');
            $data1['passport_statdate'] = $this->input->post('startdate');
            $data1['passport_enddate'] = $this->input->post('enddate');
            $data1['passport_status'] = $this->input->post('type');
            $data1['date_birth'] = $this->input->post('birthday');
            $data1['visa_enddate'] = $this->input->post('visaend');


            $data1['Ddate'] = date("Y-m-d");




            $this->db->where('sid', $sid);
            $this->db->update('student_2016', $data1);
            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' => 'แก้ไขเรียบร้อย : Edit data success'
                ));
        }
    }

    public function export_excel() {
        //load our new PHPExcel library
        $this->load->library('excel');
//activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $this->excel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
        $this->excel->getActiveSheet()->getPageSetup()->setFitToPage(true);
        $this->excel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
        $this->excel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
//name the worksheet
        $this->excel->getActiveSheet()->setTitle('repeatedly');

        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'รายชื่อนักศึกษาต่างชาติ');
//change the font size
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
//make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
//merge cell A1 until D1
        $this->excel->getActiveSheet()->mergeCells('A1:E1');


        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, 3, 'ที่');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, 3, 'รหัสนักศึกษา');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, 3, 'รหัสหนังสือเดินทาง');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, 3, 'คำนำหน้า');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, 3, 'fname');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, 3, 'lname');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, 3, 'major_th');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(7, 3, 'majot_en');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(8, 3, 'passport_start');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(9, 3, 'passport_end');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(10, 3, 'passport_status');
        
        
        $sql = "SELECT
        student_2016.stdId,
        student_2016.passport_number,
        student_2016.pname_st,
        student_2016.std_fname_th,
        student_2016.std_lname_th,
        subject_student.sub_name_th,
        subject_student.sub_name_en,
        student_2016.passport_statdate,
        student_2016.passport_enddate,
        student_2016.passport_status
        FROM
        student_2016
        INNER JOIN subject_student ON student_2016.sub_id = subject_student.sub_id
        ORDER BY stdId";
        
        $rs = $this->db->query($sql);
        
        $exceldata = "";
        $r = 4;
        $i = 1;
        foreach ($rs->result_array() as $row) {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $r, $i);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $r, $row['stdId']);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, $r, $row['passport_number']);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, $r, $row['pname_st']);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, $r, $row['std_fname_th']);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, $r, $row['std_lname_th']);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, $r, $row['sub_name_th']);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(7, $r, $row['sub_name_en']);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(8, $r, $row['passport_statdate']);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(9, $r, $row['passport_enddate']);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(10, $r, $row['passport_status']);
            $r++;
            $i++;
                    //$exceldata[] = $row;
        }

        for ($col = ord('A'); $col <= ord('K'); $col++) {
                    //set column dimension
            $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
        }

        //Fill data 
        //->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');
//set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $filename = 'repeatedly_sport.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
//force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

}
