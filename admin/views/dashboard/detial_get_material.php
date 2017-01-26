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
                       <label for="inputsumPrice" class="control-label "><?php echo $row['get_material_id'];?></label>
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
      <label for="inputsumPrice" class="control-label ">ตำแหน่ง :</label>
  </div>
  <div class="col-md-8">
   <label for="inputsumPrice" class="control-label "><?php echo $row['position_get'];?></label>
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

<?php 
if($row['file'] != ''){
?>
<div class="form-group">


    <div class="col-md-4">
      <label for="inputsumPrice" class="control-label ">หลักฐานเอกสาร :</label>
  </div>
  <div class="col-md-8">
   
</div>
</div>
<?php
}
?>



<table class="table table-bordered" id="tDataGoods">
    <thead bgcolor='#f1882b'>
        <th class="text-center">#</th>
        <th class="text-center">หมายเลขพัสดุ</th>
        <th class="text-center">รายการ/รายละเอียด</th>
        <th class="text-center">จำนวน</th>
        <th class="text-center">สถานะการคืน</th>


    </thead>
    <tbody>
        <?php

        $i = 1;
        $qty = 0;

        foreach ($reTurnGoods->result_array() as $row) {
            
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['MatId']; ?></td>
                <td><?php echo $row['MatName']; ?></td>
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
            $qty += $row['qty'];
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
       <label for="inputsumPrice" class="control-label "><?php echo $qty;?></label>
   </div>
   <div class="col-md-1">
       <label for="inputsumPrice" class="control-label ">รายการ</label>
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