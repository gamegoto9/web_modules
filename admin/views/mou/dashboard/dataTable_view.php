
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
 <thead>
  <tr>
    <th rowspan="2" class="text-center"  width="30">#</th>
    <th rowspan="2" class="text-center" width="350">ชื่อมหาวิทยาลัย</th>
    <th rowspan="2" class="text-center">ประเทศ</th>
    <th colspan="5" class="text-center">ความร่วมือ/แลกเปลี่ยน</th>

    <th rowspan="2" class="text-center">วันที่ลงนาม ครั้งแรก</th>
    <th rowspan="2" class="text-center">วันที่ลงนาม ล่าสุด</th>
    <th rowspan="2" class="text-center"  width="80">วันหมดอายุ</th>
    <th rowspan="2" class="text-center" width="100">หมายเหตุ</th>
    <th rowspan="2" class="text-center" width="50">#</th>

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
  $i=1;
  foreach ($mou->result_array() as $row) {
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
      <button type="button" class="btn btn-warning btn-sm" onclick="showModal_main('<?php echo $row['id']; ?>');"><i class="fa fa-info" aria-hidden="true"></i></button>
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
        <h4 class="modal-title" id="myModalLabel">-- รายละเอียดโครงการ/สาขาวิชาตามความร่วมมือ --</h4>
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
</script>