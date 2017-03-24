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
            <div class="alert alert-success">
                <span style=" font-size: 16px;">Register <strong>(for Foreign Students)</strong> </span><br/>
                <small style="color:#000000; font-weight: bold;">*** Finish</small>
            </div>           
            <div class="panel panel-default" style="background-color: #f3f3f3;">
                <div class="panel-body">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified thumbnail">
                            <li id="li_step_1" ><a href="#">
                                    <h4 class="list-group-item-heading">Step 1</h4>
                                    <p class="list-group-item-text"><strong>Admission</strong></p>
                                </a></li>
                            <li id="li_step_2"><a href="#">
                                    <h4 class="list-group-item-heading">Step 2</h4>
                                    <p class="list-group-item-text"><strong>Bio Data, Education background</strong></p>
                                </a></li>
                            <li id="li_step_3" class="active"><a href="#">
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">บันทึกข้อมูลการลงทะเบียนเรียบร้อยแล้ว</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4"> </div>
                        <div class="col-md-4" style=" padding:40px;">
                                <form action="main1.php" method="post">

                                    <div class="form-group has-success has-feedback text-center" id="lb_citizen_id_1" >
                                        <i class="fa fa-check-circle fa-5x" aria-hidden="true" style="color: green;"></i>

                                       
                                                                            
                                    </div>
                                    <div class="form-group has-success has-feedback" id="lb_citizen_id_1">
                                        <label class="control-label" for="txt_citizen_id">Name : </label> <?PHP echo $name; ?>
                                        <br>
                                        <label class="control-label" for="txt_citizen_id">Passport Number : </label> <?PHP echo $passport_id;?>
                                         <br>
                                        <label class="control-label" for="txt_citizen_id">Study : </label> <?PHP echo $subject; ?>
                                         <br>
                                        <label class="control-label" for="txt_citizen_id">Faculty : </label> <?PHP echo $major; ?>
                                         <br>
                                        <label class="control-label" for="txt_citizen_id">Stedent Type : </label> <?PHP echo $type_std_id; ?>
                                       
                                                                            
                                    </div>
									<!-- <div class="form-group has-success has-feedback" id="lb_citizen_id_1">
                                        <label class="control-label" for="txt_citizen_id">Passport Number : </label> <?PHP echo $passport_id ?>
                                                                           
                                    </div> -->
                                    <div>

                                        <small style="color:#FF0000; font-weight: bold;">*** </small>
                                    </div>
                                    <div style=" text-align: center;">
                                        <br>
                                        <button type="button" class="btn btn-primary" onclick="blackStepOne();">Finish </button>
                                    </div>
                                </form>
                                                        </div>
                        <div class="col-md-4"> </div>
                    </div>
                </div>
            </div>
            
        </div>
</div>
</div>  
<?php $this->load->view('admission/includes/footer'); ?>
<script>
$(document).ready(function() {
    $("#li_step_1").addClass("active");
    $("#li_step_2").addClass("active");
  
    
    $("#txt_citizen_id").focus();
    $("#sp_citizen_id_1").hide(); //span show citizen_id_1
    
    $('#txt_citizen_id').keyup(function(e) {
        var citizen_id = $('#txt_citizen_id').val();
            if (citizen_id.length > 9) {
                bootbox.alert("หมายเลขหนังสือเดินทาง ไม่ถูกต้อง");
            }
    });
});

function clearBox(){
    $("#txt_citizen_id").val('');
    $("#txt_citizen_id").focus();
}
function blackStepOne(){
        // bootbox.confirm("คุณแน่ในว่าได้จดจำหรือบันทึก username และ password เรียบร้อยแล้ว ข้อมูลนี้จะสูญหายไป!", function(ans) {       
        //     if (ans) {
              window.location='<?php echo site_url('site/admission/');?>';
            // }
        // });
    }
</script>