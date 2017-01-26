<!DOCTYPE html>
<!-- content starts -->


            <div class="col-md-12 col-md-offset-0" style="padding: 20px">

                <div class="panel panel-success">
                    <div class="panel-heading">รายละเอียดโครงการ/สาขาวิชาตามความร่วมมือ
                    </div>

                    <table class="table table-bordered table-striped table-condensed">

                        <tbody>
                            <?php
                            foreach ($mou->result_array() as $row) {
                                ?>
                                <tr>
                                    <td width="250"><span class="thsarabunnew">สาขาวิชาตามตวามร่วมมือ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['mou_subject']; ?></span></td>
                                </tr>
                                <tr>
                                    <td width="250"><span class="thsarabunnew">รายละเอียดโครงการ/สาขาวิชาตามความร่วมมือ :</span></td>
                                    <td callspan="3"><span class="thsarabunnew"><?PHP echo $row['mou_dis']; ?></span></td>
                                </tr>
                                

                                <?php
                            }
                            
                            ?>
                        </tbody>
                    </table> 

                </div>

            </div>
        

