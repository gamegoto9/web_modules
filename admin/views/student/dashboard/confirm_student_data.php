
<!--datatable-->
<link href="<?php echo base_url('assets/css/jquery.dataTables.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<!--pnotify-->
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.icons.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.js') ?>"></script>

<script src="<?php echo base_url('assets/bootstrap_extras/bootbox/bootbox.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('table.display').dataTable();
    });
</script>
<style>
    div.dataTables_wrapper {
        margin-bottom: 3em;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
</style>
<div class="row" id="select_type">
    <div class="col-xs-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <div class="col-md-11">
                    <span class="panel-title">ข้อมูลนักศึกษา</span>
                </div>
                <i class="btn btn-success" data-toggle="modal" data-target="#myModal" onclick ="btnnana('<?PHP echo $this->session->userdata('sc_type1'); ?>','<?PHP echo $this->session->userdata('sc_type2'); ?>')">อนุมัติผล</i>

            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="table-responsive">

                        <table class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr class="active" >
                                    <th>#</th>
                                    <th>ที่</th>
                                    <th>รหัสนักศึกษา</th>    
                                    <th>ID Passport</th>
                                    <th>ชื่อ</th>
                                    <th>สกุล</th>
                                    <th>สาขาวิชา</th>
                                    <th>คณะ</th>
                                    <th>หลักศูตร</th>
                                    <th>ประเภท</th>
                                    <th>สถานะ</th>
                                    <th>ดูข้อมูล</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($student as $row) {
                                    ?>
                                    <tr class="warning">
                                        <td><input type="checkbox" class="checkbox" name="checkCon" value="<?php echo $row['std_id']; ?>"></td>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row['std_id']; ?></td>
                                        <td><?php echo $row['passport_id']; ?></td>
                                        <td><?php echo $row['std_fname_en']; ?></td>
                                        <td><?php echo $row['std_lname_en']; ?></td>
                                        <td><?php echo $row['sub_name_th']; ?></td>
                                        <td><?php echo $row['maj_name_th']; ?></td>
                                        <td><?php echo $row['lev_name_st']; ?></td>
                                        <td><?php echo $row['inter_type_name_th']; ?></td>
                                        <td>
                                            <?php
                                            if ($row['std_status_id'] == '0E') {
                                                ?>
                                                <button type="button" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i></button>
                                                <?PHP
                                            } else {
                                                ?>
                                                <button type="button" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </td> 
                                        <td>
                                            <i class="btn btn-primary " data-toggle="modal" data-target="#myModal" onclick ="showModal(<?php echo $row['std_id']; ?>)">View</i>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row['std_status_id'] == '0E') {
                                                ?>
                                                สำเร็จการศึกษาแล้ว
                                                <?PHP
                                            } else {
                                                ?>
                                                <i class="btn btn-warning " data-toggle="modal" data-target="#myModal" onclick ="btn_conf(<?php echo $row['std_id']; ?>)">อนุมัติผล</i>
                                                <?php
                                            }
                                            ?>

                                        </td>

                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




<!-- Modal -->
<div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">


                <div id="div_show">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save_edit()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>

    $(function() {

    });
    function btnnana(sctype1,sctype2) {
        var favorite = [];
        $.each($("input[name='checkCon']:checked"), function() {
            favorite.push($(this).val());
        });
        alert("My favourite sports are: " + favorite + ("', '"));
        var sc_type1 = sctype1;
        var sc_type2 = sctype2
        console.log(sc_type1 + " = " + sc_type2);

        bootbox.dialog({
            message: "Password : <input type='password' class='form-control' name='pass' id='pass'></input>",
            title: "ยืนยันการอนุมัติ",
            buttons: {
                main: {
                    label: "Close",
                    className: "btn-primary",
                },
                success: {
                    label: "OK!",
                    className: "btn-success",
                    callback: function() {
                        var key = "sphrd2345";
                       

                        // alert("Hi "+ $('#pass').val());
                        var keyword = $('#pass').val();

                        //if(keyword == key){
                        var dataid = favorite+"";        

                        var sdata = {id: dataid,
                            key: keyword};
                        var faction = '<?php echo site_url('admin/student/conf_studentAll'); ?>';
                        $.post(faction, sdata, function(jdata) {

                            if (jdata.is_successful) {
                                $.pnotify({
                                    title: 'แจ้งให้ทราบ',
                                    text: jdata.msg,
                                    type: 'success',
                                    history: false,
                                    delay: 3000
                                });

                                //  $(window.location).attr('href', '<?php echo site_url('website/index') ?>');  //โหลด function liste_data อีกครั้ง
                                $('#myTab a[href="#list"]').tab('show');
                                // LoadList();
                                $('#show_data_confirm').load('student/select_data_type/' + sc_type1 + '/' + sc_type2);
                            } else {
                                $.pnotify({
                                    title: 'แจ้งให้ทราบ',
                                    text: jdata.msg,
                                    type: 'error',
                                    history: false,
                                    delay: 3000
                                });
                            }
                        }, 'json');

                    }
                }

            }
        });


    }

    function btn_conf(id) {

        bootbox.dialog({
            message: "Password : <input type='password' class='form-control' name='pass' id='pass'></input>",
            title: "ยืนยันการส่งคืน",
            buttons: {
                main: {
                    label: "Close",
                    className: "btn-primary",
                },
                success: {
                    label: "OK!",
                    className: "btn-success",
                    callback: function() {
                        var key = "sphrd2345";


                        // alert("Hi "+ $('#pass').val());
                        var keyword = $('#pass').val();

                        //if(keyword == key){


                        var sdata = {id: id,
                            key: keyword};
                        var faction = '<?php echo site_url('admin/student/conf_student'); ?>';
                        $.post(faction, sdata, function(jdata) {

                            if (jdata.is_successful) {
                                $.pnotify({
                                    title: 'แจ้งให้ทราบ',
                                    text: jdata.msg,
                                    type: 'success',
                                    history: false,
                                    delay: 3000
                                });

                                //  $(window.location).attr('href', '<?php echo site_url('website/index') ?>');  //โหลด function liste_data อีกครั้ง
                                $('#myTab a[href="#list"]').tab('show');
                                // LoadList();
                            } else {
                                $.pnotify({
                                    title: 'แจ้งให้ทราบ',
                                    text: jdata.msg,
                                    type: 'error',
                                    history: false,
                                    delay: 3000
                                });
                            }
                        }, 'json');

                    }
                }

            }
        });

    }
</script>
