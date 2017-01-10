<div class="row" id="select_type">
    <div class="col-xs-12 col-md-12">
        <form name="form_select_data" id="select_data" class="form-horizontal">

            <?php 
            $row = $reTurnGoods->row_array();
            ?>



            <div class="col-md-12 col-md-offset-0" style="padding: 10px">

                <div class="panel panel-primary ">
                    <div class="panel-heading">ข้อมูลการยืมพัสดุ</div>
                    <div class="panel-body" id="panelMain">

                        <div class="form-group">


                            <div class="col-md-2">
                              <label for="inputsumPrice" class="control-label ">รหัสการยืม :</label>
                          </div>
                          <div class="col-md-8">
                             <label for="inputsumPrice" class="control-label "><?php echo $row['get_material_id'];?></label>
                             <input type="hidden" name="getId" id="getId" value="<?php echo $row['get_material_id'];?>">

                             <input type="hidden" name="maxid" id="maxid" value="<?php echo "RE".sprintf("%05d ",$maxid->maxID); ?>">


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
              <label for="inputsumPrice" class="control-label ">ตำแหน่ง :</label>
          </div>
          <div class="col-md-8">
             <label for="inputsumPrice" class="control-label "><?php echo $row['position_get'];?></label>
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

    <div class="form-group">
        <div class="col-md-2">
            <label class="control-label">รายละเอียด :</label>
        </div>
        <div class="col-sm-6">
            <textarea class="form-control" rows="2" id="txtNote" name="txtNote" placeholder="รายละเอียด"></textarea>
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
                    <th class="text-center">หมายเลขพัสดุ</th>
                    <th class="text-center">รายการ/รายละเอียด</th>
                    <th class="text-center" width="100">จำนวน</th>
                    <th class="text-center">ราคา/ชิ้น</th>
                    <th class="text-center">เลือก</th>


                </thead>
                <tbody>
                    <?php

                    $i = 1;
                    $qty2 = 0;
                    foreach ($reTurnGoods->result_array() as $row) {

                        ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                            <td align="center"><?php echo $row['MatId']; ?></td>
                            <td><?php echo $row['MatName']; ?></td>
                            <td align="center"><?php echo $row['qty']; ?></td>
                            <td align="center"><?php echo $row['price']; ?></td>
                            <td align="center">
                                <?php
                                if($row['status'] == 1){
                                    ?>


                                    <label><input type="checkbox" class="case" name="hobbies[]" id="hobbies" value="<?php echo $row['get_material_id']; ?>"> เลือก</label>


                                    <?php
                                }else{
                                 echo "<font color='green'>คืนเรียบร้อย</font>";
                             }
                             ?>
                         </td>                                                     
                     </tr>
                     <?php
                     $i++;
                     $qty2 += $row['qty'];
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
                 <label for="inputsumPrice" class="control-label "><?php echo $qty2;?></label>
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

        //$("input.case").click(myfunc);

    });

    function myfunc(ele) {

        var qty_data = new Array();
        var id_data = [];
        var price_data = [];

        $.each($("input[name='hobbies[]']:checked").closest("td").siblings("td:nth-child(4)"),
          function () {
           qty_data.push($(this).text());

       });

        $.each($("input[name='hobbies[]']:checked").closest("td").siblings("td:nth-child(5)"),
          function () {
           price_data.push($(this).text());

       });

        $("input[name='hobbies[]']:checked").each(function() {

            id_data.push(this.value);

        });

        alert("val---" + qty_data);
        alert("Qty_data.length" + qty_data.length);

        alert(id_data.length);
        alert(id_data[0]);

    }

    function myfunc1(ele) {

        var id_data = [];

        $("input[name='hobbies[]']:checked").each(function() {
            id_data.push(this.value);

                    //qty_data.push($('#tDataGoods').children().children().eq(row).children().eq(3).text());
                    alert(this.value);

                });



    }

    function conn(){

      bootbox.confirm("ต้องการบันทึกหรือไม่ ?", function(result) {
        if (result) {

            var qty_data = new Array();
            var id_data = [];
            var price_data = [];

            $.each($("input[name='hobbies[]']:checked").closest("td").siblings("td:nth-child(5)"),
                function () {
                   price_data.push($(this).text());

               });

            // กรณีที่เป็น text ให้เลือก
            //$.each($("input[name='hobbies[]']:checked").closest("td").siblings().find('input'),
            //     function () {
            //         qty_data.push($(this).val());                  
            //     });

            $.each($("input[name='hobbies[]']:checked").closest("td").siblings("td:nth-child(4)"),
                function () {
                    qty_data.push($(this).text());                  
                });

            // $("input[name='hobbies[]']:checked").each(function() {
            //     id_data.push(this.value);
            // });

            // for(i=0;i<qty_data.length;i++){
            //     alert(qty_data[i]);
            // }

         

             $.each($("input[name='hobbies[]']:checked").closest("td").siblings("td:nth-child(2)"),
                function () {
                    id_data.push($(this).text());                  
                });

            if(id_data.length != 0 && $("#txtName").val() != "" && $("#date1").val() != ""){



                    // console.log("id_data = "+id_data[0]);

                    // console.log("id_data.length = "+id_data.length);

                     // console.log("qty_data = "+qty_data[0]);

                    // console.log("price_data = "+price_data[0]);

                    var faction = "<?php echo site_url('admin/dashboard/insert_return_material/'); ?>";
                    var fdata = {get_id: $("#getId").val(),max: $("#maxid").val(),dateRe: $("#date1").val(),name: $("#txtName").val(), value_data: id_data, rows: id_data.length,qty: qty_data,price: price_data,note: $("#txtNote").val()};

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
                        $("#modalShow").modal('hide');


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