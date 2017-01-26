<?php


function Convert($amount_number)
{
    $amount_number = number_format($amount_number, 2, ".","");
    $pt = strpos($amount_number , ".");
    $number = $fraction = "";
    if ($pt === false) 
        $number = $amount_number;
    else
    {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }
    
    $ret = "";
    $baht = ReadNumber ($number);
    if ($baht != "")
        $ret .= $baht . "บาท";
    
    $satang = ReadNumber($fraction);
    if ($satang != "")
        $ret .=  $satang . "สตางค์";
    else 
        $ret .= "ถ้วน";
    return $ret;
}

function ReadNumber($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) return $ret;
    if ($number > 1000000)
    {
        $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }
    
    $divider = 100000;
    $pos = 0;
    while($number > 0)
    {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : 
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
}
## วิธีใช้งาน
//$num1 = '111111111111.11'; 
//$num2 = '222222222222.22'; 
//echo  $num1  . "&nbsp;=&nbsp;" .Convert($num1),"<br>"; 
//echo  $num2  . "&nbsp;=&nbsp;" .Convert($num2),"<br>"; 


                 $row = $contiMaterial->row_array();
//load our new PHPExcel library
                $this->load->library('excel');
//activate worksheet number 1
                $this->excel->setActiveSheetIndex(0);


               

                $this->excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
                $this->excel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
                $this->excel->getActiveSheet()->getPageSetup()->setFitToPage(true);
                $this->excel->getActiveSheet()->getPageSetup()->setFitToWidth(0);
                $this->excel->getActiveSheet()->getPageSetup()->setFitToHeight(0);

                $this->excel->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
                
                $this->excel->getDefaultStyle()
                    ->getAlignment()
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); 


                $this->excel->getActiveSheet()
                            ->getPageMargins()->setTop(0.4);
                $this->excel->getActiveSheet()
                            ->getPageMargins()->setRight(0.4);
                $this->excel->getActiveSheet()
                            ->getPageMargins()->setLeft(0.4);
                $this->excel->getActiveSheet()
                            ->getPageMargins()->setBottom(0.2);

                //$this->excel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HPlease treat this document as confidential!');
             

                //$this->excel->getActiveSheet()->getPageSetup()->setHighestRow(23.25);
                //$this->excel->getActiveSheet()->getPageSetup()->setHighestColumn(8.43);
//name the worksheet
                $this->excel->getActiveSheet()->setTitle('ทะเบียนคุมทรัพย์สิน(ด้านหน้า)');
                $phpExcel = new PHPExcel();
                // set the font style for the entire workbook
                $this->excel->getDefaultStyle()->getFont()
                    ->setName('Angsana New')
                    ->setSize(16);

//function color
//            function cellColor($cells, $color) {
//                $objPHPExcel = new PHPExcel();
//
//                $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->getStartColor()->setRGB($color);
//            }
//
//            cellColor('A3:J3', 'F28A8C');

                $styleArray = array(
                    'font'  => array(
                    'bold'  => true,
                    'color' => array('rgb' => '000000'),
                    'size'  => 18,
                    'name'  => 'Angsana New'
                ));

                $styleBoldCenterHeaderTable = array(
                    'font'  => array(
                    'bold'  => true),
                    'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER),
                    'borders' => array(
                    'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN)
                    )
                    );

                $styleCenterHeaderTable = array(
                    'font'  => array(
                    'bold'  => false),
                    'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
                    'borders' => array(
                    'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN)
                    )
                    );

                $styleBoldCenter = array(
                    'font'  => array(
                    'bold'  => true),
                    'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)            
                    );


                $styleBorderBottom = array(
                    'borders' => array(
                    'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN)
                    )
                    );
                 $styleBorderTop = array(
                    'borders' => array(
                    'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN)
                    )
                    );
                $styleBorderLeftRight = array(
                    'borders' => array(
                    'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN),
                    'alignment' => array(
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP),
                    'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN)
                    )
                    );

                 $styleCenter = array(
                    'font'  => array(
                    'bold'  => false),
                    'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    ));

                $styleArray2 = array(
                    'font'  => array(
                    'bold'  => true,
                    'color' => array('rgb' => '000000'),
                    'size'  => 16,
                    'name'  => 'Angsana New',
                    ),
                    'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                    ));

                $styleRight = array(
                    'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                    )
                );

                
                for ($col = ord('A'); $col <= ord('K'); $col++) {
                    //set column dimension
                    $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setWidth(8.43);
                }


                 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15.2);
                 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(38.14);
                 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(14.14);
                 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(12.71);
                 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(4.71);
                 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(12.14);
                 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(12.71);
                 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(11.28);
                 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(18.28);
                 //$this->excel->getActiveSheet()->getRowDimension(4)->setRowHeight(6);
//              $this->excel->getActiveSheet()->getRowDimension(7)->setRowHeight(9.75);

                 $this->excel->getActiveSheet()->setCellValue('A1', 'บัญชีวัสดุ');

                 $this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
       
                 $this->excel->getActiveSheet()->mergeCells('A1:I1');

                 $year = date("Y")+543;

                 // $this->excel->getActiveSheet()
                 // ->setCellValueByColumnAndRow(11, 1, 'เลขที่  '.'......'.'/'.$year);

                 // $this->excel->getActiveSheet()->getStyle('L1')->applyFromArray($styleRight);

                 $this->excel->getActiveSheet()
                 ->setCellValueByColumnAndRow(8, 2, 'ส่วนราชการ  '.'มหาวิทยาลัยราชภัฏเชียงราย');

                 $this->excel->getActiveSheet()->getStyle('I2')->applyFromArray($styleRight);

                 $this->excel->getActiveSheet()
                 ->setCellValueByColumnAndRow(8, 3, 'หน่วยงาน  '.'กองวิเทศสัมพันธ์');

                 $this->excel->getActiveSheet()->getStyle('I3')->applyFromArray($styleRight);


                  $this->excel->getActiveSheet()
                 ->setCellValueByColumnAndRow(0, 3, 'แผ่นที่ ');

                 $this->excel->getActiveSheet()
                 ->setCellValueByColumnAndRow(1, 3, 'กองวิเทศสัมพันธ์');

//                 // $this->excel->getActiveSheet()->setCellValue('A3', 'เรียน  ผู้อำนวยการกองวิเทศสัมพันธ์');

//                 // $this->excel->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray2);

                 $this->excel->getActiveSheet()->setCellValue('A4', 'ประเภท');

                 $this->excel->getActiveSheet()->setCellValue('B4', '.......................................');

                 $this->excel->getActiveSheet()->setCellValue('C4', 'ชื่อหรือชนิดวัสดุ'.'.....'.$row['MatName'].'......................................................................');

                 $this->excel->getActiveSheet()->setCellValue('H4', 'รหัส ');
                 $this->excel->getActiveSheet()->getStyle('H4')->applyFromArray($styleRight);
                 $this->excel->getActiveSheet()->setCellValue('I4', '.................'.$row['MatId'].'..........................................................................');
                 $this->excel->getActiveSheet()->setCellValue('J4', ' ');

                 $this->excel->getActiveSheet()->setCellValue('A5', 'ขนาดหรือลักษณะ');

                 $this->excel->getActiveSheet()->setCellValue('B5', '...................................................................................................');

                 $this->excel->getActiveSheet()->setCellValue('H5', 'จำนวนอย่างสูง');
                 $this->excel->getActiveSheet()->getStyle('H5')->applyFromArray($styleRight);

                 $this->excel->getActiveSheet()->setCellValue('I5', ' ........................................................');
                 $this->excel->getActiveSheet()->setCellValue('J5', ' ');


                 $this->excel->getActiveSheet()->setCellValue('A6', 'หน่วยที่นับ');

                 $this->excel->getActiveSheet()->setCellValue('B6', '...................................................................................................');

                  $this->excel->getActiveSheet()->setCellValue('D6', 'ที่เก็บ '.' ............กองวิเทศสัมพันธ์......................................');

                 $this->excel->getActiveSheet()->setCellValue('H6', 'จำนวนอย่างต่ำ');
                 $this->excel->getActiveSheet()->getStyle('H6')->applyFromArray($styleRight);
                 $this->excel->getActiveSheet()->setCellValue('I6', '........................................................');
                 $this->excel->getActiveSheet()->setCellValue('J6', ' ');

                 $this->excel->getActiveSheet()->getRowDimension('7')->setRowHeight(13.5);

                 $this->excel->getActiveSheet()->setCellValue('A8', 'วัน เดือน ปี');
                 $this->excel->getActiveSheet()->setCellValue('B8', 'รับจาก - จ่ายให้');
                 $this->excel->getActiveSheet()->setCellValue('C8', 'เลขที่ เอกสาร');
                 $this->excel->getActiveSheet()->setCellValue('D8', 'ราคาต่อหน่วย');

                 $this->excel->getActiveSheet()->mergeCells('D8:E8');
                 $this->excel->getActiveSheet()->mergeCells('F8:H8');

                 $this->excel->getActiveSheet()->mergeCells('D9:E9');
                 
               
                 $this->excel->getActiveSheet()->setCellValue('F8', 'จำนวน');

                 $this->excel->getActiveSheet()->setCellValue('I8', 'หมายเหตุ');

                 $this->excel->getActiveSheet()->setCellValue('D9', '(บาท)');

                 $this->excel->getActiveSheet()->setCellValue('F9', 'รับ');
                 $this->excel->getActiveSheet()->setCellValue('G9', 'จ่าย');
                 $this->excel->getActiveSheet()->setCellValue('H9', 'คงเหลือ');

                 $this->excel->getActiveSheet()->mergeCells('A8:A9');
                 $this->excel->getActiveSheet()->mergeCells('B8:B9');
                 $this->excel->getActiveSheet()->mergeCells('C8:C9');
                 $this->excel->getActiveSheet()->mergeCells('I8:I9');

                for ($col = ord('A'); $col <= ord('I'); $col++) {
                   
                    $this->excel->getActiveSheet()->getStyle(chr($col).'8')->applyFromArray($styleBoldCenterHeaderTable)->getAlignment()->setWrapText(true);
                    $this->excel->getActiveSheet()->getStyle(chr($col).'9')->applyFromArray($styleBoldCenterHeaderTable)->getAlignment()->setWrapText(true);
                }



                $start = 10;
                $totle = 0;
                if($row['MatName'] != ''){

                    foreach ($contiMaterial->result_array() as $row) {
                         $this->excel->getActiveSheet()->setCellValue('B'.$start, 'ยอดพัสดุคงเหลือ ปีงบประมาณ '.$row['year']);
                         $this->excel->getActiveSheet()->setCellValue('D'.$start, $row['price']);
                         $this->excel->getActiveSheet()->setCellValue('H'.$start, $row['qty']);

                         $totle += $row['qty'];
                    }
                    // $this->excel->getActiveSheet()->setCellValue('H'.$start, $Ddate_all[8]);

                }

                $this->excel->getActiveSheet()->getStyle('D'.$start)->applyFromArray($styleRight);
                $this->excel->getActiveSheet()->getStyle('H'.$start)->applyFromArray($styleCenter);

                $start++;



                function sortFunction($a, $b){
                    $datea = strtotime(str_replace('/', '-', $a));
                    $dateb = strtotime(str_replace('/', '-', $b));
                    
                    if ($datea == $dateb){
                        return 0;
                    }

                return ($datea < $dateb) ? -1 : 1;

                }

               // $Ddate_all;
                usort($Ddate_all, "sortFunction");

                $row_count = count($Ddate_all);
                $oil = '';
                $id_mat = $MatId;

                for($i=0;$i<$row_count;$i++){

                        //$this->excel->getActiveSheet()->setCellValue('B'.$start, $Ddate_all[$i]);
                        if($Ddate_all[$i] != $oil){
                            
                            $oil = $Ddate_all[$i];

                            $sql = "SELECT * FROM buy_material_2016 WHERE MatId = '$id_mat' and Ddate = '$Ddate_all[$i]'";
                            $data['BuyMaterial'] = $this->db->query($sql);

                            if($data['BuyMaterial']->num_rows() >= 1){

                                foreach ($data['BuyMaterial']->result_array() as $row) {

                                    if($row['status_buy'] == '2'){

                                        $sql3 = "SELECT * FROM return_material_detial WHERE MatId = '$id_mat' and Ddate_return = '$Ddate_all[$i]'";
                                        $data3['return_material'] = $this->db->query($sql3);

                                         foreach ($data3['return_material']->result_array() as $row3) {


                                            $this->excel->getActiveSheet()->setCellValue('A'.$start, $row3['Ddate_return']);
                                            $this->excel->getActiveSheet()->getStyle('A'.$start)->applyFromArray($styleCenter);

                                            $this->excel->getActiveSheet()->setCellValue('B'.$start, 'รับคืนจาก '.$row3['name_return']);
                                        

                                            $this->excel->getActiveSheet()->setCellValue('C'.$start, $row3['return_id']);
                                            $this->excel->getActiveSheet()->getStyle('C'.$start)->applyFromArray($styleCenter);
                                            
                                            $material_id = $row3['get_material_id'];

                                            $sql4 = "SELECT * FROM get_material_detial WHERE MatId = '$id_mat' and get_material_id = '$material_id'";
                                            $data4['get_material_price'] = $this->db->query($sql4);
                                            $price_get = $data4['get_material_price']->row_array();

                                            $this->excel->getActiveSheet()->setCellValue('D'.$start,$price_get['price']);
                                            $this->excel->getActiveSheet()->getStyle('D'.$start)->applyFromArray($styleRight);

                                         

                                            $this->excel->getActiveSheet()->setCellValue('F'.$start, $row3['qty']);
                                            $this->excel->getActiveSheet()->getStyle('F'.$start)->applyFromArray($styleCenter);

                                            $totle += $row3['qty'];

                                            $this->excel->getActiveSheet()->setCellValue('H'.$start, $totle);
                                            $this->excel->getActiveSheet()->getStyle('H'.$start)->applyFromArray($styleCenter);

                                            $start++;
                                        }

                                    }else{

                                        $this->excel->getActiveSheet()->setCellValue('A'.$start, $row['Ddate']);
                                        $this->excel->getActiveSheet()->getStyle('A'.$start)->applyFromArray($styleCenter);

                                        $this->excel->getActiveSheet()->setCellValue('B'.$start, 'รับจาก '.$row['market_name']);
                                        

                                        $this->excel->getActiveSheet()->setCellValue('C'.$start, $row['id_buy']);
                                        $this->excel->getActiveSheet()->getStyle('C'.$start)->applyFromArray($styleCenter);
                                       
                                        $this->excel->getActiveSheet()->setCellValue('D'.$start, $row['price']);
                                        $this->excel->getActiveSheet()->getStyle('D'.$start)->applyFromArray($styleRight);

                                         

                                        $this->excel->getActiveSheet()->setCellValue('F'.$start, $row['qty']);
                                        $this->excel->getActiveSheet()->getStyle('F'.$start)->applyFromArray($styleCenter);

                                        $totle += $row['qty'];

                                        $this->excel->getActiveSheet()->setCellValue('H'.$start, $totle);
                                        $this->excel->getActiveSheet()->getStyle('H'.$start)->applyFromArray($styleCenter);
                                    }
                                    // for ($col = ord('A'); $col <= ord('L'); $col++) {
                                   
                                    // $this->excel->getActiveSheet()->getStyle(chr($col).$start)->applyFromArray($styleCenterHeaderTable)->getAlignment()->setWrapText(true);
                                    // }

                                $start++;

                                }
                            }

                            $sql = "SELECT
                                    lend_material_2016.LmatId,
                                    lend_material_2016.MatId,
                                    lend_material_2016.qty,
                                    lend_material_2016.price,
                                    lend_material_2016.Ddate,
                                    lend_material_2016.Pid,
                                    lend_material_2016.`status`,
                                    personal.Pid,
                                    personal.`name`
                                    FROM
                                    lend_material_2016
                                    INNER JOIN personal ON lend_material_2016.Pid = personal.Pid
                                    WHERE lend_material_2016.MatId = '$id_mat' and lend_material_2016.Ddate = '$Ddate_all[$i]'";

                            $data['LendMaterial'] = $this->db->query($sql);

                            if($data['LendMaterial']->num_rows() > 0){


                                foreach ($data['LendMaterial']->result_array() as $row) {


                                    if($row['status'] == '2'){

                                        $sql2 = "SELECT * FROM get_material_detial WHERE MatId = '$id_mat' and Ddate_get = '$Ddate_all[$i]'";
                                        $data2['get_material'] = $this->db->query($sql2);

                                         foreach ($data2['get_material']->result_array() as $row2) {


                                            $this->excel->getActiveSheet()->setCellValue('A'.$start, $row2['Ddate_get']);
                                            $this->excel->getActiveSheet()->getStyle('A'.$start)->applyFromArray($styleCenter);

                                            $this->excel->getActiveSheet()->setCellValue('B'.$start, 'ยืมพัสดุ โดย '.$row2['name_get'].' '.$row2['major_get']);
                                     

                                            $this->excel->getActiveSheet()->setCellValue('C'.$start, $row2['get_material_id']);
                                            $this->excel->getActiveSheet()->getStyle('C'.$start)->applyFromArray($styleCenter);
                                           
                                            $this->excel->getActiveSheet()->setCellValue('D'.$start, $row2['price']);
                                            $this->excel->getActiveSheet()->getStyle('D'.$start)->applyFromArray($styleRight);

                                             

                                            $this->excel->getActiveSheet()->setCellValue('G'.$start, $row2['qty']);
                                            $this->excel->getActiveSheet()->getStyle('G'.$start)->applyFromArray($styleCenter);

                                            $totle -= $row2['qty'];

                                            $this->excel->getActiveSheet()->setCellValue('H'.$start, $totle);
                                            $this->excel->getActiveSheet()->getStyle('H'.$start)->applyFromArray($styleCenter);

                                            $start++;
                                        }

                                    }else{

                                            $this->excel->getActiveSheet()->setCellValue('A'.$start, $row['Ddate']);
                                            $this->excel->getActiveSheet()->getStyle('A'.$start)->applyFromArray($styleCenter);

                                            $this->excel->getActiveSheet()->setCellValue('B'.$start, 'จ่ายให้ '.$row['name']);
                                     

                                            $this->excel->getActiveSheet()->setCellValue('C'.$start, $row['LmatId']);
                                            $this->excel->getActiveSheet()->getStyle('C'.$start)->applyFromArray($styleCenter);
                                           
                                            $this->excel->getActiveSheet()->setCellValue('D'.$start, $row['price']);
                                            $this->excel->getActiveSheet()->getStyle('D'.$start)->applyFromArray($styleRight);

                                             

                                            $this->excel->getActiveSheet()->setCellValue('G'.$start, $row['qty']);
                                            $this->excel->getActiveSheet()->getStyle('G'.$start)->applyFromArray($styleCenter);

                                            $totle -= $row['qty'];

                                            $this->excel->getActiveSheet()->setCellValue('H'.$start, $totle);
                                            $this->excel->getActiveSheet()->getStyle('H'.$start)->applyFromArray($styleCenter);

                                            // for ($col = ord('A'); $col <= ord('L'); $col++) {
                                           
                                            // $this->excel->getActiveSheet()->getStyle(chr($col).$start)->applyFromArray($styleCenterHeaderTable)->getAlignment()->setWrapText(true);
                                            // }

                                         $start++;
                                     }

                                }
                            }

                       }


                }

                for ($col = ord('A'); $col <= ord('I'); $col++) {

                    for($i=10;$i<=$start;$i++){

                        
                        $this->excel->getActiveSheet()->getStyle(chr($col).$i)->applyFromArray($styleBorderLeftRight)->getAlignment()->setWrapText(true);


                    }
                                   
                            
                }

                for ($col = ord('A'); $col <= ord('I'); $col++) {
                    $this->excel->getActiveSheet()->getStyle(chr($col).$start)->applyFromArray($styleBorderBottom);
                } 

                

                
                // $qty = 1;

                

                // for($start;$start<=24;$start++){
                //     for ($col = ord('A'); $col <= ord('L'); $col++) {
                   
                //     $this->excel->getActiveSheet()->getStyle(chr($col).$start)->applyFromArray($styleCenterHeaderTable)->getAlignment()->setWrapText(true);
                //     }
                // }




                // // ---------------------------- ซ่อมบำรุง --------------------------------------------------------------


                // $this->excel->createSheet(1);
               
                // $this->excel->setActiveSheetIndex(1);  

                // $this->excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
                // $this->excel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
                // $this->excel->getActiveSheet()->getPageSetup()->setFitToPage(true);
                // $this->excel->getActiveSheet()->getPageSetup()->setFitToWidth(0);
                // $this->excel->getActiveSheet()->getPageSetup()->setFitToHeight(0);

                // $this->excel->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
                
                // $this->excel->getDefaultStyle()
                //     ->getAlignment()
                //     ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); 


                // $this->excel->getActiveSheet()
                //             ->getPageMargins()->setTop(0.4);
                // $this->excel->getActiveSheet()
                //             ->getPageMargins()->setRight(0.4);
                // $this->excel->getActiveSheet()
                //             ->getPageMargins()->setLeft(0.4);
                // $this->excel->getActiveSheet()
                //             ->getPageMargins()->setBottom(0.2);


                //  $this->excel->getActiveSheet()->setTitle('ซ่อมบำรุง(ด้านหลัง)');
                

                //  $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(9.14);
                //  $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
                //  $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(73.72);
                //  $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(18.15);
                //  $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(27.57);


                //   $this->excel->getActiveSheet()->setCellValue('A1', 'ประวัติการซ่อมบำรุงรักษาทรัพย์สิน');

                //  $this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
                //  $this->excel->getActiveSheet()->mergeCells('A1:E1');

                //  $this->excel->getActiveSheet()->setCellValue('A3', 'ครั้งที่');
                //  $this->excel->getActiveSheet()->setCellValue('B3', 'วัน เดือน ปี');
                //  $this->excel->getActiveSheet()->setCellValue('C3', 'รายการ');
                //  $this->excel->getActiveSheet()->setCellValue('D3', 'จำนวนเงิน');
                //  $this->excel->getActiveSheet()->setCellValue('E3', 'หมายเหตุ');

                //  for ($col = ord('A'); $col <= ord('E'); $col++) {
                    
                    
                //     $this->excel->getActiveSheet()->getStyle(chr($col).'3')->applyFromArray($styleBoldCenterHeaderTable)->getAlignment()->setWrapText(true);
                // }

                // $start_rows = 4;
                // $i = 1;
                // foreach ($reTurnGoods_repair->result_array() as $row) {

                //     $this->excel->getActiveSheet()->setCellValue('A'.$start_rows, $i);
                //     $this->excel->getActiveSheet()->getStyle('A'.$start_rows)->applyFromArray($styleCenter);

                //      $this->excel->getActiveSheet()->setCellValue('B'.$start_rows, $row['Ddate']);
                //     $this->excel->getActiveSheet()->getStyle('B'.$start_rows)->applyFromArray($styleCenter);

                //      $this->excel->getActiveSheet()->setCellValue('C'.$start_rows, $row['subject']);
                   
                //     $this->excel->getActiveSheet()->setCellValue('D'.$start_rows, $row['price']);
                //     $this->excel->getActiveSheet()->getStyle('D'.$start_rows)->applyFromArray($styleCenter);

                //      $this->excel->getActiveSheet()->setCellValue('E'.$start_rows, $row['note']);
                   

                //     $this->excel->getActiveSheet()->setCellValue('F'.$start_rows, ' ');

                //     for ($col = ord('A'); $col <= ord('E'); $col++) {
                   
                //     $this->excel->getActiveSheet()->getStyle(chr($col).$start_rows)->applyFromArray($styleBorderLeftRight)->getAlignment()->setWrapText(true);
                //     }

                // $start_rows++;
                // $i++;
                // }

                // for($start_rows;$start_rows<=23;$start_rows++){
                //     for ($col = ord('A'); $col <= ord('E'); $col++) {
                   
                //         $this->excel->getActiveSheet()->getStyle(chr($col).$start_rows)->applyFromArray($styleBorderLeftRight)->getAlignment()->setWrapText(true);
                //     }
                // }

                // for ($col = ord('A'); $col <= ord('E'); $col++) {
                   
                //         $this->excel->getActiveSheet()->getStyle(chr($col).$start_rows)->applyFromArray($styleBorderTop)->getAlignment()->setWrapText(true);
                // }




                


                //Fill data 
                //->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');
//set aligment to center for that merged cell (A1 to D1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $filename = 'ทะเบียนคุมทรัพย์สิน.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
//force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');