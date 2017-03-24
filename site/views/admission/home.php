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
        <div class="col-md-12">
            <!-- <div class="alert alert-danger">
                <span style=" font-size: 14px;">ลงทะเบียนใช้งานระบบ กองวิเทศสัมพันธ์ มหาวิทยาลัยราชภัฏเชียงราย <strong>(สำหรับนักศึกษาต่างชาติ)</strong> </span><br/>
                <small style="color:#000000; font-weight: bold;">*** กรุณากรอกข้อมูลให้ครบถ้วน</small>
            </div>   -->  
            <br><br>       
            <div class="panel panel-default" style="background-color: #f3f3f3;">
                <div class="panel-body">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified thumbnail">
                            <li id="li_step_1" class="active"><a href="#">
                                <h4 class="list-group-item-heading">Step 1</h4>
                                <p class="list-group-item-text"><strong>Admission</strong></p>
                            </a></li>
                            <li id="li_step_2"><a href="#">
                                <h4 class="list-group-item-heading">Step 2</h4>
                                <p class="list-group-item-text"><strong>Bio Data, Education background</strong></p>
                            </a></li>
                            <li id="li_step_3"><a href="#">
                                <h4 class="list-group-item-heading">Step 3</h4>
                                <p class="list-group-item-text"><strong>Finish</strong></p>
                            </a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--   panel input card number   -->
        <div class="col-md-12">  
            <!-- เลขประจำตัวประชาชน  -->
            <div class="alert alert-success">
                <span style=" font-size: 16px;">Register <strong>(for Foreign Students)</strong> </span><br/>
                <small style="color:#000000; font-weight: bold;">*** Please completely fill-in</small>
            </div>  
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Please Input Passport Number.</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3"> </div>
                        <div class="col-md-7" style=" padding-top:40px; padding-bottom:20px;">
                            <form class="form-horizontal" action="<?php echo site_url('site/admission/form_data');?>" method="post" name = "form1" id ="form1">

                                <div class="form-group has-success has-feedback " id="lb_citizen_id_1">

                                    <label for="inputEmail3" class="col-sm-3 control-label">Passport No.</label>
                                    <div class="col-sm-5">
                                     <input type="text" class="form-control" id="txt_citizen_id" name="txt_citizen_id" style=" font-size: 18px; font-weight: bold;" autocomplete="off" maxlength="13" onkeypress='validate(event)'>

                                 </div>
                                 <div class="col-sm-1">

                                   <a id="popover" class="btn fa fa-question-circle" rel="popover" data-content="" title="Example"></a>

                               </div>

                           </div>

                       </div>
                       <span class="label label-default" id="sp_citizen_id_1">Default</span>                                    
                   </div>




                   <div style=" text-align: center; padding-bottom:20px;">
                       <!--  <button type="button" class="btn btn-default" OnClick="clearBox();"> ยกเลิก</button> -->

                       <button type="button" class="btn btn-primary" OnClick="aaa();" name = "subtex" id = "subtex">Next Step </button>
                   </div>
               </form>
           </div>

       </div>

   </div>

   <!-- long footer -->
   <?php $this->load->view('admission/sub_footer'); ?>

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

                var faction = "<?php echo site_url('site/admission/select_passport'); ?>";
                var fdata = {
                    id: citizen_id
                };
                $.post(faction, fdata, function(jdata) {


                    if (jdata.is_successful) {
                       // $.pnotify({
                       //      title: 'Notify',
                       //      text: jdata.msg,
                       //      type: 'error',
                       //      history: false,

                       //  });

                       window.location.replace("<?php echo site_url('site/admission/edit_form/');?>/"+citizen_id);

                    }else{
                       document.getElementById('form1').submit();
                    }
                }, 'json');
               
                
            }
        }


    </script>