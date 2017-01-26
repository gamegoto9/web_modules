
<div class="row" id="select_type">
    <div class="col-xs-12 col-md-12">
        <form name="form_select_data" id="select_data" class="form-horizontal">


            <div class="col-md-12">
                <h3>
                    ค้นหาข้อมูลความร่วมมือของมหาวิทยาลัย
                </h3>
                <br>
            </div>




            <div class="col-md-12 col-md-offset-0" style="padding: 10px">

                <div class="panel panel-primary ">
                    <div class="panel-heading">การค้นหา</div>
                    <div class="panel-body" id="panelMain">

                        <div class="form-group no-margin inline">
                            <div class="row">

                                <div class="col-md-3">

                                  <select  class="form-control" name="select" id="select" tabindex="2">
                                    <option value="11">ค้นหาทั้งหมด</option>
                                    <option value="0">ค้นหาจากชื่อมหาวิทยาลัย</option>
                                    <option value="1">MOU ที่หมดอายุ</option>
                                    <option value="2">MOU ที่ยังหมดอายุ</option>
                                    <option value="3">MOU ไม่ระบุวันหมดอายุ</option>
                                    <option value="4">MOU ช่วงเวลาที่หมดอายุ</option>
                                    <option value="5">ตามประเทศ</option>
                                    <option value="12">เรียงตามวันที่เริ่มลงนาม</option>
                                    <option value="13">เรียงตามเรียงตามวันที่ต่ออนยุ ครั้งล่าสุด</option>
                                    <option value="14">เรียงตามวันหมดอายุ</option>
                                    <option value="12">ตามประเทศ</option>
                                    <option value="6">ตามความร่วมมือ/แลกเปลี่ยน ด้านการศึกษา</option>
                                    <option value="7">ตามความร่วมมือ/แลกเปลี่ยน อาจารย์</option>
                                    <option value="8">ตามความร่วมมือ/แลกเปลี่ยน นักวิจัย</option>
                                    <option value="9">ตามความร่วมมือ/แลกเปลี่ยน บุคลากร</option>
                                    <option value="10">ตามความร่วมมือ/แลกเปลี่ยน ข้อมูลเอกสารสิ่งพิมพ์</option>
                                </select>
                            </div>

                            <div class="col-md-4" id="related_0_content">
                                <!-- <input type="text" class="form-control" id="txtSearch" name="txtSearch" value="" placeholder="ค้นหาจากชื่อมหาวิทยาลัย"> -->
                                <select class="chosen-select form-control mb-15" name="selectUniversity" id="selectUniversity">
                                    <option value="" selected="selected">เลือกมหาวิทยาลัย</option>
                                    <?php

                                    foreach ($university->result_array() as $row) {
                                        ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            
                            <div class="col-md-4" id="related_5_content" style="display: none;">
                                <select class="selectpicker chosen-select form-control mb-15" name="selectCountry" id="selectCountry" data-live-search="true">
                                    <option value="" selected="selected">เลือกประเทศ</option>
                                    <?php

                                    foreach ($country->result_array() as $row) {
                                        ?>
                                        <option value="<?php echo $row['international'];?>"><?php echo $row['international'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-4" id="related_12_content" style="display: none;">
                                <select class="selectpicker chosen-select form-control mb-15" name="oder_by" id="oder_by" data-live-search="true">
                                    <option value="" selected="selected">เลือกการเรียงข้อมูล</option>
                                    <option value="ASC">จากน้อยไปมาก</option>
                                    <option value="DESC">จากมากไปน้อย</option>
                                    
                                </select>
                            </div>



                            <div class="col-md-6" id="related_4_content" style="display: none;">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="date_start"  type="text" name="date_start" value="25/01/2560"  data-provide="datepicker" data-date-language="th-th">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    <a class="btn bg-maroon">ถึง</a>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="date_end" type="text" name="date_end" value="25/01/2560"  data-provide="datepicker" data-date-language="th-th">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <button type="button" name="search_btn"  id="search_btn" class="btn btn-success rounded">
                                    <span class="fa fa-search"></span> ค้นหา</button>
                                </div>


                            </div>


                        </div>


                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<link href="<?php echo base_url('assets/bootstrap.datetimepicker/css/datepicker3.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/bootstrap.datetimepicker/js/bootstrap-datepicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap.datetimepicker/js/bootstrap-datepicker-th.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap.datetimepicker/js/bootstrap-datepicker-thai.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap.datetimepicker/js/bootstrap-datepicker.th.js'); ?>"></script>

<script src="http://personnel.crru.ac.th/statics/assets/plugins/jquery.inputmask/dist/inputmask/jquery.maskedinput.js"></script>
<script src="<?php echo base_url('assets/bootstrap_extras/bootbox/bootbox.min.js'); ?>"></script>

<script type="text/javascript">


 jQuery(function ($) {




    $('#date_start').on('change', function () {
        $('.datepicker').hide();
    });

    $('#date_end').on('change', function () {
        $('.datepicker').hide();
    });


});


 $("#select").on("change", function () {
    id = "related_" + $(this).val() + "_content";
    

    if(id == 'related_0_content' || id == 'related_4_content' || id == 'related_5_content' || id == 'related_12_content' || id == 'related_13_content' || id == 'related_14_content'){

        if(id == 'related_13_content' || id == 'related_14_content'){
            $("#related_12_content").show().siblings('[id^="related"]').hide()
        }

        $("#" + id).show().siblings('[id^="related"]').hide()

    }else{

        $("#related_0_content").siblings('[id^="related"]').hide()
        $("#related_4_content").siblings('[id^="related"]').hide()
        $("#related_5_content").siblings('[id^="related"]').hide()
    }


});


 $("#search_btn").click(function() {


    if($("#select").val() == '0'){
        if($("#selectUniversity").val() != ''){
            var sdata = {select: $("#select").val(),university : $("#selectUniversity").val(), country: $("#selectCountry").val(),dateStart: $('#date_start').val(), dateEnd: $('#date_end').val(), oder_by: $('#oder_by').val()};

           
        $('#show_data_view').load('<?php echo site_url('admin/mou/search_query'); ?>', sdata);
        }else{
         //
         bootbox.alert("*กรุณาเลือกชื่อมหาวิทยาลัย ที่ต้องการค้นหา*");
        }
    }else if($("#select").val() == '4'){
        if($("#date_start").val() != '' && $("#date_end").val()){
           
            var sdata = {select: $("#select").val(),university : $("#selectUniversity").val(), country: $("#selectCountry").val(),dateStart: $('#date_start').val(), dateEnd: $('#date_end').val(), oder_by: $('#oder_by').val()};

           
            $('#show_data_view').load('<?php echo site_url('admin/mou/search_query'); ?>', sdata);
        }else{
         //
         bootbox.alert("*กรุณาเลือกช่วงเวลา ที่ต้องการค้นหา*");
        }
    }else if($("#select").val() == '5'){
        if($("#selectCountry").val() != ''){
           
            var sdata = {select: $("#select").val(),university : $("#selectUniversity").val(), country: $("#selectCountry").val(),dateStart: $('#date_start').val(), dateEnd: $('#date_end').val(), oder_by: $('#oder_by').val()};

            $('#show_data_view').load('<?php echo site_url('admin/mou/search_query'); ?>', sdata);

        }else{
         //
         bootbox.alert("*กรุณาเลือกประเทศ ที่ต้องการค้นหา*");
        }
    }else if($("#select").val() == '12' || $("#select").val() == '13' || $("#select").val() == '14'){
        if($("#oder_by").val() != ''){
           
            var sdata = {select: $("#select").val(),university : $("#selectUniversity").val(), country: $("#selectCountry").val(),dateStart: $('#date_start').val(), dateEnd: $('#date_end').val(), oder_by: $('#oder_by').val()};

            $('#show_data_view').load('<?php echo site_url('admin/mou/search_query'); ?>', sdata);
            
        }else{
         //
         bootbox.alert("*กรุณาเลือการเรียงข้อมูล ที่ต้องการค้นหา*");
        }
    }else{

        var sdata = {select: $("#select").val(),university : $("#selectUniversity").val(), country: $("#selectCountry").val(),dateStart: $('#date_start').val(), dateEnd: $('#date_end').val(), oder_by: $('#oder_by').val()};

      //$('#show_data_view').load('mou/search_view');
      $('#show_data_view').load('<?php echo site_url('admin/mou/search_query'); ?>', sdata);

    }

     

  });

</script>

