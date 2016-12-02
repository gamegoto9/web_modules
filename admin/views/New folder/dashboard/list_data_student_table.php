<!--datatable-->
<link href="<?php echo base_url('assets/css/jquery.dataTables.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

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

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>รายชื่อนักศึกษา : Student List</h4>
            </div>
            <br>
            <div class="content">
                <table class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active" >
                            <th>#</th>                             
                            <th>ID Passport</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th>LastName</th>
                            <th>Major</th>
                            <th>Major_en</th>
<!--                            <th>View</th>-->


                        </tr>
                    </thead>



                    <tbody>
                        <?php
                        $i = 1;
                      
                            foreach ($student as $row) {
                                ?>
                                <tr class="warning">
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row['passport_number']; ?></td>
                                    <td><?php echo $row['pname_st']; ?></td>
                                    <td><?php echo $row['std_fname_th']; ?></td>
                                    <td><?php echo $row['std_lname_th']; ?></td>
                                    <td><?php echo $row['sub_name_th']; ?></td>
                                    <td><?php echo $row['sub_name_en']; ?></td>
                                   
<!--                                    <td><i class="btn btn-danger " data-toggle="modal" data-target="#myModal" onclick ="showModal(<?php echo $row['passport_number']; ?>)">View</i></td>-->

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
