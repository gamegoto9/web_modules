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

                                

                                <?php
                            }
                            }
                            ?>
                        </tbody>
                    </table> 

                </div>

            </div>

        </div>
    </div>
</div>

