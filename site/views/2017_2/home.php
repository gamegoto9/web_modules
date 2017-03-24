<?php
defined('BASEPATH') or exit('No direct script access allowed');

$user_language = $this->
session->userdata('language');
$this->lang->load('contact_form_' . $user_language, $user_language);

$this->session->set_userdata('LASTURL', $this->uri->uri_string());
?>
<?php $this->
load->view('2017_2/includes/header');?>

<link href="<?php echo base_url('assets/themes/inter2017/asymmetry2/css/thumbnail-slider.css');?>" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url('assets/themes/inter2017/asymmetry2/js/thumbnail-slider.js');?>" type="text/javascript"></script>

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
mysql_close();
////////////////////////////////////////////////////////////////
?>
<style type="text/css">
    body .modal-admin {
        /* new custom width */
        width: 80%;
        /* must be half of the width, minus scrollbar on the left (30px) */
        margin-left: 10%;
    }
</style>

<div class="gtco-loader">
</div>
<div id="page">
    <?php $this->
    load->view('2017_2/includes/navbar');?>


    <!-- <?php $this->load->view('2017_2/includes/sidebar');?>  -->
    <div class="gtco-section-overflow">


        <div class="gtco-section" data-section="home" id="gtco-services">
            <div class="gtco-container">
                <div class="row">

                    <!-- slider -->
                    <div class="col-sm-6">
                        <div class="carousel slide" data-ride="carousel" id="carousel-example-generic">
                            <ol class="carousel-indicators">
                                <li class="" data-slide-to="0" data-target="#carousel-example-generic">
                                </li>
                                <li class="active" data-slide-to="1" data-target="#carousel-example-generic">
                                </li>
                                <li class="" data-slide-to="2" data-target="#carousel-example-generic">
                                </li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item">
                                    <a href="">
                                        <img src="<?php echo base_url('assets/themes/inter2017/asymmetry2/images/2559-10-13 king.jpg'); ?>"/>
                                    </a>
                                </div>
                                <div class="item active">
                                    <a href="">
                                        <img src="<?php echo base_url('assets/themes/inter2017/asymmetry2/images/2559-10-13 king.jpg'); ?>"/>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="<?php echo base_url('assets/themes/inter2017/asymmetry2/images/2559-10-13 king.jpg'); ?>"/>
                                    </a>
                                </div>
                            </div>
                            <a class="left carousel-control" data-slide="prev" href="#carousel-example-generic">
                                <span class="glyphicon glyphicon-chevron-left">
                                </span>
                            </a>
                            <a class="right carousel-control" data-slide="next" href="#carousel-example-generic">
                                <span class="glyphicon glyphicon-chevron-right">
                                </span>
                            </a>
                        </div>
                    </div>
                    <!-- end slider -->
                    <!-- start right menu -->
                    <div class="col-lg-6 col-sm-6 col-xs-12 bs-glyphicons">
                        <div class="row">
                            <ul class="bs-glyphicons-list" style="font-family:'thaisans_neueregular';">
                                <a href="<?php echo site_url('site/admission/'); ?>">
                                    <li class="col-sm-6 col-xs-12">
                                        <i class="fa fa-info-circle">
                                        </i>
                                        <span class="glyphicon-class">
                                            <span style="font-weight:bold; font-size:14px;">
                                             <?php echo $this->lang->line('admission'); ?>
                                         </span>
                                         <p style="font-size:12px;">
                                            (<?php echo $this->lang->line('cer'); ?>)
                                        </p>
                                    </span>
                                </li>
                            </a>
                            <a href="http://crruinter.crru.ac.th/student/student.php" target="_blank">
                                <li class="col-sm-3 col-xs-12">
                                    <i class="fa fa-user">
                                    </i>
                                    <span class="glyphicon-class">
                                        <span style="font-weight:bold; font-size:14px;">
                                         <?php echo $this->lang->line('service_std'); ?>
                                     </span>
                                 </span>
                             </li>
                         </a>
                         <a href="http://orasis.crru.ac.th/orasis_crru/tis/login" target="_blank">
                            <li class="col-sm-3 col-xs-12">
                                <i class="fa fa-user-secret">
                                </i>
                                <span class="glyphicon-class">
                                    <span style="font-weight:bold; font-size:14px;">
                                      <?php echo $this->lang->line('service_tec'); ?>
                                  </span>
                              </span>
                          </li>
                      </a>
                  </ul>
              </div>
              <div class="row">
                <ul class="bs-glyphicons-list" style="font-family:'thaisans_neueregular';">
                    <a href="<?php echo base_url('site/inter2017_2/passport'); ?>">
                        <!-- http://orasis.crru.ac.th/gds_crru/course -->
                        <li class="col-sm-3 col-xs-12">
                            <i class="fa fa-graduation-cap">
                            </i>
                            <span class="glyphicon-class">
                                <span style="font-weight:bold; font-size:14px;">
                                 <?php echo $this->lang->line('service_visa'); ?>
                             </span>
                         </span>
                     </li>
                 </a>
                 <a href="#">
                    <li class="col-sm-3 col-xs-12">
                        <i class="fa fa-bar-chart">
                        </i>
                        <span class="glyphicon-class">
                            <span style="font-weight:bold; font-size:14px;">
                                <?php echo $this->lang->line('service_sum_std'); ?>
                            </span>
                        </span>
                    </li>
                </a>
                <a href="<?php echo base_url('/site/inter2017_2/list_international/0'); ?>">
                    <li class="col-sm-3 col-xs-12">
                        <i class="fa fa-database">
                        </i>
                        <span class="glyphicon-class">
                            <span style="font-weight:bold; font-size:14px;">
                                <?php echo $this->lang->line('service_mou'); ?>
                            </span>
                            <p style="font-size:11px;">
                                <small>
                                    (UNIVESITY AND WEBSITE)
                                </small>
                            </p>
                        </span>
                    </li>
                </a>
                <a href="http://crruinter.crru.ac.th/inter_2014/site/dashboard/km">
                    <li class="col-sm-3 col-xs-12">
                        <i class="fa fa-cloud">
                        </i>
                        <span class="glyphicon-class">
                            <span style="font-weight:bold; font-size:14px;">
                                Knowledge Management
                            </span>
                            <p style="font-size:12px;">
                                <small>
                                    (2015)
                                </small>
                            </p>
                        </span>
                    </li>
                </a>
            </ul>
        </div>
    </div>
    <!-- end menu -->
</div>
</div>
</div>
</div>


<!-- new row -->
<div class="gtco-section-overflow">
    <div class="gtco-section2" data-section="home" id="gtco-services">
        <div class="gtco-container">
            <div class="row">
                <!-- persident -->
                <div class="col-sm-12 col-lg-3" style="padding:0px;">
                    <div class="thumbnail" style="font-family:'thaisans_neueregular';">
                        <img class="img-circle" src="<?PHP echo base_url('assets/themes/inter2017/asymmetry2/images/aj.nung.jpg'); ?>" style="width:120px;border:5px #E6E9ED solid; margin-top:10px;">
                        <div class="caption text-center">
                            <span style="font-size:14px; font-weight:bold">
                             <?php echo $this->lang->line('director_title'); ?>
                         </span>
                         <p style="font-size:14px;">
                            <?php echo $this->lang->line('director_name'); ?>
                            <br>
                            <?php echo $this->lang->line('director_full'); ?>
                        </br>
                    </p>
                    <div class="btn-group">
                        <a class="btn btn-success btn-sm" href="tel:0818849875" style="font-size:12px;" type="button">
                            <i class="fa fa-phone">
                            </i>
                            Phone
                        </a>
                        <a class="btn btn-success btn-sm" style="font-size:11px;" href="mailto:crruinter@crru.ac.th">
                            <i class="fa fa-paper-plane">
                            </i>
                            Send Message
                        </a>
                    </div>
                </div>
            </img>
        </div>


        <!-- end persident -->
        <br>
        <!-- start menu -->

        <!-- menu -->
        <div class="panel panel-default" style="font-family:'thaisans_neueregular';">
            <div class="panel-heading" style="background-color:#c9ec96;">
                <h4 class="panel-title" style="color:#ff5126;">
                    <i class="fa fa-bookmark">
                    </i>
                    <b>Quick Menu</b>
                </h4>
            </div>
            <div class="panel-body" style="padding:0px; font-size:14px;">
                <div class="list-group">
                    <a class="list-group-item" href="<?php echo base_url('/site/inter2017_2/about'); ?>">
                        <i aria-hidden="true" class="fa fa-info-circle">
                        </i>
                        <?php echo $this->lang->line('m_abount'); ?>
                    </a>
                    <a class="list-group-item" href="" target="_blank">
                        <i aria-hidden="true" class="fa fa-address-card">
                        </i>
                        <?php echo $this->lang->line('m_student'); ?>
                    </a>
                    <a class="list-group-item" href="" target="_blank">
                        <i aria-hidden="true" class="fa fa-address-card">
                        </i>
                        <?php echo $this->lang->line('m_tec'); ?>
                    </a>
                    <a class="list-group-item" href="<?php echo base_url('/site/inter2017_2/list_international/'); ?>">
                        <i aria-hidden="true" class="fa fa-handshake-o">
                        </i>
                        <?php echo $this->lang->line('m_mou'); ?>

                    </a>
                    <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalMessage">
                        <i aria-hidden="true" class="fa fa-calendar">
                        </i>
                        <?php echo $this->lang->line('m_calenda'); ?>

                    </a>
                        <!-- <a class="list-group-item" href="#">
                            <i aria-hidden="true" class="fa fa-database">
                            </i>
                            <?php echo $this->lang->line('m_mat'); ?>
                        </a> -->
                        <a class="list-group-item" href="http://crruinter.crru.ac.th/inter_2014/admin/studentdata#">
                            <i aria-hidden="true" class="fa fa-database">
                            </i>
                            <?php echo $this->lang->line('m_d_std'); ?>
                        </a>
                        <a class="list-group-item" href="">
                            <i aria-hidden="true" class="fa fa-database">
                            </i>
                            <?php echo $this->lang->line('m_d_tec'); ?>
                        </a>
                        <!-- <a class="list-group-item" href="http://kmresearch.crru.ac.th">
                            <i aria-hidden="true" class="fa fa-search">
                            </i>
                            <?php echo $this->lang->line('m_e-office'); ?>
                        </a>
                        <a class="list-group-item" href="http://www.kmutt.ac.th/jif/public_html">
                            <i aria-hidden="true" class="fa fa-search">
                            </i>
                            CRRU NJOY
                        </a> -->
                    </div>
                </div>
            </div>
            <!-- end menu -->
            <!-- program menu -->
            <br>
            <!-- start menu -->

            <!-- program menu -->
            <div class="panel panel-default" style="font-family:'thaisans_neueregular';">
                <div class="panel-heading" style="background-color:#c9ec96;">
                    <h4 class="panel-title" style="color:#ff5126;">
                        <i class="fa fa-bookmark">
                        </i>
                        <b>Information System</b>
                    </h4>
                </div>
                <div class="panel-body" style="padding:0px; font-size:14px;">
                    <div class="list-group">

                        <a class="list-group-item" href="http://e-office.crru.ac.th/">
                            <i aria-hidden="true" class="fa fa-rss-square">
                            </i>
                            <?php echo $this->lang->line('m_e-office'); ?>
                        </a>
                        <a class="list-group-item" href="http://service.crru.ac.th/njoys/">
                            <i aria-hidden="true" class="fa fa-rss-square">
                            </i>
                            CRRU NJOY
                        </a>
                        <a class="list-group-item" href="http://service.crru.ac.th/hrm/faculty/login">
                            <i aria-hidden="true" class="fa fa-rss-square">
                            </i>
                            CRRU FACulty
                        </a>
                    </div>
                </div>
            </div>



            <!-- end program menu -->


        </div>
        <!-- end menu -->



        <!-- ประชาสัมพันธ์ -->
        <div class="col-sm-12 col-lg-9">
          <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="panel panel-default" style="font-family:'thaisans_neueregular';">
                    <div class="panel-heading" style="background-color:#c9ec96;">
                        <h4 class="panel-title" style="color:#ff5126;">
                            <i class="fa fa-bullhorn">
                            </i>
                            <b>Public Relations</b>
                        </h4>
                    </div>


                    <div class="panel-body">
                        <ul class="nav nav-tabs nav-justified" id="myTab1" style="font-family:'thaisans_neueregular'; font-size:14px; font-weight:bold">
                            <li class="active">
                                <a aria-expanded="true" data-toggle="tab" href="#tab_all">
                                    <i class="fa fa-bullhorn">
                                    </i>&nbsp;&nbsp;
                                    <?PHP echo $this->lang->line('ralations_defalse'); ?>
                                </a>
                            </li>
                            <li class="">
                                <a aria-expanded="false" data-toggle="tab" href="#tab_std">
                                    <i class="fa fa-bullhorn">
                                    </i>&nbsp;&nbsp;
                                    <?PHP echo $this->lang->line('ralations_std'); ?>
                                </a>
                            </li>
                            <li class="">
                                <a aria-expanded="false" data-toggle="tab" href="#tab_tec">
                                    <i class="fa fa-bullhorn">
                                    </i>&nbsp;&nbsp;
                                    <?PHP echo $this->lang->line('ralations_tch'); ?>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active in" id="tab_all">
                                <div class="list-group">
                                    <?php
                                    foreach ($news as $row) {
                                        ?>
                                        <a class="list-group-item" href="http://crruinter.crru.ac.th/news_data.php?new_id=<?PHP echo $row['id']; ?>&c=1" style="border-top:1px #CCC dotted;" target="_blank">
                                            <h6 class="list-group-item-heading" style="font-size:14px;font-weight:bold;">
                                             <?PHP echo $row[$lang]; ?>
                                         </h6>
                                         <p class="list-group-item-text">
                                            <small>
                                                <span class="text-info">
                                                    <i class="fa fa-calendar">
                                                    </i>
                                                    <?PHP echo $row['Ddate']; ?>
                                                </span>
                                                <span class="text-warning">
                                                    <i class="fa fa-pencil-square-o">
                                                    </i>
                                                    By Admin
                                                </span>
                                            </small>
                                        </p>
                                    </a>
                                    <?php
                                }
                                ?>

                            </div>
                            <div class="row">
                                <a class="pull-right" href="" style="padding:21px;">
                                </a>
                                <a class="btn btn-success btn-xs pull-right" href="<?php echo base_url('/site/inter2017_2/relations'); ?>" type="button">
                                    All
                                    <i aria-hidden="true" class="fa fa-angle-double-right">
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_std">
                            <div class="list-group">

                                <?php
                                foreach ($news_std as $row) {
                                    ?>
                                    <a class="list-group-item" href="http://crruinter.crru.ac.th/news_data.php?new_id=<?PHP echo $row['id']; ?>&c=1" style="border-top:1px #CCC dotted;" target="_blank">
                                        <h6 class="list-group-item-heading" style="font-size:14px;font-weight:bold;">
                                         <?PHP echo $row[$lang]; ?>
                                     </h6>
                                     <p class="list-group-item-text">
                                        <small>
                                            <span class="text-info">
                                                <i class="fa fa-calendar">
                                                </i>
                                                <?PHP echo $row['Ddate']; ?>
                                            </span>
                                            <span class="text-warning">
                                                <i class="fa fa-pencil-square-o">
                                                </i>
                                                By Admin
                                            </span>
                                        </small>
                                    </p>
                                </a>
                                <?php
                            }
                            ?>

                        </div>
                        <div class="row">
                            <a class="pull-right" href="" style="padding:21px;">
                            </a>
                            <a class="btn btn-success btn-xs pull-right" href="<?php echo base_url('/site/inter2017_2/relations'); ?>" type="button">
                                All
                                <i aria-hidden="true" class="fa fa-angle-double-right">
                                </i>
                            </a>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab_tec">
                        <div class="list-group">

                            <?php
                            foreach ($news_tec as $row) {
                                ?>
                                <a class="list-group-item" href="http://crruinter.crru.ac.th/news_data.php?new_id=<?PHP echo $row['id']; ?>&c=1" style="border-top:1px #CCC dotted;" target="_blank">
                                    <h6 class="list-group-item-heading" style="font-size:14px;font-weight:bold;">
                                     <?PHP echo $row[$lang]; ?>
                                 </h6>
                                 <p class="list-group-item-text">
                                    <small>
                                        <span class="text-info">
                                            <i class="fa fa-calendar">
                                            </i>
                                            <?PHP echo $row['Ddate']; ?>
                                        </span>
                                        <span class="text-warning">
                                            <i class="fa fa-pencil-square-o">
                                            </i>
                                            By Admin
                                        </span>
                                    </small>
                                </p>
                            </a>
                            <?php
                        }
                        ?>

                    </div>
                    <div class="row">
                        <a class="pull-right" href="" style="padding:21px;">
                        </a>
                        <a class="btn btn-success btn-xs pull-right" href="<?php echo base_url('/site/inter2017_2/relations'); ?>" type="button">
                            All
                            <i aria-hidden="true" class="fa fa-angle-double-right">
                            </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end ประชาสัมพันธ์ -->

    <!-- start tone -->
    <div class="col-sm-12 col-lg-9">
        <div class="panel panel-default" style="font-family:'thaisans_neueregular';">
            <div class="panel-heading" style="background-color:#c9ec96;">
                <h4 class="panel-title" style="color:#ff5126;">
                    <i class="fa fa-university">
                    </i>
                    <b>Scholarships</b>
                </h4>
            </div>


            <div class="panel-body">
                <ul class="nav nav-tabs nav-justified" id="myTab2" style="font-family:'thaisans_neueregular'; font-size:14px; font-weight:bold">
                    <li class="active">
                        <a aria-expanded="true" data-toggle="tab" href="#tab_th">
                            <i class="fa fa-bullhorn">
                            </i>&nbsp;&nbsp;
                            <?PHP echo $this->lang->line('scholarship_th'); ?>
                        </a>
                    </li>
                    <li class="">
                        <a aria-expanded="false" data-toggle="tab" href="#tab_en">
                            <i class="fa fa-bullhorn">
                            </i>&nbsp;&nbsp;
                            <?PHP echo $this->lang->line('scholarship_en'); ?>
                        </a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade active in" id="tab_th">
                        <div class="list-group">

                          <?php
                          foreach ($fond_out as $row) {
                            $Ddate = $row['Ddate'];
                            $day   = substr($Ddate, 8, 2);
                            $mount = substr($Ddate, 5, 2);
                            $year  = substr($Ddate, 0, 4);

                            ?>

                            <div class="fh5co-blog">
                                <div class="col-md-2 col-sm-12">
                                    <div class="meta-date text-center">
                                        <p><span class="date"><?php echo $day; ?></span><?php echo $mount; ?><span><?php echo $year; ?></span></p>
                                    </div>
                                </div>

                                <div class="col-md-10">

                                    <a href="<?php echo $row['file']; ?>" target="_blank" style="font-size:14px;font-weight:bold;"><?php echo $row['title']; ?></a>
                                    <br>
                                    <span class="posted_by" style="font-size:11px;font-weight:bold;">Posted by: Admin</span>

                                    <span class="comment" style="font-size:11px;font-weight:bold;"><a href=""><i class="icon-bubble22"></i></a></span>

                                    
                                    <span>
                                        <p><?php echo substr($row['note'],0,400).'...'; ?></p>
                                    </span>
                                    
                                    <a href="<?php echo $row['file']; ?>" target="_blank" class="btn btn-warning btn-xs pull-right"><?PHP echo $this->lang->line('read_more'); ?></a>


                                </div>

                            </div>
                            <br><br><br><br><br>
                            <?php
                        }
                        ?>
                    </div>


                    <div class="row">

                        <a class="pull-right" href="" style="padding:10px;">
                        </a>

                        <a class="btn btn-info btn-xs pull-right" href="<?php echo base_url('/site/inter2017_2/scholarships'); ?>" type="button" style="margin-top: 21px;">
                            All
                            <i aria-hidden="true" class="fa fa-angle-double-right">
                            </i>
                        </a>
                    </div>


                </div>


                <!-- end tab th -->

                <div class="tab-pane fade in" id="tab_en">
                    <div class="list-group">
                        <div class="list-group">

                          <?php
                          foreach ($fond_in as $row) {
                            $Ddate = $row['Ddate'];
                            $day   = substr($Ddate, 8, 2);
                            $mount = substr($Ddate, 5, 2);
                            $year  = substr($Ddate, 0, 4);

                            ?>

                            <div class="fh5co-blog">
                                <div class="col-md-2">
                                    <div class="meta-date text-center">
                                        <p><span class="date"><?php echo $day; ?></span><?php echo $mount; ?><span><?php echo $year; ?></span></p>
                                    </div>
                                </div>

                                <div class="col-md-10">

                                    <a href="<?php echo $row['file']; ?>" target="_blank" style="font-size:14px;font-weight:bold;"><?php echo $row['title']; ?></a>
                                    <br>
                                    <span class="posted_by" style="font-size:11px;font-weight:bold;">Posted by: Admin</span>

                                    <span class="comment" style="font-size:11px;font-weight:bold;"><a href=""><i class="icon-bubble22"></i></a></span>


                                    
                                    <span>
                                        <p><?php echo substr($row['note'],0,200).'...'; ?></p>
                                    </span>
                                    
                                    <a href="<?php echo $row['file']; ?>" target="_blank" class="btn btn-warning btn-xs pull-right"><?PHP echo $this->lang->line('read_more'); ?></a>


                                </div>

                            </div>
                            <?php
                        }
                        ?>
                    </div>


                    <div class="row">

                        <a class="pull-right" href="" style="padding:10px;">
                        </a>
                        <a class="btn btn-info btn-xs pull-right" href="<?php echo base_url('/site/inter2017_2/scholarships'); ?>" type="button" style="margin-top: 21px;">
                            All
                            <i aria-hidden="true" class="fa fa-angle-double-right">
                            </i>
                        </a>
                    </div>


                </div>


            </div>
        </div>



    </div>



</div>




</div>

<!-- end tone -->
<!-- start right bock 3 -->
<div class="col-sm-12 col-md-3">

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <p style="color: #ff5126; font-weight:bold;">หน่วยงานที่เกี่ยวข้อง</p>
            <hr width="100%"/>

            <div class="list-group" style="font-size:11px; font-weight:bold">

                <a class="list-group-item" href="http://www.crru.ac.th">

                    <?php echo $this->lang->line('crru'); ?>
                </a>
                <a class="list-group-item" href="http://reg2.crru.ac.th/reg_web/">

                    <?php echo $this->lang->line('reg'); ?>
                </a>
                <a class="list-group-item" href="http://human.crru.ac.th/human2015/">

                    <?php echo $this->lang->line('human'); ?>
                </a>
                <a class="list-group-item" href="http://personnel.crru.ac.th/psn_site/">

                    <?php echo $this->lang->line('perso'); ?>
                </a>
                <a class="list-group-item" href="http://www.lcrru.crru.ac.th/Main%20page/Main.html">

                    <?php echo $this->lang->line('lang1'); ?>
                </a>
            </div>
        </div>
    </div>
    <br>
    <div class="thumbnail" style="font-family:'thaisans_neueregular';">
        <p style="color: #ff5126; font-weight:bold">สถิติ ผู้เข้าชมเว็บไซต์</p>

        <div class="single-profile-top wow fadeInDown" data-wow-delay="300ms" data-wow-duration="1000ms">
            <font color="#000">
                <p>
                    <table border="0" width="183">
                        <tr>
                            <td width="98">
                                วันนี้
                            </td>
                            <td width="75">
                                <div align="center">
                                    <?=number_format($strToday, 0);?>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                เดือนนี้
                            </td>
                            <td>
                                <div align="center">
                                    <?=number_format($strThisMonth, 0);?>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                ปีนี้
                            </td>
                            <td>
                                <div align="center">
                                    <?=number_format($strThisYear, 0);?>
                                </div>
                            </td>
                        </tr>

                    </table>
                </p>
            </font>
        </div>
    </div>

</div>






</div>
<!-- end right bock 3 -->




</div>
</div>

</div>
</div>
<!-- end new row -->

<!-- star row -->
<div class="gtco-section-overflow" >
   <div class="gtco-section2" data-section="home" id="gtco-services">
       <div class="thumbnail" style="background: transparent;">
         <div class="gtco-container">

            <div class="row">

               <!-- activity -->
               <div class="gtco-heading" style="margin-bottom: 2em;">
                <h2 class="gtco-left">
                    <?PHP echo $this->lang->line('titile_activity'); ?>
                </h2>
            </div>

            <div class="col-sm-12 col-lg-12" style="padding:0px;">
                <div class="row">


                    <?php
                    foreach ($activitys as $row) {
                        $id = $row['Nid'];
                        ?>
                        <div class="col-md-3">
                           <a href="<?php echo base_url('/site/inter2017_2/gallery/' . $id); ?>" class="gtco-card-item has-text" style="background-color: #FFF;">
                              <figure>
                                 <div class="overlay"><i class="ti-plus"></i></div>
                                 <img src="<?php echo $row['parth_img']; ?>" alt="Image" class="img-responsive">
                             </figure>
                             <div class="gtco-text text-left">
                                 <p style="color: #ff5126;"><?php echo $row['title']; ?></p>

                                 <p><?php echo substr($row['Ntext'], 0, 300) . "..."; ?></p>

                                 <p class="gtco-category"><?php echo $row['Ndate']; ?></p>
                             </div>
                         </a>
                     </div>
                     <div class="clearfix visible-sm-block"></div>




                     <?php
                 }
                 ?>




             </div>
         </div>
         <a href="<?php echo base_url('/site/inter2017_2/list_activity'); ?>" class="pull-right btn btn-success btn-sm"><?PHP echo $this->lang->line('read_all'); ?></a>
     </div>
     <br><br>

 </div>


<!-- star row -->
<div class="gtco-section-overflow" style="color: #FFFFFF;">
   <div class="gtco-section2" data-section="home" id="gtco-services">
      
         <div class="gtco-container">

            <div class="row">
                    <div class="col-sm-12 col-md-12" style="padding:0px; color: #FFFFFF;">
                            <div id="thumbnail-slider">
                <div class="inner">
                    <ul>
                        <li >
                            <a href="http://inter.mua.go.th/main2/index.php"><img src ="<?php echo base_url('assets/themes/agency/img/bics.jpg'); ?>" class="thumb">
                            </a>
                        </li>
                        <li>
                            <a href="http://www.britishcouncil.or.th/"><img src = "<?php echo base_url('assets/themes/agency/img/british.PNG'); ?>" class="thumb"></a>
                        </li>
                        <li>
                            <a href="http://www.fulbrightthai.org//"><img src = "<?php echo base_url('assets/themes/agency/img/fulbright.PNG'); ?>" class="thumb"></a>
                        </li>
                         <li>
                            <a href="http://www.idp.com/thailand/studyabroad"><img src = "<?php echo base_url('assets/themes/agency/img/idp.PNG'); ?>" class="thumb"></a>
                        </li>
                         <li>
                            <a href="http://www.rihed.seameo.org/"><img src = "<?php echo base_url('assets/themes/agency/img/seamio.PNG'); ?>" class="thumb"></a>
                        </li>
                        <li>
                            <a href="http://www.aseanfoundation.org/"><img src = "<?php echo base_url('assets/themes/agency/img/af-logo.png'); ?>" class="thumb"></a>
                        </li>
                        <li>
                           <a href="http://en.csc.edu.cn/"><img src = "<?php echo base_url('assets/themes/agency/img/e_logo.jpg'); ?>" class="thumb"></a>
                        </li>
                        <li>
                             <a href="http://bangkok.usembassy.gov/services/irc/stu-c.html"><img src = "<?php echo base_url('assets/themes/agency/img/EducationUSA.jpg'); ?>" class="thumb"></a>
                        </li>
                        <li>
                             <a href="http://www.jfbkk.or.th/"><img src = "<?php echo base_url('assets/themes/agency/img/index_021.jpg'); ?>" class="thumb"></a>
                        </li>
                        <li>
                             <a href="http://jsps-th.org/jsps_th/2014/03/04/150/"><img src = "<?php echo base_url('assets/themes/agency/img/japan.PNG'); ?>" class="thumb"></a>
                        </li>
                        <li>
                            <a href="http://www.kecbkk.com/thai/"><img src = "<?php echo base_url('assets/themes/agency/img/korean.PNG'); ?>" class="thumb"></a>
                        </li>
                        <li>
                             <a href="http://www.hanbanthai.org/"><img src = "<?php echo base_url('assets/themes/agency/img/hanban.jpg'); ?>" class="thumb"></a>
                        </li>
                         <li>
                             <a href="http://www.bic.moe.go.th/newth/"><img src = "<?php echo base_url('assets/themes/agency/img/bic.png'); ?>" class="thumb"></a>
                        </li>

                    </ul>
                </div>
            </div>
                    </div>
            </div>
        </div>
  
</div>
<br><br>
</div>
<!-- end row -->

<!-- START ROW -->
<!-- END ROW -->

</div>



</div>
</div>
<!-- end row -->







<div class="gtco-section-overflow">

    <?php $this->
    load->view('2017_2/includes/footer');?>
</div>
</div>


<!-- modal -->
<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-admin" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <span style="font-family:'thaisans_neueregular'; font-size:20px;">Calendar International Affairs Division.</span>
                </h4>
            </div>
            <div class="modal-body">
                <div class="col col-md-12 col-sm-12 col-xs-12">
                    <iframe src="https://www.google.com/calendar/embed?src=a4mrlnluhd71o7se2gjsh795ig%40group.calendar.google.com&amp;ctz=Europe/London" style="border: 0" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>

<!--  -->

<script type="text/javascript">
    $(document).ready(function() {

        $('#btnSaveMessage').click(function() {

            var subject = $('#title_message').val();
            var content = $('#detail_message').val();
            var email = $('#email_message').val();

        // $.ajax({
        //   type: "POST",
        //   url: "https://mandrillapp.com/api/1.0/messages/send.json",
        //   data: {
        //     'key': '74vHbc78VAJpFun2_61K6A',
        //     'message': {
        //       'from_email': email,
        //       'to': [
        //           {
        //             'email': 'likityodya@gmail.com',
        //             'name': 'Assistant the Persident for Foreign Affairs',
        //             'type': 'to'
        //           }
        //         ],
        //       'subject': subject,
        //       'text': content
        //     }
        //   }
        //  }).done(function(response) {
        //    console.log(response); // if you're into that sorta thing
        //  });
        //     //console.log("test");
    });


    });


</script>