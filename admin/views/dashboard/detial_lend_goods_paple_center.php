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
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
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


                 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(12.00);
                 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(9.14);
                 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30.71);
                 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(10.42);
                 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(11.85);
                 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(9.14);
                 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(11.42);
                 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(11.42);
                 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(10.42);
                 //$this->excel->getActiveSheet()->getRowDimension(4)->setRowHeight(6);
//     			$this->excel->getActiveSheet()->getRowDimension(7)->setRowHeight(9.75);

                 $this->excel->getActiveSheet()->setCellValue('E1', 'ทะเบียนคุมทรัพย์สิน');

                 $this->excel->getActiveSheet()->getStyle('E1')->applyFromArray($styleArray);

               

//                 $this->excel->getActiveSheet()->mergeCells('A1:I1');

                 $year = date("Y")+543;

                 $this->excel->getActiveSheet()
                 ->setCellValueByColumnAndRow(11, 1, 'เลขที่  '.'......'.'/'.$year);

                 $this->excel->getActiveSheet()->getStyle('L1')->applyFromArray($styleRight);

                 $this->excel->getActiveSheet()
                 ->setCellValueByColumnAndRow(11, 2, 'ส่วนราชการ  '.'มหาวิทยาลัยราชภัฏเชียงราย');

                 $this->excel->getActiveSheet()->getStyle('L2')->applyFromArray($styleRight);

                 $this->excel->getActiveSheet()
                 ->setCellValueByColumnAndRow(11, 3, 'หน่วยงาน  '.'กองวิเทศสัมพันธ์');

                 $this->excel->getActiveSheet()->getStyle('L3')->applyFromArray($styleRight);

//                 // $this->excel->getActiveSheet()->setCellValue('A3', 'เรียน  ผู้อำนวยการกองวิเทศสัมพันธ์');

//                 // $this->excel->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray2);

                 $this->excel->getActiveSheet()->setCellValue('A4', 'ประเภท ' 
                    .'..................ครุภัณฑ์......................................'
                    .'รหัส '
                    .'..........'.$row['id_goods_crru'].'..........'
                    .'ลักษณะ/คุณสมบัติ '
                    .'...................................................................'
                    .'รุ่น/แบบ'
                    .'.......'.$row['brand_goods'].'.........................................................................');

                 $this->excel->getActiveSheet()->setCellValue('A5', 'สถานที่ตั้ง/หน่วยงาน/ชื่อผู้รับผิดชอบ ' 
                    .'..............'.$row['address'].'..............................................'
                    .'ชื่อผู้ขาย/รับจ้าง/ผู้บริจาค '
                    .'.....'.$row['name_buy'].'.........................................................................................................');

                 $this->excel->getActiveSheet()->setCellValue('A6', 'ที่อยู่ผู้ขาย ' 
                    .'...........................................................................................................................................................................................................'
                    .'โทรศัพท์ '
                    .'............................................................................................................................');

                 $this->excel->getActiveSheet()->setCellValue('M4', ' ');
                 $this->excel->getActiveSheet()->setCellValue('M5', ' ');
                 $this->excel->getActiveSheet()->setCellValue('M6', ' ');

                 $this->excel->getActiveSheet()->setCellValue('A7', 'ประเภทเงิน       ' 
                    .'    เงินนอกงบประมาณ       '
                    .'    เงินบริจาค/เงินช่วยเหลือ       '
                    .'    อื่นๆ ');

                 $this->excel->getActiveSheet()->setCellValue('A8', 'วิธีได้มา        ' 
                    .'    ตกลงราคา       '
                    .'    สอบราคา       '
                    .'    ประกวดราคา       '
                    .'    วิธีพิเศษ       '
                    .'    รับบริจาค       ');
                   


                 $this->excel->getActiveSheet()->setCellValue('A10', 'วัน เดือน ปี');
                 $this->excel->getActiveSheet()->setCellValue('B10', 'ที่เอกสาร');
                 $this->excel->getActiveSheet()->setCellValue('C10', 'รายการ');
                 $this->excel->getActiveSheet()->setCellValue('D10', 'จำนวน หน่วย');
                 $this->excel->getActiveSheet()->setCellValue('E10', 'ราคาต่อ หน่วย/ชุด/กลุ่ม');
                 $this->excel->getActiveSheet()->setCellValue('F10', 'มูลค่ารวม');
                 $this->excel->getActiveSheet()->setCellValue('G10', 'อายุใช้งาน');
                 $this->excel->getActiveSheet()->setCellValue('H10', 'อัตราค่าเสื่อม ราคา');
                 $this->excel->getActiveSheet()->setCellValue('I10', 'ค่าเสื่อมราคา ประจำปี');
                 $this->excel->getActiveSheet()->setCellValue('J10', 'ค่าเสื่อมราคา สะสม');
                 $this->excel->getActiveSheet()->setCellValue('K10', 'มูลค่าสุทธิ');
                 $this->excel->getActiveSheet()->setCellValue('L10', 'หมายเหตุ');

                 for ($col = ord('A'); $col <= ord('L'); $col++) {
                    $this->excel->getActiveSheet()->mergeCells(chr($col).'10'.':'.chr($col).'11');
                    $this->excel->getActiveSheet()->getStyle(chr($col).'10')->applyFromArray($styleBoldCenterHeaderTable)->getAlignment()->setWrapText(true);
                    $this->excel->getActiveSheet()->getStyle(chr($col).'11')->applyFromArray($styleBoldCenterHeaderTable)->getAlignment()->setWrapText(true);
                }

                $start = 12;
                $qty = 1;

                foreach ($reTurnGoods->result_array() as $row) {

                    $this->excel->getActiveSheet()->setCellValue('A'.$start, $row['date_start']);
                    $this->excel->getActiveSheet()->getStyle('A'.$start)->applyFromArray($styleCenter);

                     $this->excel->getActiveSheet()->setCellValue('B'.$start, $row['id_buy']);
                    $this->excel->getActiveSheet()->getStyle('B'.$start)->applyFromArray($styleCenter);

                     $this->excel->getActiveSheet()->setCellValue('C'.$start, $row['name_goods']);
                   
                    $this->excel->getActiveSheet()->setCellValue('D'.$start, $qty);
                    $this->excel->getActiveSheet()->getStyle('D'.$start)->applyFromArray($styleCenter);

                     $this->excel->getActiveSheet()->setCellValue('E'.$start, $row['price']);
                    $this->excel->getActiveSheet()->getStyle('E'.$start)->applyFromArray($styleCenter);

                     $this->excel->getActiveSheet()->setCellValue('F'.$start, $row['price'] * $qty);
                    $this->excel->getActiveSheet()->getStyle('F'.$start)->applyFromArray($styleCenter);

                    for ($col = ord('A'); $col <= ord('L'); $col++) {
                   
                    $this->excel->getActiveSheet()->getStyle(chr($col).$start)->applyFromArray($styleCenterHeaderTable)->getAlignment()->setWrapText(true);
                    }

                $start++;

                }

                for($start;$start<=24;$start++){
                    for ($col = ord('A'); $col <= ord('L'); $col++) {
                   
                    $this->excel->getActiveSheet()->getStyle(chr($col).$start)->applyFromArray($styleCenterHeaderTable)->getAlignment()->setWrapText(true);
                    }
                }




                // ---------------------------- ซ่อมบำรุง --------------------------------------------------------------


                $this->excel->createSheet(1);
               
                $this->excel->setActiveSheetIndex(1);  

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


                 $this->excel->getActiveSheet()->setTitle('ซ่อมบำรุง(ด้านหลัง)');
                

                 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(9.14);
                 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
                 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(73.72);
                 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(18.15);
                 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(27.57);


                  $this->excel->getActiveSheet()->setCellValue('A1', 'ประวัติการซ่อมบำรุงรักษาทรัพย์สิน');

                 $this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
                 $this->excel->getActiveSheet()->mergeCells('A1:E1');

                 $this->excel->getActiveSheet()->setCellValue('A3', 'ครั้งที่');
                 $this->excel->getActiveSheet()->setCellValue('B3', 'วัน เดือน ปี');
                 $this->excel->getActiveSheet()->setCellValue('C3', 'รายการ');
                 $this->excel->getActiveSheet()->setCellValue('D3', 'จำนวนเงิน');
                 $this->excel->getActiveSheet()->setCellValue('E3', 'หมายเหตุ');

                 for ($col = ord('A'); $col <= ord('E'); $col++) {
                    
                    
                    $this->excel->getActiveSheet()->getStyle(chr($col).'3')->applyFromArray($styleBoldCenterHeaderTable)->getAlignment()->setWrapText(true);
                }

                $start_rows = 4;
                $i = 1;
                foreach ($reTurnGoods_repair->result_array() as $row) {

                    $this->excel->getActiveSheet()->setCellValue('A'.$start_rows, $i);
                    $this->excel->getActiveSheet()->getStyle('A'.$start_rows)->applyFromArray($styleCenter);

                     $this->excel->getActiveSheet()->setCellValue('B'.$start_rows, $row['Ddate']);
                    $this->excel->getActiveSheet()->getStyle('B'.$start_rows)->applyFromArray($styleCenter);

                     $this->excel->getActiveSheet()->setCellValue('C'.$start_rows, $row['subject']);
                   
                    $this->excel->getActiveSheet()->setCellValue('D'.$start_rows, $row['price']);
                    $this->excel->getActiveSheet()->getStyle('D'.$start_rows)->applyFromArray($styleCenter);

                     $this->excel->getActiveSheet()->setCellValue('E'.$start_rows, $row['note']);
                   

                    $this->excel->getActiveSheet()->setCellValue('F'.$start_rows, ' ');

                    for ($col = ord('A'); $col <= ord('E'); $col++) {
                   
                    $this->excel->getActiveSheet()->getStyle(chr($col).$start_rows)->applyFromArray($styleBorderLeftRight)->getAlignment()->setWrapText(true);
                    }

                $start_rows++;
                $i++;
                }

                for($start_rows;$start_rows<=23;$start_rows++){
                    for ($col = ord('A'); $col <= ord('E'); $col++) {
                   
                        $this->excel->getActiveSheet()->getStyle(chr($col).$start_rows)->applyFromArray($styleBorderLeftRight)->getAlignment()->setWrapText(true);
                    }
                }

                for ($col = ord('A'); $col <= ord('E'); $col++) {
                   
                        $this->excel->getActiveSheet()->getStyle(chr($col).$start_rows)->applyFromArray($styleBorderTop)->getAlignment()->setWrapText(true);
                }




                


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