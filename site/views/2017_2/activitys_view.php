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

<!-- star row -->
<div class="gtco-section-overflow" >
   <div class="gtco-section2" data-section="home" id="gtco-services">
   <div class="thumbnail" style="background: transparent;">
         <div class="gtco-container">
         
            <div class="row">

               <!-- activity -->
               <div class="gtco-heading" style="margin-bottom: 2em; margin-top: 7em;">
                        <h2 class="gtco-left">
                            <?PHP echo $this->lang->line('titile_activity'); ?>
                        </h2>
                  </div>

               <div class="col-sm-12 col-lg-12" style="padding:0px;">
                <div class="row">


            <?php
            $i=0;
            foreach ($recData->result_array() as $row) {
              $id = $row['Nid'];
            ?> 
            <div class="col-md-3">
               <a href="<?php echo base_url('/site/inter2017_2/gallery/'.$id); ?>" class="gtco-card-item has-text" style="background-color: #FFF;">
                  <figure>
                     <div class="overlay"><i class="ti-plus"></i></div>
                     <img src="<?php echo $row['parth_img']; ?>" alt="Image" class="img-responsive">
                  </figure>
                  <div class="gtco-text text-left">
                     <p style="color: #ff5126;"><?php echo $row['title']; ?></p>
                     
                     <p><?php echo substr($row['Ntext'],0,300)."..."; ?></p>
                     
                     <p class="gtco-category"><?php echo $row['Ndate']; ?></p>
                  </div>
               </a>
            </div>
            <div class="clearfix visible-sm-block"></div>
            
        

            
            
            <?php
            $i++;
            if($i == 4){
              $i=0;
            ?>
            <div class="clearfix visible-lg-block visible-md-block"></div>
            <?php
            }
            }
            ?>

           
            

         </div>
               </div>
               <?php echo $this->pagination->create_links(); ?>
            </div>

         </div>


         </div>
   </div>
</div>
<!-- end row -->

<div class="gtco-section-overflow">
    
    <?php $this->
    load->view('2017_2/includes/footer');?>
</div>
</div>