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
    body .modal-admin {
        /* new custom width */
        width: 80%;
        /* must be half of the width, minus scrollbar on the left (30px) */
        margin-left: 10%;
    }

</style>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>รายชื่อนักศึกษา : Student List</h4>
            </div>
            <br>
            <div class="col-md-12">
                <a href="<?php echo site_url('admin/studentdata/export_excel'); ?>" target="_blank" class="btn btn-success btn pull-right">พิมพ์รายงาน</a>
            </div>
            <p>
            <div class="content">
                <table class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active" >
                            <th>#</th>    
                            <th>ID Student</th>
                            <th>ID Passport</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th>LastName</th>
                            <th>Major</th>
                            <th>Major_en</th>
                            <th>View</th>
                            <th>Edit</th>


                        </tr>
                    </thead>



                    <tbody>
                        <?php
                        $i = 1;

                        foreach ($student as $row) {
                            ?>
                            <tr class="warning">
                                <td><?php echo $i ?></td>
                                <td><?php echo $row['stdId']; ?></td>
                                <td><?php echo $row['passport_number']; ?></td>
                                <td><?php echo $row['pname_st']; ?></td>
                                <td><?php echo $row['std_fname_th']; ?></td>
                                <td><?php echo $row['std_lname_th']; ?></td>
                                <td><?php echo $row['sub_name_th']; ?></td>
                                <td><?php echo $row['sub_name_en']; ?></td>

                                <td><i class="btn btn-info " data-toggle="modal" data-target="#myModal" onclick ="showModal('<?php echo $row['sid']; ?>')">View</i></td>
                                <td><i class="btn btn-warning " data-toggle="modal" data-target="#myModal" onclick ="showModal2('<?php echo $row['sid']; ?>')">edit</i></td>

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

<!-- Modal -->
<div class="modal fade" tabindex="-1" id="modalShow" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg modal-admin" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Student Data</h4>
            </div>
            <div class="modal-body">


                <div id="div_show">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" tabindex="-1" id="modalShow2" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg modal-admin" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Student Data</h4>
            </div>
            <div class="modal-body">


                <div id="div_show2">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="saveEdit()">Save Edit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>




<script>


    function showModal(xid) {

    
        var sdata = xid;
       
        var view = 1;
        $('#div_show').load('studentdata/show_data_student/' + sdata + '/' + view);
        $('#modalShow').modal('show');
    }
    function showModal2(xid) {

        var sdata = xid;
        var view = 2;
        $('#div_show2').load('studentdata/show_data_student/' + sdata + '/' + view);
        $('#modalShow2').modal('show');
    }
    
    function saveEdit(){
        bootbox.confirm("Are you sure ?", function(result) {
                if (result) {
                    var faction = "<?php echo site_url('admin/studentdata/edit_data_student/'); ?>";
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

                            $('#modalShow2').modal('hide');
                            $('#main_view').load('studentdata/liststudent/');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            

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
    }

    function btn_delete(id) {
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
                        var faction = '<?php echo site_url('admin/dashboard/delete_data_durable'); ?>';
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


                        //}else{



                        //}

                    }
                }

            }
        });

    }
    
    
</script>
