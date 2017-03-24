<?php
defined('BASEPATH') or exit('No direct script access allowed');

$user_language = $this->
session->userdata('language');
$this->lang->load('contact_form_' . $user_language, $user_language);

$this->session->set_userdata('LASTURL', $this->uri->uri_string());
?>
<?php $this->
load->view('2017_2/includes/header');?>
<div class="gtco-loader">
</div>
<div id="page">

    <?php $this->
    load->view('2017_2/includes/navbar');?>

    <div class="gtco-section-overflow">

      <div class="gtco-section" id="gtco-services" data-section="passport">
         <div class="gtco-container">
            <div class="row">
               <div class="col-md-12 col-sm-12 animate-box fadeInLeft animated-fast" data-animate-effect="fadeInLeft">
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
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<div class="gtco-section-overflow">

    <?php $this->
    load->view('2017_2/includes/footer');?>
</div>
</div>