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
<table class="display" cellspacing="0" width="100%">
    

    <thead>
        <tr bgcolor='#7ACCFA'>
            <th>#</th>
            <th>รายการ</th>
            <th>จำนวน</th>
            <th>ราคา</th>
            <th>ราคารวม</th>
            <!-- <th>ซื้อวัสดุ</th> -->
        
        </tr>
    </thead>
     <tbody>


    
        <?php
        $i = 1;

       
            
            foreach ($record->result_array() as $row) {
            ?>

                    <tr>
                
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['MatName']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['price_totle']; ?></td>
                    <!-- <td><i class="fa fa-reply btn btn-warning" onclick="buy_material('<?php //echo $row['MatId']; ?> <!-- ')"> ซื้อวัสดุ</i></td> -->
                    
                    </tr>

                    <?php
                     $i++;
            } ?> 

        </tbody>
       
</table>

<!-- Modal -->
<div class="modal fade" id="modalShow_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-admin">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">-- ข้อมูลครุภัณฑ์ --</h4>
            </div>
            <div class="modal-body">


                <div id="div_show2">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>

    $(document).ready(function(){
        
    });


    function buy_material(xid) {


        var sdata = {id: xid};
        $('#div_show2').load('<?php echo site_url('admin/dashboard/data_buy_list_in'); ?>', sdata);
        $('#modalShow_2').modal('show');
    }

</script>