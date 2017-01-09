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


                $row = $reTurnGoods->row_array();
            

//load our new PHPExcel library
                $this->load->library('excel');
//activate worksheet number 1
                $this->excel->setActiveSheetIndex(0);


               

                $this->excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
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
                $this->excel->getActiveSheet()->setTitle('test worksheet');
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
                $styleNormalLeft = array(
                    'font'  => array(
                    'bold'  => false,
                    'color' => array('rgb' => '000000'),
                    'size'  => 16,
                    'name'  => 'Angsana New'
                ));

                $styleBoldCenterHeaderTable = array(
                    'font'  => array(
                    'bold'  => true),
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
                // $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(12.71);
                // $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(9.43);
                // $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(13.14);
                // $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(13.14);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(17.29);
//                $this->excel->getActiveSheet()->getRowDimension(4)->setRowHeight(6);
//    			$this->excel->getActiveSheet()->getRowDimension(7)->setRowHeight(9.75);
//set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A2', 'ใบยืมพัสดุ');
//change the font size
                $this->excel->getActiveSheet()->getStyle('A2')->applyFromArray($styleArray);
//make the font become bold
               
//merge cell A1 until D1
                $this->excel->getActiveSheet()->mergeCells('A2:I2');

                $this->excel->getActiveSheet()->setCellValue('A3', 'ชื่อหน่วยงาน กองวิเทศสัมพันธ์');
//change the font size
                $this->excel->getActiveSheet()->getStyle('A3')->applyFromArray($styleBoldCenter);
//make the font become bold
               
//merge cell A1 until D1
                $this->excel->getActiveSheet()->mergeCells('A3:I3');


                $year = date("Y")+543;

                 $startDate = $row['Ddate_get'];
                $sDay = substr($startDate, 8,2);

                $sMount = substr($startDate, 5,2);

                function convertMouth($Mount){
                switch ($Mount) {
                    case '01':
                        $sMount = 'มกราคม';
                        break;
                     case '02':
                        $sMount = 'มกราคม';
                        break;
                     case '03':
                        $sMount = 'มกราคม';
                        break;
                     case '04':
                        $sMount = 'มกราคม';
                        break;
                     case '05':
                        $sMount = 'มกราคม';
                        break;
                     case '06':
                        $sMount = 'มกราคม';
                        break;
                     case '07':
                        $sMount = 'มกราคม';
                        break;
                     case '08':
                        $sMount = 'มกราคม';
                        break;
                     case '09':
                        $sMount = 'มกราคม';
                        break;
                     case '10':
                        $sMount = 'มกราคม';
                        break;
                     case '11':
                        $sMount = 'มกราคม';
                        break;
                     case '12':
                        $sMount = 'มกราคม';
                        break;
                    
                    default:
                        $sMount = '';
                        break;
                }
                return $sMount;
            }


                $sYear = substr($startDate, 0,4) + 543;


                $this->excel->getActiveSheet()
                ->setCellValueByColumnAndRow(8, 1, 'บย. '.$row['get_material_id'].'/'.$year);

                $this->excel->getActiveSheet()->getStyle('I1')->applyFromArray($styleBoldCenterHeaderTable);

                $this->excel->getActiveSheet()
                ->setCellValueByColumnAndRow(8, 4, 'วันที่ '.$sDay.'  เดือน ' .convertMouth($sMount).'  ปี '.$sYear);

                $this->excel->getActiveSheet()->getStyle('I4')->applyFromArray($styleRight);

                $this->excel->getActiveSheet()->setCellValue('A5', 'เรียน  ผู้อำนวยการกองวิเทศสัมพันธ์');

                $this->excel->getActiveSheet()->getStyle('A5')->applyFromArray($styleArray2);

             

                $this->excel->getActiveSheet()->setCellValue('B6', 'ข้าพเจ้า'.'......'.$row['name_get'].'.................................................................................................................................');

                $this->excel->getActiveSheet()->setCellValue('F6', 'ตำแหน่ง'.'......'.$row['position_get'].'.................................................................................................................................');

                

                // $this->excel->getActiveSheet()->setCellValue('G6', 'ตำแหน่ง'.'.....'.$row['Position']);

                $this->excel->getActiveSheet()->setCellValue('J6', ' ');

                $this->excel->getActiveSheet()->setCellValue('A7', 'สังกัด '.'....'.$row['major_get'].'...............................................................................................................................');

               
                $this->excel->getActiveSheet()->setCellValue('F7', 'เบอร์โทร '.'....'.$row['tel'].'.................................................................................................................................');

                $this->excel->getActiveSheet()->setCellValue('J7', ' ');

                $this->excel->getActiveSheet()->setCellValue('A8', 'ขอความอนุเคราะห์ยืมพัสดุจากหน่วยงาน ......กองวิเทศสัมพันธ์.....................................................................................................................................................................................................................................................................................................');

                $this->excel->getActiveSheet()->setCellValue('J8', ' ');

                $this->excel->getActiveSheet()->setCellValue('A9', 'เพื่อใช้ในกิจการ(ระบุโครงการ/กิจกรรรม) .....'.$row['note'].'..........................................................................................................................................................................................................................');

                $this->excel->getActiveSheet()->setCellValue('J9', ' ');

               

                $lDate = $row['Ddate_return'];
                $lDay = substr($lDate, 8,2);
                $lMouth = substr($lDate, 5,2);
                $lYear = substr($lDate, 0,4) + 543;

                $this->excel->getActiveSheet()->setCellValue('A10', 'ตั้งแต่วันที่...'.$sDay.'... เดือน...'.convertMouth($sMount).'... พ.ศ..'.$sYear.'..    กำหนดส่งคืนในวันที่...'.$lDay.'... เดือน...'.convertMouth($lMouth).'... พ.ศ..'.$lYear.'...');

                 $this->excel->getActiveSheet()->setCellValue('A11', 'โดยมีรายละเอียดการยืมพัสดุดังนี้');

               

                 $this->excel->getActiveSheet()->setCellValue('A12', 'ลำดับ');
                 $this->excel->getActiveSheet()->setCellValue('B12', 'หมาเยเลขพัสดุ');
                 $this->excel->getActiveSheet()->mergeCells('B12:C12');

                  $this->excel->getActiveSheet()->setCellValue('D12', 'รายการ');
                 $this->excel->getActiveSheet()->mergeCells('D12:G12');
                
                 $this->excel->getActiveSheet()->setCellValue('H12', 'จำนวน');
                 $this->excel->getActiveSheet()->setCellValue('I12', 'หมายเหตุ');
               
                 // $this->excel->getActiveSheet()->getStyle('A11')->applyFromArray($styleBoldCenterHeaderTable);

                 for ($col = ord('A'); $col <= ord('I'); $col++) {
                    //set column dimension
                    $this->excel->getActiveSheet()->getStyle(chr($col).'12')->applyFromArray($styleBoldCenterHeaderTable);
                    //$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setWidth(8.43);
                }
                
                 


                $exceldata = "";
                $totlePrice=0;
              
                //$r = 4;
                $i = 1;
                $row1 = 13;
                $qtysum = 0;

                foreach ($reTurnGoods->result_array() as $row) {

                    $this->excel->getActiveSheet()->setCellValue('A'.$row1, $i);
                    $this->excel->getActiveSheet()->getStyle('A'.$row1)->applyFromArray($styleCenter);

                    $this->excel->getActiveSheet()->setCellValue('B'.$row1, $row['MatId']);
                    $this->excel->getActiveSheet()->mergeCells('B'.$row1.':C'.$row1);

                    $this->excel->getActiveSheet()->getStyle('B'.$row1)->applyFromArray($styleCenter);

                     $this->excel->getActiveSheet()->setCellValue('D'.$row1, $row['MatName']);
                    $this->excel->getActiveSheet()->mergeCells('D'.$row1.':G'.$row1);

                    $this->excel->getActiveSheet()->getStyle('D'.$row1)->applyFromArray($styleNormalLeft)->getAlignment()->setWrapText(true);

                    $this->excel->getActiveSheet()->setCellValue('H'.$row1, $row['qty']);
                    $this->excel->getActiveSheet()->getStyle('H'.$row1)->applyFromArray($styleCenter);

                     $this->excel->getActiveSheet()->setCellValue('I'.$row1, ' ');

                    // $this->excel->getActiveSheet()->setCellValue('I'.$row1, $row['price']);
                    // $this->excel->getActiveSheet()->getStyle('I'.$row1)->applyFromArray($styleRight);


                    for ($col = ord('A'); $col <= ord('I'); $col++) {
                    //set column dimension
                        $this->excel->getActiveSheet()->getStyle(chr($col).$row1)->applyFromArray($styleBorderLeftRight);

                        // for($r=$row1;$r<=$row4;$r++) {
                        //     $this->excel->getActiveSheet()->getStyle(chr($col).$r)->applyFromArray($styleBorderLeftRight);
                        // }                    
                    }
                     $i++;
                     $row1++;
                     $qtysum++;

                    // $totlePrice+=$row['price'];

                }

                $totle1 = $row1;
                $tableEndBorder = $totle1-1;
                // for ($col = ord('A'); $col <= ord('J'); $col++) {
                //     //set column dimension
                //     $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                // }
                // $totleString = Convert($totlePrice);
                // $this->excel->getActiveSheet()->setCellValue('A'.$totle1, $totleString);
                // $this->excel->getActiveSheet()->mergeCells('A'.$totle1.':H'.$totle1);

                for ($col = ord('A'); $col <= ord('I'); $col++) {
                    //set column dimension
                    $this->excel->getActiveSheet()->getStyle(chr($col).$tableEndBorder)->applyFromArray($styleBorderBottom);
                }



                //$this->excel->getActiveSheet()->setCellValue('I'.$totle1, $totlePrice);
                //$this->excel->getActiveSheet()->getStyle('I'.$totle1)->applyFromArray($styleRight);

                $this->excel->getActiveSheet()->setCellValue('A'.$totle1, 'หมายเหตุ');
                $this->excel->getActiveSheet()->setCellValue('B'.$totle1, '1.กรณีมีพัสดุชำรุด ผู้ยืมยินดีชำระค่าซ่อมแซมตามความเสียหายของพัสดุ');

                $totle1++;
                $this->excel->getActiveSheet()->setCellValue('B'.$totle1, '2.กรณีพัสดุที่ยืมสูญหายผู้ยืมยินดีหาครุภัณฑ์เดียวกันมาทดแทนหรือชำระเงินตามราคาพัสดุ');

                $endTotle1 = $totle1+1;
                $this->excel->getActiveSheet()->getRowDimension($endTotle1)->setRowHeight(10.5);

                // $endTotle1++;
                // $this->excel->getActiveSheet()->setCellValue('B'.$endTotle1, 'จึงเรียนมาเพื่อโปรดพิจารณา');

                // $sign = $totle1+2;
                // $name1 = $sign+1;
                // $this->excel->getActiveSheet()->mergeCells('A'.$sign.':I'.$sign);
                // $this->excel->getActiveSheet()->mergeCells('A'.$name1.':I'.$name1);
                
                // $this->excel->getActiveSheet()->setCellValue('A'.$sign, '(ลงชื่อ)....................................................(ผู้ขอเบิก)');
                // $this->excel->getActiveSheet()->getStyle('A'.$sign)->applyFromArray($styleBoldCenter);

                // $this->excel->getActiveSheet()->setCellValue('A'.$name1, '('.$row['name'].')');
                // $this->excel->getActiveSheet()->getStyle('A'.$name1)->applyFromArray($styleBoldCenter);


                $footer1 = $totle1+2;
                $under_footer = $footer1 + 6;

                $centerfooter = $footer1+5;

                for($i = $footer1;$i<$under_footer;$i++){

                    $this->excel->getActiveSheet()->mergeCells('A'.$i.':C'.$i);
                    $this->excel->getActiveSheet()->mergeCells('D'.$i.':G'.$i);
                    $this->excel->getActiveSheet()->mergeCells('H'.$i.':I'.$i);

                    for ($col = ord('A'); $col <= ord('I'); $col++) {
                        //set column dimension
                        $this->excel->getActiveSheet()->getStyle(chr($col).$i)->applyFromArray($styleBorderLeftRight);
                        //$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setWidth(8.43);

                        $this->excel->getActiveSheet()->getStyle(chr($col).$footer1)->applyFromArray($styleBorderTop);
                        
                        $this->excel->getActiveSheet()->getStyle(chr($col).$under_footer)->applyFromArray($styleBorderTop);

                        // if($i >= $centerfooter){
                        //     $this->excel->getActiveSheet()->getStyle(chr($col).$centerfooter)->applyFromArray($styleBorderBottom);
                        //  $this->excel->getActiveSheet()->getStyle(chr($col).$centerfooter)->applyFromArray($styleBorderBottom);
                        // }
                    }
                }

                for ($col = ord('A'); $col <= ord('I'); $col++) {
                    //set column dimension
                    $this->excel->getActiveSheet()->getStyle(chr($col).$footer1)->applyFromArray($styleBoldCenterHeaderTable);
                    //$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setWidth(8.43);
                }

                $this->excel->getActiveSheet()->setCellValue('A'.$footer1, 'ผู้ยืม');
                $this->excel->getActiveSheet()->setCellValue('D'.$footer1, 'เจ้าหน้าที่พัสดุ');
                $this->excel->getActiveSheet()->setCellValue('H'.$footer1, 'ผู้มีอำนาจู้อนุมัติ');

                $sign = $footer1+1;
                $this->excel->getActiveSheet()->setCellValue('D'.$sign, '          ตรวจสอบแล้วมีพัสดุตามที่ขอยืมเพื่อโปรดพิจารณา');
                $this->excel->getActiveSheet()->getStyle('D'.$sign)->applyFromArray($styleNormalLeft);
                $this->excel->getActiveSheet()->setCellValue('H'.$sign, '    อนุมัติให้ยืม');
                

                $sign = $footer1+2;
                $this->excel->getActiveSheet()->setCellValue('H'.$sign, '    ไม่อนุมัติให้ยืม');
               

                $a1 = $footer1+1;
                $a2 = $footer1+2;
                $this->excel->getActiveSheet()->mergeCells('D'.$a1.':G'.$a2);

                $this->excel->getActiveSheet()->getStyle('D'.$a1)->applyFromArray($styleNormalLeft)->getAlignment()->setWrapText(true);

                $sign = $footer1+4;
                $this->excel->getActiveSheet()->setCellValue('A'.$sign, 'ลงชื่อ.....................................');
                $this->excel->getActiveSheet()->getStyle('A'.$sign)->applyFromArray($styleCenter);
                $this->excel->getActiveSheet()->setCellValue('D'.$sign, 'ลงชื่อ.....................................');
                $this->excel->getActiveSheet()->getStyle('D'.$sign)->applyFromArray($styleCenter);
                $this->excel->getActiveSheet()->setCellValue('H'.$sign, 'ลงชื่อ.....................................');
                $this->excel->getActiveSheet()->getStyle('H'.$sign)->applyFromArray($styleCenter);

                
                $sign = $footer1+5;
                $this->excel->getActiveSheet()->setCellValue('A'.$sign, '( '.$row['name_get'].' )');
                $this->excel->getActiveSheet()->getStyle('A'.$sign)->applyFromArray($styleCenter);
                $this->excel->getActiveSheet()->setCellValue('D'.$sign, '( นายลิขิต ยอดยา )');
                $this->excel->getActiveSheet()->getStyle('D'.$sign)->applyFromArray($styleCenter);
                $this->excel->getActiveSheet()->setCellValue('H'.$sign, '( นายธีรวัฒน์ วังมณี )');
                $this->excel->getActiveSheet()->getStyle('H'.$sign)->applyFromArray($styleCenter);


                $sign++;
                $sign++;

                $this->excel->getActiveSheet()->setCellValue('A'.$sign, '...........................................................................................................................................................................................................................................................................................................................................................');

                $this->excel->getActiveSheet()->setCellValue('J'.$sign, ' ');

                $return = $sign +1;

                $this->excel->getActiveSheet()->setCellValue('B'.$return, 'ข้าพเจ้าได้ตรวจสอบและรับพัสดุคืนตามจำนวนที่ยืมไปข้างต้น   จำนวน  '.$row['qty']. ' รายการ');


                $return++;
                $this->excel->getActiveSheet()->setCellValue('A'.$return, ' เมื่อวันที่.............เดือน.........................พ.ศ...................ปรากฏว่าพัสดุมีสภาพดังนี้');

                $return++;
                $this->excel->getActiveSheet()->setCellValue('B'.$return, '    คงอยู่ในสภาพเดิมทุกประการ');
                $return++;
                $this->excel->getActiveSheet()->setCellValue('B'.$return, '    จะต้องดำเนินการ ซ่อมแซม/ชดใช้ จำนวน.....................................รายการดังนี้');

                $return++;
                $this->excel->getActiveSheet()->setCellValue('B'.$return, '     .............................................................................................................................................................................................................................');

                $this->excel->getActiveSheet()->setCellValue('J'.$return, ' ');



                $footer1 = $return;
                $under_footer = $return + 4;

                $centerfooter = $return+5;

                for($i = $footer1;$i<$under_footer;$i++){

                    $this->excel->getActiveSheet()->mergeCells('A'.$i.':E'.$i);
                    $this->excel->getActiveSheet()->mergeCells('F'.$i.':I'.$i);
                   

                    for ($col = ord('A'); $col <= ord('I'); $col++) {
                        //set column dimension
                        $this->excel->getActiveSheet()->getStyle(chr($col).$i)->applyFromArray($styleBorderLeftRight);
                        //$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setWidth(8.43);

                        $this->excel->getActiveSheet()->getStyle(chr($col).$footer1)->applyFromArray($styleBorderTop);
                        
                        $this->excel->getActiveSheet()->getStyle(chr($col).$under_footer)->applyFromArray($styleBorderTop);

                        // if($i >= $centerfooter){
                        //     $this->excel->getActiveSheet()->getStyle(chr($col).$centerfooter)->applyFromArray($styleBorderBottom);
                        //  $this->excel->getActiveSheet()->getStyle(chr($col).$centerfooter)->applyFromArray($styleBorderBottom);
                        // }
                    }
                }

                for ($col = ord('A'); $col <= ord('I'); $col++) {
                    //set column dimension
                    $this->excel->getActiveSheet()->getStyle(chr($col).$footer1)->applyFromArray($styleBoldCenterHeaderTable);
                    //$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setWidth(8.43);
                }

                $this->excel->getActiveSheet()->setCellValue('A'.$footer1, 'ผู้ส่งคืน');
                $this->excel->getActiveSheet()->setCellValue('F'.$footer1, 'ผู้รับคืนพัสดุ');
               


                $sign = $footer1+2;
                $this->excel->getActiveSheet()->setCellValue('A'.$sign, 'ลงชื่อ.......................................................................');
                $this->excel->getActiveSheet()->getStyle('A'.$sign)->applyFromArray($styleCenter);
                $this->excel->getActiveSheet()->setCellValue('F'.$sign, 'ลงชื่อ.......................................................................');
                $this->excel->getActiveSheet()->getStyle('F'.$sign)->applyFromArray($styleCenter);
               

                
                $sign = $footer1+3;
                $this->excel->getActiveSheet()->setCellValue('A'.$sign, '(............................................................................)');
                $this->excel->getActiveSheet()->getStyle('A'.$sign)->applyFromArray($styleCenter);
                $this->excel->getActiveSheet()->setCellValue('F'.$sign, '(............................................................................)');
                $this->excel->getActiveSheet()->getStyle('F'.$sign)->applyFromArray($styleCenter);

                $sign++;
                $sign++;

                $this->excel->getActiveSheet()->setCellValue('A'.$sign, '...........................................................................................................................................................................................................................................................................................................................................................');
                $this->excel->getActiveSheet()->setCellValue('J'.$sign, ' ');



                $footer1 = $sign+1;
                $under_footer = $sign + 7;

                $centerfooter = $sign+5;

              

                $this->excel->getActiveSheet()->mergeCells('A'.$footer1.':I'.$footer1);
                    
                  for($i = $footer1+1;$i<$under_footer;$i++){  

                    $this->excel->getActiveSheet()->mergeCells('A'.$i.':E'.$i);
                    $this->excel->getActiveSheet()->mergeCells('F'.$i.':I'.$i);

                    for ($col = ord('A'); $col <= ord('I'); $col++) {
                        //set column dimension
                        $this->excel->getActiveSheet()->getStyle(chr($col).$i)->applyFromArray($styleBorderLeftRight);
                        //$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setWidth(8.43);

                        $this->excel->getActiveSheet()->getStyle(chr($col).$footer1)->applyFromArray($styleBorderTop);
                        
                        $this->excel->getActiveSheet()->getStyle(chr($col).$under_footer)->applyFromArray($styleBorderTop);

                        // if($i >= $centerfooter){
                        //     $this->excel->getActiveSheet()->getStyle(chr($col).$centerfooter)->applyFromArray($styleBorderBottom);
                        //  $this->excel->getActiveSheet()->getStyle(chr($col).$centerfooter)->applyFromArray($styleBorderBottom);
                        // }
                    }
                }

 
                for ($col = ord('A'); $col <= ord('I'); $col++) {
                    //set column dimension
                    $this->excel->getActiveSheet()->getStyle(chr($col).$footer1)->applyFromArray($styleBoldCenterHeaderTable);
                    //$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setWidth(8.43);
                }

                 $this->excel->getActiveSheet()->setCellValue('A'.$footer1, 'ใบยืมพัสดุ  หน่วยงาน กองวิเทศสัมพันธ์');
               
               

                $sign = $footer1+1;
                $this->excel->getActiveSheet()->setCellValue('A'.$sign, 'ชื่อ - สกุล..... '.$row['name_get'].' .....');
                $this->excel->getActiveSheet()->setCellValue('F'.$sign, 'วันที่ยืม.  วันที่  '.$sDay.' เดือน '.convertMouth($sMount).' พ.ศ  '.$sYear);
              

                 $sign++;
                 $this->excel->getActiveSheet()->setCellValue('A'.$sign, 'ได้ขอยืมพัสดุจำนวน..  '.$row['qty'].'..  รายการ');
                $this->excel->getActiveSheet()->setCellValue('F'.$sign, 'กำหนดส่งคืน.   วันที่  '.$lDay.' เดือน '.convertMouth($lMouth).' พ.ศ  '.$lYear);

                

                $sign++;
                $this->excel->getActiveSheet()->setCellValue('A'.$sign, 'ตามใบยืมเล่มที่/ เลขที่  '.'บย. '.$row['get_material_id'].'/'.$year);
                // $this->excel->getActiveSheet()->getStyle('A'.$sign)->applyFromArray($style);

                $sign++;
                $this->excel->getActiveSheet()->setCellValue('F'.$sign, 'ลงชื่อ.......................................................................');
                $this->excel->getActiveSheet()->getStyle('F'.$sign)->applyFromArray($styleCenter);
                $sign++;
                $this->excel->getActiveSheet()->setCellValue('F'.$sign, '(......................................................................)');
                $this->excel->getActiveSheet()->getStyle('F'.$sign)->applyFromArray($styleCenter);
                
                // $sign = $footer1+3;
                // $this->excel->getActiveSheet()->setCellValue('A'.$sign, '(............................................................................)');
                // $this->excel->getActiveSheet()->getStyle('A'.$sign)->applyFromArray($styleCenter);
                // $this->excel->getActiveSheet()->setCellValue('F'.$sign, '(............................................................................)');
                // $this->excel->getActiveSheet()->getStyle('F'.$sign)->applyFromArray($styleCenter);
               

                //Fill data 
                //->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');
//set aligment to center for that merged cell (A1 to D1)
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $filename = 'ใบยืมพัสดุ.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
//force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');