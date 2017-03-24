<?php
defined('BASEPATH') or exit('No direct script access allowed');

$user_language = $this->
session->userdata('language');
$this->lang->load('contact_form_' . $user_language, $user_language);

$this->session->set_userdata('LASTURL', $this->uri->uri_string());
?>
<!DOCTYPE html>
<!--
 * A Design by GraphBerry
 * Author: GraphBerry
 * Author URL: http://graphberry.com
 * License: http://graphberry.com/pages/license
-->
<html lang="en">

    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="CRRU,KM CRRU,KM,Knoledge Management,Knoledge Management CRRU International Affairs,บุคลากร,personal,เจ้าหน้าที่,กองวิเทศสัมพันธ์ มหาวิทยาลัยราชภัฏเชียงราย,วิเทศสัมพันธ์,ราชภัฏเชียงราย,เชียงราย,international affair division">
        <meta name="author" content="CRRU,KM,KM CRRU,Knoledge Management CRRU International Affairs.,Knoledge Management,บุคลากร,personal,เจ้าหน้าที่,กองวิเทศสัมพันธ์ มหาวิทยาลัยราชภัฏเชียงราย,วิเทศสัมพันธ์,ราชภัฏเชียงราย,เชียงราย,international affair division">

        <title>Knoledge Management CRRU International Affairs.</title>

        <?php $this->load->view('includes3/header'); ?>
        
        <link href="<?php echo base_url('assets/themes/pluton/css/style2.css'); ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/themes/pluton/js/jquery.cslider.js');?>"></script>
        <!--<script type="text/javascript" src="<?php echo base_url('assets/js/angular.min.js'); ?>"></script>-->
    </head>
    <?php

    function cutStr($str, $maxChars = '', $holder = '') {       
        if (strlen($str) > $maxChars) {        
            $str = iconv_substr($str, 0, $maxChars, "UTF-8") . $holder;      
        }   
        return $str;
    }
    ?>
    
    <body>

<?php $this->load->view('includes3/navbar'); ?>


        <div class="section secondary-section " id="portfolio">
            <div class="triangle"></div>
            <div class="container">
                <div class=" title">
                    <h1>Knowledge Management CRRU International Affairs.</h1>
                    <!--<p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p>-->
                </div>
                <!--                <ul class="nav nav-pills">
                                    <li class="filter" data-filter="all">
                                        <a href="#noAction">All</a>
                                    </li>
                                    <li class="filter" data-filter="web">
                                        <a href="#noAction">Web</a>
                                    </li>
                                    <li class="filter" data-filter="photo">
                                        <a href="#noAction">Photo</a>
                                    </li>
                                    <li class="filter" data-filter="identity">
                                        <a href="#noAction">Identity</a>
                                    </li>
                                </ul>
                                 Start details for portfolio project 1 -->
                <div id="single-project">
                    <?php
                    foreach ($km as $row) {
                        ?>    
                        <div id="<?php echo $row['km_id']; ?>" class="toggleDiv row-fluid single-project">
                            <div class="span6">
                                <img src="<?php echo $row['img']; ?>" alt="project 1" />
                            </div>
                            <div class="span6">
                                <div class="project-description">
                                    <div class="project-title clearfix">


                                        <h3><?php echo $row['name_km']; ?></h3>
                                        <span class="show_hide close">
                                            <i class="icon-cancel"></i>
                                        </span>
                                    </div>
                                    <div class="project-info">

                                        <div>
                                            <span>Date</span><?php echo $row['Ddate']; ?></div>

                                        <div>
                                            <span>Link</span><a href="<?php echo $row['file_km']; ?>"><button type="button" class="btn btn-warning">OPEN</button></a></div>
                                    </div>
                                    <p><?php echo $row['sub_km']; ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- End details for portfolio project 1 -->
                        <?php
                    }
                    ?>

                    <ul id="portfolio-grid" class="thumbnails row">
                        <?php
                        foreach ($km as $row) {
                            
                            $detail_name = $row['name_km'];
                            $detail_sub_name = cutStr($detail_name,'30','...');
                            
                            
                            $detail = $row['sub_km'];
                            $detail_sub = cutStr($detail,'40','...');
                            ?> 
                            <li class="span4 mix web">
                                <div class="thumbnail">
                                    <img src="<?php echo $row['img']; ?>" alt="project 1">
                                    <a href="#single-project" class="more show_hide" rel="#<?php echo $row['km_id']; ?>">
                                        <i class="icon-plus"></i>
                                       
                                    </a>
                                    <h3><?php echo $detail_sub_name; ?></h3>
                                   
                                    <div class="mask">
                                         <p>เรื่อง : <?php echo $detail_name; ?></p>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>



    </div>
</div>
<!-- Contact section edn -->
<!-- Footer section start -->
<div class="footer">
    <p>&copy; 2015 Theme by <a href="http://www.graphberry.com">GraphBerry</a>, <a href="http://crruinter.crru.ac.th">CRRU International Affairs Divisions.</a></p>
</div>
<!-- Footer section end -->
<!-- ScrollUp button start -->
<div class="scrollup">
    <a href="#">
        <i class="icon-up-open"></i>
    </a>
</div>
<!-- ScrollUp button end -->

 <!--<script type="text/javascript" src="<?php echo base_url('assets/js/a.js'); ?>"></script>-->
</body>
</html>