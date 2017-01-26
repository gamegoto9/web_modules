<!DOCTYPE html>
<!-- content starts -->
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="panel-title panel-warning">ข้อมูลครุภัณฑ์</span>
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
                            if($send == "01"){
                            foreach ($record as $row) {
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
                                    <td><span class="thsarabunnew">รหัสการเบิก :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['id_buy']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">วันที่เบิก :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['date_start']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ราคา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['price'];?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ปี่ที่จัดซื้อ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['year']; ?></span></td>
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
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ประเภท :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP if($row['standard'] == '1'){
                                        echo "ครุภัณฑ์";
                                    }else{
                                        echo "คุภัณฑ์ต่ำกว่าเกณฑ์";
                                    }
                                        ?></span></td>
                                    
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ทะเบียนคุมทรัพย์สินย์ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew">
                                        <a class="btn btn-info" href="<?php echo base_url('admin/dashboard/detial_lend_paple_goods_center/'.$row['id_goods']); ?>" target="_blank">คลิก!</a>
                                    </span></td>
                                    
                                </tr>


                                <?php
                            }
                            }else if($send == "02"){
                                foreach ($student as $row) {
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
                                    <td><span class="thsarabunnew">รหัสการเบิก :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['id_buy']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">วันที่เบิก :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['date_start']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ราคา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['price'];?>  <?PHP echo $row['nation_name_th']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ปี่ที่จัดซื้อ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['year']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">สถานะ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP if($row['status'] == '1'){
                                        echo "ยังไม่คืน";
                                    }else{
                                        echo "ส่งคืนแล้ว";
                                    }
                                        ?></span></td>
                                    
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ประเภท :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP if($row['standard'] == '1'){
                                        echo "ครุภัณฑ์";
                                    }else{
                                        echo "คุภัณฑ์ต่ำกว่าเกณฑ์";
                                    }
                                        ?></span></td>
                                    
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ทะเบียนคุมทรัพย์สินย์ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew">
                                        <a class="btn btn-info" href="<?php echo base_url('admin/dashboard/detial_lend_paple_goods_center/'.$row['id_goods']); ?>" target="_blank">คลิก!</a>
                                    </span></td>
                                    
                                </tr>

                                

                                <?php
                            }
                            }
                            ?>
                        </tbody>
                    </table> 

                </div>

            </div>

            <div class="col-md-12 col-md-offset-0" style="padding: 20px">

                <div class="panel panel-info">
                    <div class="panel-heading">ข้อมูลการซ่อมบำรุงครุภัณฑ์
                    </div>

                    <table class="table table-bordered table-striped table-condensed">

                        <thead>
                            <th>#</th>
                            <th>รหัสการซ่อม</th>
                            <th>วันที่ส่งซ่อม</th>
                            <th>เหตุผลที่ซ่อม</th>
                            <th>ราคา</th>
                            <th>หมายเหตุ</th>
                            <th>ใบเสนอราคา</th>

                        </thead>

                        <tbody>
                            <?php
                            
                            $i=1;
                                foreach ($repair as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['id_repair']; ?></td>
                                    <td><?php echo $row['Ddate']; ?></td>
                                    <td><?php echo $row['subject']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['note']; ?></td>
                                    <td><a class="btn btn-primary" href="<?php echo $row['file']; ?>" target="_blank"><i class="fa fa-file"></i></a></td>
                                   
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

