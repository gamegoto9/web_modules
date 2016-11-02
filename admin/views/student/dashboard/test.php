
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
    } );
</script>
<style>
    div.dataTables_wrapper {
        margin-bottom: 3em;
    }
</style>


<table class="display" cellspacing="0" width="100%">
    <thead>
     <?php
        echo $type;
     ?>
  
        <tr bgcolor='#fff045'>
            <th>#</th>
            <th>รหัสนักศึกษา</th>
            <th>ชื่อ</th>
            <th>สกุล</th>
            <th>สาขาวิชา</th>
            <th>คณะ</th>
            <th>ปีที่เข้า</th>
            <th>หลักสูตร</th>
            <th>ประเภท</th>
            <th>ดูข้อมูล</th>
            <th>ลบ</th>
        </tr>
    </thead>



    <tbody>
        <?php
        $i = 1;
        foreach ($record as $row) {
            ?>

            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['student_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['sub_name']; ?></td>
                <td><?php echo $row['major_name']; ?></td>
                <td><?php echo $row['year']; ?></td>
                <td><?php echo $row['level']; ?></td>
                <td><?php echo $row['type']; ?></td>
              
                <td><a href ="<?php echo site_url('admin/dashboard/show_data_student'); ?>" class="btn btn-info">View</a></td>
                <td> <i class="btn btn-danger" onclick="btn_delete(<?php echo $row['student_id']; ?>);" >Delete</i></td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </tbody>
</table>



<script>
    function btn_delete(id){
     
     
        bootbox.confirm("ยืนยันการลบข้อมูล ? ", function(ans) {
            if (ans) {
                var sdata = {id: id};
                var faction = '<?php echo site_url('admin/dashboard/delete_data_student'); ?>';
                $.post(faction, sdata, function(jdata) {
                
                    if (jdata.is_successful) {
                        $.pnotify({
                            title: 'แจ้งให้ทราบ',
                            text: jdata.msg,
                            type: 'success',
                            history: false,
                            delay: 3000
                        });
                        //                                       
                        //                        //$(window.location).attr('href', '<?php echo site_url('website/list_data') ?>');  //โหลด function liste_data อีกครั้ง
                        //                        //                                       $('#myTab a[href="#list"]').tab('show');
                        //                        //                                       LoadList();
                    }
                }, 'json');

   
            
            }
        });   
    }
    
</script>