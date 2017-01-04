<div class="row" id="select_type">
    <div class="col-xs-12 col-md-12">
        <form name="form_select_data" id="select_data" class="form-horizontal">

            <?php 
            $row = $reTurnGoods->row_array();
            ?>



            <div class="col-md-12 col-md-offset-0" style="padding: 10px">

                <div class="panel panel-primary ">
                    <div class="panel-heading">ข้อมูลการยืม</div>
                    <div class="panel-body" id="panelMain">

                        <div class="form-group">


                            <div class="col-md-2">
                              <label for="inputsumPrice" class="control-label ">รหัสการยืม :</label>
                          </div>
                          <div class="col-md-8">
                             <label for="inputsumPrice" class="control-label "><?php echo $row['get_id'];?></label>
                             <input type="hidden" name="getId" id="getId" value="<?php echo $row['get_id'];?>">

                             <input type="hidden" name="maxid" id="maxid" value="<?php echo "RE".sprintf("%05d ",$maxid->maxID+1); ?>">


                         </div>
                     </div>
                     <div class="form-group">


                        <div class="col-md-2">
                          <label for="inputsumPrice" class="control-label ">วันที่ยืม :</label>
                      </div>
                      <div class="col-md-8">
                         <label for="inputsumPrice" class="control-label "><?php echo $row['Ddate_get'];?></label>
                     </div>
                 </div>
                 <div class="form-group">


                    <div class="col-md-2">
                      <label for="inputsumPrice" class="control-label ">วันที่ต้องการคืน :</label>
                  </div>
                  <div class="col-md-8">
                     <label for="inputsumPrice" class="control-label "><?php echo $row['Ddate_return'];?></label>
                 </div>
             </div>
             <div class="form-group">


                <div class="col-md-2">
                  <label for="inputsumPrice" class="control-label ">ผู้ยืม :</label>
              </div>
              <div class="col-md-8">
                 <label for="inputsumPrice" class="control-label "><?php echo $row['name_get'];?></label>
             </div>
         </div>
         <div class="form-group">


            <div class="col-md-2">
              <label for="inputsumPrice" class="control-label ">สังกัด :</label>
          </div>
          <div class="col-md-8">
             <label for="inputsumPrice" class="control-label "><?php echo $row['major_get'];?></label>
         </div>
     </div>

     <div class="form-group">


        <div class="col-md-2">
          <label for="inputsumPrice" class="control-label ">ผู้บันทึกข้อมูล :</label>
      </div>
      <div class="col-md-8">
         <label for="inputsumPrice" class="control-label "><?php echo $row['name'];?></label>
     </div>
 </div>


</div>
</div>
</div>



<div class="col-md-12 col-md-offset-0" style="padding: 10px">

    <div class="panel panel-info ">
        <div class="panel-heading">ข้อมูลผู้คืน</div>
        <div class="panel-body" id="panelMain">

            <div class="form-group">


                <div class="col-md-2">
                  <label for="inputsumPrice" class="control-label ">ชื่อผู้คืน :</label>
              </div>
              <div class="col-md-6">
                 <input type="text" name="txtName" id="txtName" class="form-control">
             </div>
         </div>
         <div class="form-group">


            <div class="col-md-2">
              <label for="inputsumPrice" class="control-label ">วันที่คืน :</label>
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
     
</div>
</div>
</div>

<div class="col-md-12 col-md-offset-0" style="padding: 10px">

    <div class="panel panel-success">
        <div class="panel-heading">รายละเอียดการยืม</div>
        <div class="panel-body" id="panelMain">

<table class="table table-bordered" id="tDataGoods">
    <thead bgcolor='#FFFFf'>
        <th class="text-center">#</th>
        <th class="text-center">หมายเลขครุภัณฑ์</th>
        <th class="text-center">รายการ/รายละเอียด</th>
        <th class="text-center">จำนวน</th>
        <th class="text-center">เลือก</th>


    </thead>
    <tbody>
        <?php

        $i = 1;

        foreach ($reTurnGoods->result_array() as $row) {
            if($row['standard'] == 1){
                $standard = 'ครุภัณฑ์';
            }else{
                $standard = 'ครุภัณฑ์ต่ำกว่าเกณฑ์';
            }
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['id_goods_crru']; ?></td>
                <td><?php echo $row['name_goods'].'('.$standard.')'; ?></td>
                <td>1 ชิ้น</td>
                <td align="center">
                    <?php
                    if($row['status'] == 1){
                    ?>

                     
                        <label><input type="checkbox" class="checkbox" name="hobbies" value="<?php echo $row['id_goods']; ?>">เลือก</label>
                    

                      <?php
                 }else{
                     echo "<font color='green'>คืนเรียบร้อย</font>";
                 }
                 ?>
             </td>                                                     
         </tr>
         <?php
         $i++;
     }
     ?>

 </tbody>
</table>

<div class="form-group">


    <div class="form-group">

     <div class="col-md-12">
        <div class="col-md-1 col-md-offset-9">
          <label for="inputsumPrice" class="control-label ">รวมทั้งหมด</label>
      </div>
      <div class="col-md-1">
         <label for="inputsumPrice" class="control-label "><?php echo $i-1;?></label>
     </div>
     <div class="col-md-1">
         <label for="inputsumPrice" class="control-label ">ชิ้น</label>
     </div>

 </div>



</div>
</div>
</div>
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
    });

    function conn(){

      bootbox.confirm("ต้องการบันทึกหรือไม่ ?", function(result) {
        if (result) {

                var id_data = [];
                $("input[name='hobbies']:checked").each(function() {
                    id_data.push(this.value);
              
                });

                if(id_data.length != 0 && $("#txtName").val() != "" && $("#date1").val() != ""){

                var faction = "<?php echo site_url('admin/dashboard/insert_return_goods/'); ?>";
                var fdata = {get_id: $("#getId").val(),max: $("#maxid").val(),dateRe: $("#date1").val(),name: $("#txtName").val(), value_data: id_data, rows: id_data.length};

                $.post(faction, fdata, function(jdata) {

                    if (jdata.is_successful) {

                        $.pnotify({
                            title: 'แจ้งให้ทราบ!',
                            text: jdata.msg,
                            type: 'success',
                            opacity: 1,
                            history: false

                        });

                        //if (idGet != "") {
                            // window.open('dashboard/detial_get_goods_paple/' + idGet, '_blank');
                            // btn_new_page();
                        //}
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
                bootbox.alert(" *กรุณาเลือกครุภัณฑ์ ที่ต้องการจะคืน หรือ มีการคืนครุภัณฑ์ทั้งหมดครบทั้งหมดแล้ว");
              }
              }
    });
    return false;

               
    }
</script>