<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$user_language = $this->session->userdata('language');
$this->lang->load('contact_form_' . $user_language, $user_language);

$this->session->set_userdata('LASTURL', $this->uri->uri_string());
?>




<?php $this->load->view('admission/includes/header'); ?>


<div class="container" style=" margin-top: 60px;">
  <div class="row" style="border-top-color: #CCC;">    
    <!--   panel step   -->
    <div class="col-md-3">
            <!-- <div class="alert alert-danger">
                <span style=" font-size: 14px;">ลงทะเบียนใช้งานระบบ กองวิเทศสัมพันธ์ มหาวิทยาลัยราชภัฏเชียงราย <strong>(สำหรับนักศึกษาต่างชาติ)</strong> </span><br/>
                <small style="color:#000000; font-weight: bold;">*** กรุณากรอกข้อมูลให้ครบถ้วน</small>
              </div>   -->  
              <br><br>       
              <div class="panel panel-default" style="background-color: #f3f3f3;">
                <div class="panel-body">
                  <div class="col-xs-12 thumbnail">
                    <div class="col-sm-12" style=" text-align: center; padding-top:20px;">
                     <input type="text" class="form-control" id="txt_citizen_id" name="txt_citizen_id" style=" font-size: 18px; font-weight: bold;" autocomplete="off" maxlength="13" onkeypress='validate(event)' placeholder="Passport Number">

                   </div>
                   <div style=" text-align: center; padding-bottom:20px; padding-top:20px;">
                     <!--  <button type="button" class="btn btn-default" OnClick="clearBox();"> ยกเลิก</button> -->

                     <button type="button" class="btn btn-primary" OnClick="aaa();" name = "subtex" id = "subtex"><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <!--   panel input card number   -->

           <div class="col-md-9">
            <!-- <div class="alert alert-danger">
                <span style=" font-size: 14px;">ลงทะเบียนใช้งานระบบ กองวิเทศสัมพันธ์ มหาวิทยาลัยราชภัฏเชียงราย <strong>(สำหรับนักศึกษาต่างชาติ)</strong> </span><br/>
                <small style="color:#000000; font-weight: bold;">*** กรุณากรอกข้อมูลให้ครบถ้วน</small>
              </div>   -->  
              <br><br>       
              <div class="panel panel-default" style="background-color: #ffffff;">
                <div class="panel-body">
                  <div class="col-xs-12">

                    <!--  <button type="button" class="btn btn-default" OnClick="clearBox();"> ยกเลิก</button> -->
                    <div class="panel panel-default" style="background-color: #FFFFFF;">
                     <div class="panel-heading" style="background-color: #ffddab; color: #333">
                      <span class="panel-title"><i class="fa fa-users" aria-hidden="true"></i> Data Result --*</span>
                    </div>
                    <div class="panel-body">
                      <div id="divshow"></div>
                    </div>
                  </div>
                  <!-- </div> -->



                </div>
              </div>
            </div>
          </div>

          <!--  end -->

        </div>
        <div class="row">
        <!-- long footer -->
        <div class="col-md-12">
          <style>
      /*=========================
      Icons
      ================= */

      /* footer social icons */
      ul.social-network {
        list-style: none;
        display: inline;
        margin-left:0 !important;
        padding: 0;
      }
      ul.social-network li {
        display: inline;
        /*                            margin: 0 5px;*/
        margin: 0 25px;
      }


      /* footer social icons */
      .social-network a.icoReg , .social-network a.icoReg:hover {
        background-color: #fe5722;
      }
      .social-network a.icoSnk , .social-network a.icoSnk:hover {
        background-color:#4cb050;
      }
      .social-network a.icoLoan , .social-network a.icoLoan:hover {
        background-color:#ff9801;
      }
      .social-network a.icoAso , .social-network a.icoAso:hover {
        background-color:#9c28b1;
      }
      .social-network a.icoFacebook , .social-network a.icoFacebook:hover {
        background-color:#3b5998;
      }
      .social-network a.icoUser , .social-network a.icoUser:hover {
        /*background-color:#fdfd96;*/
        background-color:#2d2d2d;
      }
      .social-network a.icoReg:hover i, .social-network a.icoSnk:hover i, .social-network a.icoLoan:hover i,
      .social-network a.icoAso:hover i, .social-network a.icoFacebook:hover i, .social-network a.icoUser:hover i{
        color:#fff;
      }
      a.socialIcon:hover, .socialHoverClass {
        color:#44BCDD;
      }

      .social-circle li a {
        display:inline-block;
        position:relative;
        margin:0 auto 0 auto;
        -moz-border-radius:50%;
        -webkit-border-radius:50%;
        border-radius:50%;
        text-align:center;
        /*                                    width: 50px;
        height: 50px;
        font-size:20px;*/
        width: 100px;
        height: 100px;
        font-size:40px;
      }
      .social-circle li i {
        margin:0;
        /*                                    line-height:50px;*/
        line-height:100px;
        text-align: center;
      }

      .social-circle li a:hover, .triggeredHover {
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -ms--transform: rotate(360deg);
        transform: rotate(360deg);
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
        -o-transition: all 0.2s;
        -ms-transition: all 0.2s;
        transition: all 0.2s;
      }
      .social-circle li a {
        color: #fff;
        -webkit-transition: all 0.8s;
        -moz-transition: all 0.8s;
        -o-transition: all 0.8s;
        -ms-transition: all 0.8s;
        transition: all 0.8s;
      }

      /*                        .social-network a {
      background-color: #D3D3D3;
    }*/
  </style>

  <div class="row">
    <div class="col-sm-12 text-center">

      <!--?//php echo site_url(); ?-->
      <!--                            <p  style="border-bottom: solid #eee 1px;"></p>-->
      <ul class="social-network social-circle">

        <li><a href="<?php echo site_url('site/admission/'); ?>" class="icoSnk" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="List Data Admission"><i class="fa fa-user-plus"></i></a></li>

        <li><a href="http://www.crru.ac.th" class="icoLoan" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Chiang Rai Rajabhat University"><i class="fa fa-university"></i></a></li>

        <li><a href="http://crruinter.crru.ac.th" class="icoReg" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="International Affair"><i class="fa fa-users"></i></a></li>

        <li><a href="https://www.facebook.com/CRRUINTER.TH/" class="icoFacebook" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>

        

        



      </ul>
    </div>

    <style>
      @keyframes cf3FadeInOut {
        0% {
          opacity:1;
        }
        45% {
          opacity:1;
        }
        55% {
          opacity:0;
        }
        100% {
          opacity:0;
        }
      }

      #cf3 img.top {
        animation-name: cf3FadeInOut;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-duration: 10s;
        animation-direction: alternate;
      }

      /*-----------------*/
      #cf3 {
          /*  height:281px;
          width:450px;
          margin:0 auto;*/
          /*                            position:relative;*/
          padding-bottom: 250px;
        }
        #cf3 img {
          position:absolute;
          left:0;
          -webkit-transition: opacity 1s ease-in-out;
          -moz-transition: opacity 1s ease-in-out;
          -o-transition: opacity 1s ease-in-out;
          transition: opacity 1s ease-in-out;

          -moz-border-radius:50%;
          -webkit-border-radius:50%;
          border-radius:50%;
          width: 250px;
          height: 250px;
        }


      </style>
        <!--    <div class="col-sm-3">
        <div id="cf3">
        <img class="bottom" src="http://reg2.crru.ac.th/admission_web/assets/themes/font_end/img/IMG_1.jpg"/>
        <img class="top" src="http://reg2.crru.ac.th/admission_web/assets/themes/font_end/img/IMG_2.jpg"/>
      </div>
    </div>-->
  </div>
</div>

</div>

</div>


<br><br>

</div>
</div>
</div>  
<?php $this->load->view('admission/includes/footer'); ?>
<script>



            //Bind keypress event to document
            $(document).keypress(function(event){


              var keycode = (event.keyCode ? event.keyCode : event.which);
              if(keycode == '13'){
                aaa();

              }


              event.stopPropagation();
            });



            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
              event.preventDefault();
              $(this).ekkoLightbox();
            });


            $(document).ready(function() {
              $("#li_step_2").addClass("disabled");
              $("#li_step_3").addClass("disabled");


              $("#txt_citizen_id").focus();
                $("#sp_citizen_id_1").hide(); //span show citizen_id_1



                $('[data-toggle="popover"]').popover()

                $('[data-toggle="tooltip"]').tooltip();



                var image = '<a href="<?php echo base_url('assets/themes/student/images/passportNo.JPG');?>" data-toggle="lightbox"><img src="<?php echo base_url('assets/themes/student/images/passportNo.JPG');?>" width="200"></a>';

                $('#popover').popover({placement: 'right', content: image, html: true});

              });



            function validate(evt) {
              var theEvent = evt || window.event;
              var key = theEvent.keyCode || theEvent.which;
              key = String.fromCharCode( key );
              var regex = /[A-Z0-9]|\./;
              if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
              }
            }



            function clearBox(){
              $("#txt_citizen_id").val('');
              $("#txt_citizen_id").focus();
            }

            function aaa(){
              console.log("aaa");
              var citizen_id = $('#txt_citizen_id').val();
              if (citizen_id.length == 0 || citizen_id.length < 9) {
               bootbox.alert("Please Input Passport No.");
             }else{


               $('#divshow').load('<?php echo site_url('site/admission/data_users/'); ?>/'+citizen_id);   
             }
           }


         </script>