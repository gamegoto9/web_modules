<div class="row" id="select_type">
    <div class="col-xs-12 col-md-12">
        <form name="form_select_data" id="select_data" class="form-horizontal">

            <?php 
            $row = $reTurnGoods->row_array();
            ?>

            <div class="col-md-12">

                <div class="col-md-12">

                    <div class="form-group">


                        <div class="col-md-3">
                          <label for="inputsumPrice" class="control-label ">รหัสการเบิก :</label>
                      </div>
                      <div class="col-md-8">
                         <label for="inputsumPrice" class="control-label "><?php echo $row['lend_id'];?></label>
                     </div>
                 </div>
                 <div class="form-group">


                    <div class="col-md-3">
                      <label for="inputsumPrice" class="control-label ">วันที่เบิก :</label>
                  </div>
                  <div class="col-md-8">
                     <label for="inputsumPrice" class="control-label "><?php echo $row['Ddate'];?></label>
                 </div>
             </div>
             <div class="form-group">


                <div class="col-md-3">
                  <label for="inputsumPrice" class="control-label ">ผู้เบิก :</label>
              </div>
              <div class="col-md-8">
                 <label for="inputsumPrice" class="control-label "><?php echo $row['name'];?></label>
             </div>
         </div>


         <table class="table table-bordered" id="tDataGoods">
            <thead bgcolor='#f1882b'>
                <th class="text-center">#</th>
                <th class="text-center">รายการ/รายละเอียด</th>
                <th class="text-center">จำนวน</th>
                <th class="text-center">ราคา</th>

            </thead>
            <tbody>
                <?php

                $i = 1;
                $totle=0;
                foreach ($reTurnGoods->result_array() as $row) {
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['name_goods'].$row['brand_goods']; ?></td>
                        <td>1 ชิ้น</td>
                        <td><?php echo $row['price']; ?></td>                                                            
                    </tr>
                    <?php
                    $i++;
                    $totle+=$row['price'];
                }
                ?>

            </tbody>
        </table>

        <div class="form-group">


            <div class="form-group">

             <div class="col-md-12">
                <div class="col-md-2 col-md-offset-7">
                  <label for="inputsumPrice" class="control-label ">ราคารวม</label>
              </div>
              <div class="col-md-1">
                 <label for="inputsumPrice" class="control-label "><?php echo $totle;?></label>
             </div>
             <div class="col-md-1">
                 <label for="inputsumPrice" class="control-label ">บาท</label>
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