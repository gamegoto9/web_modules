<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/navbar'); ?>
<?php //$this->load->view('includes/sidebar'); ?>


<?php $this->load->view('includes2/header'); ?>

<br><br><br><br><br><br>
<section id="content">
    <div class="container">

        <div class="row">


            <div class="col-xs-12 col-sm-12 wow fadeInDown">
                <div class="border-radius-activity-top"
                     <h2>กิจกรรม</h2>
                    <!--<p align="right"><a href="<?php echo site_url().'/site/dashboard/list_activity'; ?>">++ ดูทั้งหมด ++</a></p>-->
                </div>
                <div class="border-radius-activity-bottom">                     
                    <div class="accordion">
                        <div class="panel-group" id="accordion2">

<?php
foreach ($recData->result_array() as $row) {
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
                        </div><!--/#accordion1-->
                    </div>
                </div>
            </div>


         
        </div><!--/.row-->
         <?php echo $this->pagination->create_links(); ?>
    </div><!--/.container-->
</section><!--/#content-->
<?php $this->load->view('includes/footer'); ?>