
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$user_language = $this->session->userdata('language');
$this->lang->load('contact_form_' . $user_language, $user_language);

$this->session->set_userdata('LASTURL', $this->uri->uri_string());
?>


<style type="text/css">

   input[type="radio"] + div {
       height: 20px;
       width: 20px;
       display: inline-block;
       cursor: pointer;
       vertical-align: middle;
       background: #FFF;
       border: 1px solid #d2d2d2;
       border-radius: 100%;
   } 

   input[type="radio"] + div:hover {
    border-color: #c2c2c2;
}
input[type="radio"]:checked + div {
    background:gray;
}


</style>

<?php $this->load->view('admission/includes/header'); ?>

<div class="container" style=" margin-top: 60px;">
    <div class="row" style="border-top-color: #CCC;">    
        <!--   panel step   -->
        <div class="col-md-12">
            <div class="alert alert-danger">
                <span style=" font-size: 16px;">Register <strong>(for Foreign Students)</strong> </span><br/>
                <small style="color:#000000; font-weight: bold;">*** Please completely fill-in</small>
            </div>  


            
        </div>
    </div>


    <form data-toggle="validator" role="form" name="form1" id="form1" action="<?php echo site_url('site/admission/edit_adminssion');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="row">
            <!--   panel input card number   -->
            <div class="col-md-12">  
                <!--   ประวัติส่วนตัว     -->
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #FFCC66; color: #000000;">
                        <span class="panel-title"> Personal Information </span>
                    </div>
                    <div class="panel-body" style="padding:20px;">
                        <div class="form-horizontal">


                           <div class="form-group">
                            <label for="citizen_id" class="col-sm-3 control-label"><span style="color:red">*</span>Passport Number :</label>
                            <div class="col-sm-3">


                                <input type="text" class="form-control" id="citizen_id" name="citizen_id" value="<?php echo $passport_id; ?>" autocomplete="off" readonly="readonly">




                            </div>
                        </div>

                        <div class="form-group">
                            <label for="std_pname_id" class="col-sm-3 control-label"><span style="color:red">*</span> Title :</label>
                            <div class="col-sm-2">
                                <select id="title" name="title" class="form-control">

                                    <option value="Mr">Mr.</option>
                                    <option value="Miss">Miss.</option>
                                    <option value="Mrs">Mrs.</option>
                                    <option value="Ms">Ms.</option>
                                    <option value="Dr">Dr.</option>

                                </select>
                            </div>
                            <!-- <div class="col-sm-1">

                               <a id="popover" class="btn fa fa-question-circle" rel="popover" data-content="" title="Example"></a>

                           </div> -->
                       </div>

                       <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label"><span style="color:red">*</span>Gender :</label>
                        <div class="col-sm-3">

                            <select id="sex" name="sex" class="form-control" required>
                                <option value="">----- Please Choose -----</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>

                            </select>



                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="std_fname_en" class="col-sm-3 control-label"><span style="color:red">*</span> Surname <small>(EN)</small> :</label>
                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="name_en" id ="name_en" autocomplete="off" placeholder="YANG" onkeypress='validate(event,this)' data-error="Bruh, that email address is invalid" value="<?php echo $data['sname']; ?>" required >

                            <div class="help-block with-errors"></div>

                        </div>
                        <div class="col-sm-3">
                           <span class="label label-danger">* UPPER CASE</span>


                       </div>
                   </div>

                   <div class="form-group has-feedback">
                    <label for="std_fname_en" class="col-sm-3 control-label"><span style="color:red">*</span> Middle Name <small>(EN)</small> :</label>
                    <div class="col-sm-5">

                        <input type="text" class="form-control" name="middle_name" id ="middle_name" autocomplete="off" placeholder="LI" onkeypress='validate(event,this)' data-error="Bruh, that email address is invalid" value="<?php echo $data['mname']; ?>" required>

                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="col-sm-3">
                        <span class="label label-danger">* UPPER CASE</span>


                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label for="std_fname_en" class="col-sm-3 control-label"><span style="color:red">*</span> First Name <small>(EN)</small> :</label>
                    <div class="col-sm-5">

                        <input type="text" class="form-control" name="first_name" id ="first_name" autocomplete="off" placeholder="YANG" onkeypress='validate(event,this)' data-error="Bruh, that email address is invalid" value="<?php echo $data['fname']; ?>" required >

                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="col-sm-3">
                        <span class="label label-danger">* UPPER CASE</span>


                    </div>
                </div>



                <div class="form-group">
                    <label for="birthday" class="col-sm-3 control-label"><span style="color:red">*</span> Date of Birth :</label>
                    <div class="col-sm-3">
                        <div class="input-group date"   id="birthday_datepickup"
                        data-date="1995-01-01" 
                        data-date-format="yyyy-mm-dd">
                        <input class="form-control" type="text" name="birth" required id="birth" readonly="readonly" value="<?php echo $data['date_birth']; ?>"/>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div> 
                    <span class="label label-warning" id="show_date_birthday" style="color: #000;"></span>
                </div>
            </div>




                    <!-- <div class="form-group">
                        <label for="birthday" class="col-sm-5 control-label"><span style="color:red">*</span> ปี(ค.ศ.)-เดือน-วัน Visa หมดอายุ :</label>
                        <div class="col-sm-3">

                            <div class="input-group date"   id="old_edu_datepickup"
                            data-date="1995-01-01" 
                            data-date-format="yyyy-mm-dd">
                            <input class="form-control" type="text" name="ex_pass" id="ex_pass" readonly value=""/>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div> 
                        <span class="label label-warning" id="show_date_birthday" style="color: #000;"></span>
                        <label id="l_date_ex_pass"><span style="color:red">*กรุณาป้อน วันหมดอายุ Visa ตามความจริง</span></label>




                    </div>
                </div> -->


                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label"><span style="color:red">*</span>Nationality :</label>
                    <div class="col-sm-5">


                        <select id="nation_id" name="nation_id" class="selectpicker chosen-select form-control"  data-live-search="true">
                            <option value="">----- Please Choose -----</option>
                            <?php
                            foreach ($nations as $row) {

                                ?>
                                <option value="<?php echo $row['nation_id']; ?>"><?php echo $row['nation_name_en']; ?></option>
                                <?php
                            }
                            ?>
                        </select>



                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label"><span style="color:red">*</span>Race :</label>
                    <div class="col-sm-5">

                        <select id="race_id" name="race_id" class="form-control" required>
                            <option value="">----- Please Choose -----</option>
                            <?php
                            foreach ($races as $row) {

                                ?>
                                <option value="<?php echo $row['race_id']; ?>"><?php echo $row['race_name_en']; ?></option>
                                <?php
                            }
                            ?>
                            
                        </select>




                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label"><span style="color:red">*</span>Religion :</label>
                    <div class="col-sm-5">

                        <select id="religion_id" name="religion_id" class="form-control" required>
                         <option value="">----- Please Choose -----</option>
                         <?php
                         foreach ($religions as $row) {

                            ?>
                            <option value="<?php echo $row['religion_id']; ?>"><?php echo $row['religion_name_en']; ?></option>
                            <?php
                        }
                        ?>


                    </select>


                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label"><span style="color:red">*</span>Blood Type :</label>
                <div class="col-sm-5">

                    <select id="blood_type" name="blood_type" class="form-control" required>
                        <option value="">----- Please Choose -----</option>
                        <option value="-" title="None">NONE</option>
                        <option value="O" title="O">O</option>
                        <option value="A" title="A">A</option>
                        <option value="B" title="B">B</option>
                        <option value="AB" title="AB">AB</option>
                    </select>

                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label"><span style="color:red">*</span>Deformed :</label>
                <div class="col-sm-5">

                    <select id="deformed" name="deformed" class="form-control" required>
                        <option value="">----- Please Choose -----</option>
                        <?php
                        foreach ($deforms as $row) {

                            ?>
                            <option value="<?php echo $row['deform_id']; ?>"><?php echo $row['deform_name_en']; ?></option>
                            <?php
                        }
                        ?>
                        <option value="99">Other</option>
                    </select>

                    <br>
                    <input type="text"  class="form-control" name="deformed_other" id="deformed_other" placeholder="deformed other...."/>

                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label"><span style="color:red">*</span>Talent :</label>
                <div class="col-sm-5">

                    <select id="talent" name="talent" class="form-control" required>
                        <option value="">----- Please Choose -----</option>

                        <option value="00">Other</option>
                        <option value="01">Foreign language</option>
                        <option value="02">Computer</option>
                        <option value="03">Recreation</option>
                        <option value="04">Art</option>
                        <option value="05">Sport</option>
                        <option value="06">Music</option>

                    </select>

                    

                </div>
            </div>



            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label"><span style="color:red">*</span>E-mail :</label>

                <div class="col-sm-5">

                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" required>


                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label"><span style="color:red">*</span>Tel :</label>

                <div class="col-sm-3">

                    <input type="number" class="form-control" id="tel" name="tel" value="<?php echo $data['tel']; ?>" required>


                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label"><span style="color:red">*</span>Address :</label>

                <div class="col-sm-5">
                    <textarea class="form-control" rows="5" id="address" name="address" onkeypress="validate2(event)" required></textarea>

                </div>
            </div>



            <br>
            <div class="form-group">
                <label for="std_type_name_st" class="col-sm-3 control-label"><span style="color:red">*</span>Passport :</label>
                <div class="col-sm-3">

                    <input id="input-2" name="file" id="file" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" value="<?php echo $data['old_file']; ?>" required>



                </div>
            </div>

        </div> <!--  ประวัติส่วนตัว -->
    </div>
</div>
</div>
</div>



<div class="row">
    <!--   panel input card number   -->
    <div class="col-md-12">  
        <!--   ประวัติส่วนตัว     -->
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #FFCC66; color: #000000;">
                <span class="panel-title"><span style="color:red">*</span>Preference Educational Background</span>
            </div>
            <div class="panel-body" style="padding:15px;">
                <div class="form-horizontal">


                    <div class="form-group">
                        <label for="std_type_name_st" class="col-sm-3 control-label"><span style="color:red">*</span>Graduation :</label>
                        <div class="col-sm-5">
                            <select id="certi" name="certi" class="form-control" required>
                                <option value="">----- Please Choose -----</option>
                                <?php
                                foreach ($levels as $row) {

                                    ?>
                                    <option value="<?php echo $row['old_edu_lev_id']; ?>"><?php echo $row['old_edu_lev_name_en']; ?></option>
                                    <?php
                                }
                                ?>
                                <option value="80">Ph.D.</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="std_type_name_st" class="col-sm-3 control-label"><span style="color:red">*</span>Degree :</label>
                        <div class="col-sm-5">
                            <select id="old_degree_id" name="old_degree_id" class="form-control" required>
                                <option value="">----- Please Choose -----</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="std_type_name_st" class="col-sm-3 control-label"><span style="color:red">*</span>Major :</label>
                        <div class="col-sm-5">
                            <select id="old_major_id" name="old_major_id" class="selectpicker chosen-select form-control"  data-live-search="true" required>
                                <option value="">----- Please Choose -----</option>
                            </select>
                        </div>
                    </div>




                    <!-- <div class="form-group">
                        <label for="std_type_name_st" class="col-sm-5 control-label"><span style="color:red">*</span>File Educational :</label>
                        <div class="col-sm-3">

                            <input id="input-2" name="file_cer" id="file_cer" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" required>



                        </div>
                    </div> -->



                    <!--                </div><!--  สาขาวิชาที่สมัคร -->

                    <div class="form-group">
                        <label for="std_type_name_st" class="col-sm-3 control-label"><span style="color:red">*</span>School of Study :</label>
                        <div class="col-sm-5">
                         <input type="text" class="form-control" id="school_end" name="school_end" placeholder="School" value="<?php echo $data['old_school_name'] ?>" required>
                     </div>
                 </div>

                 <div class="form-group">
                    <label for="std_type_name_st" class="col-sm-3 control-label"><span style="color:red">*</span>School of Country:</label>
                    <div class="col-sm-5">
                      <select id="country_end" name="country_end" class="form-control" required>
                        <option value="">----- Please Choose -----</option>
                        <option value="China">China</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Laos">Laos</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="America">America</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Japan">Japan</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Singapore">Singapore</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="std_type_name_st" class="col-sm-3 control-label"><span style="color:red">*</span>Trancript Code :</label>
                <div class="col-sm-2">
                 <input type="text" class="form-control" id="trancript_code" name="trancript_code" placeholder="1112353" value="<?php echo $data['trancript_code'] ?>" >
             </div>
         </div>

         <div class="form-group">
            <label for="std_type_name_st" class="col-sm-3 control-label"><span style="color:red">*</span>GPA  :</label>
            <div class="col-sm-1">
             <input type="text" class="form-control" id="old_gpax" name="old_gpax" placeholder="3.00" value="<?php echo $data['old_gpax'] ?>" >

         </div>
         <div class="col-sm-2">
             <br>
             <span class="label label-danger">ex. 3.57 </span>
         </div>
     </div>

 </div>
</div>
</div>
</div>
</div>





<div class="row">
    <!--   panel input card number   -->
    <div class="col-md-12">  
        <!--   ประวัติส่วนตัว     -->
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #FFCC66; color: #000000;">
                <span class="panel-title"><span style="color:red">*</span>Preference field of study</span>
            </div>
            <div class="panel-body" style="padding:15px;" id="selec_type_std">
                <div class="form-horizontal">

                    <div class="form-group">
                        <label for="std_type_name_st" class="col-sm-3 control-label"><span style="color:red">*</span>Student Type :</label>
                        <div class="col-sm-5">


                          <label class="radio-inline">
                            <input type="radio" name="type_std" id="type_std" value="0" required>
                            MOU
                        </label>

                        <label class="radio-inline">
                          <input type="radio" name="type_std" id="type_std" value="1">
                          Walk In
                      </label>


                  </div>
              </div>
              <br>

              <div id="mou">
                <div class="form-group" id="related_0_content">
                    <label for="std_type_name_st" class="col-sm-5 control-label"><span style="color:red">*</span>University :</label>
                    <div class="col-sm-3">
                        <div>
                            <input type="text" class="form-control" name="university" id="university" autocomplete="off" readonly="readonly">
                            <input type="hidden" class="form-control" name="university_id" id="university_id" value="<?php echo $data['universityId_mou'] ?>">
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label for="std_type_name_st" class="col-sm-5 control-label"><span style="color:red">*</span>Level of Study :</label>
                    <div class="col-sm-3">
                        <select id="degree_id" name="degree_id" class="form-control" required>
                            <option value="">----- Please Choose -----</option>
                            <?php 
                            foreach ($level as $row) {

                                ?>
                                <option value="<?php echo $row['lev_of_id']; ?>"><?php echo $row['lev_of_name']; ?></option>
                                <?php
                            }
                            ?>                                    
                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <label for="std_type_name_st" class="col-sm-5 control-label"><span style="color:red">*</span>Field of Study :</label>
                    <div class="col-sm-3">
                       <input type="text" class="form-control" name="subject" id="subject" placeholder="Level of Study" autocomplete="off"
                       readonly="readonly" required>

                       <input type="hidden" class="form-control" name="subject3" id="subject3" required value="<?php echo $data['major_id'] ?>">

                       <input type="hidden" class="form-control" name="subject_id" id="subject_id" required value="<?php echo $data['major_id'] ?>">
                   </div>
               </div>

               <div class="form-group">
                <label for="std_type_name_st" class="col-sm-5 control-label"><span style="color:red">*</span>Faculty :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="major" id="major" placeholder="choose field of study" autocomplete="off" readonly="readonly" required>
                    <input type="hidden" class="form-control" name="major_id" id="major_id" required  value="<?php echo $data['fac_id'] ?>">

                    <input type="hidden" class="form-control" name="lev_id" id="lev_id" value="<?php echo $data['lev_id'] ?>" required>

                    <input type="hidden" class="form-control" name="id_open" id="id_open" value="<?php echo $data['id_open_major'] ?>" required>

                </div>
            </div>

            <div class="form-group">
                <label for="std_type_name_st" class="col-sm-5 control-label"><span style="color:red">*</span>Property :</label>
                <div class="col-sm-5">
                    <label for="lb_property" class="control-label"><span style="color:red"></span></label>

                </div>
            </div>



        </div>

        <div id="walk_in">

            <div class="form-group">
                <label for="std_type_name_st" class="col-sm-5 control-label"><span style="color:red">*</span>Level of Study :</label>
                <div class="col-sm-3">
                    <select id="degree_id_walk_in" name="degree_id_walk_in" class="form-control" required>
                        <option value="">----- Please Choose -----</option>
                        <?php 
                        foreach ($level as $row) {

                            ?>
                            <option value="<?php echo $row['lev_of_id']; ?>"><?php echo $row['lev_of_name']; ?></option>
                            <?php
                        }
                        ?>                                    
                    </select>
                    <br>
                    <button type="button" class="btn btn-danger" name="btnLevel" id="btnLevel">Please Choose</button>
                </div>
            </div>



            <div class="form-group">
                <label for="std_type_name_st" class="col-sm-5 control-label"><span style="color:red">*</span>Field of Study :</label>
                <div class="col-sm-5">
                   <input type="text" class="form-control" name="subject_walk_in" id="subject_walk_in" placeholder="Level of Study" autocomplete="off"
                   readonly="readonly" required>

                   <input type="hidden" class="form-control" name="subject3_walk_in" id="subject3_walk_in" value="<?php echo $data['major_id'] ?>" required>

                   <input type="hidden" class="form-control" name="subject_id_walk_in" id="subject_id_walk_in" value="<?php echo $data['major_id'] ?>" required>
               </div>
           </div>

           <div class="form-group">
            <label for="std_type_name_st" class="col-sm-5 control-label"><span style="color:red">*</span>Faculty :</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="major_walk_in" id="major_walk_in" placeholder="choose field of study" autocomplete="off" readonly="readonly" required>
                <input type="hidden" class="form-control" name="major_id_walk_in" id="major_id_walk_in" value="<?php echo $data['fac_id'] ?>" required>
                <input type="hidden" class="form-control" name="lev_id_walk_in" id="lev_id_walk_in" value="<?php echo $data['lev_id'] ?>" required>

                <input type="hidden" class="form-control" name="id_open_walk_in" id="id_open_walk_in" value="<?php echo $data['id_open_major'] ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="std_type_name_st" class="col-sm-5 control-label"><span style="color:red">*</span>Property :</label>
            <div class="col-sm-5">
                <label for="lb_property" class="control-label"><span style="color:red"></span></label>

            </div>
        </div>



    </div>




</div><!--  สาขาวิชาที่สมัคร -->
</div>
</div>
</div>
</div>


<div class="row" style=" margin-bottom: 60px;">
    <div class="col-md-12">  
        <div class="panel panel-default">
            <div class="panel-body" style="padding:10px;">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div id="success" class="row" style="display: none">              
                            <div id="successMessage" class="alert alert-success col-md-12"></div>             
                        </div>
                        <div id="error" class="row" style="display: none">               
                            <div id="errorMessage" class="alert alert-danger col-md-12"></div>               
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <div style=" text-align: center;">
                    <!-- <input type="hidden" name="add" id="add" value="<?PHP echo $add; ?>"> -->
                    <button type="button" class="btn btn-default" OnClick="blackStepOne();">Cancel
                    </button>
                    <button type="submit" class="btn btn-primary" >Next Step</button>



<!--  -->


<!--  -->
                </div>
            </div>
        </div>
    </div>
</div>  
</form>






</div> 

<!-- Modal -->
<div class="modal fade" id="modalShow_main2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-admin2" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Data :</h4>
    </div>
    <div class="modal-body">


        <div id="div_show_main2">

        </div>

    </div>
    <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    </div>
</div>
</div>
</div>







<?php $this->load->view('admission/includes/footer'); ?>

<!-- bootboxjs -->
<script src="<?php echo base_url('assets/themes/student/js/bootbox.min.js');?>"></script>
<!-- select2 -->
<link href="<?php echo base_url('assets/themes/student/css/select2.css');?>" rel="stylesheet"/>
<script src="<?php echo base_url('assets/themes/student/js/select2.min.js');?>"></script>
<!-- Date Picker -->
<link href="<?php echo base_url('assets/themes/student/css/datepicker.css');?>" rel="stylesheet">  
<script src="<?php echo base_url('assets/themes/student/js/bootstrap-datepicker.js');?>"></script> 
<script src="<?php echo base_url('assets/themes/student/js/bootstrap-datepicker.th.js');?>" charset="UTF-8"></script>

<script>


    $(document).ready(function() {

      $("#mou").hide();
      $("#walk_in").hide();
      $("#deformed_other").hide();
        // $("#selec_type_std :input").attr("disabled", "disabled");

        $('#old_degree_id').prop('disabled', true);
        $('#old_major_id').prop('disabled', true);

        $("#title").val('<?php echo $data['title']; ?>');
        $("#nation_id").val('<?php echo $data['nation']; ?>');
        $("#race_id").val('<?php echo $data['race']; ?>');



        $("#religion_id").val('<?php echo $data['religion']; ?>');
        $("#blood_type").val('<?php echo $data['blood']; ?>');
        $("#deformed").val('<?php echo $data['deform_id']; ?>');
        $("#talent").val('<?php echo $data['talent']; ?>');

        $("#address").val('<?php echo trim($data['address']); ?>');

        $("#certi").val('<?php echo $data['old_lev_id']; ?>');

        getdegree_fix($("#certi").val());

        getdegree_fix3('<?php echo $data['old_degree_id']; ?>');

        $("#country_end").val('<?php echo $data['old_country_name']; ?>');

        var std_type = <?php echo $data['type_std_id']; ?>;

        $('input:radio[name="type_std"][value='+std_type+']').prop('checked', true);

        set_radio(std_type);

        get_major_study();

        set_property('<?php echo $data['major_id']; ?>');

        /*
    	$("#sex").val('<?php echo $data['sex']; ?>');
       // 

        $("#degree_id").val('<?php echo $data['levId']; ?>');

        


    	



        $('.selectpicker').selectpicker();

        $("#input-id").fileinput();

        $('#subject').prop('disabled', true).selectpicker('refresh');

        $('#related_0_content').hide();

        $("#li_step_1").addClass("active");
        $("#li_step_2").addClass("active");
        $("#li_step_3").addClass("disabled");

        $('[data-toggle="popover"]').popover()

        var image = '<img src="<?php echo base_url('assets/themes/student/images/passportNo.JPG');?>" width="200">';

        $('#popover').popover({placement: 'right', content: image, html: true});




        $("#txt_citizen_id_1").focus();

        */
                                                                    $("#sp_citizen_id_1").hide(); //span show citizen_id_1
                                                                    $('#div_preview_sch_select').hide(); //div modal show list old school

                                                                    $('#old_edu_lev_id').change(function() {
                                                                        jsonOldEducationDegreeId();
                                                                    });

                                                                    $('#old_edu_degree_id').change(function() {
                                                                        jsonOldEducationMajorId();
                                                                    });

                                                                    //-------------------------------- 
                                                                    $('#birthday_datepickup').datepicker({language: 'en'}).on('changeDate', function() {
                                                                        // var faction = "http://orasis.crru.ac.th/gds_admission/index.php/main/convert_birthday_text";
                                                                        // var fdata = {
                                                                        //     birthday: $('#birth').val()
                                                                        // };
                                                                        // $.post(faction, fdata, function(jdata) {
                                                                        //     if (jdata.is_success) {
                                                                        //         $('#show_date_birthday').html(jdata.date_text);
                                                                        //     }
                                                                        // }, 'json');
                                                                        $('#birthday_datepickup').datepicker('hide');
                                                                    });

                                                                    //--------------------------------
                                                                    //-------------------------------- 
                                                                    $('#start_datepickup').datepicker({language: 'th'}).on('changeDate', function() {
                                                                        var faction = "http://orasis.crru.ac.th/gds_admission/index.php/main/convert_birthday_text";
                                                                        var fdata = {
                                                                            birthday: $('#start').val()
                                                                        };
                                                                        $.post(faction, fdata, function(jdata) {
                                                                            if (jdata.is_success) {
                                                                                $('#show_date_start').html(jdata.date_text);
                                                                            }
                                                                        }, 'json');
                                                                        $('#start_datepickup').datepicker('hide');
                                                                    });

                                                                    //--------------------------------
                                                                    $('#old_edu_datepickup').datepicker({language: 'th'}).on('changeDate', function() {
                                                                        var faction = "http://orasis.crru.ac.th/gds_admission/index.php/main/convert_birthday_text";
                                                                        var fdata = {
                                                                            birthday: $('#ex_pass').val()
                                                                        };
                                                                        $.post(faction, fdata, function(jdata) {
                                                                            if (jdata.is_success) {
                                                                                $('#show_edu_date').html(jdata.date_text);
                                                                            }
                                                                        }, 'json');
                                                                        $('#old_edu_datepickup').datepicker('hide');
                                                                    });

         //------------------------------------------------

         $("#degree_id").on("change", function () {
          var faction = "<?php echo site_url('site/admission/select_level/'); ?>";

          if($("#degree_id").val() != ""){
            showModal_main2($("#degree_id").val(),$('#type_std:checked').val());
        }

    });

     //------------------------------------------------

     $("#degree_id_walk_in").on("change", function () {
      var faction = "<?php echo site_url('site/admission/select_level/'); ?>";

      if($("#degree_id_walk_in").val() != ""){
        showModal_walk_in($("#degree_id_walk_in").val(),$('#type_std:checked').val());
    }

});

     //------------------------------------------------

     $("#deformed").on("change", function () {


      if($("#deformed").val() == '99'){
        $("#deformed_other").show();
        $("#deformed_other").prop('required',true);
    }else{
        $("#deformed_other").prop('required',false);
        $("#deformed_other").hide();
    }

});

     //------------------------------------------------

     $("#certi").on("change", function () {


        getdegree_fix($(this).val());


    });

     //------------------------------------------------


     $("#old_degree_id").on("change", function () {


        getdegree_fix2($(this).val());

    });

     //------------------------------------------------

     $("#old_degree_id").on("click", function () {


      if($("#certi").val() == ""){
         bootbox.alert("Please Choose Graduation");
     }

 });


     //---------------------------------------------------------------------------------
     $("#old_major_id").on("click", function () {


      if($("#old_degree_id").val() == ""){
         bootbox.alert("Please Choose Degree");
     }

 });


     //---------------------------------------------------------------------------------

     $("#btnLevel").on("click", function () {
      var faction = "<?php echo site_url('site/admission/select_level/'); ?>";

      if($("#degree_id_walk_in").val() != ""){
        showModal_walk_in($("#degree_id_walk_in").val(),$("#type_std:checked").val());
    }else{
        bootbox.alert("Please Choose Level of Study");
    }

});


     //---------------------------------------------------------------------------------
     $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

     

      //------------------------------------------------------------------------------

      // ----------------------------------------------------------------------------

      $("#university").on("click", function () {

        $("#related_0_content").show();
        $("#university").prop('required',true);
        $("#university_id").prop('required',true);
        showModal_main();

    });

      // ----------------------------------------------------------------------------


      $('#nation_id').selectpicker({
          size: 6
      });

      $('#old_major_id').selectpicker({
          size: 6
      });

      $('.selectpicker').on('click', function(){
        setTimeout(function(){
            var jDropdown = $('.day > .dropdown-menu.open ');
            if(!jDropdown.hasClass("mCustomScrollbar")) {
                jDropdown.mCustomScrollbar({
                    axis:"y", 
                    autoDraggerLength:false, 
                    dropupAuto: false,
                    advanced: {
                        updateOnBrowserResize: true,
                        updateOnContentResize: false,
                        autoScrollOnFocus: false
                    }
                });
            }
        }, 50);
    });


      // ----------------------------------------------------------------------------

      //----------------------------------------------------------------------------------
      $('#form1').validate({


        rules: {
            name_en: {
                minlength: 4,
                maxlength: 30,
                required: true
            },
            birth: {

                required: true
            },
            sex: {
                required: true
            },
            nation_id: {
                required: true
            },
            blood_type: {
               required: true
           },
           religion_id: {
            required: true
        },
        country_id: {
            required: true
        }
    },

    messages: {
        name_en: "Please specify your name",
        birth: "Please choose your date of birth",
        email: {
          required: "We need your email address to contact you",
          email: "Your email address must be in the format of name@domain.com"
      },
      sex: "Please Choose",
      nation_id: "Please Choose",
      blood_type: "Please Choose",
      religion_id: "Please Choose",
      country_id: "Please Choose"
  },

  highlight: function(element) {
    $(element).closest('.form-group').addClass('has-error');
},
unhighlight: function(element) {
    $(element).closest('.form-group').removeClass('has-error');
},
errorElement: 'span',
errorClass: 'help-block',
errorPlacement: function(error, element) {
    if(element.parent('.input-group').length) {
        error.insertAfter(element.parent());
    } else {
        error.insertAfter(element);
    }
}
});

      //------------------------------------------------------------------
      $("input:radio[name=type_std]").on("click", function () {
       if($("input:radio[name=type_std]").is(":checked")){
                //Code to append goes here
                
                set_radio($(this).val());
            }


        });

  });



function showModal_main2(xid,type_id) {

    var sdata = {id: xid, type_id: type_id};
    $('#div_show_main2').load('<?php echo site_url('site/admission/select_level/'); ?>', sdata);
    $('#modalShow_main2').modal('show');

}

function showModal_main() {


    $('#div_show_main2').load('<?php echo site_url('site/admission/select_MOU/'); ?>');
    $('#modalShow_main2').modal('show');

}


function showModal_walk_in(xid,type_id) {


    var sdata = {id: xid, type_id: type_id};
    $('#div_show_main2').load('<?php echo site_url('site/admission/select_level/'); ?>', sdata);
    $('#modalShow_main2').modal('show');

}




function validate(evt,valueData) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode( key );
    var regex = /[A-Za-z ]|\./;
    if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
    }
    setTimeout(function(){
        valueData.value =valueData.value.toUpperCase();
    }, 1);

}


function validate2(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode( key );
    var regex = /[A-Za-z0-9 ]|\./;
    if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
    }

}



function selectMajor(subjectName,majorName,subjectId,majorId,facId){

    $('#subject').val(subjectName);
    $('#subject3').val(subjectName);
    $('#major').val(majorName);

    $('#subject_id').val(subjectId);
    $('#major_id').val(facId);
    $('#lev_id').val(majorId);

    $('#modalShow_main2').modal('toggle');
}



function selectMajor_walkIn(subjectName,majorName,subjectId,majorId,facId){

    $('#subject_walk_in').val(subjectName);
    $('#subject3_walk_in').val(subjectName);
    $('#major_walk_in').val(majorName);

    $('#subject_id_walk_in').val(subjectId);
    $('#major_id_walk_in').val(facId);
    $('#lev_id_walk_in').val(majorId);

    $('#modalShow_main2').modal('toggle');

    var majorId = subjectId;
    if(majorId == '0C3'){
        $("label[for='lb_property']").text("ม.6 หรือเทียบเท่า (เป็นหลักสูตรนานาชาติ)");
    }else{
        $("label[for='lb_property']").text("test ");
    }
}

function selectUniversity(universityName,universityId){

    $('#university').val(universityName);
    $('#university_id').val(universityId);



    $('#modalShow_main2').modal('toggle');
}
function clearModal() {
    $('#div_preview_sch_select').html('');
    $('#div_preview_sch_select').hide();
    $('#input_school_name').val('');
    $('#input_school_name').focus('');
}

function blackStepOne() {
    bootbox.confirm("Back to home page system And Data clearing!", function(ans) {
        if (ans) {
            window.location = '<?php echo site_url('site/admission/');?>';
        }
    });
}

function getdegree_fix(data){
    var old_level = data

    var faction = "<?php echo site_url('site/admission/select_degree/'); ?>";

    var fdata = {id: old_level};

    $.post(faction, fdata, function(jdata) {

        if (jdata.is_successful) {

                //alert('aaa');
                var options;

                if(jdata.data.length > 0){

                  for (var i = 0; i < jdata.data.length; i++) {
                    options += '<option value="' + jdata.data[i].old_edu_id + '">' +
                    jdata.data[i].old_edu_degree_name_en + '</option>';
                }

                $('#old_degree_id').html(options);

                $('#old_degree_id').prop('disabled', false);


            }else{
              options += '<option value=""> No dta</option>';

              $('#old_degree_id').html(options);
              $('#old_degree_id').prop('disabled', 'disabled');

          }

      } else {

        alert("NOOOOOO");

    }

}, 'json');
}

function getdegree_fix2(data){

 var old_degree = data

 var faction = "<?php echo site_url('site/admission/select_old_major/'); ?>";

 var fdata = {id: old_degree};

 $.post(faction, fdata, function(jdata) {

    if (jdata.is_successful) {

                //alert('aaa');
                var options;

                if(jdata.data.length > 0){

                  for (var i = 0; i < jdata.data.length; i++) {
                    options += '<option value="' + jdata.data[i].old_edu_maj_id + '">' +
                    jdata.data[i].old_edu_maj_name_th + '</option>';

                    //alert(jdata.data[i].old_edu_maj_name_th);
                }

                $('#old_major_id').html(options);

                $('#old_major_id').prop('disabled', false).selectpicker('refresh');;


            }else{
              options += '<option value=""> No data</option>';

              $('#old_major_id').html(options);
              $('#old_major_id').prop('disabled', 'disabled').selectpicker('refresh');;

          }

      } else {

        alert("NOOOOOO");

    }

}, 'json');
}


function getdegree_fix3(data){

 var old_degree = data

 var faction = "<?php echo site_url('site/admission/select_old_major/'); ?>";

 var fdata = {id: old_degree};

 $.post(faction, fdata, function(jdata) {

    if (jdata.is_successful) {

                //alert('aaa');
                var options;

                if(jdata.data.length > 0){

                  for (var i = 0; i < jdata.data.length; i++) {
                    options += '<option value="' + jdata.data[i].old_edu_maj_id + '">' +
                    jdata.data[i].old_edu_maj_name_th + '</option>';

                    //alert(jdata.data[i].old_edu_maj_name_th);
                }

                $('#old_major_id').html(options);

                $('#old_major_id').prop('disabled', false).selectpicker('refresh');

                $("#old_major_id").val('<?php echo $data['old_major_id']; ?>').selectpicker('refresh');


            }else{
              options += '<option value=""> No data</option>';

              $('#old_major_id').html(options);
              $('#old_major_id').prop('disabled', 'disabled').selectpicker('refresh');

          }

      } else {

        alert("NOOOOOO");

    }

}, 'json');
}

function get_major_study(){

    var old_degree = '<?php echo $data['id_open_major']; ?>';
    var maj_id = '<?php echo $data['major_id']; ?>';
    var faction = "<?php echo site_url('site/admission/select_name_study/'); ?>";

    var fdata = {id: old_degree, maj_id: maj_id};

    $.post(faction, fdata, function(jdata) {

        if (jdata.is_successful) {

                //alert('aaa');
                if(jdata.data['data_value'].length > 0){

                    console.log("true");
                    if(jdata.data['db'] == 1){
                        console.log(jdata.data['db']);
                        var type_std2 = '<?php echo $data['type_std_id']; ?>';

                        if(type_std2 == '0') {
                            $('#subject').val(jdata.data['data_value'][0].maj_name_en);
                            $('#subject3').val(jdata.data['data_value'][0].maj_name_en);
                            $('#major').val(jdata.data['data_value'][0].fac_name_en); 
                        }else{
                            $('#subject_walk_in').val(jdata.data['data_value'][0].maj_name_en);
                            $('#subject3_walk_in').val(jdata.data['data_value'][0].maj_name_en);
                            $('#major_walk_in').val(jdata.data['data_value'][0].fac_name_en);
                        }
                        
                    }else{

                        var type_std2 = '<?php echo $data['type_std_id']; ?>';
                         if(type_std2 == '0'){
                            $('#subject').val(jdata.data['data_value'][0].maj_name_en);
                            $('#subject3').val(jdata.data['data_value'][0].maj_name_en);
                            $('#major').val(jdata.data['data_value'][0].fac_name_en);
                        }else{
                            $('#subject_walk_in').val(jdata.data['data_value'][0].maj_name_en);
                            $('#subject3_walk_in').val(jdata.data['data_value'][0].maj_name_en);
                            $('#major_walk_in').val(jdata.data['data_value'][0].fac_name_en);
                        }
                    }
                    for (var i = 0; i < jdata.data.length; i++) {
                        console.log(jdata.data[i].maj_id);
                    }


                }else{

                    console.log("else");
                    // console.log(jdata.data['db']);
                    for (var i = 0; i < jdata.data.length; i++) {
                        console.log(jdata.data[i].maj_id);
                    }
                    
                }

            } else {

                alert("NOOOOOO");

            }

        }, 'json');
} 

function set_university(){

    var old_degree = '<?php echo $data['universityId_mou'] ?>';
  
    var faction = "<?php echo site_url('site/admission/get_select_MOU/'); ?>";

    var fdata = {id: old_degree};

    $.post(faction, fdata, function(jdata) {

        if (jdata.is_successful) {

                
                if(jdata.data.length > 0){
                  
                    console.log("true");

                    $('#university').val(jdata.data[0].name);
                        
                        
                    
                    

                }else{

                    console.log("else");
                    // console.log(jdata.data['db']);
                    for (var i = 0; i < jdata.data.length; i++) {
                        console.log(jdata.data[i].maj_id);
                    }
                    
                }

            } else {

                alert("NOOOOOO");

            }

        }, 'json');
} 

function set_property(subjectId){
    var majorId = subjectId;
    if(majorId == '0C3'){
        $("label[for='lb_property']").text("ม.6 หรือเทียบเท่า (เป็นหลักสูตรนานาชาติ)");
    }else{
        $("label[for='lb_property']").text("test ");
    }
}
function set_radio(data){
    if(data == 1){
        $("#related_0_content").hide();

        $("#mou").hide();
        $("#walk_in").show();

                    // set required ture
                    $("#degree_id_walk_in").prop('required',true);
                    $("#subject_walk_in").prop('required',true);
                    $("#subject3_walk_in").prop('required',true);
                    $("#subject_id_walk_in").prop('required',true);
                    $("#major_walk_in").prop('required',true);
                    $("#major_id_walk_in").prop('required',true);
                    $("#lev_id_walk_in").prop('required',true);

                    $("#university").prop('required',false);
                    $("#university_id").prop('required',false);
                    $("#degree_id").prop('required',false);
                    $("#subject").prop('required',false);
                    $("#subject3").prop('required',false);
                    $("#subject_id").prop('required',false);
                    $("#major").prop('required',false);
                    $("#major_id").prop('required',false);
                    $("#lev_id").prop('required',false);

                    
                     $("#degree_id_walk_in").val(<?php echo $data['lev_of_id'] ?>);


                }else {
                    $("#related_0_content").show();

                    $("#mou").show();
                    $("#walk_in").hide();
                    //showModal_main();

                    // set required false
                    $("#degree_id_walk_in").prop('required',false);
                    $("#subject_walk_in").prop('required',false);
                    $("#subject3_walk_in").prop('required',false);
                    $("#subject_id_walk_in").prop('required',false);
                    $("#major_walk_in").prop('required',false);
                    $("#major_id_walk_in").prop('required',false);
                    $("#lev_id_walk_in").prop('required',false);

                    $("#degree_id").val(<?php echo $data['lev_of_id'] ?>);

                    $("#university").prop('required',true);
                    $("#university_id").prop('required',true);
                    $("#degree_id").prop('required',true);
                    $("#subject").prop('required',true);
                    $("#subject3").prop('required',true);
                    $("#subject_id").prop('required',true);
                    $("#major").prop('required',true);
                    $("#major_id").prop('required',true);
                    $("#lev_id").prop('required',true);

                    set_university();

                }
            }





        </script>
        <script>
            $(document).ready(function() {
                $('#start').change(function() {
                    var start = $('#start').val();
                    if (start.length > 1) {
                        $('#l_date_start').hide();
                    }
                });

                $('#ex_pass').change(function() {
                    var ex_pass = $('#start').val();
                    if (ex_pass.length > 1) {
                        $('#l_date_ex_pass').hide();
                    }
                });

                $('#nation_id').change(function() {

                    $('#l_nation_id').hide();

                });

                $('#race_id').change(function() {

                    $('#l_race_id').hide();

                });

                $('#country_id').change(function() {

                    $('#l_country_id').hide();

                });

                $('#religion_id').change(function() {

                    $('#l_religion_id').hide();

                });

                $('#sex').change(function() {

                    $('#l_sex').hide();

                });

                $('#home_mobile').keyup(function(e) {
                    var home_mobile = $('#home_mobile').val();
                    if (home_mobile.length > 1) {
                        $('#l_tel').hide();
                    }
                });


            });
        </script>
