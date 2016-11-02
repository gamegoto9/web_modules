<!--datatable-->
<link href="<?php echo base_url('assets/css/jquery.dataTables.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">

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
  
    <div class="panel-body">
        <div class="row">

            <table class="display" cellspacing="0" width="100%">
                <thead>
                    <tr class="active" >
                        <th>ชื่อกลุ่ม</th>
                        <th>ชื่อ - สกุล</th>    
                        <th>เบอร์โทร</th>
                        <th>E-mail</th>
                        <th>หัวหน้ากลุ่ม</th>
                        <th>อาจารย์ที่ปรึกษา</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($recData as $row) {
                        ?>
                        <tr class="warning">
                            <td><?php echo $row['Gname']; ?></td>
                            <td><?php echo $row['fname']; ?>&nbsp;&nbsp;&nbsp;<?php echo $row['lname']; ?></td>
                            <td><?php echo $row['tel']; ?></td>
                            <td><?php echo $row['email']; ?></td>

                            <?PHP if ($row['Bossid'] == 1) { ?>
                                <td align="center"><i class="fa fa-check"></i></td>
                            <?PHP } else {
                                ?>
                                <td></td>
                            <?PHP
                            }
                            ?>

                            <td><?php echo $row['advisors']; ?></td>
                        </tr>
                        <?php
                     
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


