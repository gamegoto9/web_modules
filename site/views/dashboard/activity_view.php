<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/navbar'); ?>



<?php $this->load->view('includes2/header'); ?>

<link href="<?php echo base_url('assets/themes/lightbox/lightbox/css/lightbox.css'); ?>"rel="stylesheet" type="text/css">
<br><br><br><br><br><br>
<section id="content">
    <div class="container">  
        <div class="row">
            <div class="col-xs-12 col-sm-12 wow fadeInDown">
                <div class="border-radius-images-top"
                     <h2><font color="#FFF">ภาพบรรยากาศ</font></h2>
                </div>

                <div class="border-radius-images-bottom">
                    <div class="testimonial">

                        <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="media">



                                <div class="media-body">

                                    <?php
                                    foreach ($data as $row) {
                                        ?>

                                        <b><?php echo $row['title']; ?></b>

                                        <br><br>

                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['Ntext']; ?>

                                        <?php
                                    }
                                    ?>   

                                </div>
                                <hr width="100%" color="#000">
                                <p align="right">วันที่ : <?php echo $row['Ndate']; ?></p>
                            </div><!--/.media -->

                        </div>                     
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 wow fadeInDown">


                <div class="border-radius-images-bottom">
                    <div class="testimonial">

                        <div class="media testimonial-inner">

                            <?php
                            foreach ($activity as $row) {
                                ?>

                                <a href="<?php echo $row['parth_img']; ?>" data-lightbox="roadtrip"><img src="<?php echo $row['parth_img']; ?>" width="280px"></a>

                                <?php
                            }
                            ?>

                        </div>                       
                    </div>
                </div>
            </div>


        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#content-->


<script src="<?php echo base_url('assets/themes/lightbox/lightbox/js/lightbox.min.js'); ?>"></script>
<?php $this->load->view('includes/footer'); ?>