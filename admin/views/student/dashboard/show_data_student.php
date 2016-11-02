
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
</style>

<div class="panel panel-default">
    <div class="panel-heading">
        <span class="panel-title">ข้อมูลนักศึกษา</span>
    </div>
    <div class="panel-body">
        <div class="row">

            <table class="display" cellspacing="0" width="100%">
                <thead>
                    <tr class="active" >
                        <th>#</th>
                        <th>รหัสนักศึกษา</th>    
                        <th>ID Passport</th>
                        <th>ชื่อ</th>
                        <th>สกุล</th>
                        <th>สาขาวิชา</th>
                        <th>คณะ</th>
                        <th>หลักศูตร</th>
                        <th>ประเภท</th>
                        <th></th>
                        <th>View</th>


                    </tr>
                </thead>



                <tbody>
                    <?php
                    $i = 1;
                    if($send == "02"){
                    foreach ($student as $row) {
                        ?>


                        <tr class="warning">
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['std_id']; ?></td>
                            <td><?php echo $row['passport_id']; ?></td>
                            <td><?php echo $row['std_fname_en']; ?></td>
                            <td><?php echo $row['std_lname_en']; ?></td>
                            <td><?php echo $row['maj_name_th']; ?></td>
                            <td><?php echo $row['fac_name_th']; ?></td>
                            <td><?php echo $row['lev_name_st']; ?></td>
                            <td><?php echo $row['inter_type_name_th']; ?></td>
                            <td><?php echo $row['nation_name_th']; ?></td>  
                            <td><i class="btn btn-danger " data-toggle="modal" data-target="#myModal" onclick ="showModal(<?php echo $row['std_id']; ?>)">View</i></td>

                        </tr>
                        <?php
                        $i++;
                    }
                    }else if($send == "03"){
                        foreach ($student as $row) {
                        ?>


                        <tr class="warning">
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['std_id']; ?></td>
                            <td><?php echo $row['passport_id']; ?></td>
                            <td><?php echo $row['std_fname_en']; ?></td>
                            <td><?php echo $row['std_lname_en']; ?></td>
                            <td><?php echo $row['sub_name_th']; ?></td>
                            <td><?php echo $row['maj_name_th']; ?></td>
                            <td><?php echo $row['lev_name_st']; ?></td>
                            <td><?php echo $row['inter_type_name_th']; ?></td>
                            <td><?php echo $row['nation_name_th']; ?></td>  
                            <td><i class="btn btn-danger " data-toggle="modal" data-target="#myModal" onclick ="showModal(<?php echo $row['std_id']; ?>)">View</i></td>

                        </tr>
                        <?php
                        $i++;
                    }
                    
                    
                    foreach ($student2 as $row) {
                        ?>
                        <tr class="warning">
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['std_id']; ?></td>
                            <td><?php echo $row['passport_id']; ?></td>
                            <td><?php echo $row['std_fname_en']; ?></td>
                            <td><?php echo $row['std_lname_en']; ?></td>
                            <td><?php echo $row['maj_name_th']; ?></td>
                            <td><?php echo $row['fac_name_th']; ?></td>
                            <td><?php echo $row['lev_name_st']; ?></td>
                            <td><?php echo $row['inter_type_name_th']; ?></td>
                            <td><?php echo $row['nation_name_th']; ?></td>  
                            <td><i class="btn btn-danger " data-toggle="modal" data-target="#myModal" onclick ="showModal(<?php echo $row['std_id']; ?>)">View</i></td>

                        </tr>
                        <?php
                        $i++;
                    }
                    
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">ข้อมูลนักศึกษา</h4>
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

<script>


    function showModal(xid) {
        var sdata = xid;
        $('#div_show').load('student/show_data_student/'+ sdata);
        $('#modalShow').modal('show');
    }
</script>