
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

<div class="row" id="select_type">
    <div class="col-xs-12 col-md-12">
        <form name="form_select_data" id="select_data" class="form-horizontal">

            <div class="col-md-10">



               <div class="form-group">

                <label class="col-sm-2 control-label">วันที่ซื้อ :</label>

                <div class="col-sm-4">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" id="date1" name="date1"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>

                </div>

            </div>
            <div class="form-group">

                <label class="col-sm-2 control-label">รายการวัสดุ :</label>
                <div class="row">
                <div class="col-sm-9">
                    <select class="selectpicker" data-live-search="true" id="txtNameMain">
                    <?php
                    foreach ($record as $row) {
                    ?>                
                      <option value="<?php echo $row['MatId']; ?>"><?php echo $row['MatName']; ?></option>
                    
                    <?php
                    }
                    ?>
                  </select>
                
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                  <input type="checkbox" name="gender" id="gender" value="notvalue"> * ไม่มีในรายการที่เลือก
                                
              </div>
              </div>

              <br>

              <div class="col-sm-7 col-sm-offset-2">
                <input type="text" class="form-control" id="txtName" placeholder="รายการวัสดุ" name="txtName">
            </div>

        </div>


        <div class="form-group">

            <label class="col-sm-2 control-label">จำนวน :</label>

            <div class="col-sm-2">
                <input type="text" class="form-control" id="qty" placeholder="0000" name="qty">
            </div>
            <label class="col-sm-0 control-label">บาท</label>

        </div>
        <div class="form-group">

            <label class="col-sm-2 control-label">ราคา :</label>

            <div class="col-sm-2">
                <input type="text" class="form-control" id="price" placeholder="0000" name="price">
            </div>
            <label class="col-sm-0 control-label">บาท</label>

        </div>

        <div class="form-group">
            <button type="button" class="btn btn-success col-md-offset-4" onclick="btn_con();">เพิ่ม</button>
            <button type="button" class="btn btn-danger" onclick="btn_clear();">ยกเลิก</button>
        </div>
    </div>


</form>
</div>
</div>


<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker({format: 'YYYY/MM/DD'});
        $('#txtName').prop('disabled',true);
        $('.selectpicker').selectpicker();

        

    });
</script>
<script>

    $(document).ready(function() {

        //$('#txtId').prop('disabled', 'disabled');
    });


    function btn_con() {

        bootbox.confirm("ต้องการบันทึกหรือไม่ ?", function(result) {
            if (result) {
                var faction = "<?php echo site_url('admin/dashboard/insert_goods/'); ?>";
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

                        //$("#select_data").trigger('reset');


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