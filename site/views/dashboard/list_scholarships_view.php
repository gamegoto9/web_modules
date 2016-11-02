<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/navbar'); ?>



<?php $this->load->view('includes2/header'); ?>

<?php
$ffdate = date("Y-m-d", strtotime('-7 day'));

function compareDate($date1, $date2) {
    $checkdate;
    $arrDate1 = explode("-", $date1);
    $arrDate2 = explode("-", $date2);
    $timStmp1 = mktime(0, 0, 0, $arrDate1[1], $arrDate1[2], $arrDate1[0]);
    $timStmp2 = mktime(0, 0, 0, $arrDate2[1], $arrDate2[2], $arrDate2[0]);

    if ($timStmp1 == $timStmp2) {
        $checkdate = "1";
    } else if ($timStmp1 > $timStmp2) {
        $checkdate = "1";
    } else if ($timStmp1 < $timStmp2) {
        $checkdate = "2";
    }
    return($checkdate);
}
?>
<section id="content">
    <br><br><br><br><br>
    <div class="container">

        <div class="row">



            <div class="border-radius-activity-top"
                 <h2>ทุนการศึกษาทั่วไป Scholarshoips</h2>

            </div>

            <div class="accordion">
                <div class="panel-group" id="accordion2">




                    <div class="border-radius-found-bottom">
                        <font color="#000">
                        <table class="table table-hover">
                            <tbody>
                                
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#page8">
                                                <img src='<?php echo base_url('assets/themes/agency/img/icon.png'); ?>' width="5%"> Elite 600 Scholarship Program 
                                                <img src='http://crruinter.crru.ac.th/css/images/new.gif'>
                                                <i class="fa fa-angle-right pull-right"></i>
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="page8" class="panel-collapse collapse">                                                                     
                                        <div class="panel-body">
                                            <div class="media accordion-inner">
                                                <div class="pull-left">
                                                    <img src='<?php echo base_url('assets/themes/agency/img/icon.png'); ?>'width="100px">


                                                </div>
                                                <div class="pull-right">

                                                    Elite 600 Scholarship Program <br>
                                                    
                                                   Elite 600 Scholarship is jointly provided by Taiwan and Thailand.<br><br>
                                                   
                                                   Thailand：Thailand shall provide supply Scholarship Students' airfare, <br> and living expenses and university fees (might including tuition fees while applicable).<br><br>
                                                   
                                                   Taiwan：ESIT Consortium Universities support different <br> scholarships for up to 120 Scholarship Students per year to be studying in Taiwan, for up to four years <br> for a doctoral degree, and two years for a master's degree.<br><br> 


                                                     link : <a href="http://www.esit.org.tw/elite600.php">http://www.esit.org.tw/elite600.php</a>
                                                   <br><br>
                                                    แบบสอบสำรวจข้อมูล
                                                    <a class="btn btn-success" href="http://crruinter.crru.ac.th/upload/paper.pdf"><i class="fa fa-sort-amount-desc"></i></i></a>
                                                   <br><br>

                                                    นำเสนอ
                                                    <a class="btn btn-success" href=""><i class="fa fa-sort-amount-desc"></i></a>
                                                   <br><br>

                                                   





                                                </div>




                                            </div>
                                            <hr width="100%">
                                            <p align="right">วันที่ : 05 Nov 2015 ||</a></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#page7">
                                                        <img src='<?php echo base_url('assets/themes/agency/img/fulbright.PNG'); ?>' width="10%"> ประชาสัมพันธ์ทุนการศึกษาของมูลนิธิการศึกษาไทย-อเมริกัน (Fulbright) 
                                                        <img src='http://crruinter.crru.ac.th/css/images/new.gif'>
                                                        <i class="fa fa-angle-right pull-right"></i>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="page7" class="panel-collapse collapse">                                                                     
                                                <div class="panel-body">
                                                    <div class="media accordion-inner">
                                                        <div class="pull-left">
                                                            <img src='<?php echo base_url('assets/themes/agency/img/fulbright.PNG'); ?>'>
                                                               
                                                               
                                                        </div>
                                                        <div class="pull-right">
                                                            
                                                            ประชาสัมพันธ์ทุนการศึกษาของมูลนิธิการศึกษาไทย-อเมริกัน (Fulbright)<br>
                                                            เปิดรับสมัครตั้งแต่วันนี้จนถึงวันที่ 11 กันยายน 2558 โดยเปิดรับสมัคร 3 ทุน ได้แก่ <br><br>
                                                            
                                                           
                                                            <br>
                                                            Junior Research Scholarship Program (JRS)
                                                            <a class="btn btn-success" href="http://crruinter.crru.ac.th/upload/JRS2016 Announcement.doc"><i class="fa fa-sort-amount-desc"></i></i></a>
                                                            <a class="btn btn-success" href="http://crruinter.crru.ac.th/upload/JRS2016 Application Form.doc"><i class="fa fa-sort-amount-desc"></i></a>
                                                           <br><br>
                                                           
                                                           Thai Visiting Scholar Program (TVS)
                                                            <a class="btn btn-success" href="http://crruinter.crru.ac.th/upload/TVS Announcement 2016.doc"><i class="fa fa-sort-amount-desc"></i></a>
                                                            <a class="btn btn-success" href="http://crruinter.crru.ac.th/upload/TVS Application form 2016.doc"><i class="fa fa-sort-amount-desc"></i></i></a>
                                                           <br><br>
                                                           
                                                           U.S.-ASEAN Visiting Scholar (USAS) 
                                                            <a class="btn btn-success" href="http://crruinter.crru.ac.th/upload/US _ASEAN Visiting Scholar_Application form 2016.doc"><i class="fa fa-sort-amount-desc"></i></i></a>
                                                            <a class="btn btn-success" href="http://crruinter.crru.ac.th/upload/US_ASEAN Announcement2016.doc"><i class="fa fa-sort-amount-desc"></i></i></a>
                                                           <br>
                                                           
                                                           
                                                            
                                                            
                                                            
                                                        </div>


                                                       

                                                    </div>
                                                    <hr width="100%">
                                                    <p align="right">วันที่ : 15 July 2015 ||</a></p>
                                                </div>
                                            </div>
                                </div>
                                <?php
                                foreach ($recData as $row) {
                                    ?>
                                    <tr bgcolor="#F2F4F7">
                                        <?php
                                        $today = $row['Ddate'];
                                        $Bdate = compareDate("$today", "$ffdate");

                                        if ($Bdate == "1") {
                                            ?>
                                            <td>
                                                <a href="http://crruinter.crru.ac.th/news_data.php?new_id=<?php echo $row['id'] ?>&c=2"><font color="#000"><?php echo $row['title_th']; ?></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                            <?php
                                        } else {
                                            ?>
                                            <td>
                                                <a href="http://crruinter.crru.ac.th/news_data.php?new_id=<?php echo $row['id'] ?>&c=2"><font color="#000"><?php echo $row['title_th']; ?></font></a>
                                            </td>
        <?php
    }
    ?>
                                    </tr>
                                        <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>



                </div><!--/#accordion1-->
            </div>
            
            
            
            
            <div class="border-radius-activity-top"
                 <h2>ทุนการศึกษาจากรัฐบาลต่างประเทศ</h2>

            </div>
            
            <div class="accordion">
                <div class="panel-group" id="accordion2">




                    <div class="border-radius-found-bottom">
                        <font color="#000">
                        <table class="table table-hover">
                            <tbody>
                                 <tr bgcolor="#F2F4F7">
                                       
                                            <td>
                                                <font color="#000">ทุน Fulbright  รายละเอียด <a href="http://www.fulbrightthai.org/grant.asp?menu=4">http://www.fulbrightthai.org</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                </tr>
                                 <tr bgcolor="#F2F4F7">
                                       
                                            <td>
                                                <font color="#000">ทุนรัฐบาล แคนาดา 2015 (Canada)  รายละเอียด <a href="http://www.scholarships-bourses.gc.ca/scholarships-bourses/non_can/opportunities-opportunites.aspx?view=d&lang=eng">http://www.scholarships-bourses.gc.ca</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                </tr>
                                <tr bgcolor="#F2F4F7">
                                       
                                            <td>
                                                <font color="#000">ทุนรัฐบาล จีน 2015 (PR.China)  รายละเอียด <a href="http://www.csc.edu.cn/laihua/">http://www.csc.edu.cn/laihua/</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                </tr>
                                <tr bgcolor="#F2F4F7">
                                       
                                            <td>
                                                <font color="#000">ทุนรัฐบาล ญี่ปุ่น 2016 (Japan)  รายละเอียด <a href="http://www.th.emb-japan.go.jp/th/jis/study.htm">http://www.th.emb-japan.go.jp</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                </tr>
                                <tr bgcolor="#F2F4F7">
                                            <td>
                                                <font color="#000">ทุนรัฐบาล ไต้หวัน 2015 (ROC)  รายละเอียด <a href="http://www.taiwanembassy.org/TH/ct.asp?xItem=579074&ctNode=12479&mp=232">http://www.taiwanembassy.org</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                          
                                </tr>
                                <tr bgcolor="#F2F4F7">
                                            <td>
                                                <font color="#000">ทุนรัฐบาล เกาหลี 2015 (Korea)  รายละเอียด <a href="http://www.studyinkorea.go.kr/en/main.do;jsessionid=B808287135B0A04E616A22EC5EC0D2C3.node_10">http://www.studyinkorea.go.kr</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                          
                                </tr>
                                <tr bgcolor="#F2F4F7">
                                            <td>
                                                <font color="#000">ทุนรัฐบาล อินเดีย 2015 (India)  รายละเอียด <a href="http://hcidhaka.gov.in/pages.php?id=1647">http://hcidhaka.gov.in/pages.php?id=1647</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                          
                                </tr>
                                <tr bgcolor="#F2F4F7">
                                            <td>
                                                <font color="#000">ทุนรัฐบาล เยอรมัน 2015 (Germany)  รายละเอียด <a href="http://www.daad.or.th/en/">http://www.daad.or.th/en/</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                          
                                </tr>
                                 <tr bgcolor="#F2F4F7">
                                            <td>
                                                <font color="#000">ทุนรัฐบาล รัสเซีย 2015 (Russia)  รายละเอียด <a href="http://www.russia-edu.ru/">http://www.russia-edu.ru/</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                          
                                </tr>
                               
                                 
                                <tr bgcolor="#F2F4F7">
                                            <td>
                                                <font color="#000">ทุนรัฐบาล เนเธอร์แลนด์ 2015 (Netherlands)  รายละเอียด <a href="http://www.nuffic.nl/">http://www.nuffic.nl/</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                          
                                </tr>
                                
                                <tr bgcolor="#F2F4F7">
                                            <td>
                                                <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#page2">
                                                       ทุนรัฐบาล ตุรกี 2015 (Turkey) <img src='http://crruinter.crru.ac.th/css/images/new.gif'>
                                                        <i class="fa fa-angle-right pull-right"></i>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="page2" class="panel-collapse collapse">                                                                     
                                                <div class="panel-body">
                                                    <div class="media accordion-inner">
                                                        <div class="pull-left">
                                                            
                                                               รัฐบาลตุรกีประกาศรับสมัครผู้สนใจขอรับทุนการศึกษาระดับปริญญาตรี ปริญญาโท ปริญญาเอก <br>
                                                               และหลักสูตรงานวิจัย ประจำปีการศึกษา 2015 – 2016 สำหรับนักศึกษาต่างประเทศรวมทั้งประเทศไทย <br>
                                                               โดยทุนการศึกษาจะครอบคลุมค่าเล่าเรียนตามหลักสูตร ค่าที่พัก ค่าใช้จ่ายรายเดือน ค่าประกันสุขภาพ <br>
                                                               และค่าเดินทาง (บัตรโดยสารเครื่องบินไป – กลับ) ผู้สนใจสมัครขอรับทุนการศึกษาฯ <br>
                                                               สามารถศึกษารายละเอียดเพิ่มเติมและสมัครได้โดยตรงทางเว็บไซต์ <br>
                                                               <br>
                                                               <a href="http://www.turkiyeburslari.gov.tr/index.php/en/">http://www.turkiyeburslari.gov.tr/index.php/en/</a> 
                                                               
                                                               
                                                        </div>



                                                        <div class="media-body">
                                                            
                                                            ตั้งแต่บัดนี้จนถึงวันที่ 31 มีนาคม 2558 <br>
                                                            หรือสอบถามข้อมูลได้ที่สำนักความสัมพันธ์ต่างประเทศ <br>
                                                            สำนักงานปลัดกระทรวงศึกษาธิการ <br>
                                                            หมายเลขโทรศัพท์ 0 2628 5646 ต่อ 111<br>
                                                           
                                                        </div>

                                                    </div>
                                                    <hr width="100%">
                                                    <p align="right">||</a></p>
                                                </div>
                                            </div>
                                            </td>
                                          
                                </tr>
                                <tr bgcolor="#F2F4F7">
                                            <td>
                                                <font color="#000">ทุนรัฐบาล ออสเตรเลีย 2015 (Australia)  รายละเอียด <a href="http://www.studyinaustralia.gov.au/">http://www.studyinaustralia.gov.au/</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                          
                                </tr>
                                 <tr bgcolor="#F2F4F7">
                                            <td>
                                                <font color="#000">ทุนรัฐบาล นิวซีแลนด์ 2015 (Newzealand)  รายละเอียด <a href="http://www.newzealandeducated.com/">http://www.newzealandeducated.com/</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                          
                                </tr>
                                 <tr bgcolor="#F2F4F7">
                                            <td>
                                                <font color="#000">ทุนรัฐบาล อินโดนีเซีย 2015 (Indonesia)  รายละเอียด <a href="http://darmasiswa.kemdikbud.go.id/darmasiswa/">http://darmasiswa.kemdikbud.go.id</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                          
                                </tr>
                                <tr bgcolor="#F2F4F7">
                                            <td>
                                                <font color="#000">ทุนรัฐบาล สิงคโปร์ 2015 (Singapore)  รายละเอียด <a href="http://www.scholars4dev.com/category/country/asia-scholarships/singapore-scholarships/">http://www.scholars4dev.com/</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                          
                                </tr>
                                 
                                 <tr bgcolor="#F2F4F7">
                                            <td>
                                                <font color="#000">ทุนรัฐบาล บรูไน 2015 (Brunei)  รายละเอียด <a href="http://www.mofat.gov.bn/Pages/BDScholarship_2014_2015.aspx">http://www.mofat.gov.bn</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                          
                                </tr>
                                <tr bgcolor="#F2F4F7">
                                            <td>
                                                <font color="#000">ทุนรัฐบาล มาเลเซีย 2015 (Malaysia)  รายละเอียด <a href="https://biasiswa.moe.gov.my/INTER/">https://biasiswa.moe.gov.my/INTER/</a></font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                          
                                </tr>
                            </tbody>
                        </table>
                    </div>



                </div><!--/#accordion1-->
            </div>





        </div><!--/.row-->
<?php echo $this->pagination->create_links(); ?>
    </div><!--/.container-->
</section><!--/#content-->
<?php $this->load->view('includes/footer'); ?>