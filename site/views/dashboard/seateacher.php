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
        <meta name="description" content="CRRU,SEA TEACHER CRRU,SEA TEACHER,,กรอบความร่วมมือ,,กองวิเทศสัมพันธ์ มหาวิทยาลัยราชภัฏเชียงราย,วิเทศสัมพันธ์,ราชภัฏเชียงราย,เชียงราย,international affair division">
        <meta name="author" content="CRRU,SEA TEACHER CRRU,SEA TEACHER,CRRU International Affairs,กรอบความร่วมมือ,,กองวิเทศสัมพันธ์ มหาวิทยาลัยราชภัฏเชียงราย,วิเทศสัมพันธ์,ราชภัฏเชียงราย,เชียงราย,international affair division">

        <title>SEA TEACHER :: CRRU International Affairs.</title>

        <?php $this->load->view('includes3/header'); ?>
        <link href="<?php echo base_url('assets/themes/pluton/css/style_gms.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/themes/pluton/css/jquery.cslider_gms.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/themes/pacharawan/css/prettyPhoto.css'); ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/themes/pluton/js/jquery.cslider_gms.js'); ?>"></script>
        <script src="<?php echo base_url('assets/themes/pacharawan/js/jquery.prettyPhoto.js'); ?>"></script>
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
    <style>
        .navbar-inner {
            background: #238eec;
            border-radius: 0;
            filter: none;
            border: none;
            box-shadow: none;
        }
        .footer {
            background: #238eec;
            text-align: center;
        }
    </style>

    <body>

        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand centered">
                        <!-- This is website logo -->
                        <!--<img src="<?php echo base_url('assets/themes/pluton/images/gms/logo.png'); ?>" width="10">-->
                        <br/>
                        <img src="<?php echo base_url('assets/sea teacher/sea-lo.png'); ?>" alt="image01" width="100px" >
                        <font color="#000" size="5.5"><b>CRRU-SEA TEACHER</b></font>
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right color5">
                        <ul class="nav" id="top-navigation">
                            <li><a href="<?php echo site_url() . '/site/inter2015/'; ?>">หน้าแรก</a></li>                                                      
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>


        <script src="<?php echo base_url('assets/themes/pluton/js/jssor.slider-21.1.5.min.js'); ?>"></script>
        <!-- use jssor.slider-21.1.5.debug.js instead for debug -->
        <script>
            jssor_1_slider_init = function() {

                var jssor_1_SlideoTransitions = [
                    [{b: 5500, d: 3000, o: -1, r: 240, e: {r: 2}}],
                    [{b: -1, d: 1, o: -1, c: {x: 51.0, t: -51.0}}, {b: 0, d: 1000, o: 1, c: {x: -51.0, t: 51.0}, e: {o: 7, c: {x: 7, t: 7}}}],
                    [{b: -1, d: 1, o: -1, sX: 9, sY: 9}, {b: 1000, d: 1000, o: 1, sX: -9, sY: -9, e: {sX: 2, sY: 2}}],
                    [{b: -1, d: 1, o: -1, r: -180, sX: 9, sY: 9}, {b: 2000, d: 1000, o: 1, r: 180, sX: -9, sY: -9, e: {r: 2, sX: 2, sY: 2}}],
                    [{b: -1, d: 1, o: -1}, {b: 3000, d: 2000, y: 180, o: 1, e: {y: 16}}],
                    [{b: -1, d: 1, o: -1, r: -150}, {b: 7500, d: 1600, o: 1, r: 150, e: {r: 3}}],
                    [{b: 10000, d: 2000, x: -379, e: {x: 7}}],
                    [{b: 10000, d: 2000, x: -379, e: {x: 7}}],
                    [{b: -1, d: 1, o: -1, r: 288, sX: 9, sY: 9}, {b: 9100, d: 900, x: -1400, y: -660, o: 1, r: -288, sX: -9, sY: -9, e: {r: 6}}, {b: 10000, d: 1600, x: -200, o: -1, e: {x: 16}}]
                ];

                var jssor_1_options = {
                    $AutoPlay: true,
                    $SlideDuration: 800,
                    $SlideEasing: $Jease$.$OutQuint,
                    $CaptionSliderOptions: {
                        $Class: $JssorCaptionSlideo$,
                        $Transitions: jssor_1_SlideoTransitions
                    },
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$
                    },
                    $BulletNavigatorOptions: {
                        $Class: $JssorBulletNavigator$
                    }
                };

                var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                //responsive code begin
                //you can remove responsive code if you don't want the slider scales while window resizing
                function ScaleSlider() {
                    var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                    if (refSize) {
                        refSize = Math.min(refSize, 1920);
                        jssor_1_slider.$ScaleWidth(refSize);
                    }
                    else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }
                ScaleSlider();
                $Jssor$.$AddEvent(window, "load", ScaleSlider);
                $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                //responsive code end
            };
        </script>

        <style>

            /* jssor slider bullet navigator skin 05 css */
            /*
            .jssorb05 div           (normal)
            .jssorb05 div:hover     (normal mouseover)
            .jssorb05 .av           (active)
            .jssorb05 .av:hover     (active mouseover)
            .jssorb05 .dn           (mousedown)
            */
            .jssorb05 {
                position: absolute;
            }
            .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
                position: absolute;
                /* size of bullet elment */
                width: 16px;
                height: 16px;
                background: url('img/b05.png') no-repeat;
                overflow: hidden;
                cursor: pointer;
            }
            .jssorb05 div { background-position: -7px -7px; }
            .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
            .jssorb05 .av { background-position: -67px -7px; }
            .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

           
            .jssora22l, .jssora22r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 40px;
                height: 58px;
                cursor: pointer;
                background: url('img/a22.png') center center no-repeat;
                overflow: hidden;
            }
            .jssora22l { background-position: -10px -31px; }
            .jssora22r { background-position: -70px -31px; }
            .jssora22l:hover { background-position: -130px -31px; }
            .jssora22r:hover { background-position: -190px -31px; }
            .jssora22l.jssora22ldn { background-position: -250px -31px; }
            .jssora22r.jssora22rdn { background-position: -310px -31px; }
        </style>


        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
            </div>
            <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">

                <div data-p="555.00" style="display: none;">
                    <img src="<?php echo base_url('assets/sea teacher/teaching in thailand_98481.jpg'); ?>" alt="image01" >
                </div>
                <div data-p="225.00" data-po="80% 55%" style="display: none;">
                    <img src="<?php echo base_url('assets/sea teacher/teaching in thailand_14351.jpg'); ?>" alt="image01" >
                </div>
                <div data-p="225.00" data-po="80% 55%" style="display: none;">
                    <img src="<?php echo base_url('assets/sea teacher/teaching in thailand_86761.jpg'); ?>" alt="image01" >
                </div>
               

            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
                <!-- bullet navigator item prototype -->
                <div data-u="prototype" style="width:16px;height:16px;"></div>
            </div>
            <!-- Arrow Navigator -->
            <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
            <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
        </div>
        <script>
            jssor_1_slider_init();
        </script>



        <div class="section secondary-section " id="portfolio">

            <div class="container">

                <div class=" title">

                    <img src="<?php echo base_url('assets/sea teacher/sea-lo.png'); ?>" alt="image01" width="10%" >
                     <p> <img src="<?php echo base_url('assets/sea teacher/sea.png'); ?>" alt="image01" width="30%" ></p>


                </div>




                <div class="row-fluid">
                    <div class="span8">
                        <p><b><dd>In October 2014, the Southeast Asian Ministers of Education through the SEAMEO Council has issued seven priority areas for SEAMEO to work together to improve the quality of education in Southeast Asia.  “Revitalizing Teacher Education” is one of the priority areas in achieving quality education in the region. In order to fulfill this mandate, the SEAMEO Secretariat has embarked on a project titled, “Pre-Service Student Teacher Exchange in Southeast Asia (SEA-Teacher Project)”.  The project aims to provide opportunity for pre-service student teachers from universities in Southeast Asia to do their practicum (teaching experiences) in schools in other countries in Southeast Asia.  

On 9 October 2015, eleven universities from Indonesia, Thailand and Vietnam met and signed an agreement for the exchange of pre-service student teacher, starting the 1st batch in January 2016. The exchange is for student whose major are in math, science, English and pre-school. The duration is for one month and based on the mechanism of cost sharing basis. Students roles and responsibilities are assigned weekly during the one month period. Moreover, the host universities will provide mentors to supervise and monitor the students throughout the practicum period.<dd></b></p>
                    </div>

                    <div class="span4">
                        <!--                    <div class="testimonial">
                                                <p>"I've worked too hard and too long to let anything stand in the way of my goals. I will not let my teammates down and I will not let myself down."</p>
                                                <div class="whopic">
                                                    <div class="arrow"></div>
                                                    <img src="images/Client1.png" class="centered" alt="client 1">
                                                    <strong>John Doe
                                                        <small>Client</small>
                                                    </strong>
                                                </div>
                                            </div>
                        -->








                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="sub-section">

                            <ul class="row client-slider" id="clint-slider">
                                <li>
                                    <a class="preview" href="<?php echo base_url("assets/themes/pluton/images/gms/19120390443_4f250254ee_z.jpg"); ?>" rel="prettyPhoto">
                                        <img src="<?php echo base_url("assets/sea teacher/teaching in thailand_9848.jpg"); ?>"class="img-responsive" width="400" hidden="200" alt="client logo 1">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo base_url("assets/sea teacher/teaching in thailand_9639.jpg"); ?>" width="400" hidden="200" alt="client logo 1">
                                    </a>
                                </li>

                                <li>
                                    <a href="">
                                        <img src="<?php echo base_url("assets/sea teacher/teaching in thailand_9848.jpg"); ?>" width="400" hidden="200" alt="client logo 1">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo base_url("assets/sea teacher/teaching in thailand_8676.jpg"); ?>" width="400" hidden="200" alt="client logo 1">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo base_url("assets/sea teacher/teaching in thailand_7874.jpg"); ?>" width="400" hidden="200" alt="client logo 1">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo base_url("assets/sea teacher/teaching in thailand_7843.jpg"); ?>" width="400" hidden="200" alt="client logo 1">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo base_url("assets/sea teacher/teaching in thailand_7224.jpg"); ?>" width="400" hidden="200" alt="client logo 1">
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="">
                                        <img src="<?php echo base_url("assets/sea teacher/teaching in thailand_7184.jpg"); ?>" width="400" hidden="200" alt="client logo 1">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo base_url("assets/sea teacher/teaching in thailand_6636.jpg"); ?>" width="400" hidden="200" alt="client logo 1">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo base_url("assets/sea teacher/teaching in thailand_6393.jpg"); ?>" width="400" hidden="200" alt="client logo 1">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo base_url("assets/sea teacher/teaching in thailand_6282.jpg"); ?>" width="400" hidden="200" alt="client logo 1">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo base_url("assets/sea teacher/teaching in thailand_6226.jpg"); ?>" width="400" hidden="200" alt="client logo 1">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo base_url("assets/sea teacher/teaching in thailand_6007.jpg"); ?>" width="400" hidden="200" alt="client logo 1">
                                    </a>
                                </li>
                            </ul><br/><br/>
                            <div class="title clearfix">
                                <div class="pull-left">
                                    <h3></h3>
                                </div>
                                <ul class="client-nav pull-right">
                                    <li id="client-prev"></li>
                                    <li id="client-next"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>



    </div>
</div>
<!-- Contact section edn -->
<!-- Footer section start -->
<div class="footer">
    <p>&copy; 2015 Theme by <a href="http://www.graphberry.com">GraphBerry</a>, <a href="http://crruinter.crru.ac.th"><b><font color="#000">CRRU Division of International Affairs.</font></b></a></p>
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