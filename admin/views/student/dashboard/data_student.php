<!DOCTYPE html>
<!-- content starts -->
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="panel-title">ข้อมูลนักศึกษา</span>
    </div>
    <div class="panel-body">
        <div class="row">

            <div class="col-md-12 col-md-offset-0" style="padding: 20px">


                <li class="thumbnail">
                <center>
                    <br>
                    <img src="#" class="thumbnail" style="width: 160px; height: 210px;">
                    <span class="thsarabunnew"><input type="button" class="btn btn-primary" title="Change Picture" onClick="parent.location.href = '?page=Change-Pic'" value=" เปลี่ยนรูปประจำตัว "></span>
                </center>
                </li>

                <br>
                <div class="panel panel-success">
                    <div class="panel-heading">ข้อมูลส่วนตัว
                    </div>

                    <table class="table table-bordered table-striped table-condensed">

                        <tbody>
                            <?php
                            if($send == "01"){
                            foreach ($student as $row) {
                                ?>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td width="250"><span class="thsarabunnew">คำนำหน้าชื่อ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['pname_en']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ชื่อ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['std_fname_en']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">นามสกุล :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['std_lname_en']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">รหัสนักศึกษา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['std_id']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">เพศ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ปี-เดือน-วัน เกิด(1999-01-23) :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['birthday']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">สัญชาติ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['nation_id'];?>  <?PHP echo $row['nation_name_th']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">หมายเลขหนังสือเดือนทาง Passport Number :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['passport_id']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">หลักสูตรการศึกษา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['lev_name_st']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">สาขาวิชา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['maj_name_th']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">คณะ/สำนัก :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['fac_name_th']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">วุฒิการศึกษา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['lev_name_en']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ปีที่เข้า :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['year_in']; ?></span></td>
                                </tr>

                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">วัน-เดือน-ปี ที่ลงทะเบียน :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['date_in']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">วัน-เดือน-ปี ที่คาดว่าจะจบ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"></span></td>
                                </tr>

                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">Visa หมดอายุ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ประเภทนักศึกษา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['std_type_name_st']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">สถานะนักศึกษา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['std_status_name_th']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ทุนการศึกษา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">เอกสารที่เกี่ยวข้อง :</span></td>
                                    <td callspan="3"><a class="btn btn-danger" href='http://crruinter.crru.ac.th/student/detial/<?PHP echo $row['std_id']; ?>.pdf' target="_blank">View</a></td>
                                </tr>

                                <!--
                                <tr onmouseover='this.bgColor = &quot;#FFFFCC&quot;' onmouseout='this.bgColor =  &quot;#ffffff&quot;'>
                                  
                                  
                                  
                                  <td><span class="thsarabunnew">ชื่อ-นามสกุล(ENG)</span></td>
                                  <td callspan="3"><span class="thsarabunnew">
                                Likit  Yodya&nbsp;<input type="button" class="btn btn-primary" title="แก้ไขชื่อ-นามสกุล ภาษาอังกฤษ[EN]" 
    onClick="parent.location.href='?page=Add-Ename&pid=1579900360498'" value="หรือชื่อ-สกุลภาษาอังกฤษ[EN] ผิด??" data-toggle="tooltip"
    data-placement="right" > </span>&nbsp;</td>
                            </tr>
                                <tr onmouseover='this.bgColor = &quot;#FFFFCC&quot;' onmouseout='this.bgColor =  &quot;#ffffff&quot;'>
                                        <td><span class="thsarabunnew">วันเดือนปีเกิด</span></td>
    <td callspan="3"><span class="thsarabunnew">15 พฤษภาคม 2534&nbsp;(อายุ &nbsp;23&nbsp;ปี&nbsp;1&nbsp;เดือน)</span></td>
                                </tr>
        <tr onmouseover='this.bgColor = &quot;#FFFFCC&quot;' onmouseout='this.bgColor =  &quot;#ffffff&quot;'>
          <td colspan="2" data-toggle="tooltip" data-placement="bottom" title="หากข้อมูลไม่ตรงกับข้อมูลปัจจุบัน หรือข้อมูลคลาดเคลื่อน กรุณาแจ้งเจ้าหน้าที่กองบริหารงานบุคคลด้วยครับ"><span class="thsarabunnew">ที่อยู่&nbsp;189&nbsp;หมู่&nbsp;2&nbsp;ตำบลเวียงชัย&nbsp;อำเภอเวียงชัย&nbsp;จังหวัดเชียงราย&nbsp;รหัสไปรษณีย์&nbsp;57210</span></td><script>$(function () { $("[data-toggle='tooltip']").tooltip(); });</script>
          </tr>
                                -->

                                <?php
                            }
                            }else if($send == "02"){
                                foreach ($student as $row) {
                                ?>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td width="250"><span class="thsarabunnew">คำนำหน้าชื่อ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['pname_en']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ชื่อ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['std_fname_en']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">นามสกุล :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['std_lname_en']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">รหัสนักศึกษา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['std_id']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">เพศ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ปี-เดือน-วัน เกิด(1999-01-23) :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['birthday']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">สัญชาติ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['nation_id'];?>  <?PHP echo $row['nation_name_th']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">หมายเลขหนังสือเดือนทาง Passport Number :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['passport_id']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">หลักสูตรการศึกษา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['lev_name_st']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">สาขาวิชา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['sub_name_th']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">คณะ/สำนัก :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['maj_name_th']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">วุฒิการศึกษา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['lev_name_st']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ปีที่เข้า :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['year_in']; ?></span></td>
                                </tr>

                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">วัน-เดือน-ปี ที่ลงทะเบียน :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['date_in']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">วัน-เดือน-ปี ที่คาดว่าจะจบ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"></span></td>
                                </tr>

                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">Visa หมดอายุ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ประเภทนักศึกษา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['inter_type_name_th']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">สถานะนักศึกษา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['std_status_name_th']; ?></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">ทุนการศึกษา :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"></span></td>
                                </tr>
                                <tr onmouseover='this.bgColor = & quot; #FFFFCC & quot;' onmouseout='this.bgColor = & quot; #ffffff & quot;'>
                                    <td><span class="thsarabunnew">เอกสารที่เกี่ยวข้อง :</span></td>
                                    <td callspan="3"><a class="btn btn-danger" href='http://crruinter.crru.ac.th/student/detial/<?PHP echo $row['std_id']; ?>.pdf' target="_blank">View</a></td>
                                </tr>

                                <!--
                                <tr onmouseover='this.bgColor = &quot;#FFFFCC&quot;' onmouseout='this.bgColor =  &quot;#ffffff&quot;'>
                                  
                                  
                                  
                                  <td><span class="thsarabunnew">ชื่อ-นามสกุล(ENG)</span></td>
                                  <td callspan="3"><span class="thsarabunnew">
                                Likit  Yodya&nbsp;<input type="button" class="btn btn-primary" title="แก้ไขชื่อ-นามสกุล ภาษาอังกฤษ[EN]" 
    onClick="parent.location.href='?page=Add-Ename&pid=1579900360498'" value="หรือชื่อ-สกุลภาษาอังกฤษ[EN] ผิด??" data-toggle="tooltip"
    data-placement="right" > </span>&nbsp;</td>
                            </tr>
                                <tr onmouseover='this.bgColor = &quot;#FFFFCC&quot;' onmouseout='this.bgColor =  &quot;#ffffff&quot;'>
                                        <td><span class="thsarabunnew">วันเดือนปีเกิด</span></td>
    <td callspan="3"><span class="thsarabunnew">15 พฤษภาคม 2534&nbsp;(อายุ &nbsp;23&nbsp;ปี&nbsp;1&nbsp;เดือน)</span></td>
                                </tr>
        <tr onmouseover='this.bgColor = &quot;#FFFFCC&quot;' onmouseout='this.bgColor =  &quot;#ffffff&quot;'>
          <td colspan="2" data-toggle="tooltip" data-placement="bottom" title="หากข้อมูลไม่ตรงกับข้อมูลปัจจุบัน หรือข้อมูลคลาดเคลื่อน กรุณาแจ้งเจ้าหน้าที่กองบริหารงานบุคคลด้วยครับ"><span class="thsarabunnew">ที่อยู่&nbsp;189&nbsp;หมู่&nbsp;2&nbsp;ตำบลเวียงชัย&nbsp;อำเภอเวียงชัย&nbsp;จังหวัดเชียงราย&nbsp;รหัสไปรษณีย์&nbsp;57210</span></td><script>$(function () { $("[data-toggle='tooltip']").tooltip(); });</script>
          </tr>
                                -->

                                <?php
                            }
                            }
                            ?>
                        </tbody>
                    </table> 

                </div>

            </div>


            <div class="col-md-4">


            </div>
        </div>
    </div>
</div>

