<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/navbar'); ?>
<?php $this->load->view('includes/sidebar'); ?>


<?php $this->load->view('includes2/header'); ?>

<section id="content">
    <div class="container">

        <div class="row">

          
            
            <div class="col-xs-12 col-sm-12 wow fadeInDown">
                <div class="border-radius-news-top"
                     <h2><b>ข่าว / ประกาศ </b></h2>
                </div>
                <div class="border-radius-news-bottom">                     
                    <div class="accordion">
                        <div class="panel-group" id="accordion1">

<?php
foreach ($recData->result_array() as $row) {
    ?>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#<?php echo $row['id']; ?>">
    <?php echo $row['title_th']; ?>
                                                <i class="fa fa-angle-right pull-right"></i>
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="<?php echo $row['id']; ?>" class="panel-collapse collapse">
                                        <div class="panel-body">
    <?php echo $row['title_th']; ?>
                                             <hr width="100%">
                                            <p align="right">วันที่ : <?php echo $row['Ddate']; ?> || <a href="http://crruinter.crru.ac.th/news_data.php?new_id=<?php echo $row['id']?>&c=1">อ่านต่อ..</a></p>
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