
<!--pnotify-->
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.icons.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.js') ?>"></script>

<script src="<?php echo base_url('assets/bootstrap_extras/bootbox/bootbox.min.js'); ?>"></script>


<?php
if ($view == 1 || $view == 2) {
    ?>    
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="block-flat">
                <div class="header">
                    <h4>ข้อมูลส่วนตัว : Student Data</h4>
                </div>
                <br>
                <div class="content">


                    <form class="form-horizontal" name="form1" id="form1">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">รหัสนักศึกษา :Student ID : 学号<font color="red">*</font></label>
                            <div class="col-sm-2">
                                <input type="text" name="stdId1" id="stdId1" parsley-trigger="change" required placeholder="5214631xx" class="form-control" value="<?php echo $students['stdId']; ?>">
                                <input type="hidden" maxlength="15" name="stdId" id="stdId" parsley-trigger="change" required placeholder="5214631xx" class="form-control" value="<?php echo $students['sid']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">รหัสหนังสือเดินทาง :Passport Number : 护照号码<font color="red">*</font></label>
                            <div class="col-sm-2">
                                <input type="text" name="passport" id="passport" parsley-trigger="change" required placeholder="E246884XX" class="form-control" value="<?php echo $students['passport_number']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">คำนำหน้า : Title : 女士/先生<font color="red">*</font></label>
                            <div class="col-sm-2">
                                <select class="form-control" id="title_name" name="title_name">

                                    <option value="Mr.">Mr./先生</option>
                                    <option value="Miss.">Miss./女士</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">ชื่อ : Name : 名字<font color="red">*</font></label>
                            <div class="col-sm-6">
                                <input type="text"  name="fname" id="fname" parsley-trigger="change" required placeholder="Name" class="form-control" value="<?php echo $students['std_fname_th']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">นามสกุล : Last Name : 姓氏<font color="red">*</font></label>
                            <div class="col-sm-6">
                                <input type="text" name="lname" id="lname" parsley-trigger="change" required placeholder="Last Name" class="form-control" value="<?php echo $students['std_lname_th']; ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">วันเกิด : Birthday : 生日<font color="red">*</font></label>
                            <div class="col-sm-2">
                                <input type="date" data-date-format="DD MMMM YYYY" name="birthday" id="birthday" parsley-trigger="change" required  class="form-control" value="<?php echo $students['date_birth']; ?>">
                            </div>
                            <label class="control-label"><font color="red">Ex. (30/1/1990) dd = Day , mm = Month , yyyy = Year</font></label>
                        </div>

                        <div class="form-group">

                            <label class="col-sm-3 control-label">หลักสูตร : Major : 专业 <font color="red">*</font></label>

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
                            <label class="col-sm-3 control-label">วันที่ออกหนังสือเดินทาง : Passport Start : 护照签发日<font color="red">*</font></label>
                            <div class="col-sm-2">
                                <input type="date" data-date-format="DD MMMM YYYY" name="startdate" id="startdate" parsley-trigger="change" required  class="form-control" value="<?php echo $students['passport_statdate']; ?>">
                            </div>
                            <label class="control-label"><font color="red">Ex. (30/1/1990) dd = Day , mm = Month , yyyy = Year</font></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">วันหมดอายุของหนังสือเดินทาง : Passport expired : 护照到期日<font color="red">*</font></label>
                            <div class="col-sm-2">
                                <input type="date" data-date-format="DD MMMM YYYY" name="enddate" id="enddate" parsley-trigger="change" required  class="form-control" value="<?php echo $students['passport_enddate']; ?>">
                            </div>
                            <label class="control-label"><font color="red">Ex. (30/1/1990) dd = Day , mm = Month , yyyy = Year</font></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">วันหมดอายุของวีซ่า : Visa expired : 签证到期日<font color="red">*</font></label>
                            <div class="col-sm-2">

                                <input type="date" format="dd/MM/yyyy" name="visaend" id="visaend"  required  class="date form-control" value="<?php echo $students['visa_enddate']; ?>">

                            </div>
                            <label class="control-label"><font color="red">Ex. (30/1/1990) dd = Day , mm = Month , yyyy = Year</font></label>




                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">ประเภทหนังสือเดินทาง : Passport Status Type : 护照类别 <font color="red">*</font></label>
                            <div class="col-sm-5">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="type" id="type" value="N">
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


                </div>
            </div>
        </div>
    </div> 

    <script>
        
        $(document).ready(function() {
            if (<?php echo $view; ?> == 1) {
                $("#form1 :input").prop("disabled", true);
            }
            
             //$("#visaend").val($.format.date(new Date(), 'dd M yy'));
            var valueCheck = '<?PHP echo $students['passport_status']; ?>';
            
            $('#title_name').val('<?PHP echo $students['pname_st']; ?>');
            $('#major').val('<?PHP echo $students['sub_id']; ?>');
            $("input[name=type][value="+ valueCheck +"]").attr('checked', 'checked');
           


        });
    </script>

    <?php
} else {
    ?>
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
                            <label class="col-sm-3 control-label">รหัสนักศึกษา :Student ID: 学号<font color="red">*</font></label>
                            <div class="col-sm-2">
                                <input type="text"  maxlength="15" name="stdId" id="stdId" parsley-trigger="change" required placeholder="5214631xx" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">รหัสหนังสือเดินทาง :Passport Number : 护照号码<font color="red">*</font></label>
                            <div class="col-sm-2">
                                <input type="text" name="passport" id="passport" parsley-trigger="change" required placeholder="E246884XX" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">คำนำหน้า : Title : 女士/先生<font color="red">*</font></label>
                            <div class="col-sm-2">
                                <select class="form-control" id="title_name" name="title_name">

                                    <option value="Mr.">Mr./先生</option>
                                    <option value="Miss.">Miss./女士</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">ชื่อ : Name : 名字<font color="red">*</font></label>
                            <div class="col-sm-6">
                                <input type="text" name="fname" id="fname" parsley-trigger="change" required placeholder="Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">นามสกุล : Last Name : 姓氏<font color="red">*</font></label>
                            <div class="col-sm-6">
                                <input type="text" name="lname" id="lname" parsley-trigger="change" required placeholder="Last Name" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">วันเกิด : Birthday : 生日<font color="red">*</font></label>
                            <div class="col-sm-2">
                                <input type="date" data-date-format="DD MMMM YYYY" name="birthday" id="birthday" parsley-trigger="change" required  class="form-control">
                            </div>
                            <label class="control-label"><font color="red">Ex. (30/1/1990) dd = Day , mm = Month , yyyy = Year</font></label>
                        </div>

                        <div class="form-group">

                            <label class="col-sm-3 control-label">หลักสูตร : Major : 专业<font color="red">*</font></label>

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
                            <label class="col-sm-3 control-label">วันที่ออกหนังสือเดินทาง : Passport Start : 护照签发日<font color="red">*</font></label>
                            <div class="col-sm-2">
                                <input type="date" data-date-format="DD MMMM YYYY" name="startdate" id="startdate" parsley-trigger="change" required  class="form-control">
                            </div>
                            <label class="control-label"><font color="red">Ex. (30/1/1990) dd = Day , mm = Month , yyyy = Year</font></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">วันหมดอายุของหนังสือเดินทาง : Passport expired : 护照到期日<font color="red">*</font></label>
                            <div class="col-sm-2">
                                <input type="date" data-date-format="DD MMMM YYYY" name="enddate" id="enddate" parsley-trigger="change" required  class="form-control">
                            </div>
                            <label class="control-label"><font color="red">Ex. (30/1/1990) dd = Day , mm = Month , yyyy = Year</font></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">วันหมดอายุของวีซ่า : Visa expired : 签证到期日<font color="red">*</font></label>
                            <div class="col-sm-2">

                                <input type="date" format="dd/MM/yyyy"  name="visaend" id="visaend"  required  class="date form-control">

                            </div>
                            <label class="control-label"><font color="red">Ex. (30/1/1990) dd = Day , mm = Month , yyyy = Year</font></label>




                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">ประเภทหนังสือเดินทาง : Passport Status Type : 护照类别<font color="red">*</font></label>
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
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-success">บันทึก</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <script>
        
        
        $(document).ready(function() {
                      
        });
        
        
        $("#form1").submit(function(event) {
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
                                opacity: 2,
                                history: false

                            });

                            $("#form1").trigger('reset');


                        } else {
                            $.pnotify({
                                title: 'แจ้งให้ทราบ!',
                                text: jdata.msg,
                                type: 'error',
                                opacity: 2,
                                history: false

                            });


                        }

                    }, 'json');
                }
            });
            return false;
        });
        function btn_saveResearch() {
    //        bootbox.confirm("Are you sure ?", function(result) {
    //            if (result) {
    //                var faction = "<?php echo site_url('admin/studentdata/insert_data_student/'); ?>";
    //                var fdata = fdata = $("#form1").serialize();
    //
    //                $.post(faction, fdata, function(jdata) {
    //
    //                    if (jdata.is_successful) {
    //
    //                        $.pnotify({
    //                            title: 'แจ้งให้ทราบ!',
    //                            text: jdata.msg,
    //                            type: 'success',
    //                            opacity: 1,
    //                            history: false
    //
    //                        });
    //
    //                        $("#form1").trigger('reset');
    //
    //
    //                    } else {
    //                        $.pnotify({
    //                            title: 'แจ้งให้ทราบ!',
    //                            text: jdata.msg,
    //                            type: 'error',
    //                            opacity: 1,
    //                            history: false
    //
    //                        });
    //
    //
    //                    }
    //
    //                }, 'json');
    //            }
    //        });
    //        return false;
        }
    </script>

<?php } ?>