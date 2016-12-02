
<!--pnotify-->
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.icons.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.js') ?>"></script>

<script src="<?php echo base_url('assets/bootstrap_extras/bootbox/bootbox.min.js'); ?>"></script>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>ป้อนข้อมูลส่วนตัว : Student Data</h4>
            </div>
            <br>
            <div class="content">


                <form class="form-horizontal" name="form1" id="form1">
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">รหัสนักศึกษา :Student ID<font color="red">*</font></label>
                        <div class="col-sm-2">
                            <input type="text" name="stdId" id="stdId" parsley-trigger="change" required placeholder="5214631xx" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">รหัสหนังสือเดินทาง :Passport Number<font color="red">*</font></label>
                        <div class="col-sm-2">
                            <input type="text" name="passport" id="passport" parsley-trigger="change" required placeholder="E246884XX" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">คำนำหน้า : Title<font color="red">*</font></label>
                        <div class="col-sm-2">
                            <select class="form-control" id="title_name" name="title_name">

                                <option value="Mr.">Mr.</option>
                                <option value="Miss.">Miss.</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">ชื่อ : Name<font color="red">*</font></label>
                        <div class="col-sm-6">
                            <input type="text" name="fname" id="fname" parsley-trigger="change" required placeholder="Name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">นามสกุล : Last Name<font color="red">*</font></label>
                        <div class="col-sm-6">
                            <input type="text" name="lname" id="lname" parsley-trigger="change" required placeholder="Last Name" class="form-control">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">วันเกิด : Birthday<font color="red">*</font></label>
                        <div class="col-sm-2">
                            <input type="date" data-date-format="DD MMMM YYYY" name="birthday" id="birthday" parsley-trigger="change" required  class="form-control">
                        </div>
                        <label class="control-label"><font color="red">Ex. 31/03/1991</font></label>
                    </div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label">หลักสูตร : Major <font color="red">*</font></label>

                        <div class="col-sm-6">
                            <select class="form-control" id="major" name="major">


                                <?php
                                foreach ($subjects as $subject) {
                                    ?>
                                    <option value="<?php echo $subject['sub_id']; ?>"><?php echo $subject['sub_name_th']; ?> ( <?php echo $subject['sub_name_en']; ?> )</option>

                                    <?php
                                }
                                ?>    
                            </select>
                        </div>


                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">วันที่ออกหนังสือเดินทาง : Passport Start<font color="red">*</font></label>
                        <div class="col-sm-2">
                            <input type="date" data-date-format="DD MMMM YYYY" name="startdate" id="startdate" parsley-trigger="change" required  class="form-control">
                        </div>
                        <label class="control-label"><font color="red">Ex. 20/03/1991</font></label>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">วันหมดอายุของหนังสือเดินทาง : Passport expired<font color="red">*</font></label>
                        <div class="col-sm-2">
                            <input type="date" data-date-format="DD MMMM YYYY" name="enddate" id="enddate" parsley-trigger="change" required  class="form-control">
                        </div>
                        <label class="control-label"><font color="red">Ex. 20/03/1991</font></label>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">วันหมดอายุของวีซ่า : Visa expired<font color="red">*</font></label>
                        <div class="col-sm-2">
                            <input type="date" value="2012/10/02" name="visaend" id="visaend"  required  class="form-control">
                        </div>
                        <label class="control-label"><font color="red">Ex. 20/03/1991</font></label>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">ประเภทหนังสือเดินทาง : Passport Status Type<font color="red">*</font></label>
                        <div class="col-sm-5">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type" id="type" value="N" checked>
                                    ใหม่ : New
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type" id="type" value="Y">
                                    เก่า : old
                                </label>
                            </div>
                        </div>
                       
                    </div>
                </form>

                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-success" onclick="btn_saveResearch();">บันทึก</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    function btn_saveResearch(){
        bootbox.confirm("Are you sure ?", function(result) {
            if (result) {
                var faction = "<?php echo site_url('admin/studentdata/insert_data_student/'); ?>";
                var fdata = fdata = $("#form1").serialize();

                $.post(faction, fdata, function(jdata) {

                    if (jdata.is_successful) {

                        $.pnotify({
                            title: 'แจ้งให้ทราบ!',
                            text: jdata.msg,
                            type: 'success',
                            opacity: 1,
                            history: false

                        });

                        $("#form1").trigger('reset');


                    } else {
                        $.pnotify({
                            title: 'แจ้งให้ทราบ!',
                            text: jdata.msg,
                            type: 'error',
                            opacity: 1,
                            history: false

                        });


                    }

                }, 'json');
            }
        });
        return false;
    }
    </script>