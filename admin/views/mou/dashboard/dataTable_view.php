
<!--datatable-->
<link href="<?php echo base_url('assets/css/jquery.dataTables.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

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
    /* must be half of the width, minus scrollbar on the left (30px) */
    margin-left: 10%;
  }
  body .modal-admin2 {
    /* new custom width */
    width: 50%;
    /* must be half of the width, minus scrollbar on the left (30px) */
    margin-left: 25%;
  }
</style>

<style>

  .iframe-container {    
    padding-bottom: 60%;
    padding-top: 30px; height: 0; overflow: hidden;
  }

  .iframe-container iframe,
  .iframe-container object,
  .iframe-container embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }


  div.dataTables_wrapper {
    margin-bottom: 3em;
  }

  .bgmodal {
    background-color: #9cec40;
  }
  <?php

  function compareDate($date1, $date2, $check) {
    $arrDate1 = explode("-", $date1);
    $arrDate2 = explode("-", $date2);
    $timStmp1 = mktime(0, 0, 0, $arrDate1[1], $arrDate1[2], $arrDate1[0]);
    $timStmp2 = mktime(0, 0, 0, $arrDate2[1], $arrDate2[2], $arrDate2[0]);

    if ($timStmp1 == $timStmp2) {
      $check = "2";
    } else if ($timStmp1 > $timStmp2) {
      $check = "1";
    } else if ($timStmp1 < $timStmp2) {
      $check = "2";
    }
    return $check;
  }

  $date_now = date('Y-m-d');

  ?>
</style>

<div class="col-md-12 col-md-offset-0" style="padding: 10px">

  <div class="panel panel-success">

    <div class="panel-body" id="panelMain">


      <div class="pull-right">
        <a href="#" id="test" onClick="javascript:fnExcelReport();" class="btn btn-info">Download</a>
      </div>

      <br><br><br>

<!-- <table class="table-bordered display" cellspacing="0" width="100%" id="myTable">
-->  
<table class="table-bordered" cellspacing="0" width="100%" id="myTable">
 <thead bgcolor="#ffffe6">
  <tr>
    <th rowspan="2" class="text-center"  width="30">#</th>
    <th rowspan="2" class="text-center" width="350">ชื่อมหาวิทยาลัย</th>
    <th rowspan="2" class="text-center">ประเทศ</th>
    <th colspan="5" class="text-center">ความร่วมือ/แลกเปลี่ยน</th>

    <th rowspan="2" class="text-center" width="80">วันที่ลงนาม ครั้งแรก</th>
    <th rowspan="2" class="text-center" width="80">วันที่ลงนาม ล่าสุด</th>
    <th rowspan="2" class="text-center"  width="80">วันหมดอายุ</th>
    <th rowspan="2" class="text-center" width="100">หมายเหตุ</th>
    <th rowspan="2" class="text-center" width="50">#</th>
    <th rowspan="2" class="text-center" width="70">MOU</th>

  </tr>
  <tr>
    <th class="text-center" width="70">นักศึกษา</th>
    <th class="text-center" width="70">อาจารย์</th>
    <th class="text-center"  width="70">นักวิจัย</th>
    <th class="text-center" width="70">บุคลากร</th>
    <th class="text-center">ข้อมูล เอกสารสิ่งพิมพ์</th>


  </tr>
</thead>
<tbody>
  <?php
  $area_name = "";
  $i=1;
  foreach ($mou->result_array() as $row) {
    if($area == '1'){
      if($area_name != $row['area']){
        $area_name = $row['area'];
        ?>
        <tr bgcolor="#ffffe6">
        <td colspan="14" class="text-center"><?php echo "<font size='3' color='green'>&nbsp;&nbsp;&nbsp;&nbsp;".$row['area']."</font>"; ?></td>
        </tr>
        <?php
      }
    }
    ?>
    <tr>
      <td class="text-center"><?php echo $i; ?></td>
      <td><?php echo "&nbsp;&nbsp;".$row['name']; ?></td>
      <td class="text-center"> <?php echo $row['international']; ?></td>
      <td class="text-center"><?php echo $row['student']; ?></td>
      <td class="text-center"><?php echo $row['teacher']; ?></td>
      <td class="text-center"><?php echo $row['peple_re']; ?></td>
      <td class="text-center"><?php echo $row['peple']; ?></td>
      <td class="text-center"><?php echo $row['print']; ?></td>
      <td class="text-center"><?php echo $row['mou_first']; ?></td>
      <td class="text-center"><?php echo $row['mou_last']; ?></td>
      <td class="text-center"><?php echo $row['expired']; ?></td>
      <td class="text-center">

        <?php 
        if($row['status'] == '0'){
          echo "<font color='red'>";
        }else if($row['status'] == '1'){
          echo "<font color='green'>";
        }else{
          echo "<font color='blue'>";
        }
        echo $row['note']; 

        echo "</font>";

        ?>

      </td>
      <td class="text-center">
        <?php 
        if($row['mou_dis'] != ''){
          ?>
          <button type="button" class="btn btn-warning btn-sm" onclick="showModal_main('<?php echo $row['id']; ?>');"><i class="fa fa-info" aria-hidden="true"></i></button>
          <?php
        }
        ?>
      </td>

      <td class="text-center">
        <?php 
        if($row['file'] != ''){
          ?>
          <button type="button" class="btn btn-info btn-sm" onclick="showModal_main2('<?php echo $row['file']; ?>');"><i class="fa fa-file" aria-hidden="true"></i></button>
          <?php
        }else{
          echo "<font color='red'>ไม่มีไฟล์</font>";
        }
        ?>

      </td>

    </tr>
    <?php
    $i++;
  }
  ?>


</tbody>
</table>

<div class="pull-right">
  <?php
  echo $i-1 . " entries";
  ?>
</div>

</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalShow_main" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-admin" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">-- โครงการความร่วมมือ --</h4>
      </div>
      <div class="modal-body">


        <div id="div_show_main">

        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalShow_main2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-admin2" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">-- Memorandum of Understanding --</h4>
      </div>
      <div class="modal-body">


        <div id="div_show_main2">

        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
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
        navigator.msSaveBlob(blob, 'MOU.xls');
      }
    } else {
      $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
      $('#test').attr('download', 'MOU.xls');
    }



  }

  function showModal_main(xid) {

    var sdata = {id: xid};
    $('#div_show_main').load('<?php echo site_url('admin/mou/get_mou_by_id'); ?>', sdata);
    $('#modalShow_main').modal('show');

  }

  function showModal_main2(xid) {

    var sdata = {id: xid};
    $('#div_show_main2').load('<?php echo site_url('admin/mou/show_file_mou'); ?>', sdata);
    $('#modalShow_main2').modal('show');

  }
</script>