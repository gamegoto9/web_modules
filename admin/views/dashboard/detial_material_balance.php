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


                 // $row = $reTurnGoods->row_array();
            

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

                
    			for ($col = ord('A'); $col <= ord('N'); $col++) {
                    //set column dimension
                    $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setWidth(8);
                }


                 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5.57);
                 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(34.84);


                 
                $date = date("Y-m-d");
                 $title = "สรุปรายงานวัสดุคงเหลือ ประจำปีงบประมาณ พ.ศ. ".$year_what;
                $Ddate = "ณ ".$date;

                 $this->excel->getActiveSheet()->setCellValue('A1', $title);

                 $this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);

                $this->excel->getActiveSheet()->setCellValue('A2', 'หน่วยงาน กองวิเทสสัมพันธ์ มหาวิทยาลัยราชภัฏเชียงราย');

                 $this->excel->getActiveSheet()->getStyle('A2')->applyFromArray($styleArray);

                 $this->excel->getActiveSheet()->setCellValue('A3', $Ddate);

                 $this->excel->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray);

                 $this->excel->getActiveSheet()->mergeCells('A1:N1');
                 $this->excel->getActiveSheet()->mergeCells('A2:N2');
                 $this->excel->getActiveSheet()->mergeCells('A3:N3');

               




                 $this->excel->getActiveSheet()->setCellValue('A4', 'ลำดับ');
                 $this->excel->getActiveSheet()->setCellValue('B4', 'รายการวัสดุ');
                 $this->excel->getActiveSheet()->setCellValue('C4', 'ยอดยกมา');
                 $this->excel->getActiveSheet()->setCellValue('F4', 'ซื้อระหว่างปี');
                 $this->excel->getActiveSheet()->setCellValue('I4', 'เบิกใช้');
                 $this->excel->getActiveSheet()->setCellValue('L4', 'คงเหลือ');

                 $this->excel->getActiveSheet()->setCellValue('C5', 'จำนวน หน่วย');
                 $this->excel->getActiveSheet()->setCellValue('D5', 'ราคา ต่อหน่วย');
                 $this->excel->getActiveSheet()->setCellValue('E5', 'จำนวนเงิน');

                 $this->excel->getActiveSheet()->setCellValue('F5', 'จำนวน หน่วย');
                 $this->excel->getActiveSheet()->setCellValue('G5', 'ราคา ต่อหน่วย');
                 $this->excel->getActiveSheet()->setCellValue('H5', 'จำนวนเงิน');

                 $this->excel->getActiveSheet()->setCellValue('I5', 'จำนวน หน่วย');
                 $this->excel->getActiveSheet()->setCellValue('J5', 'ราคา ต่อหน่วย');
                 $this->excel->getActiveSheet()->setCellValue('K5', 'จำนวนเงิน');

                 $this->excel->getActiveSheet()->setCellValue('L5', 'จำนวน หน่วย');
                 $this->excel->getActiveSheet()->setCellValue('M5', 'ราคา ต่อหน่วย');
                 $this->excel->getActiveSheet()->setCellValue('N5', 'จำนวนเงิน');

                 $this->excel->getActiveSheet()->mergeCells('A4:A6');
                 $this->excel->getActiveSheet()->mergeCells('B4:B6');

                 $this->excel->getActiveSheet()->mergeCells('C4:E4');
                 $this->excel->getActiveSheet()->mergeCells('F4:H4');
                 $this->excel->getActiveSheet()->mergeCells('I4:K4');
                 $this->excel->getActiveSheet()->mergeCells('L4:N4');



                for ($col = ord('C'); $col <= ord('N'); $col++) {
                 $this->excel->getActiveSheet()->mergeCells(chr($col).'5'.':'.chr($col).'6');

                }
              
      
                 for ($col = ord('A'); $col <= ord('N'); $col++) {
                    // $this->excel->getActiveSheet()->mergeCells(chr($col).'4'.':'.chr($col).'6');
                    $this->excel->getActiveSheet()->getStyle(chr($col).'4')->applyFromArray($styleBoldCenterHeaderTable)->getAlignment()->setWrapText(true);
                     $this->excel->getActiveSheet()->getStyle(chr($col).'5')->applyFromArray($styleBoldCenterHeaderTable)->getAlignment()->setWrapText(true);
                      $this->excel->getActiveSheet()->getStyle(chr($col).'6')->applyFromArray($styleBoldCenterHeaderTable)->getAlignment()->setWrapText(true);
                    
                }

                $start = 7;
                $i = 1;
                $sumbalance = 0;
                $start_date = $year_year_start;
                $end_date = $year_year_end;
                
                foreach ($material->result_array() as $row) {
                    $qty=0;
                    $id = $row['MatId'];
                    $this->excel->getActiveSheet()->setCellValue('A'.$start, $i);
                    $this->excel->getActiveSheet()->getStyle('A'.$start)->applyFromArray($styleCenter);

                    $this->excel->getActiveSheet()->setCellValue('B'.$start, $row['MatName']);
                   

                    $this->excel->getActiveSheet()->setCellValue('C'.$start, $row['qty']);
                    $this->excel->getActiveSheet()->getStyle('C'.$start)->applyFromArray($styleCenter);
                    $this->excel->getActiveSheet()->setCellValue('D'.$start, $row['price']);
                    $this->excel->getActiveSheet()->getStyle('D'.$start)->applyFromArray($styleRight);

                    $this->excel->getActiveSheet()->setCellValue('E'.$start, $row['price']*$row['qty']);
                    $this->excel->getActiveSheet()->getStyle('E'.$start)->applyFromArray($styleRight);
                    $qty+= $row['qty'];

                    //  $this->excel->getActiveSheet()->setCellValue('F'.$start, $row['price'] * $qty);
                    // $this->excel->getActiveSheet()->getStyle('F'.$start)->applyFromArray($styleCenter);\
                    
                    $sql = "select sum(qty) as qty,price from buy_material_2016 WHERE MatId = $id AND Ddate BETWEEN '$start_date' AND '$end_date'";         
                    $buyMaterial = $this->db->query($sql)->result_array();

                    foreach ($buyMaterial as $row2) {
                        $this->excel->getActiveSheet()->setCellValue('F'.$start, $row2['qty']);
                        $this->excel->getActiveSheet()->getStyle('F'.$start)->applyFromArray($styleCenter);

                        $this->excel->getActiveSheet()->setCellValue('G'.$start, $row2['price']);
                        $this->excel->getActiveSheet()->getStyle('G'.$start)->applyFromArray($styleRight);
                       
                        $this->excel->getActiveSheet()->setCellValue('H'.$start, $row2['price']*$row2['qty']);
                        $this->excel->getActiveSheet()->getStyle('H'.$start)->applyFromArray($styleRight);

                         $qty+= $row2['qty'];
                    }


                    $sql = "SELECT sum(qty) as qty,lend_material_2016.price
                            FROM
                            lend_material_2016
                            INNER JOIN personal ON lend_material_2016.Pid = personal.Pid
                            WHERE MatId = $id AND Ddate BETWEEN '$start_date' AND '$end_date'";         
                    $lend = $this->db->query($sql)->result_array();

                    foreach ($lend as $row3) {
                        $this->excel->getActiveSheet()->setCellValue('I'.$start, $row3['qty']);
                        $this->excel->getActiveSheet()->getStyle('I'.$start)->applyFromArray($styleCenter);

                        $this->excel->getActiveSheet()->setCellValue('J'.$start, $row3['price']);
                        $this->excel->getActiveSheet()->getStyle('J'.$start)->applyFromArray($styleRight);

                       
                        $this->excel->getActiveSheet()->setCellValue('K'.$start, $row3['price']*$row3['qty']);
                        $this->excel->getActiveSheet()->getStyle('K'.$start)->applyFromArray($styleRight);

                         $qty-= $row3['qty'];
                    }


                    $this->excel->getActiveSheet()->setCellValue('L'.$start, $qty);
                    $this->excel->getActiveSheet()->getStyle('L'.$start)->applyFromArray($styleCenter);

                    $this->excel->getActiveSheet()->setCellValue('M'.$start, $row['price']);
                    $this->excel->getActiveSheet()->getStyle('M'.$start)->applyFromArray($styleRight);

                    $this->excel->getActiveSheet()->setCellValue('N'.$start, $row2['price']*$qty);
                    $this->excel->getActiveSheet()->getStyle('N'.$start)->applyFromArray($styleRight);

                    $sumbalance += $row2['price']*$qty;


                    for ($col = ord('A'); $col <= ord('N'); $col++) {
                   
                        $this->excel->getActiveSheet()->getStyle(chr($col).$start)->applyFromArray($styleBorderLeftRight)->getAlignment();
                        $this->excel->getActiveSheet()->getStyle(chr($col).$start)->applyFromArray($styleBorderBottom)->getAlignment();
                    }

                $start++;
                $i++;

                }

                $this->excel->getActiveSheet()->setCellValue('A'.$start, 'รวมทั้งสิ้น');

                $this->excel->getActiveSheet()->mergeCells('A'.$start.':B'.$start);

                $this->excel->getActiveSheet()->setCellValue('N'.$start, $sumbalance);
                $this->excel->getActiveSheet()->getStyle('A'.$start)->applyFromArray($styleArray);

                for ($col = ord('A'); $col <= ord('N'); $col++) {
                   
                        $this->excel->getActiveSheet()->getStyle(chr($col).$start)->applyFromArray($styleBorderLeftRight)->getAlignment();
                        $this->excel->getActiveSheet()->getStyle(chr($col).$start)->applyFromArray($styleBorderBottom)->getAlignment();
                }
/*
                foreach ($material_buy_in_year->result_array() as $row) {
                    $qty=0;
                    $id = $row['MatId'];
                    $this->excel->getActiveSheet()->setCellValue('A'.$start, $i);
                    $this->excel->getActiveSheet()->getStyle('A'.$start)->applyFromArray($styleCenter);

                    $this->excel->getActiveSheet()->setCellValue('B'.$start, $row['MatName']);
                   

                    $this->excel->getActiveSheet()->setCellValue('F'.$start, $row['qty']);
                    $this->excel->getActiveSheet()->getStyle('F'.$start)->applyFromArray($styleCenter);
                    $this->excel->getActiveSheet()->setCellValue('G'.$start, $row['price']);
                   $this->excel->getActiveSheet()->getStyle('G'.$start)->applyFromArray($styleRight);

                    $this->excel->getActiveSheet()->setCellValue('H'.$start, $row['price']*$row['qty']);
                    $this->excel->getActiveSheet()->getStyle('H'.$start)->applyFromArray($styleRight);
                    $qty+= $row['qty'];

                  


                    $sql = "SELECT sum(qty) as qty,lend_material_2016.price
                            FROM
                            lend_material_2016
                            INNER JOIN personal ON lend_material_2016.Pid = personal.Pid
                            WHERE MatId = $id AND Ddate BETWEEN '$start_date' AND '$end_date'";         
                    $lend = $this->db->query($sql)->result_array();

                    foreach ($lend as $row3) {
                        $this->excel->getActiveSheet()->setCellValue('I'.$start, $row3['qty']);
                        $this->excel->getActiveSheet()->getStyle('I'.$start)->applyFromArray($styleCenter);

                        $this->excel->getActiveSheet()->setCellValue('J'.$start, $row3['price']);
                        $this->excel->getActiveSheet()->getStyle('J'.$start)->applyFromArray($styleRight);

                       
                        $this->excel->getActiveSheet()->setCellValue('K'.$start, $row3['price']*$row3['qty']);
                        $this->excel->getActiveSheet()->getStyle('K'.$start)->applyFromArray($styleRight);

                         $qty-= $row3['qty'];
                    }


                    $this->excel->getActiveSheet()->setCellValue('L'.$start, $qty);
                    $this->excel->getActiveSheet()->getStyle('L'.$start)->applyFromArray($styleCenter);

                    $this->excel->getActiveSheet()->setCellValue('M'.$start, $row['price']);
                    $this->excel->getActiveSheet()->getStyle('M'.$start)->applyFromArray($styleRight);

                    $this->excel->getActiveSheet()->setCellValue('N'.$start, $row['price']*$qty);
                    $this->excel->getActiveSheet()->getStyle('N'.$start)->applyFromArray($styleRight);


                    for ($col = ord('A'); $col <= ord('N'); $col++) {
                   
                        $this->excel->getActiveSheet()->getStyle(chr($col).$start)->applyFromArray($styleBorderLeftRight)->getAlignment();
                    }

                $start++;
                $i++;

                }
*/


//                 for($start;$start<=24;$start++){
//                     for ($col = ord('A'); $col <= ord('L'); $col++) {
                   
//                     $this->excel->getActiveSheet()->getStyle(chr($col).$start)->applyFromArray($styleCenterHeaderTable)->getAlignment()->setWrapText(true);
//                     }
//                 }



                //Fill data 
                //->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');
//set aligment to center for that merged cell (A1 to D1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $filename = 'รายงานวัสดุคงเหลือ ประจำปี_'.$year_what.'.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
//force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');