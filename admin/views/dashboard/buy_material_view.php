<!--pnotify-->
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.icons.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.js') ?>"></script>

<script src="<?php echo base_url('assets/bootstrap_extras/bootbox/bootbox.min.js'); ?>"></script>


<div class="row" id="select_type">
    <div class="col-xs-12 col-md-12">
        <form name="form_select_data" id="select_data" class="form-horizontal">



            <div class="col-md-12 col-md-offset-0" style="padding: 10px">

                <div class="panel panel-default " >
                    <div class="panel-heading">ข้อวัสดุหลัก</div>
                    <div class="panel-body" id="panelMain">

                        <input type="hidden" name="matid" id="matid" value="<?php echo $MatId; ?>">

                        <div class="form-group">

                            <label class="col-sm-2 control-label">เลขที่อ้างอิง(กองคลัง) :</label>

                            <div class="col-sm-4">

                                <input type='text' class="form-control" id="idbuy" name="idbuy" required />
                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-2 control-label">ชื่อร้านค้า :</label>

                            <div class="col-sm-6">

                                <input type='text' class="form-control" id="market_name" name="market_name" required />


                            </div>

                        </div>

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

                    </div>
                </div>

            </div>


            <div class="col-md-12 col-md-offset-0" style="padding: 10px">

                <div class="panel panel-warning">
                    <div class="panel-heading">ข้อวัสดุ</div>
                    <div class="panel-body">

                        <div class="form-group">

                            <label class="col-sm-2 control-label">รายการวัสดุ :</label>

                            <select class="selectpicker col-sm-9" data-live-search="true" id="txtNameMain" name="txtNameMain">
                                <?php
                                foreach ($record->result_array() as $row) {
                                    ?>                
                                    <option value="<?php echo $row['MatId']; ?>"><?php echo $row['MatName']; ?></option>

                                    <?php
                                }
                                ?>
                            </select>

                            <br>
                            <div class="col-sm-7 col-sm-offset-2">
                                <input type="checkbox" name="gender" id="gender" value="notvalue"><font color="red"> * ไม่มีในรายการที่เลือก</font>

                            </div>

                            <br><br>

                            <div class="col-sm-7 col-sm-offset-2">
                                <input type="text" class="form-control" id="txtName" placeholder="รายการวัสดุ" name="txtName">
                            </div>

                        </div>


                        <div class="form-group">

                            <label class="col-sm-2 control-label">จำนวน :</label>

                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="qty" placeholder="1" name="qty" required="">
                            </div>
                            <label class="col-sm-0 control-label">หน่วย</label>

                        </div>
                        <div class="form-group">

                            <label class="col-sm-2 control-label">ราคา :</label>

                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="price" placeholder="200" name="price" required="ป้อนราคา">
                            </div>
                            <label class="col-sm-0 control-label">บาท</label>

                        </div>
                        <br><br>
                        <div class="form-group">
                            <button type="button" class="btn btn-success col-md-offset-5" onclick="btn_add();">เพิ่มรายการ</button>
                            <button type="button" class="btn btn-danger" onclick="btn_clear();">ยกเลิก</button>
                        </div>


                    </div>
                </div>

            </div>

            <div class="col-md-12 col-md-offset-0" style="padding: 10px">

                <div class="panel panel-info">
                    <div class="panel-heading">รายละเอียดการเพิ่ม</div>
                    <div class="panel-body">
                        <table class="table table-bordered" id="tData">
                            <thead bgcolor="#f19e33">
                                <th class="text-center">#</th>
                                <th class="text-center">รายการ/รายละเอียด</th>
                                <th class="text-center">ราคา</th>
                                <th class="text-center">จำนวน</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        
                    </div>
                </div>

            </div>



        </form>
    </div>
</div>


<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker({format: 'YYYY/MM/DD'});
        $('.selectpicker').selectpicker();

        $('#txtName').prop('disabled',true);
        

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

    function btn_add() {
      // $('#panelMain').prop('disabled',true);
      $("#panelMain :input").attr("disabled", "disabled");
      var qty = $("#qty").val();
      var price = $("#price").val();
      

      if(qty != "" && price != ""){

        if ($('#gender').prop('checked')) {
            var tname = $('#txtName').val();
            var tvalue = "";

        }else{
          var tname = $('#txtNameMain :selected').text();
          var tvalue = $('#txtNameMain').val();
      }



      var numtitle =  $('#tData tbody tr').length+1;
      console.log(numtitle);

      $("#tData tbody").append("<tr>"+
        "<td class='text-center'>"+numtitle+"</td>"+
        "<td class='text-left'>"+tname+"</td>"+
        "<td class='text-center'>"+price+"</td>"+
        "<td class='text-center'>"+qty+"</td>"+
        "<td class='text-center'>"+tvalue+"</td>"+

        "</tr>"); 

      $(".hid_p").hide();
  }else{
    bootbox.alert("*กรุณาป้อน จำนวน ราคา");
}

}


function btn_con() {



    bootbox.confirm("ต้องการบันทึกหรือไม่ ?", function(result) {
        if (result) {

            var rowss = $('#tData >tbody >tr').length;
            console.log(rowss);

            var numid = $("#idbuy").val();
                var namebuy = $("#market_name").val();
                var date_buy = $("#date1").val();

            if(rowss > 0 && numid != "" && namebuy != "" && date_buy != ""){

                var i = 0;
                var row = 1;
                var a_tname = new Array();
                var a_tvalue = new Array();
                var a_qty = new Array();
                var a_price = new Array();

                while(row <= rowss){
                    a_tname[i] = $('#tData').children().children().eq(row).children().eq(1).text();
                    a_qty[i] = $('#tData').children().children().eq(row).children().eq(3).text();
                    a_price[i] = $('#tData').children().children().eq(row).children().eq(2).text();
                    a_tvalue[i] = $('#tData').children().children().eq(row).children().eq(4).text();
                    i++;
                    row++;
                }

                

                 var faction = "<?php echo site_url('admin/dashboard/insert_material_new/'); ?>";
                 var fdata = {tname: a_tname,tvalue: a_tvalue,qty: a_qty,price: a_price, numid: numid, namebuy: namebuy, date_buy: date_buy,row: rowss};

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

            }else{
                bootbox.alert("*ไม่ได้ป้อน ข้อมูลวัสดุหลัก หรือ ไม่มีรายการที่ซื้อ กรุณาเพิ่มรายงาน");

            }

            
        }
    });
    return false;
}
function btn_clear() {
    $("#select_data").trigger('reset');
    $('#panelMain :input').attr('disabled',false);

}




</script>