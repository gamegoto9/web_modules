<div class="row" id="select_type">
    <div class="col-xs-12 col-md-12">
        <form name="form_select_data" id="select_data" class="form-horizontal">

            <?php 
            $row = $reTurnGoods->row_array();
            ?>

            <div class="col-md-12">

                <div class="col-md-12">

                    <div class="form-group">


                        <div class="col-md-5">
                          <label for="inputsumPrice" class="control-label ">รหัสการส่งคืน/โอนย้าย :</label>
                      </div>
                      <div class="col-md-5">
                         <label for="inputsumPrice" class="control-label "><?php echo $row['detial_return_id'];?></label>
                     </div>
                 </div>
                 <div class="form-group">


                    <div class="col-md-5">
                      <label for="inputsumPrice" class="control-label ">วันที่ส่งคืน :</label>
                  </div>
                  <div class="col-md-5">
                     <label for="inputsumPrice" class="control-label "><?php echo $row['date'];?></label>
                 </div>
             </div>
             <div class="form-group">


                <div class="col-md-5">
                  <label for="inputsumPrice" class="control-label ">ผู้ทำเรื่องส่งคืน :</label>
              </div>
              <div class="col-md-5">
                 <label for="inputsumPrice" class="control-label "><?php echo $row['name_return'];?></label>
             </div>
         </div>


         <table class="table table-bordered" id="tDataGoods">
            <thead bgcolor='#f1882b'>
                <th class="text-center">#</th>
                <th class="text-center">รายการ/รายละเอียด</th>
                <th class="text-center">หมายเลขครุภัณฑ์</th>
            

            </thead>
            <tbody>
                <?php

                $i = 1;
                $totle=0;
                foreach ($reTurnGoods->result_array() as $row) {
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['name_goods'].' '.$row['brand_goods']; ?></td>
                        <td><?php echo $row['id_goods_crru']; ?></td>
                                                                                
                    </tr>
                    <?php
                    $i++;
                    $totle++;
                }
                ?>

            </tbody>
        </table>

        <div class="form-group">


            <div class="form-group">

             <div class="col-md-12">
                <div class="col-md-2 col-md-offset-7">
                  <label for="inputsumPrice" class="control-label ">ทั้งหมด</label>
              </div>
              <div class="col-md-1">
                 <label for="inputsumPrice" class="control-label "><?php echo $totle;?></label>
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