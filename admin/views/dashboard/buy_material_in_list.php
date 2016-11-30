

<!--pnotify-->
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.icons.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.js') ?>"></script>

<script src="<?php echo base_url('assets/bootstrap_extras/bootbox/bootbox.min.js'); ?>"></script>



<?php 
$row = $record->row_array();
?>



<div class="row" id="select_type">
    <div class="col-xs-12 col-md-12">
        <form name="form_select_data" id="select_data" class="form-horizontal">

            <div class="col-md-10">

                <input type="hidden" name="matid" id="matid" value="<?php echo $MatId; ?>">

               <div class="form-group">

                <label class="col-sm-2 control-label">วันที่ซื้อ :</label>

                <div class="col-sm-4">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" id="date1" name="date1" required="" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>

                </div>

            </div>
            <div class="form-group">

                
                <label class="col-sm-2 control-label">รายการวัสดุ :</label>
               
                    
               

                <div class="col-sm-8">
           
                <input type="text" class="form-control" id="txtName1" placeholder="รายการวัสดุ" name="txtName1" value="<?php echo $row['MatName']; ?>">
                <input type="hidden" class="form-control" id="txtName" placeholder="รายการวัสดุ" name="txtName" value="<?php echo $row['MatName']; ?>">

                </div>
        </div>


        <div class="form-group">

            <label class="col-sm-2 control-label">จำนวน :</label>

            <div class="col-sm-3">
                <input type="text" class="form-control" id="qty" placeholder="0000" name="qty" required="">
            </div>
            <label class="col-sm-0 control-label">หน่วย</label>

        </div>
        <div class="form-group">

            <label class="col-sm-2 control-label">ราคา :</label>

            <div class="col-sm-3">
                <input type="text" class="form-control" id="price1" value="<?php echo $row['price']; ?>">
                <input type="hidden" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>">
            </div>
            <label class="col-sm-0 control-label">บาท</label>

        </div>

        <br><br>

        <div class="form-group">
            <button type="button" class="btn btn-success col-md-offset-4" onclick="btn_con1();">เพิ่ม</button>
            <button type="button" class="btn btn-danger" onclick="btn_clear();">ยกเลิก</button>
        </div>
    </div>


</form>
</div>
</div>


<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker({format: 'YYYY/MM/DD'});
        $('#txtName1').prop('disabled',true);
        $('#price1').prop('disabled',true);
      

        
        

    });
</script>
<script>

    $(document).ready(function() {

        //$('#txtId').prop('disabled', 'disabled');

        $('#gender').change(function() {
            if ($('#gender').prop('checked')) {
                $('#txtName').prop('disabled',false);
                $('#txtNameMain').prop('disabled',true);
                console.log("true");
            }else{
                $('#txtName').prop('disabled',true);
                $('#txtNameMain').prop('disabled',false);
                console.log("false");
            }
        });

       


    });


    function btn_con1() {

     

        bootbox.confirm("ต้องการบันทึกหรือไม่ ?", function(result) {
            if (result) {
                var faction = "<?php echo site_url('admin/dashboard/insert_material_add/'); ?>";
                var fdata = fdata = $("#select_data").serialize();

                $.post(faction, fdata, function(jdata) {

                    if (jdata.is_successful) {

                        $.pnotify({
                            title: 'แจ้งให้ทราบ!',
                            text: jdata.msg,
                            type: 'success',
                            opacity: 1,
                            history: false

                        });

                        $('#view_table').load('<?php echo site_url('admin/dashboard/table_buy_material'); ?>');

                        $('.modal-backdrop').remove();


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
    function btn_clear() {
        $("#select_data").trigger('reset');
    }




</script>