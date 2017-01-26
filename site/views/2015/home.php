<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$user_language = $this->session->userdata('language');
$this->lang->load('contact_form_' . $user_language, $user_language);

$this->session->set_userdata('LASTURL', $this->uri->uri_string());
?>

<?php $this->load->view('2015/includes/header'); ?>
<?php $this->load->view('2015/includes/navbar'); ?>

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
//
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



<div class="row">


    <section class="headmain" id="main">
        <div class="outer_container">

            <div class="container">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="col-md-5">
                            <img src="<?php echo base_url('assets/themes/templatemo_403_karma/images/logo_web.png'); ?>" width="300px" class="control-label">
                            <br><br>
                        </div>
                        <div class="col-md-offset-10">
                            <?PHP
//                        echo anchor('site/inter2015/th', 'ภาษาไทย'); 
//                        echo anchor('site/inter2015/en', 'english');
//                        echo anchor('site/inter2015/ch', 'chaina<br/>');
                            ?>
                            <br><br>
                            <a href="<?php echo base_url('site/inter2015/th'); ?>"><img src="<?php echo base_url('assets/themes/templatemo_403_karma/images/th.jpg'); ?>" width="50px" class="img-thumbnail"></a>
                            <a href="<?php echo base_url('site/inter2015/en'); ?>"><img src="<?php echo base_url('assets/themes/templatemo_403_karma/images/en.png'); ?>" width="50px" class="img-thumbnail"></a>


                        </div>
                    </div>
                </div>
                <div class="container_main" id="home">

                    <section id="about">
                        <div class="outer_container">

                            <div class="container">


                                <div class="row center" >
                                    <div class="col col-md-8 col-sm-12">  

                                        <div id="carousel-example-generic" class="carousel slide"data-ride="carousel" style="border: 1px solid #D2D2D2;">
                                            <!-- Indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>

                                            </ol>

                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner" role="listbox">
                                                <!-- <div class="item active">
                                                    
                                                        <img src="<?php echo base_url('assets/themes/agency/img/theam.png'); ?>" alt="...">
                                                        <div class="carousel-caption">

                                                        </div>
                                                   
                                                </div> -->
                                                                                                <div class="item active">
                                                                                                    <img src="<?php echo base_url('assets/themes/agency/img/2559-10-13 king.jpg'); ?>" alt="...">
                                                                                                    <div class="carousel-caption">
                                                                                                        ...
                                                                                                    </div>
                                                                                                </div>

                                            </div>

                                            <!-- Controls -->
                                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col col-md-4 col-sm-12" id="about_content" style="height:22em;">
                                        <div class="row center">
                                            <div class="col col-md-11 col-sm-12 templatemo_ceo" >
                                                <div class="bg1" style="border: 1px solid #D2D2D2;">
                                                    <img src="<?PHP echo base_url('assets/themes/templatemo_403_karma/images/ผอ.png'); ?>" width="150px"alt="Linda" class="center-block img-circle img-responsive">
                                                    <p><font size="3" color="#FFF"><?PHP echo $this->lang->line('director_title'); ?>
                                                        <br><?PHP echo $this->lang->line('director_name'); ?>
                                                        <br><?PHP echo $this->lang->line('director_full'); ?>
                                                        </font></p>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </section>

                    <section id="team">
                        <div class="outer_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col col-md-9 col-sm-12 center-row" id="team_content">
                                        <div class="row center">
                                            <div class="col-md-12 col-lg-12">
                                                <style>
                                                    @media (max-width: 767px){
                                                        .nav-tabs li > a > span > .fa-angle-left {
                                                            width: auto;
                                                            height: auto;
                                                            padding: 0;
                                                            margin-right: 10px;
                                                            margin-top: 3px;
                                                            font-size: 80pt;
                                                            color:red;
                                                        }
                                                        .nav-tabs li.active > a > .fa-angle-left {
                                                            -webkit-transform: rotate(-90deg);
                                                            -ms-transform: rotate(-90deg);
                                                            -o-transform: rotate(-90deg);
                                                            transform: rotate(-90deg);
                                                        }
                                                        /*                                .nav-tabs .treeview-menu > li > a > .fa-angle-left,
                                                                                        .nav-tabs .treeview-menu > li > a > .fa-angle-down {
                                                                                            width: auto;
                                                                                        }*/
                                                    }
                                                </style>


                                                <!-- Nav tabs -->
                                                <ul id="tab_contents" class="nav nav-tabs" style="font-family: 'db_helvethaicamon_x55_regular',Arial,Helvetica,Sans-Serif;
                                                    font-size: 18px;">
                                                    <li class="active"><a href="#defalse_contents" data-toggle="tab"><?PHP echo $this->lang->line('ralations_defalse'); ?><span class="pull-right hidden-lg"><i class="fa fa-angle-down"></i></span></a></li>
                                                    <li><a href="#std_contents" data-toggle="tab"><?PHP echo $this->lang->line('ralations_std'); ?><span class="pull-right hidden-lg"><i class="fa fa-angle-down"></i></span></a></li>
                                                    <li><a href="#tea_contents" data-toggle="tab"><?PHP echo $this->lang->line('ralations_tch'); ?><span class="pull-right hidden-lg"><i class="fa fa-angle-down"></i></span></a></li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div id="tab_contents" class="tab-content">
                                                    <div class="tab-pane fade  in active" id="defalse_contents">
                                                        <table class="table table-hover table-responsive" style="font-size: small;">
                                                            <?php
                                                            $i = 0;
                                                            foreach ($news as $row) {
                                                                $i++;
                                                                ?>
                                                                <tr>
                                                                    <td class="hidden-xs"><span class="label label-primary"><?PHP echo $i; ?></span></td>
                                                                    <td>
                                                                        <?PHP
                                                                        if ($row['id'] >= 27) {
                                                                            ?>
                                                                            <a href="<?PHP echo $row['name'] ?>">
                                                                                <?PHP echo $row[$lang]; ?>
                                                                            </a>
                                                                            <?PHP
                                                                        } else {
                                                                            ?>

                                                                            <a href="http://crruinter.crru.ac.th/news_data.php?new_id=<?php echo $row['id'] ?>&c=1">
                                                                                <?PHP echo $row[$lang]; ?>
                                                                            </a>
                                                                            <?PHP
                                                                        }
                                                                        ?>

                                                                        <br/>
                                                                        <span class="label label-sm" style="color:#928C8C;">
                                                                            ประกาศ เมื่อ : <?PHP echo $row['Ddate']; ?>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <?PHP
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td style="text-align:right;" colspan="3"><label class="label label-danger"><a href="#" style="color:#fff;"><?PHP echo $this->lang->line('read_all') ?><span class="fa fa-angle-double-right"></span></a></label><br/>&nbsp</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="tab-pane fade" id="std_contents">
                                                        <table class="table table-hover table-responsive" style="font-size: small;">
                                                            <?php
                                                            $i = 0;
                                                            foreach ($news_std as $row) {
                                                                $i++;
                                                                ?>
                                                                <tr>
                                                                    <td class="hidden-xs"><span class="label label-primary"><?PHP echo $i; ?></span></td>
                                                                    <td>
                                                                        <a href="http://reg2.crru.ac.th/reg_web/website/web_news/read/21">
                                                                            <?PHP echo $row[$lang]; ?>
                                                                        </a>
                                                                        <br/>
                                                                        <span class="label label-sm" style="color:#928C8C;">
                                                                            ประกาศ เมื่อ : <?PHP echo $row['Ddate']; ?>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <?PHP
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td style="text-align:right;" colspan="3"><label class="label label-danger"><a href="#" style="color:#fff;"><?PHP echo $this->lang->line('read_all') ?><span class="fa fa-angle-double-right"></span></a></label><br/>&nbsp</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="tab-pane fade" id="tea_contents">
                                                        <table class="table table-hover table-responsive" style="font-size: small;">
                                                            <?php
                                                            $i = 0;
                                                            foreach ($news_tec as $row) {
                                                                $i++;
                                                                ?>
                                                                <tr>
                                                                    <td class="hidden-xs"><span class="label label-primary"><?PHP echo $i; ?></span></td>
                                                                    <td>
                                                                        <a href="http://reg2.crru.ac.th/reg_web/website/web_news/read/21">
                                                                            <?PHP echo $row[$lang]; ?>
                                                                        </a>
                                                                        <br/>
                                                                        <span class="label label-sm" style="color:#928C8C;">
                                                                            ประกาศ เมื่อ : <?PHP echo $row['Ddate']; ?>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <?PHP
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td style="text-align:right;" colspan="3"><label class="label label-danger"><a href="#" style="color:#fff;"><?PHP echo $this->lang->line('read_all') ?><span class="fa fa-angle-double-right"></span></a></label><br/>&nbsp</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>        
                                    </div>
                                    <div class="col col-md-3 col-sm-12">
                                        <div class="row center">
                                            <div class="col-md-11 col-sm-12">

                                                <a href="http://e-office.crru.ac.th/" target="_blank"><img src="<?php echo base_url('assets/themes/templatemo_403_karma/images/' . $this->lang->line('eoffice') . '.png'); ?> " width="100%" class="center-block img-responsive"></a>
                                                <p>
                                                    <!--<a href="http://qas.crru.ac.th/" target="_blank"><img src="<?php echo base_url('assets/themes/templatemo_403_karma/images/' . $this->lang->line('pagun') . '.png'); ?> " width="100%" class="center-block img-responsive"></a>-->
                                                <!--<p>-->
                                                    <a href="http://crruinter.crru.ac.th/inter_2014/site/dashboard/gms" target="_blank"><img src="<?php echo base_url('assets/themes/templatemo_403_karma/images/' . $this->lang->line('gms') . '.png'); ?> " width="100%" class="center-block img-responsive"></a>
                                                <p>
                                                    <a href="http://qas.crru.ac.th/monitoring/" target="_blank"><img src="<?php echo base_url('assets/themes/templatemo_403_karma/images/' . $this->lang->line('plan') . '.png'); ?> " width="100%" class="center-block img-responsive"></a>
                                                <p>
                                                    <a href="http://crruinter.crru.ac.th/Presentation.pdf" target="_blank"><img src="<?php echo base_url('assets/themes/templatemo_403_karma/images/' . $this->lang->line('inter') . '.png'); ?> " width="100%" class="center-block img-responsive"></a>
                                                <p>
                                                     <a href="http://crruinter.crru.ac.th/inter_2014/admin/studentdata#" target="_blank"><img src = "<?php echo base_url('assets/themes/agency/img/student.png'); ?>" width="100%"></a>&nbsp;&nbsp;
                                                <P>
                                                    <a href="<?php echo base_url('/site/dashboard/seateacher'); ?>" target="_blank"><img src = "<?php echo base_url('assets/themes/agency/img/sea_teacher.png'); ?>" width="100%"></a>&nbsp;&nbsp;
                                                <P>
                                                    <a href="<?php echo base_url('/site/dashboard/km'); ?>"><img src="<?php echo base_url('assets/themes/templatemo_403_karma/images/km.png'); ?> " width="100%" class="center-block img-responsive"></a>
                                                <p>
                                                    <a href="http://service.crru.ac.th/njoys/" target="_blank"><img src="<?php echo base_url('assets/themes/templatemo_403_karma/images/logo-white.png'); ?> " width="100%" class="center-block img-responsive"></a>

                                            </div>                       
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>


                    <section id="services">
                        <div class="outer_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col col-md-5 col-sm-12 col-xs-12" >

                                        <!-- Nav tabs -->
                                        <ul id="tab_calendar" class="nav nav-tabs hidden-xs">
                                            <li class="active"><a href="#calendar_basic" data-toggle="tab"><?PHP echo $this->lang->line('scholarship_en'); ?><span class="pull-right hidden-lg"><i class="fa fa-angle-down"></i></span></a></li>
                                            <li><a href="#calendar_extra" data-toggle="tab"><?PHP echo $this->lang->line('scholarship_th'); ?><span class="pull-right hidden-lg"><i class="fa fa-angle-down"></i></span></a></li>
                                        </ul>

                                        <div id="tab_calendar" class="tab-content hidden-xs">

                                            <div class="tab-pane fade in active" id="calendar_basic">
                                                <div id="calen_gen"></div>

                                                <div id="page-selection_gen" class="pull-right"></div>

                                            </div>

                                            <div class="tab-pane fade" id="calendar_extra">
                                                <div id="calen_ex"></div>

                                                <div id="page-selection_ex" class="pull-right"></div>

                                            </div>



                                        </div>

                                    </div>
                                    <div class="col col-md-7 col-sm-12 col-xs-12">
                                        <img src="<?php echo base_url('assets/themes/templatemo_403_karma/images/' . $this->lang->line('title_activity') . '.png'); ?> " width="90%" class="center-block img-responsive">

                                    </div>
                                    <div class="col-md-7 col-sm-12 col-xs-12" id="team_content">

                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                            <div class="services_buttons">
                                                <ul id="services_tabs">
                                                    <li class="icon-button active" data-target="#a1"><i class="fa fa-bullhorn" style="vertical-align: middle"></i></li>
                                                    <li class="icon-button" data-target="#a2"><i class="fa fa-film"></i></li>            
                                                    <li class="icon-button" data-target="#a3"><i class="fa fa-th-large"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="activity_menu"></div>

                                        <div class="col-md-11 col-sm-12 col-xs-12" id="team_content">
                                            <div id="page_all" class="pull-right">
                                                <br>
                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url() . '/site/dashboard/list_activity'; ?>" style="color:#fff;"><?PHP echo $this->lang->line('read_all') ?></a>
                                            </div>

                                            <div id="activity_page" class="pull-right"></div>      



                                        </div>




                                    </div>


                                </div>
                            </div>
                        </div>
                    </section>


                    <section id="content">
                        <div class="outer_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col col-md-6 col-sm-12 col-xs-12">


                                        <iframe src="https://www.google.com/calendar/embed?src=a4mrlnluhd71o7se2gjsh795ig%40group.calendar.google.com&ctz=Europe/London" style="border: 0" width="550" height="400" frameborder="0" scrolling="no"></iframe>


                                    </div>

                                    <div class="col col-md-6 col-sm-12 col-xs-12">

                                        <h2><font color="#000"></font></h2>
                                        <div class="col col-md-6 col-sm-12 col-xs-12">
                                            <iframe width="100%" src="//www.youtube.com/embed/jpPClXWZfVw" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                        <div class="col col-md-6 col-sm-12 col-xs-12 col-md-offset-0">
                                            <iframe width="100%"  src="//www.youtube.com/embed/8BROJd8GqbA" frameborder="0" allowfullscreen></iframe>
                                        </div>

                                        <div class="col col-md-6 col-sm-12 col-xs-12">
                                            <iframe width="100%" src="//www.youtube.com/embed/wldFUrZ7B-Y" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                        <div class="col col-md-6 col-sm-12 col-xs-12 col-md-offset-0">
                                            <iframe width="100%"  src="//www.youtube.com/embed/abcRS9x1yHI" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                        
                                        <div class="col col-md-6 col-sm-12 col-xs-12">
                                            <iframe width="100%" src="//www.youtube.com/embed/F7pSQ-0Yf-U" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                        <div class="col col-md-6 col-sm-12 col-xs-12 col-md-offset-0">
                                            <iframe width="100%"  src="//www.youtube.com/embed/w9mS4CGGH38" frameborder="0" allowfullscreen></iframe>
                                        </div>


                                    </div>

                                </div>


                            </div>
                        </div><!--/.row-->
                    </section>



                    <section id="content1">
                        <div class="outer_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col col-md-9 col-sm-12 col-xs-12" style="background-color: #fff;">


                                        <div class="border-radius-images-bottom">
                                            <div class="testimonial">

                                                <div class="media testimonial-inner">

                                                    <!--<div class="media testimonial-inner" align="center">-->
                                                    <!--<a href="http://www.adb.org/"><img src = "<?php echo base_url('assets/themes/agency/img/adb.PNG'); ?>" width = "96"></a>&nbsp;&nbsp;-->
                                                    <a href="http://inter.mua.go.th/main2/index.php"><img src = "<?php echo base_url('assets/themes/agency/img/bics.jpg'); ?>" width = "90"></a>&nbsp;&nbsp;
                                                    <a href="http://www.britishcouncil.or.th/"><img src = "<?php echo base_url('assets/themes/agency/img/british.PNG'); ?>" width = "180"></a>



                                                    <a href="http://www.fulbrightthai.org//"><img src = "<?php echo base_url('assets/themes/agency/img/fulbright.PNG'); ?>" width = "120"></a>&nbsp;&nbsp;
                                                    <a href="http://www.idp.com/thailand/studyabroad"><img src = "<?php echo base_url('assets/themes/agency/img/idp.PNG'); ?>" width = "190"></a>&nbsp;&nbsp;
                                                    <a href="http://www.rihed.seameo.org/"><img src = "<?php echo base_url('assets/themes/agency/img/seamio.PNG'); ?>" width = "190"></a>&nbsp;&nbsp;

                                                    <br/>

                                                    <a href="http://www.aseanfoundation.org/"><img src = "<?php echo base_url('assets/themes/agency/img/af-logo.png'); ?>" height="40"></a>&nbsp;&nbsp;
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



                                    <div class="col col-md-2 col-sm-12 col-xs-12">	
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
                                </div>
                            </div><!--/.row-->
                        </div><!--/.container-->
                    </section>
                </div>
            </div>
        </div>
    </section>



    <?php $this->load->view('2015/includes/footer'); ?>


    <script type='text/javascript'>

        $(document).ready(function() {




            $('.carousel').carousel();

            $('#tab_contents').tabCollapse();
            $('#tab_calendar').tabCollapse();

            $('#tab_content2').load('<?php echo base_url('site/inter2015/data_list_found_in'); ?>');

        });


    </script>
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

    <script type="text/javascript">

        function get_cate() {
            var faction = '<?php echo base_url('site/inter2015/data_list_found_out'); ?>';
            var fdata = {
                page: 0
            };
            $('#calen_gen').html('');

            $.post(faction, fdata, function(rData) {
                $('#calen_gen').fadeIn('1200');
                $('#calen_gen').html(rData);
            });


            var faction = '<?php echo base_url('site/inter2015/data_list_found_in'); ?>';
            var fdata = {
                page: 0
            };
            $('#calen_ex').html('');
            $.post(faction, fdata, function(rData) {

                $('#calen_ex').html(rData);
            });


            var faction = '<?php echo base_url('site/inter2015/activity_menu'); ?>';
            var fdata = {
                page: 0
            };
            $('#activity_menu').html('');
            $.post(faction, fdata, function(rData) {
                $('#activity_menu').fadeIn('1200');
                $('#activity_menu').html(rData);
            });

        }
        $(document).ready(function() {


            get_cate();
            //pagination
            $('#page-selection_gen').bootpag({
                total: 4,
                maxVisible: 6
            }).on("page", function(event, /* page number here */ num) {
                var faction = '<?php echo base_url('site/inter2015/data_list_found_out'); ?>';
                var fdata = {
                    page: num
                };
                console.log(fdata);
                //$('#calen_gen').html('');
                $.post(faction, fdata, function(rData) {
                    $('#calen_gen').fadeOut('1200');
                    setTimeout(function() {
                        $('#calen_gen').html(rData);
                        $('#calen_gen').fadeIn('1200');
                    }, 200);
                });

                //console.log(fdata);
            });

            $('#page-selection_ex').bootpag({
                total: 3,
                maxVisible: 6
            }).on("page", function(event, /* page number here */ num) {
                var faction = '<?php echo base_url('site/inter2015/data_list_found_in'); ?>';
                var fdata = {
                    page: num
                };
                //$('#calen_ex').html('');
                $.post(faction, fdata, function(rData) {
                    $('#calen_ex').fadeOut('1200');
                    setTimeout(function() {
                        $('#calen_ex').html(rData);
                        $('#calen_ex').fadeIn('1200');
                    }, 200);

                });
            });




            $('#activity_page').bootpag({
                total: 10,
                maxVisible: 4
            }).on("page", function(event, /* page number here */ num) {
                var faction = '<?php echo base_url('site/inter2015/activity_menu'); ?>';
                var fdata = {
                    page: num
                };
                //$('#calen_gen').html('');
                $.post(faction, fdata, function(rData) {
                    $('#activity_menu').fadeOut('1200');
                    setTimeout(function() {
                        $('#activity_menu').html(rData);
                        $('#activity_menu').fadeIn('1200');
                    }, 200);
                });

                //console.log(fdata);
            });


        });// END READY
    </script>





