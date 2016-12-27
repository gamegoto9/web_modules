<!DOCTYPE html>
<!-- content starts -->
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="panel-title panel-warning">ข้อมูลข้อวัสดุ</span>
    </div>
    <div class="panel-body">
        <div class="row">

            <div class="col-md-12 col-md-offset-0" style="padding: 20px">

                <div class="panel panel-success">
                    <div class="panel-heading">ข้อวัสดุ
                    </div>

                    <table class="table table-bordered table-striped table-condensed">

                        <tbody>
                            <?php

                            foreach ($record as $row) {
                                $status_buy = $row['status_buy'];
                                ?>
                                <tr>
                                    <td><span class="thsarabunnew">รหัสวัสดุของหน่วยงาน :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['MatId']; ?></span></td>
                                </tr>
                                <tr>
                                    <td width="250"><span class="thsarabunnew">ขื่อครุภัณฑ์ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['MatName']; ?></span></td>
                                </tr>
                                <tr>
                                    <td width="250"><span class="thsarabunnew">วัสดุประจำปี :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['year']; ?></span></td>
                                </tr>

                                <?php
                            }
                            ?>
                        </tbody>
                    </table> 
                </div>

                <div class="panel panel-warning">
                <div class="panel-heading">ข้อมูลการซื้อวัสดุ</div>
               

                <table class="table table-bordered table-striped table-condensed">
                    <thead>


                        <tr bgcolor='#c5c4bb'>
                            <th>#</th>
                            <th>รหัสการซื้อที่ของหน่วยงาน</th>
                            <th>วันที่ซื้อ</th>
                            <th>รหัสการซื้อวัสดุกลาง</th>
                            <th>บริษัท/ห้างร้าน</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
                            
                        </tr>
                    </thead>



                    <tbody>
                        <?php

                        $i = 1;

                        if($status_buy == '0'){
                        foreach ($record as $row) {

                            
                                ?>
                            
                            <tr>
                                <td><?php echo $i ?></td>
                                <td>ยอดยกมา</td>
                                <td><?php echo $row['year']; ?></td>
                                <td> - </td>
                                <td> - </td>
                                <td><?php echo $row['qty']; ?></td>
                                <td><?php echo $row['price']; ?></td>

                            </tr>
                               

                                <?php
                                $i++;
                            }
                                 
                            }

                        foreach ($buyMaterial as $row) {

                            ?>


                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row['BuyMatId']; ?></td>
                                <td><?php echo $row['Ddate']; ?></td>
                                <td><?php echo $row['id_buy']; ?></td>
                                <td><?php echo $row['market_name']; ?></td>
                                <td><?php echo $row['qty']; ?></td>
                                <td><?php echo $row['price']; ?></td>

                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>

            </div>


            <div class="panel panel-danger">
                <div class="panel-heading">ข้อมูลการเบิกวัสดุ</div>
               

                <table class="table table-bordered table-striped table-condensed">
                    <thead>


                        <tr bgcolor='#c5c4bb'>
                            <th>#</th>
                            <th>รหัสการเบิก</th>
                            <th>วันที่เบิก</th>
                            <th>ชื่อผู้เบิก</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
                            
                        </tr>
                    </thead>



                    <tbody>
                        <?php

                        $i = 1;
                        foreach ($lends as $row) {

                            ?>


                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row['LmatId']; ?></td>
                                <td><?php echo $row['Ddate']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['qty']; ?></td>
                                <td><?php echo $row['price']; ?></td>

                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>

            </div>




            </div>

        </div>
    </div>
</div>

