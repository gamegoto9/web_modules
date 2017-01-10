<!DOCTYPE html>
<!-- content starts -->
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="panel-title panel-warning">ข้อมูลการซ่อมบำรุง ครุภัณฑ์</span>
    </div>
    <div class="panel-body">
        <div class="row">

            <div class="col-md-12 col-md-offset-0" style="padding: 20px">

                <div class="panel panel-success">
                    <div class="panel-heading">ข้อมูลครุภัณฑ์
                    </div>

                    <table class="table table-bordered table-striped table-condensed">

                        <tbody>
                            <?php

                            foreach ($record as $row) {
                                $id_goods = $row['id_goods'];
                                ?>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td width="250"><span class="thsarabunnew">ขื่อครุภัณฑ์ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['name_goods']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ยี่ห้อ / รุ่น :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['brand_goods']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">หมายเลขครุภัณฑ์ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['id_goods_crru']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ร้านที่จัดซื้อ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['name_buy']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">สถานะ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP if($row['status'] == '1'){
                                        echo "ยังไม่คืน ใช้งานได้";
                                    }else if($row['status'] == '2'){
                                        echo "ส่งคืนแล้ว";
                                    }else if($row['status'] == '9'){
                                        echo "ไม่ทราบข้อมูลที่อยู่";
                                    }else if($row['status'] == '3'){
                                        echo "ชำรุด";
                                    }else if($row['status'] == '4'){
                                        echo "ยืม";
                                    }
                                    ?></span></td>

                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ผู้ครอบครอง(ดูแล) :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?php echo $row['address']; ?></span></td>

                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table> 

                </div>

            </div>


            <div class="col-md-12 col-md-offset-0" style="padding: 20px">

                <div class="panel panel-info">
                    <div class="panel-heading">ข้อมูล การซ่อมครุภัณฑ์
                    </div>
                    <div class="panel-body" id="panelMain">


                        <form name="form_select_data" id="select_data" class="form-horizontal">
                            <div class="form-group">


                                <div class="col-md-2">
                                  <label for="inputsumPrice" class="control-label ">วันที่ซ่อม :</label>
                              </div>
                              <div class="col-md-2">
                               <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" id="date1" name="date1" required="" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label class="control-label">รายละเอียดการซ่อม :</label>
                        </div>
                        <div class="col-sm-6">
                            <textarea class="form-control" rows="2" id="txtSubject" name="txtSubject" placeholder="รายละเอียด"></textarea>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                          <label for="inputsumPrice" class="control-label ">จำนวนเงิน :</label>
                      </div>
                      <div class="col-md-2">
                       <input type="number" name="price" id="price" class="form-control">
                       <input type="hidden" name="txtid" id="txtid" class="form-control" value="<?php echo $id_goods; ?>">
                   </div>
                   <div class="col-md-2">
                      <label for="inputsumPrice" class="control-label "> บาท</label>
                  </div>
              </div>

              <div class="form-group">


                <div class="col-md-2">
                  <label for="inputsumPrice" class="control-label ">หมายเหตุ :</label>
              </div>
              <div class="col-md-6">
                 <div class="radio">
                 <label><input type="radio" name="note" id="note" value="การซ่อมถือเป็นค่าใช่จ่าย">การซ่อมถือเป็นค่าใช่จ่าย</label>
              </div>
              <div class="radio">
                  <label><input type="radio" name="note" id="note" value="การซ่อมถือเป็นการเพิ่มทุนของทรัพย์สิน">การซ่อมถือเป็นการเพิ่มทุนของทรัพย์สิน</label>
              </div>
          </div>
      </div>




</form>
  </div>
</div>

</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker({format: 'YYYY/MM/DD'});

    });
</script>
<script>

    $(document).ready(function() {

        //$('#txtId').prop('disabled', 'disabled');
    });


    function btn_con() {

        bootbox.confirm("ต้องการบันทึกหรือไม่ ?", function(result) {
            if (result) {
                var faction = "<?php echo site_url('admin/dashboard/insert_repair/'); ?>";
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

