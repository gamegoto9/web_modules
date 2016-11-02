
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/navbar'); ?>
<?php $this->load->view('includes/sidebar'); ?>


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


<?php
/////////////////////////////////////////////////////////////
//*** Select วันที่ในตาราง Counter ว่าปัจจุบันเก็บของวันที่เท่าไหร่  ***//
//*** ถ้าเป็นของเมื่อวานให้ทำการ Update Counter ไปยังตาราง daily และลบข้อมูล เพื่อเก็บของวันปัจจุบัน ***//
$strSQL = " SELECT DATE FROM counter LIMIT 0,1";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if ($objResult["DATE"] != date("Y-m-d")) {
    //*** บันทึกข้อมูลของเมื่อวานไปยังตาราง daily ***//
    $strSQL = " INSERT INTO daily (DATE,NUM) SELECT '" . date('Y-m-d', strtotime("-1 day")) . "',COUNT(*) AS intYesterday FROM  counter WHERE 1 AND DATE = '" . date('Y-m-d', strtotime("-1 day")) . "'";
    mysql_query($strSQL);

    //*** ลบข้อมูลของเมื่อวานในตาราง counter ***//
    $strSQL = " DELETE FROM counter WHERE DATE != '" . date("Y-m-d") . "' ";
    mysql_query($strSQL);
}

//*** Insert Counter ปัจจุบัน ***//
$strSQL = " INSERT INTO counter (DATE,IP) VALUES ('" . date("Y-m-d") . "','" . $_SERVER["REMOTE_ADDR"] . "') ";
mysql_query($strSQL);

//******************** Get Counter ************************//
// Today //
$strSQL = " SELECT COUNT(DATE) AS CounterToday FROM counter WHERE DATE = '" . date("Y-m-d") . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strToday = $objResult["CounterToday"];

// Yesterday //
$strSQL = " SELECT NUM FROM daily WHERE DATE = '" . date('Y-m-d', strtotime("-1 day")) . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strYesterday = $objResult["NUM"];

// This Month //
$strSQL = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '" . date('Y-m') . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strThisMonth = $objResult["CountMonth"];

// Last Month //
$strSQL = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '" . date('Y-m', strtotime("-1 month")) . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strLastMonth = $objResult["CountMonth"];

// This Year //
$strSQL = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '" . date('Y') . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strThisYear = $objResult["CountYear"];

// Last Year //
$strSQL = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '" . date('Y', strtotime("-1 year")) . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strLastYear = $objResult["CountYear"];

//*** Close MySQL ***//
//mysql_close();
////////////////////////////////////////////////////////////////
?>
<style>
    ul {
        display: block;
        list-style-type: disc;
        margin-top: 1em;
        margin-bottom: 1 em;
        margin-left: 0;
        margin-right: 0;
        padding-left: 40px;
    }
</style>

<style>

    .iframe-container {    
        padding-bottom: 60%;
        padding-top: 30px; height: 0; overflow: hidden;
    }

    .iframe-container iframe,
    .iframe-container object,
    .iframe-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }


    div.dataTables_wrapper {
        margin-bottom: 3em;
    }

</style>

<?php $this->load->view('includes/menu'); ?>

<div id="pagecontent">
    <section id="content">
        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-4 wow fadeInDown">
                    <div class="border-radius-top-teerawat">
                        <center><b>ผู้อำนวยการ</b></center>
                    </div>
                    <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <div class="media">



                            <div class="media-body">
                                <center><a href="#"><img class="media-object" src="http://crruinter.crru.ac.th/css/images/crru_logo.gif" width ="40%"alt=""></a></center>

                                <h4><font color="#000"><center>นายธีรวัฒน์ &nbsp;&nbsp;วังมณี</center></font></h4>



                            </div>
                        </div><!--/.media -->
                        <center><p>ผู้อำนวยการกองวิเทศสัมพันธ์</p></center>
                    </div>
                    <br>    <br>
                </div><!--/.col-lg-4 -->


                <div class="col-xs-12 col-sm-8 wow fadeInDown">
                    <div class="border-radius-news-top"
                         <h2><b>ข่าวประชาสัมพันธ์</b></h2>
                    </div>
                    <div class="border-radius-news-bottom">                     
                        <div class="accordion">
                            <div class="panel-group" id="accordion1">

                                <?php
                                foreach ($news as $row) {
                                    ?>

                                    <?php
                                    $today = $row['Ddate'];
                                    $Bdate = compareDate("$today", "$ffdate");

                                    if ($Bdate == "1") {
                                        ?>


                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#<?php echo $row['id']; ?>">
                                                        <?php
                                                        echo $row['title_th'];

                                                        echo "<img src='http://crruinter.crru.ac.th/css/images/new.gif'>";
                                                        ?>
                                                        <i class="fa fa-angle-right pull-right"></i>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="<?php echo $row['id']; ?>" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <?php
                                                    if ($row['note'] != "-") {

                                                        echo $row['note'];
                                                    } else {
                                                        echo $row['title_th'];
                                                    }
                                                    ?>
                                                    <hr width="100%">
                                                    <p align="right">วันที่ : <?php echo $row['Ddate']; ?> || <a href="http://crruinter.crru.ac.th/news_data.php?new_id=<?php echo $row['id'] ?>&c=1">อ่านต่อ..</a></p>
                                                </div>
                                            </div>
                                        </div> 
                                        <?php
                                    } else {
                                        ?>


                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#<?php echo $row['id']; ?>">
                                                        <?php echo $row['title_th'];
                                                        ?>
                                                        <i class="fa fa-angle-right pull-right"></i>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="<?php echo $row['id']; ?>" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <?php
                                                    if ($row['note'] != "-") {

                                                        echo $row['note'];
                                                    } else {
                                                        echo $row['title_th'];
                                                    }
                                                    ?>
                                                    <hr width="100%">
                                                    <p align="right">วันที่ : <?php echo $row['Ddate']; ?> || <a href="http://crruinter.crru.ac.th/news_data.php?new_id=<?php echo $row['id'] ?>&c=1">อ่านต่อ..</a></p>
                                                </div>
                                            </div>
                                        </div> 

                                        <?php
                                    }
                                    ?>

                                    <?php
                                }
                                ?>
                            </div><!--/#accordion1-->
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#content-->               







    <section id="content">
        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-9 wow fadeInDown">

                    <div class="border-radius-found-top">
                        แจ้งทุนการศึกษา
                        <p align="right"><a href="<?php echo site_url() . '/site/dashboard/list_scholarships'; ?>">++ ดูทั้งหมด ++</a></p>
                    </div>
                    <div class="border-radius-found-bottom">
                        <font color="#000">

                        <table class="table table-hover">
                            <tbody>          

                            <div class="panel-group" id="accordion2">

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



                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#page6">
                                                <img src='http://crruinter.crru.ac.th/css/images/elite.jpg' width="20%"> (ESIT) จัดสรรทุน โครงการ Taiwan-Thailand Elite 600 Scholarship Program.
                                                <i class="fa fa-angle-right pull-right"></i>
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="page6" class="panel-collapse collapse">                                                                     
                                        <div class="panel-body">
                                            <div class="media accordion-inner">
                                                <div class="pull-left">
                                                    <img src='http://crruinter.crru.ac.th/css/images/elite.jpg'>


                                                </div>
                                                <div class="pull-right">

                                                    กระทรวงศึกษาธิการไต้หวัน โดย Elite Study In Taiwan (ESIT) Project Office <br>
                                                    จัดสรรทุนการศึกษา ภายใต้โครงการ Taiwan-Thailand Elit 600 Scholarship Program <br>
                                                    ให้แก่อาจารย์ในสถาบันอุดมศึกษาไทยที่สนใจจะไปศึกษาต่อ <br>
                                                    ระดับปริญญาโทและระดับปริญญาเอกในสถาบันอุดมศึกษาของได้หวัน <br>
                                                    จำนวน 600 ทุน ภายในระยะเวลา 5 ปี โดยผู้สนใจสามารถสืบค้นข้อมูล<br>
                                                    เพิ่มเติมได้ที่เว็บไซต์ <a href="www.esit.org.tw/elite600.php">www.esit.org.tw/elite600.php</a> <br>
                                                    หรือที่เว็ไซต์ <a href="www.esit.org/twprogram.php">www.esit.org/twprogram.php</a> <br><br>

                                                    ทั้งนี้ สามารถสอถามข้อมูลเพิ่มเติมได้ที่ Ms.Paige Jhao ผู้จัดการโครงการ <br>
                                                    โทร +886-3-265-1292 ไปรษณีย์อิเล็กทรอนิกส์ paige@esit.org.tw <br>
                                                    รายระเอียดดังเอกสารแนบ
                                                    <br><br><br>

                                                    <a class="btn btn-success  view-pdf" href="http://crruinter.crru.ac.th/upload/elite.pdf">รายละเอียด</a>

                                                </div>




                                            </div>
                                            <hr width="100%">
                                            <p align="right">วันที่ : 30 June 2015 ||</a></p>
                                        </div>
                                    </div>
                                </div>



                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#page5">
                                                รัฐบาลญี่ปุ่น มอบทุนการศึกษา ประจำปีการศึกษา 2559 
                                                <i class="fa fa-angle-right pull-right"></i>
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="page5" class="panel-collapse collapse">                                                                     
                                        <div class="panel-body">
                                            <div class="media accordion-inner">
                                                <div class="pull-left">



                                                </div>
                                                <div class="pull-right">
                                                    <img src='http://crruinter.crru.ac.th/css/images/jpan.jpg' width="100%">

                                                    <br><br><br>

                                                    <a class="btn btn-success  view-pdf" href="http://crruinter.crru.ac.th/upload/%E0%B8%97%E0%B8%B8%E0%B8%99%E0%B8%8D%E0%B8%B5%E0%B9%88%E0%B8%9B%E0%B8%B8%E0%B9%88%E0%B8%99.pdf">รายละเอียด</a>

                                                </div>




                                            </div>
                                            <hr width="100%">
                                            <p align="right">วันที่ : 21 May 2015 ||</a></p>
                                        </div>
                                    </div>
                                </div>



                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#page4">
                                                ประกาศรับสมัครสอบชิงทุน Hubert H. Humphrey North-South Fellowship Program ประจำปีการศึกษา 2559
                                                <i class="fa fa-angle-right pull-right"></i>
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="page4" class="panel-collapse collapse">                                                                     
                                        <div class="panel-body">
                                            <div class="media accordion-inner">
                                                <div class="pull-left">

                                                    มูลนิธิการศึกษาไทย-อเมริกัน ขอเรียนให้ทราบว่า ขณะนี้มูลนิธิฯ ได้เปิดรับสมัครทุน Hubert H. Humphrey North-South Fellowship Program 
                                                    ประจำปีการศึกษา 2559 จำนวน 1- 3 ทุน เพื่อเสนอชื่อเข้าแข่งขันกับผู้สมัครทั่วโลก สำหรับผู้บริหารระดับกลาง เพื่อศึกษาและอบรมฝึกงานในสถาบันการศึกษาต่างๆ 
                                                    ณ ประเทศสหรัฐอเมริกาเป็นเวลา 10-12 เดือน
                                                    <br><br>

                                                    <b><u>จุดเด่น</u></b><br>
                                                    <ul>
                                                        <li> ส่งเสริมการพัฒนาศักยภาพผู้บริหาร นักวิชาการ นักวิชาชีพระดับกลางที่จะก้าวไปเป็นผู้นำขององค์กรในอนาคต ให้เท่าทันความก้าวหน้าของศาสตร์ แวดวงที่เกี่ยวข้องและประเด็นปัญหาร่วมของพลโลก </li>
                                                        <li> สร้างเครือข่ายคนคุณภาพในวงวิชาการ/วิชาชีพให้กว้างขวางขึ้น </li>
                                                        <li> เป็นทุนที่ไม่ให้ปริญญา สาขาที่เปิดรับสมัครหลากหลาย </li>
                                                        <li> เหมาะสำหรับองค์กรทั้งภาครัฐและเอกชนที่มุ่งมั่นจะสร้างบุคลากรรุ่นใหม่โดยไม่ได้อาศัยเพียงผลการเรียนเด่น    ในระดับปริญญาตรีและโท </li>
                                                    </ul>
                                                    <br><br>
                                                    <b><u>สาขาที่รับสมัคร มุ่งเน้นด้านการบริหาร การจัดการ รวมทั้งการวางแผนและนโยบาย</u></b><br><br>

                                                    โดยผู้สมัครควรทำงานที่เกี่ยวข้องกับสาขาวิชาดังต่อไปนี้ คือ การเกษตร การสื่อสาร การป้องปรามยาเสพติด เศรษฐศาสตร์ การศึกษา การเงิน การธนาคาร 
                                                    การพัฒนาทรัพยากรบุคคล กฎหมายและสิทธิมนุษยชน การพัฒนาทรัพยากรธรรมชาติสิ่งแวดล้อมและสภาวะโลกร้อน สาธารณสุข รัฐประศาสนศาสตร์ 
                                                    การจัดการเทคโนโลยี การวางแผนภาคและเมือง การแพร่ขยายการค้ามนุษย์และผู้หญิง รวมทั้งสาขาการสอนภาษาอังกฤษในฐานะภาษาที่สอง 
                                                    ในด้านการวางนโยบายและการแก้ไขปัญหา
                                                    <br><br>

                                                    <b><u>คุณสมบัติของผู้สมัคร </u></b><br><br>

                                                    <ul>
                                                        <li> สัญชาติไทย </li>
                                                        <li> สำเร็จการศึกษาอย่างน้อยระดับปริญญาตรี  โดยมีคะแนนเฉลี่ยตลอดการศึกษาไม่ต่ำกว่า 3.00 </li>
                                                        <li> มีผลคะแนน TOEFL อย่างน้อย 525 หรือ 195 สำหรับการสอบ TOEFL ด้วยระบบคอมพิวเตอร์ หรือ 71 สำหรับการสอบ TOEFL ด้วยระบบอินเตอร์เน็ต หรือ 6.0 สำหรับการสอบ IELTS </li>
                                                        <li> ดำรงตำแหน่งบริหารหรือมีบทบาทเชิงนโยบายในหน่วยงานของรัฐหรือเอกชนซึ่งจะได้รับประโยชน์สูงสุดจากการศึกษาอบรมนี้  </li>
                                                        <li> ได้รับการรับรองจากหน่วยงานว่าจะสามารถกลับเข้าทำงานได้เมื่อการรับทุนสิ้นสุดลง  </li>
                                                        <li> ในกรณีที่สมัครด้านการเงิน หน่วยงานต้นสังกัดจะต้องเป็นผู้รับผิดชอบค่าใช้จ่ายทั้งหมด ยกเว้นค่าบริหารโครงการ ค่าประกันสุขภาพ และการเข้ารับปฐมนิเทศ ซึ่งมูลนิธิฯจะเป็นผู้รับผิดชอบ  </li>

                                                    </ul>

                                                    <br><br>



                                                    ผู้สนใจสมัครชิงทุน Hubert H. Humphrey Fellowship Program สามารถทำสำเนาระเบียบการจากเอกสารดังแนบ 
                                                    และดาวน์โหลดใบสมัครได้จากเวปไซต์ <a href="www.fulbrightthai.org">www.fulbrightthai.org</a> (หน้าแรก ภายใต้หัวข้อ "Now Open") ตั้งแต่บัดนี้จนถึง 22 มิถุนายน 2558 
                                                    หากมีข้อสงสัยเกี่ยวกับทุน กรุณาติดต่อ คุณวนิดา ไชยสาร โทร.  0 2285 0581-2 ต่อ  104 หรืออีเมลล์ tusef@fulbrightthai.org

                                                    <br><br><br>

                                                </div>





                                            </div>
                                            <hr width="100%">
                                            <p align="right">วันที่ : 20 April 2015 ||</a></p>
                                        </div>
                                    </div>
                                </div> 


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#page3">
                                                ทุนสำหรับอาจารย์สอนภาษาอังกฤษรุ่นหนุ่มสาว ประจำปีการศึกษา 2559  
                                                <i class="fa fa-angle-right pull-right"></i>
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="page3" class="panel-collapse collapse">                                                                     
                                        <div class="panel-body">
                                            <div class="media accordion-inner">
                                                <div class="pull-left">

                                                    มูลนิธิการศึกษาไทย-อเมริกัน (ฟุลไบรท์) มีความยินดีที่จะแจ้งให้ทราบว่า มูลนิธิฯ ได้เปิดรับสมัครแข่งขันชิงทุน Fulbright Foreign Language Teaching Assistant Program (FLTA) 
                                                    ประจำปีการศึกษา 2559 ตั้งแต่บัดนี้จนถึงวันที่ 16 มิถุนายน 2558
                                                    <br><br>
                                                    เพื่อให้มีลักษณะการแลกเปลี่ยนทางวิชาการอย่างแท้จริง ทุน FLTA กำหนดให้สรรหาอาจารย์รุ่นหนุ่มสาวที่สอนภาษาอังกฤษในประเทศไทย 
                                                    ไปสอนภาษาไทยที่มหาวิทยาลัยในสหรัฐอเมริกา ในขณะที่มหาวิทยาลัยในสหรัฐฯมีอาจารย์ที่เป็นเจ้าของภาษาโดยตรงไปช่วยสอน 
                                                    อาจารย์ชาวไทยจะมีโอกาสเสริมสร้างทักษะ ความรู้ และความคล่องแคล่วในการใช้ภาษาอังกฤษ 
                                                    พร้อมๆไปกับการเพิ่มพูนความรู้และความเข้าใจในวัฒนธรรมและสังคมอเมริกันให้มากขึ้นด้วยการลงทะเบียนเรียน
                                                    ในสาขาวิชาที่เกี่ยวข้องกับอเมริกันศึกษาและการสอนภาษาอังกฤษ
                                                    <br><br>
                                                    <b><u>คุณสมบัติของผู้สมัคร</u></b><br>
                                                    <ul>
                                                        <li> ผู้สมัครจะต้องมีสัญชาติไทย </li>
                                                        <li> สำเร็จการศึกษาอย่างน้อยระดับปริญญาตรี </li>
                                                        <li> เป็นอาจารย์สอนภาษาอังกฤษในสถาบันการศึกษาระดับอุดมศึกษาของรัฐหรือเอกชน หรือระดับมัธยมศึกษาของรัฐ </li>
                                                        <li> อายุไม่ต่ำกว่า 21 ปี และไม่เกิน 35 ปี (นับถึงวันที่ 1 ตุลาคม 2558) </li>
                                                        <li> มีคะแนน TOEFL อย่างน้อย 550 (PBT) หรือ 213 (CBT) หรือ 79-80 (IBT) หรือ 6.0 (IELTS) </li>
                                                        <li> จะต้องกลับมาสอน ณ หน่วยงานเดิมหลังการจบการรับทุน (ระยะเวลา 9 เดือน) </li>
                                                        <li> ต้องมีความเป็นผู้นำ มีความสามารถที่จะจูงใจให้ผู้เรียนสนใจเรียนภาษาและเข้าใจวัฒนธรรมไทยได้อย่างดี และพร้อมที่จะเรียนรู้เรื่องเกี่ยวกับประเทศสหรัฐอเมริกา</li>
                                                    </ul>
                                                    <br><br>
                                                    <b><u>ลักษณะของทุน</u></b><br><br>

                                                    ผู้ได้รับทุนนี้จะไปสอนภาษาไทยที่มหาวิทยาลัยในสหรัฐฯ ที่แสดงความจำนงขอรับอาจารย์สอนภาษาไทย โดยอาจจะต้องสอนอย่างน้อย 2 กระบวนวิชาต่อภาคการศึกษา 
                                                    และจะต้องลงทะเบียนเรียนอย่างน้อย 2 กระบวนวิชา/ภาคการศึกษา โดยกระบวนวิชาที่เลือกเรียนวิชาหนึ่งจะต้องเป็นอเมริกันศึกษา 
                                                    อีกหนึ่งวิชาที่เหลือจะต้องเกี่ยวข้องกับการสอนภาษาอังกฤษที่จะเป็นประโยชน์เมื่อเดินทางกลับประเทศไทย
                                                    <br><br>

                                                    ทุน FLTA เป็นทุนที่ไม่ให้ปริญญา และไม่ใช่เพื่อการศึกษาต่อในระดับปริญญาโทหรือสูงกว่า อาจารย์ที่ได้รับทุนจะต้องเดินทางกลับประเทศไทยทันทีที่สิ้นสุดการรับทุน 9 เดือน 
                                                    จะไม่มีการขยายระยะเวลาอยู่ต่อและไม่อนุญาตให้มีผู้ติดตามไปอยู่ด้วยระหว่างการรับทุน 

                                                    <br><br>

                                                    ผู้ได้รับทุนจะได้รับการปฐมนิเทศจากมูลนิธิฯและเข้าร่วมเครือข่ายของฟุลไบรท์ ได้รับค่าใช้จ่ายรายเดือน ได้รับการประกันสุขภาพ และค่าเดินทาง 
                                                    สถาบันเจ้าภาพในสหรัฐฯจะยกเว้นค่าเล่าเรียนเพื่อให้ผู้ได้รับทุนลงทะเบียนเรียนวิชาที่เกี่ยวข้อง

                                                    <br><br>

                                                    <b><u>การคัดเลือกผู้เหมาะสม</u></b><br><br>

                                                    มูลนิธิฯจะเป็นผู้ประกาศรับสมัครและทำการคัดเลือกเบื้องต้น จากนั้น จะส่งรายชื่อผู้ผ่านการคัดเลือกเบื้องต้นต่อไปยังหน่วยงานที่สหรัฐฯเพื่อพิจารณาในขั้นสุดท้าย 
                                                    (ผู้ที่ผ่านการคัดเลือกเบื้องต้นจะต้องกรอกใบสมัคร on-line อีกครั้ง)  ทั้งนี้ การพิจารณาคัดเลือก จะขึ้นอยู่กับจำนวนและความสนใจของสถาบันที่ส่งคำขออาจารย์ภาษาไทยไปยังวอชิงตัน 
                                                    ดังนั้น ผู้ผ่านการคัดเลือกเบื้องต้น ควรกรอกใบสมัครให้เป็นที่ดึงดูดใจของสถาบันที่ประสงค์จะขอรับอาจารย์ภาษาไทย


                                                    <br><br>

                                                    <b><u>ระเบียบการและใบสมัคร</u></b><br><br>

                                                    ผู้สนใจสามารถดูรายละเอียดและดาวน์โหลดใบสมัครจากเวปไซต์  <a href="www.fulbrightthai.org">www.fulbrightthai.org</a> (หน้าแรก ภายใต้หัวข้อ ‘Now Open’) ตั้งแต่บัดนี้ จนถึง 16 มิถุนายน 2558

                                                    <br><br><br><br>
                                                    <b>Download</b><br><br>
                                                    <a href="http://crruinter.crru.ac.th/upload/2016 FLTA Announcement.pdf">2016 FLTA Announcement</a><br>
                                                    <a href="http://crruinter.crru.ac.th/upload/FLTAApp2016.doc">FLTAApp2016</a><br>
                                                    <a href="http://crruinter.crru.ac.th/upload/Letter of reference.doc">Letter of reference</a><br>

                                                </div>





                                            </div>
                                            <hr width="100%">
                                            <p align="right">วันที่ : 20 April 2015 ||</a></p>
                                        </div>
                                    </div>
                                </div> 

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#page2">
                                                2015 AUE Academic/Clerical Staff Program  
                                                <i class="fa fa-angle-right pull-right"></i>
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="page2" class="panel-collapse collapse">                                                                     
                                        <div class="panel-body">
                                            <div class="media accordion-inner">
                                                <div class="pull-left">

                                                    We're pleased to inform you that applications for "2015 AUE"
                                                    <br>
                                                    Visitng/Clerical Staff Program" will be open from March 23, 2015.
                                                    <br>
                                                    Should you have any inquiries, pleaes don't hesitate to contact us <br>
                                                    at kokusaikoryu@m.auecc.aichi-edu.ac.jp

                                                    <br><br><br>

                                                    <b>Download</b><br>
                                                    <a href="http://crruinter.crru.ac.th/upload/2015年度募集要項.pdf">2015年度募集要項(PDF)</a><br>
                                                    <a href="http://crruinter.crru.ac.th/upload/application guidelines (2015).pdf">application guidelines (2015)(PDF)</a><br>
                                                    <a href="http://crruinter.crru.ac.th/upload/reccommendation letter.pdf">reccommendation letter (PDF)</a><br>
                                                    <a href="http://crruinter.crru.ac.th/upload/application form (academic).xlsx">application form (academic) (XLSX)</a><br>
                                                    <a href="http://crruinter.crru.ac.th/upload/application form (clerical).xlsx">application form (clerical) (XLSX)</a><br>
                                                    <a href="http://crruinter.crru.ac.th/upload/申請書(教員).xlsx">申請書(教員) (XLSX)</a><br>
                                                    <a href="http://crruinter.crru.ac.th/upload/申請書(事務職員).xlsx">申請書(事務職員)(XLSX)</a><br>
                                                </div>



                                                <div class="media-body">
                                                    Sincerely yours,<br>
                                                    Center for International Exchange<br>
                                                    Aichi University of Education<br>
                                                    ******************<br>
                                                    Center for International Exchange, <br>
                                                    Aichi University of Educatin (AUE)<br>
                                                    Phone: +81-(0)566-26-2179<br>
                                                    Fax: +81-(0)566-95-0035<br>
                                                    e-mail: kokusaikoryu@m.auecc.aichi-edu.ac.jp<br>
                                                </div>

                                            </div>
                                            <hr width="100%">
                                            <p align="right">วันที่ : 13 Mar 2015 ||</a></p>
                                        </div>
                                    </div>

                                </div>

                                <?php
                                foreach ($fund as $row) {
                                    ?>

                                    <?php
                                    $today = $row['Ddate'];
                                    $Bdate = compareDate("$today", "$ffdate");

                                    if ($Bdate == "1") {
                                        ?>                               

                                        <tr bgcolor="#F2F4F7">
                                            <td>
                                                <a href="http://crruinter.crru.ac.th/news_data.php?new_id=<?php echo $row['id'] ?>&c=2"><font color="#000"><?php echo $row['title_th']; ?></font></a>
                                                <img src='http://crruinter.crru.ac.th/css/images/new.gif'>
                                            </td>

                                        </tr>
                                        <?php
                                    } else {
                                        ?>

                                        <tr bgcolor="#F2F4F7">
                                            <td>
                                                <a href="http://crruinter.crru.ac.th/news_data.php?new_id=<?php echo $row['id'] ?>&c=2"><font color="#000"><?php echo $row['title_th']; ?></font></a>
                                            </td>

                                        </tr>



                                        <?php
                                    }
                                    ?>

                                    <?php
                                }
                                ?>
                                </tbody>
                        </table>
                    </div>


                </div>


                <div class="col-xs-12 col-sm-3 wow fadeInDown">

                    <div class="border-radius-syscrru-top"
                         <h2><font color="#000">ระบบ CRRU</font></h2>
                    </div>
                    <div class="border-radius-syscrru-bottom">
                        <a href="http://speexx.crru.ac.th/" target="_blank"><img src="<?php echo base_url('assets/themes/agency/img/speexx.PNG'); ?>" width="100%"></a></p>
                        <a href="http://e-office.crru.ac.th/" target="_blank"><img src="<?php echo base_url('assets/themes/agency/img/saraban.png'); ?>" width="100%"></a></p>
                        <a href="http://qas.crru.ac.th/" target="_blank"><img src="<?php echo base_url('assets/themes/agency/img/pagan2.png'); ?>" width="100%"></a></p>
                        <a href="http://qas.crru.ac.th/monitoring/" target="_blank"><img src="<?php echo base_url('assets/themes/agency/img/pan1.png'); ?>" width="100%"></a></p>
                        <a href="http://qas.crru.ac.th/sps/" target="_blank"><img src="<?php echo base_url('assets/themes/agency/img/pan2.png'); ?>" width="100%"></a></p>
                        <br/>
                        <a href="http://crruinter.crru.ac.th/inter_2014/site/dashboard/gms" target="_blank"><img src="<?php echo base_url('assets/themes/pluton/images/gms/logo.png'); ?>" width="100%"></a></p>

                    </div>

                </div>

            </div>


        </div>
    </section><!--/#content-->

    <section id="content">
        <div class="container">

            <div class="row">


                <div class="col-xs-12 col-sm-9 wow fadeInDown">
                    <div class="border-radius-activity-top">
                        <h2><font color="#000">กิจกรรม</font></h2>
                        <p align="right"><a href="<?php echo site_url() . '/site/dashboard/list_activity'; ?>">++ ดูทั้งหมด ++</a></p>
                    </div>
                    <div class="border-radius-activity-bottom">                     
                        <div class="accordion">
                            <div class="panel-group" id="accordion2">

                                <?php
                                foreach ($activity as $row) {
                                    ?>

                                    <?php
                                    $today = $row['Ndate'];
                                    $Bdate = compareDate("$today", "$ffdate");

                                    if ($Bdate == "1") {
                                        ?>     

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#page2<?php echo $row['Nid']; ?>">
                                                        <?php echo $row['title']; ?><img src='http://crruinter.crru.ac.th/css/images/new.gif'>
                                                        <i class="fa fa-angle-right pull-right"></i>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="page2<?php echo $row['Nid']; ?>" class="panel-collapse collapse">                                                                     
                                                <div class="panel-body">
                                                    <div class="media accordion-inner">
                                                        <div class="pull-left">
                                                            <a class="preview" href="<?php echo $row['link']; ?>" rel="prettyPhoto">
                                                                <img class="img-responsive" src="<?php echo $row['link']; ?>"width="200"></a><br>
                                                            <a class="preview" href="<?php echo $row['link2']; ?>" rel="prettyPhoto">
                                                                <img class="img-responsive" src="<?php echo $row['link2']; ?>"width="200"></a><br>


                                                        </div>



                                                        <div class="media-body">
                                                            <?php echo $row['Ntext']; ?>
                                                        </div>

                                                    </div>
                                                    <hr width="100%">
                                                    <p align="right">วันที่ : <?php echo $row['Ndate']; ?> || <a href="<?php echo site_url(); ?>/site/dashboard/gallery/<?php echo $row['Nid']; ?>/">อ่านต่อ..</a></p>
                                                </div>
                                            </div>

                                        </div>
                                        <?php
                                    } else {
                                        ?>



                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#page2<?php echo $row['Nid']; ?>">
                                                        <?php echo $row['title']; ?>
                                                        <i class="fa fa-angle-right pull-right"></i>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="page2<?php echo $row['Nid']; ?>" class="panel-collapse collapse">                                                                     
                                                <div class="panel-body">
                                                    <div class="media accordion-inner">
                                                        <div class="pull-left">
                                                            <a class="preview" href="<?php echo $row['link']; ?>" rel="prettyPhoto">
                                                                <img class="img-responsive" src="<?php echo $row['link']; ?>"width="200"></a><br>
                                                            <a class="preview" href="<?php echo $row['link2']; ?>" rel="prettyPhoto">
                                                                <img class="img-responsive" src="<?php echo $row['link2']; ?>"width="200"></a><br>


                                                        </div>



                                                        <div class="media-body">
                                                            <?php echo $row['Ntext']; ?>
                                                        </div>

                                                    </div>
                                                    <hr width="100%">
                                                    <p align="right">วันที่ : <?php echo $row['Ndate']; ?> || <a href="<?php echo site_url(); ?>/site/dashboard/gallery/<?php echo $row['Nid']; ?>/">อ่านต่อ..</a></p>
                                                </div>
                                            </div>

                                        </div>




                                        <?php
                                    }
                                    ?>

                                    <?php
                                }
                                ?>
                            </div><!--/#accordion1-->
                        </div>
                    </div>


                </div>




                <div class="col-xs-12 col-sm-3 wow fadeInDown">

                    <div class="border-radius-newscrru-top"
                         <h2><font color="#000">ระบบประชาสัมพันธ์ CRRU</font></h2>
                    </div>
                    <div class="border-radius-newscrru-bottom">
                        <a href="<?php echo base_url('/site/dashboard/km'); ?>"><img src = "<?php echo base_url('assets/themes/crru_inter/img/km.png'); ?>" width = "100%"></a>
                        <a href="#"><img src = "<?php echo base_url('assets/themes/crru_inter/img/crru-global.png'); ?>" width = "100%"></a>
                        <!--<a href="http://www.crru.ac.th/romkasalongkham.php"><img src = "<?php echo base_url('assets/themes/agency/img/rum.png'); ?>" width = "100%"></a>-->
                        <a href="http://admission.crru.ac.th/"><img src = "<?php echo base_url('assets/themes/agency/img/rub.png'); ?>" width = "100%"></a>
                        <a href="http://crruinter.crru.ac.th/sport/"><img src = "<?php echo base_url('assets/themes/crru_inter/img/sport.png'); ?>" width = "100%"></a>
<!--                            <a href="http://http://www.crru.ac.th/kanbua_online.php"><img src = "<?php echo base_url('assets/themes/agency/img/kanbor.jpg'); ?>" width = "100%"></a>-->
                    </div>
                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#content-->




    <br/><br/>


    <section id="content">
        <div class="container">  
            <div class="row">
                <div class="col-xs-12 col-sm-6 wow fadeInDown">


                    <div class="border-radius-images-bottom">
                        <div class="testimonial">

                            <div class="media testimonial-inner" align="center">
                                <iframe src="https://www.google.com/calendar/embed?src=a4mrlnluhd71o7se2gjsh795ig%40group.calendar.google.com&ctz=Europe/London" style="border: 0" width="550" height="400" frameborder="0" scrolling="no"></iframe>

                            </div>                       
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 wow fadeInDown">


                    <div class="border-radius-images-bottom">
                        <div class="testimonial">
                            <div class="border-radius-images-top"
                                 <h2><font color="#000">วีดิโอ</font></h2>
                            </div>
                            <div class="border-radius-images-bottom">
                                <div class="testimonial">

                                    <div class="media testimonial-inner" align="center">

                                        <iframe width="250" height="160" src="//www.youtube.com/embed/jpPClXWZfVw" frameborder="0" allowfullscreen></iframe>&nbsp;
                                        <iframe width="250" height="160" src="//www.youtube.com/embed/uQyhQ_FpDDk" frameborder="0" allowfullscreen></iframe>
                                        <br/><br/>
                                        <iframe width="250" height="160" src="//www.youtube.com/embed/wldFUrZ7B-Y" frameborder="0" allowfullscreen></iframe>
                                        <iframe width="250" height="160" src="//www.youtube.com/embed/67GZH4-mcfo" frameborder="0" allowfullscreen></iframe>
                                        <br/><br/>
                                    </div>                       
                                </div>
                            </div>


                        </div>                       
                    </div>
                </div>
            </div>





        </div><!--/.row-->
</div><!--/.container-->
</section><!--/#content-->
<br/><br/>
<section id="content">
    <div class="container">  
        <div class="row">
            <div class="col-xs-12 col-sm-9 wow fadeInDown">


                <div class="border-radius-images-bottom">
                    <div class="testimonial">

                        <div class="media testimonial-inner">

                            <!--<div class="media testimonial-inner" align="center">-->
                            <!--<a href="http://www.adb.org/"><img src = "<?php echo base_url('assets/themes/agency/img/adb.PNG'); ?>" width = "96"></a>&nbsp;&nbsp;-->
                            <a href="http://inter.mua.go.th/main2/index.php"><img src = "<?php echo base_url('assets/themes/agency/img/bics.jpg'); ?>" width = "90"></a>&nbsp;&nbsp;
                            <a href="http://www.britishcouncil.or.th/"><img src = "<?php echo base_url('assets/themes/agency/img/british.PNG'); ?>" width = "180"></a>



                            <a href="http://www.fulbrightthai.org//"><img src = "<?php echo base_url('assets/themes/agency/img/fulbright.PNG'); ?>" width = "140"></a>&nbsp;&nbsp;
                            <a href="http://www.idp.com/thailand/studyabroad"><img src = "<?php echo base_url('assets/themes/agency/img/idp.PNG'); ?>" width = "190"></a>&nbsp;&nbsp;
                            <a href="http://www.rihed.seameo.org/"><img src = "<?php echo base_url('assets/themes/agency/img/seamio.PNG'); ?>" width = "190"></a>&nbsp;&nbsp;

                            <br/>

                            <a href="http://www.aseanfoundation.org/"><img src = "<?php echo base_url('assets/themes/agency/img/af-logo.png'); ?>" height="50"></a>&nbsp;&nbsp;
                            <a href="http://en.csc.edu.cn/"><img src = "<?php echo base_url('assets/themes/agency/img/e_logo.jpg'); ?>" height="45"></a>&nbsp;&nbsp;
                            <a href="http://bangkok.usembassy.gov/services/irc/stu-c.html"><img src = "<?php echo base_url('assets/themes/agency/img/EducationUSA.jpg'); ?>" width = "120"></a>&nbsp;&nbsp;
                            <a href="http://www.jfbkk.or.th/"><img src = "<?php echo base_url('assets/themes/agency/img/index_021.jpg'); ?>" height="50"></a>&nbsp;&nbsp;


                            <br/>

                            <a href="http://jsps-th.org/jsps_th/2014/03/04/150/"><img src = "<?php echo base_url('assets/themes/agency/img/japan.PNG'); ?>" height="60"></a>&nbsp;&nbsp;
                            <a href="http://www.kecbkk.com/thai/"><img src = "<?php echo base_url('assets/themes/agency/img/korean.PNG'); ?>" height="70"></a>&nbsp;&nbsp;
                            <a href="http://www.hanbanthai.org/"><img src = "<?php echo base_url('assets/themes/agency/img/hanban.jpg'); ?>" height="70"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="http://www.bic.moe.go.th/newth/"><img src = "<?php echo base_url('assets/themes/agency/img/bic.png'); ?>" height="70"></a>&nbsp;&nbsp;

                             


                        </div>                       
                    </div>
                </div>
            </div>



            <div class="col-xs-12 col-sm-3 ">	
                <div class="border-radius-top-teerawat">
                    <font color="#000">ผู้เข้าชมเว็บไซต์</font>
                </div>
                <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <font color="#000">
                    <p>
                    <table width="183" border="0">

                        <tr>
                            <td width="98">วันนี้</td>
                            <td width="75"><div align="center"><?= number_format($strToday, 0); ?></div></td>
                        </tr>
                        <tr>
                            <td>เมื่อวาน</td>
                            <td><div align="center"><?= number_format($strYesterday, 0); ?></div></td>
                        </tr>
                        <tr>
                            <td>เดือนนี้</td>
                            <td><div align="center"><?= number_format($strThisMonth, 0); ?></div></td>
                        </tr>
                        <tr>
                            <td>เมื่อเดือนที่แล้ว</td>
                            <td><div align="center"><?= number_format($strLastMonth, 0); ?></div></td>
                        </tr>
                        <tr>
                            <td>ปีนี้</td>
                            <td><div align="center"><?= number_format($strThisYear, 0); ?></div></td>
                        </tr>
                        <tr>
                            <td>ปีก่อน</td>
                            <td><div align="center"><?= number_format($strLastYear, 0); ?></div></td>
                        </tr>
                    </table>
                    </p>
                </div>
            </div><!--/.col-lg-4 -->

        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#content-->
<!--         <section id="content">
    <div class="container">  
        <div class="row">
            <div class="col-xs-12 col-sm-12 wow fadeInDown">

                
                <div class="border-radius-images-bottom">
                    <div class="testimonial">

                        <div class="media testimonial-inner" align="center">
                            <a href="http://www.adb.org/"><img src = "<?php echo base_url('assets/themes/agency/img/adb.PNG'); ?>" width = "96"></a>&nbsp;&nbsp;
                            <a href="http://inter.mua.go.th/main2/index.php"><img src = "<?php echo base_url('assets/themes/agency/img/bics.jpg'); ?>" width = "90"></a>&nbsp;&nbsp;
                            <a href="http://www.britishcouncil.or.th/"><img src = "<?php echo base_url('assets/themes/agency/img/british.PNG'); ?>" width = "210"></a>
                            
                            
                            
                            <a href="http://www.fulbrightthai.org//"><img src = "<?php echo base_url('assets/themes/agency/img/fulbright.PNG'); ?>" width = "160"></a>&nbsp;&nbsp;
                            <a href="http://www.idp.com/thailand/studyabroad"><img src = "<?php echo base_url('assets/themes/agency/img/idp.PNG'); ?>" width = "220"></a>&nbsp;&nbsp;
                            <a href="http://www.rihed.seameo.org/"><img src = "<?php echo base_url('assets/themes/agency/img/seamio.PNG'); ?>" width = "250"></a>&nbsp;&nbsp;
                            

                        </div>                       
                    </div>
                </div>
            </div>



           

        </div>/.row
    </div>/.container
</section>/#content-->

<br/><br/>
</div>
<script>
    (function(a) {
        a.createModal = function(b) {
            defaults = {title: "", message: "Your Message Goes Here!", closeButton: true, scrollable: false};
            var b = a.extend({}, defaults, b);
            var c = (b.scrollable === true) ? 'style="max-height: 420px;overflow-y: auto;"' : "";
            html = '<div class="modal fade" id="myModal">';
            html += '<div class="modal-dialog">';
            html += '<div class="modal-content">';
            html += '<div class="modal-header">';
            html += '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
            if (b.title.length > 0) {
                html += '<h4 class="modal-title">' + b.title + "</h4>"
            }
            html += "</div>";
            html += '<div class="modal-body" ' + c + ">";
            html += b.message;
            html += "</div>";
            html += '<div class="modal-footer">';
            if (b.closeButton === true) {
                html += '<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'
            }
            html += "</div>";
            html += "</div>";
            html += "</div>";
            html += "</div>";
            a("body").prepend(html);
            a("#myModal").modal().on("hidden.bs.modal", function() {
                a(this).remove()
            })
        }
    })(jQuery);

    /*
     * Here is how you use it
     */
    $(function() {
        $('.view-pdf').on('click', function() {
            var pdf_link = $(this).attr('href');
            var iframe = '<div class="iframe-container"><iframe src="' + pdf_link + '"></iframe></div>'
            $.createModal({
                title: 'รายละเอียดเพิ่มเติม',
                message: iframe,
                closeButton: true,
                scrollable: false
            });
            return false;
        });
    })


</script>
<?php $this->load->view('includes/footer'); ?>




