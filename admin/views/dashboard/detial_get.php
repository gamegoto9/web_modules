<div class="row" id="select_type">
    <div class="col-xs-12 col-md-12">
        <form name="form_select_data" id="select_data" class="form-horizontal">

            <?php 
            $row = $reTurnGoods->row_array();
            ?>

            <div class="col-md-12">

                <div class="col-md-12">

                    <div class="form-group">


                        <div class="col-md-4">
                          <label for="inputsumPrice" class="control-label ">รหัสการยืม :</label>
                      </div>
                      <div class="col-md-8">
                       <label for="inputsumPrice" class="control-label "><?php echo $row['get_id'];?></label>
                   </div>
               </div>
               <div class="form-group">


                <div class="col-md-4">
                  <label for="inputsumPrice" class="control-label ">วันที่ยืม :</label>
              </div>
              <div class="col-md-8">
               <label for="inputsumPrice" class="control-label "><?php echo $row['Ddate_get'];?></label>
           </div>
       </div>
       <div class="form-group">


        <div class="col-md-4">
          <label for="inputsumPrice" class="control-label ">วันที่ต้องการคืน :</label>
      </div>
      <div class="col-md-8">
       <label for="inputsumPrice" class="control-label "><?php echo $row['Ddate_return'];?></label>
   </div>
</div>
<div class="form-group">


    <div class="col-md-4">
      <label for="inputsumPrice" class="control-label ">ผู้ยืม :</label>
  </div>
  <div class="col-md-8">
   <label for="inputsumPrice" class="control-label "><?php echo $row['name_get'];?></label>
</div>
</div>
<div class="form-group">


    <div class="col-md-4">
      <label for="inputsumPrice" class="control-label ">สังกัด :</label>
  </div>
  <div class="col-md-8">
   <label for="inputsumPrice" class="control-label "><?php echo $row['major_get'];?></label>
</div>
</div>

<div class="form-group">


    <div class="col-md-4">
      <label for="inputsumPrice" class="control-label ">ผู้บันทึกข้อมูล :</label>
  </div>
  <div class="col-md-8">
   <label for="inputsumPrice" class="control-label "><?php echo $row['name'];?></label>
</div>
</div>



<table class="table table-bordered" id="tDataGoods">
    <thead bgcolor='#f1882b'>
        <th class="text-center">#</th>
        <th class="text-center">หมายเลขครุภัณฑ์</th>
        <th class="text-center">รายการ/รายละเอียด</th>
        <th class="text-center">จำนวน</th>
        <th class="text-center">สถานะการคืน</th>


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
                <td>
                    <?php
                    if($row['status'] == 1){
                       echo "<font color='red'>ยังไม่ได้คืน</font>";
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
        <div class="col-md-3 col-md-offset-6">
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
<br/><br/>



<br/><br/>

</div>


</form>
</div>
</div>