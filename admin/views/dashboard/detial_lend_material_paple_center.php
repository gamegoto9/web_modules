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


               

                $this->excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::HORIZONTAL_RIGHT);
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
                $this->excel->getActiveSheet()->getRowDimension(4)->setRowHeight(6);
    			$this->excel->getActiveSheet()->getRowDimension(7)->setRowHeight(9.75);
//set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', 'ใบเบิกวัสดุ');
//change the font size
                $this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
//make the font become bold
               
//merge cell A1 until D1
                $this->excel->getActiveSheet()->mergeCells('A1:I1');

                $year = date("Y")+543;

                $this->excel->getActiveSheet()
                ->setCellValueByColumnAndRow(8, 2, 'เลขที่ใบเบิก  '.$row['LmatId'].'/'.$year);

                $this->excel->getActiveSheet()->getStyle('I2')->applyFromArray($styleRight);

                // $this->excel->getActiveSheet()->setCellValue('A3', 'เรียน  ผู้อำนวยการกองวิเทศสัมพันธ์');

                // $this->excel->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray2);

                $this->excel->getActiveSheet()->setCellValue('I3', 'วันที่เบิก  '.$row['Ddate']);
                $this->excel->getActiveSheet()->getStyle('I3')->applyFromArray($styleRight);

                // $this->excel->getActiveSheet()->setCellValue('I4', 'อ้างอิงเอกสารพัสดุกลาง:เลขที่ใบเบิก '.$row['id_buy']);
                // $this->excel->getActiveSheet()->getStyle('I4')->applyFromArray($styleRight);

                $this->excel->getActiveSheet()->setCellValue('B5', 'ข้าพเจ้า นาย/นาง/นางสาว '.'.........'.$row['name'].'......................................................................................................');

                // $this->excel->getActiveSheet()->setCellValue('G6', 'ตำแหน่ง'.'.....'.$row['Position']);

                 $this->excel->getActiveSheet()->setCellValue('J5', ' ');

                $this->excel->getActiveSheet()->setCellValue('A6', 'งาน/ฝ่าย '.' กองวิเทศสัมพันธ์ '.' มีความประสงค์จะขอเบิกวัสดุตามรายการข้างล่างนี้ เพื่อนำไปใช้ในทางราชการ');

                // $this->excel->getActiveSheet()->setCellValue('F7', ' งาน / โปรแกรมวิชา '.'.....'.' ........................ ');
                  $this->excel->getActiveSheet()->setCellValue('J6', ' ');

                 // $this->excel->getActiveSheet()->setCellValue('A8', ' มีความประสงค์จะขอเบิกครุภัณฑ์ เพื่อนำไปใช้ประจำที่ '.'...'.' ..... '.'...................................................');
                 // $this->excel->getActiveSheet()->setCellValue('J8', ' ');

                 // $this->excel->getActiveSheet()->setCellValue('A9', 'ดังรายการต่อไปนี้');

                 $this->excel->getActiveSheet()->setCellValue('A8', 'ลำดับที่');
                 $this->excel->getActiveSheet()->setCellValue('B8', 'รายการ/รายละเอียด');
                 $this->excel->getActiveSheet()->mergeCells('B8:H8');
                
                 $this->excel->getActiveSheet()->setCellValue('I8', 'จำนวนหน่วยที่เบิก');
               
                 // $this->excel->getActiveSheet()->getStyle('A11')->applyFromArray($styleBoldCenterHeaderTable);

                 for ($col = ord('A'); $col <= ord('I'); $col++) {
                    //set column dimension
                    $this->excel->getActiveSheet()->getStyle(chr($col).'8')->applyFromArray($styleBoldCenterHeaderTable);
                    //$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setWidth(8.43);
                }
                
                 


                $exceldata = "";
                $totlePrice=0;
              
                //$r = 4;
                $i = 1;
                $row1 = 9;
                foreach ($reTurnGoods->result_array() as $row) {

                    $this->excel->getActiveSheet()->setCellValue('A'.$row1, $i);
                    $this->excel->getActiveSheet()->getStyle('A'.$row1)->applyFromArray($styleCenter);

                    $this->excel->getActiveSheet()->setCellValue('B'.$row1, $row['MatName']);
                    // $row2 = $row1 + 1;
                    // $this->excel->getActiveSheet()->setCellValue('B'.$row2, 'ยี่ห้อ : '.$row['brand_goods']);
                    // $row3 = $row1 + 2;
                    // $this->excel->getActiveSheet()->setCellValue('B'.$row3, 'หมาเยเลขครุภัณฑ์ต่ำกว่าเกณฑ์ :');
                    // $row4 = $row1 + 3;
                    // $this->excel->getActiveSheet()->setCellValue('B'.$row4, $row['id_goods_crru']);

                    $this->excel->getActiveSheet()->mergeCells('B'.$row1.':H'.$row1);
                    // $this->excel->getActiveSheet()->mergeCells('B'.$row2.':F'.$row2);
                    // $this->excel->getActiveSheet()->mergeCells('B'.$row3.':F'.$row3);
                    // $this->excel->getActiveSheet()->mergeCells('B'.$row4.':F'.$row4);

                    // $this->excel->getActiveSheet()->setCellValue('G'.$row1, $row['price']);
                    // $this->excel->getActiveSheet()->getStyle('G'.$row1)->applyFromArray($styleRight);

                    $this->excel->getActiveSheet()->setCellValue('I'.$row1, $row['qty']);
                    $this->excel->getActiveSheet()->getStyle('I'.$row1)->applyFromArray($styleCenter);

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
                
                $this->excel->getActiveSheet()->setCellValue('B'.$totle1, 'ข้าพเจ้าขอรับรองว่า วัสดุที่ขอเบิกไปนี้ได้นำไปใช้ในราชการเท่านั้น');

                $endTotle1 = $totle1+1;
                $this->excel->getActiveSheet()->getRowDimension($endTotle1)->setRowHeight(10.5);

                // $sign = $totle1+2;
                // $name1 = $sign+1;
                // $this->excel->getActiveSheet()->mergeCells('A'.$sign.':I'.$sign);
                // $this->excel->getActiveSheet()->mergeCells('A'.$name1.':I'.$name1);
                
                // $this->excel->getActiveSheet()->setCellValue('A'.$sign, '(ลงชื่อ)....................................................(ผู้ขอเบิก)');
                // $this->excel->getActiveSheet()->getStyle('A'.$sign)->applyFromArray($styleBoldCenter);

                // $this->excel->getActiveSheet()->setCellValue('A'.$name1, '('.$row['name'].')');
                // $this->excel->getActiveSheet()->getStyle('A'.$name1)->applyFromArray($styleBoldCenter);


                $footer1 = $totle1+2;
                $under_footer = $footer1 + 4;

                $centerfooter = $footer1+5;

                for($i = $footer1;$i<$under_footer;$i++){

                    $this->excel->getActiveSheet()->mergeCells('A'.$i.':C'.$i);
                    $this->excel->getActiveSheet()->mergeCells('D'.$i.':F'.$i);
                    $this->excel->getActiveSheet()->mergeCells('G'.$i.':I'.$i);

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

                $this->excel->getActiveSheet()->setCellValue('A'.$footer1, 'ผู้ขอเบิก');
                $this->excel->getActiveSheet()->setCellValue('D'.$footer1, 'เจ้าหน้าที่พัสดุ');
                $this->excel->getActiveSheet()->setCellValue('G'.$footer1, 'ผู้อนุมัติ');

                
                $sign = $footer1+3;
                $this->excel->getActiveSheet()->setCellValue('A'.$sign, '( '.$row['name'].' )');
                $this->excel->getActiveSheet()->getStyle('A'.$sign)->applyFromArray($styleCenter);
                $this->excel->getActiveSheet()->setCellValue('D'.$sign, '( นายอนุวัฒน์ จินาจาย )');
                $this->excel->getActiveSheet()->getStyle('D'.$sign)->applyFromArray($styleCenter);
                $this->excel->getActiveSheet()->setCellValue('G'.$sign, '( นายธีรวัฒน์ วังมณี )');
                $this->excel->getActiveSheet()->getStyle('G'.$sign)->applyFromArray($styleCenter);
                

                //Fill data 
                //->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');
//set aligment to center for that merged cell (A1 to D1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $filename = 'รายงานการเบิกวัสดุ.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
//force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');