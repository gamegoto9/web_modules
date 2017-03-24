
<!--datatable-->
<link href="<?php echo base_url('assets/css/jquery.dataTables.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<!--pnotify-->
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.icons.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.js') ?>"></script>

<script src="<?php echo base_url('assets/bootstrap_extras/bootbox/bootbox.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('table.display').dataTable();
    });
</script>
<style>
    div.dataTables_wrapper {
        margin-bottom: 3em;
    }
    body .modal-admin {
        /* new custom width */
        width: 80%;
         must be half of the width, minus scrollbar on the left (30px) 
        margin-left: 10%;
    }
</style>

<div class="panel panel-default">
    <div class="panel-heading">
        <span class="panel-title">ข้อมูลนักศึกษา</span>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="pull-right">
                <a href="#" id="test" onClick="javascript:fnExcelReport();" class="btn btn-info btn-sm">Download</a>
            </div>
            <br><br><br>
        </div>
        <div class="row">

            <table class="display" cellspacing="0" width="100%">
                <thead>
                    <tr class="active" style="background-color: #feef1e;">
                        <th>#</th>     
                        <th>ID Passport</th>
                        <th>คำนำหน้า</th>
                        <th>ชื่อ - สกุล</th>                    
                        <th>สาขาวิชา</th>
                        <th>คณะ</th>
                        <th>หลักศูตร</th>
                        <th>สัญชาติ</th>
                        <th>ประเภท</th>
                        <th>มหาวิทยาลัย</th>
                        <th>#</th>
                        <th>ยืนยัน</th>
                        <!-- <th>View</th> -->


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;

                    foreach ($data as $row) {

                        $data_reg = array();
                        $data_reg[0] = $row['passport_id'];

                        if($row['sex'] == 'M'){
                            $data_reg[1] = '003';
                        }else{
                            $data_reg[1] = '030';
                        }
                        
                        $data_reg[2] = '';
                        $data_reg[3] = '';
                        $data_reg[4] = $row['name'];
                        $data_reg[5] = $row['fname'];
                        $data_reg[6] = $row['sex'];



                        $data_reg[7] = '10';
                        $data_reg[8] = '1';
                        $data_reg[9] = '13';

                        $data_reg[10] = '';
                        $data_reg[11] = '01';
                        $data_reg[12] = '01';

                        $data_reg[13] = '20';
                        $data_reg[14] = '0CU';

                        $year_birthday = substr($row['date_birth'], 0,4);
                        $month_birthday = substr($row['date_birth'], 5,2);
                        $day_birthday = substr($row['date_birth'], 8,2);
                        $data_reg[14] = '0CU';

                        $data_reg[15] = $year_birthday;
                        $data_reg[16] = $month_birthday;
                        $data_reg[17] = $day_birthday;

                        $data_reg[18] = '';
                        $data_reg[19] = '';
                        $data_reg[20] = '';

                        $data_reg[21] = '2018';
                        $data_reg[22] = '01';
                        $data_reg[23] = '01';

                        $data_reg[24] = $row['date_birth'];
                        $data_reg[25] = $row['blood'];
                        $data_reg[26] = 'CN';
                        $data_reg[27] = 'CN';
                        $data_reg[28] = 'CN';
                        $data_reg[29] = 'CN';
                        $data_reg[30] = '1';
                        $data_reg[31] = '';
                        $data_reg[32] = '00';
                        $data_reg[33] = '';
                        $data_reg[34] = '01';
                        $data_reg[35] = '';
                        $data_reg[36] = $day_birthday;
                        $data_reg[37] = $month_birthday;
                        $data_reg[38] = $year_birthday;
                        $data_reg[39] = '2';
                        $data_reg[40] = '1';


                        $mov_str = implode(",", $data_reg);


                        ?>


                        <tr class="warning">
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['passport_id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['name'].' '.$row['fname']; ?></td>
                            <td><?php echo $row['sub_name_en']; ?></td>
                            <td><?php echo $row['maj_name_en']; ?></td>
                            <td><?php echo $row['lev_of_name']; ?></td>
                            <td><?php echo $row['nation']; ?></td>
                            <td><?php echo $row['type_std_id']; ?></td>
                            <td><?php echo $row['university_MOU']; ?></td>
                            <td><button type="button" class="btn btn-info" onclick="showModal('<?php echo $row['passport_id']; ?>');"><i class="fa fa-user"></i></button></td>

                            <?php 
                            if($row['status_reg_conf'] == '1'){
                             ?>
                             <td><button type="button" class="btn btn-success" onclick=""><i class="fa fa-user"></i></button></td>
                             <?php
                         }else{
                            ?>
                            <td><button type="button" class="btn btn-success" onclick="submit_reg('<?php echo $mov_str; ?>');"><i class="fa fa-location-arrow"></i></button></td>
                            <?php
                        }
                        ?>
                        <!-- <td><i class="btn btn-danger " data-toggle="modal" data-target="#myModal" onclick ="showModal(<?php //echo $row['std_id']; ?>  <!-- )">View</i></td> -->

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

<div id="excel1">
    <table cellspacing="0" width="100%" id="myTable">
        <thead>
            <tr class="active" style="background-color: #feef1e;">
                <th>#</th>     
                <th>ID Passport</th>
                <th>คำนำหน้า</th>
                <th>ชื่อ - สกุล</th>      
                <th>วัน/เดือน/ปี เกิด</th>  
                <th>ประเทศ</th>
                <th>ศาสนา</th> 
                <th>กรุ๊ปเลือด</th>
                <th>การศึกษา</th>
                <th>เบอร์โทร</th>     
                <th>ที่อยู่</th> 
                <th>email</th>       

                <th>สาขาวิชา</th>
                <th>คณะ</th>
                <th>หลักศูตร</th>
                <th>สัญชาติ</th>
                <th>ประเภท</th>
                <th>มหาวิทยาลัย</th>
                <!-- <th>View</th> -->


            </tr>
        </thead>



        <tbody>
            <?php
            $i = 1;

            foreach ($data as $row) {
                ?>


                <tr class="warning">
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['passport_id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['name'].' '.$row['fname']; ?></td>
                    <td><?php echo $row['date_birth']; ?></td>
                    <td><?php echo $row['country']; ?></td>
                    <td><?php echo $row['religion']; ?></td>
                    <td><?php echo $row['blood']; ?></td>
                    <td><?php echo $row['educational']; ?></td>
                    <td><?php echo $row['tel']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['email']; ?></td>

                    <td><?php echo $row['sub_name_en']; ?></td>
                    <td><?php echo $row['maj_name_en']; ?></td>
                    <td><?php echo $row['lev_of_name']; ?></td>
                    <td><?php echo $row['nation']; ?></td>
                    <td><?php echo $row['type_std_id']; ?></td>
                    <td><?php echo $row['university_MOU']; ?></td>

                    <!-- <td><i class="btn btn-danger " data-toggle="modal" data-target="#myModal" onclick ="showModal(<?php //echo $row['std_id']; ?>  <!-- )">View</i></td> -->

                </tr>
                <?php
                $i++;
            }

            ?>
        </tbody>
    </table>
    
</div>

<!-- Modal -->
<div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-admin" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">ข้อมูลนักศึกษา</h4>
            </div>
            <div class="modal-body">


                <div id="div_show">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<script>

   $(document).ready(function(){

    $("#excel1").hide();

})

   function fnExcelReport() {
    var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
    tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

    tab_text = tab_text + '<x:Name>Test Sheet</x:Name>';

    tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
    tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

    tab_text = tab_text + "<table border='1px'>";
    tab_text = tab_text + $('#myTable').html();
    tab_text = tab_text + '</table></body></html>';

    var data_type = 'data:application/vnd.ms-excel';

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
      if (window.navigator.msSaveBlob) {
        var blob = new Blob([tab_text], {
          type: "application/csv;charset=utf-8;"
      });
        navigator.msSaveBlob(blob, 'student_admission.xls');
    }
} else {
  $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
  $('#test').attr('download', 'student_admission.xls');
}



}

function showModal(xid) {
    var sdata = xid;
    $('#div_show').load('student/data_users/'+ sdata);
    $('#modalShow').modal('show');
}

function submit_reg(data_reg){

    var data = data_reg.split(",");


    var year_admission = '2560';
    var term_admission = '1';
    var admission_type_id = '1';
    var citizen_id = data[0];
    var std_pname_id = data[1];
    var std_fname_th = data[2];
    var std_lname_th = data[3];
    var std_fname_en = data[4];
    var std_lname_en = data[5];
    var gender_id = data[6];
    var old_edu_lev_id = data[7];
    var old_edu_degree_id = data[8];
    var old_edu_maj_id = data[9];
    var school_id = data[10];
    var std_type_id = data[11];
    var campus_id = data[12];
    var lev_id = data[13];
    var maj_id = data[14];
    var year_birthday = data[15];
    var month_birthday = data[16];
    var day_birthday = data[17];
    var school_id = data[18];
    var old_transcript_code = data[19];
    var old_gpax = data[20];
    var old_edu_year = data[21];
    var old_edu_month = data[22];
    var old_edu_day = data[23];


    var sdata = {
        year_admission : year_admission ,
        term_admission : term_admission ,
        admission_type_id : admission_type_id ,
        citizen_id : citizen_id ,
        std_pname_id : std_pname_id ,
        std_fname_th : std_fname_th ,
        std_lname_th : std_lname_th ,
        std_fname_en : std_fname_en ,
        std_lname_en : std_lname_en ,
        gender_id : gender_id,
        old_edu_lev_id : old_edu_lev_id ,
        old_edu_degree_id : old_edu_degree_id ,
        old_edu_maj_id : old_edu_maj_id ,
        school_id : school_id ,
        std_type_id : std_type_id ,
        campus_id : campus_id,
        lev_id : lev_id ,
        maj_id : maj_id ,
        year_birthday : year_birthday ,
        month_birthday : month_birthday ,
        day_birthday : day_birthday ,
        school_id : school_id ,
        old_transcript_code : old_transcript_code ,
        old_gpax : old_gpax ,
        old_edu_year : old_edu_year ,
        old_edu_month : old_edu_month ,
        old_edu_day : old_edu_day
    };

    $.ajax({
        url: 'http://122.154.255.230:70/crru_api/api_admission/register/create_student',
        headers: { 'Authorization': 'Basic YWRtaW46MTIzNA==', 'Accept' : 'application/json' } ,
        dataType: "jsonp",
        method : 'post' ,
        data : sdata
    }).done(function (data) {
        alert(JSON.stringify(data));
        create_profile(data);
    }).fail(function () {
        alert('A problem with the Ajax request!');
    });







    
}


function create_profile(data){


    var sdata = {
        citizen_id : data[0] ,
        card_type_id : '01' ,
        gender_id : data[6],
        birthday : data[24] ,
        blood_type : data[25] ,
        country_id : data[26] ,
        nation_id : data[27] ,
        race_id : data[28] ,
        nation_id : data[29] ,
        religion_id : data[30] ,
        lineage_id : data[31] ,
        deform_id : data[32],
        deform_note : data[33] ,
        talent_id : data[34] ,
        deform_card_id : data[35] ,
        bdate_dd : data[36] ,
        bdate_mm : data[37] ,
        bdate_yyyy : data[38] ,
        son_num : data[39] ,
        son_stdnum : data[40]
    }
    $.ajax({
        url: 'http://122.154.255.230:70/crru_api/api_admission/register/create_profile',
        headers: { 'Authorization': 'Basic YWRtaW46MTIzNA==', 'Accept' : 'application/json' } ,
        dataType: "jsonp",
        method : 'post' ,
        data : sdata
    }).done(function (data) {
        alert(JSON.stringify(data));

        loadpage9();

    }).fail(function () {
        alert('A problem with the Ajax request!');
    });

    
}

</script>