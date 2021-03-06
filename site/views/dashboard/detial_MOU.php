<?php

$this->load->library("tcpdf");
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . '', PDF_HEADER_STRING, array(0, 0, 0), array(0, 0, 0));
$pdf->setFooterData(array(0, 0, 0), array(0, 0, 0));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------    
// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('angsanaupc', '', 16, '', true);




// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

$html = '<span style="font-weight:bold;font-size:16;">รายงานรายชื่อประเทศความร่วมมือกับต่างชาติ  MOU</span><br>

<br>
<table border="1">
        <thead>
        <tr class="btn-info" style="background-color:#FF;">
            <th width="50"style="font-weight:bold;font-size:16;"><div align="center">ลำดับ</div></th>
            <th width="480"style="font-weight:bold;font-size:16;"><div align="center">มหาวิทยาลัย / องกรณ์ / ความร่วมมือกับต่างชาติ</div></th>
            <th width="140"style="font-weight:bold;font-size:16;"><div align="center">ประเทศ</div></th>
            
        </tr>
        </thead>';

$html2 = '<tbody>';

$i = 1;
$sum = 0;

foreach ($mou as $row) {



    $html2.='<tr class="warning">
                        <td width="50" style="font-size:16;"><div align="center">' . $i . '</div></td>
                        <td width="480">'.'   '.$row['name'].'</td>
                        <td width="140"><div align="center">' . $row['international'] . '</div></td>
                       

                    </tr>';

    $i++;
    
}
    


$html2.='</tbody>
        <tfoot>
                                        
        </tfoot>
</table>';

$pdf->writeHTML($html . $html2, true, false, FALSE, false);


// เลื่อน pointer ไปหน้าสุดท้าย
$pdf->lastPage();

// ปิดและสร้างเอกสาร PDF
$pdf->Output('print_rep_location.pdf', 'I');
