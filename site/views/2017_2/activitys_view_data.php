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
          <div class="col-md-12 col-sm-12">
            <div class="row">

               <!-- activity -->
               <div class="gtco-heading" style="margin-bottom: 2em; margin-top: 7em;">
                        <h3 class="gtco-left">
                            <?PHP echo $data['title']; ?>
                        </h3>
                        <p><?PHP echo $data['Ntext']; ?></p>
                  </div>

               <div class="col-sm-12 col-lg-12" style="padding:0px;">
                <div class="row">


            <?php
            foreach ($activity as $row) {
            ?> 
            
           
          <div class="col-md-3">
            <a href="<?php echo $row['parth_img']; ?>" class="gtco-card-item image-popup" title="<?php echo $row['parth_img']; ?>">
              <figure>
                <div class="overlay"><i class="ti-plus"></i></div>
                <img src="<?php echo $row['parth_img']; ?>" alt="Image" class="img-responsive">
              </figure>
            </a>
          </div>

            <?php
            
            }
            ?>

           
            

         </div>
               </div>
               <!--  -->
               </div>
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