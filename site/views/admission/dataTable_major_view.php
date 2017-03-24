
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

  #myInput {
   
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;

}
</style>


<?php 


  if($isData != 0){
    if($db == 1){
?>
        <div class="col-md-12 col-md-offset-0" style="padding: 10px">

  <div class="panel panel-success">

    <div class="panel-body" id="panelMain">

      <div class="form-group has-info has-feedback">
        <div class="col-sm-12">
          <div class="input-group">
            <span class="input-group-addon">Search</span>
            <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> 
          </div>
        </div>
      </div>

      <!-- <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->

<!-- <table class="table-bordered display" cellspacing="0" width="100%" id="myTable">
-->  
<table class="table-bordered" cellspacing="0" width="100%" id="myTable" name="myTable">
 <thead bgcolor="#ffffe6">
  <tr>
    <th class="text-center"  width="30">#</th>
    <th class="text-center" width="350">Field of Study</th>
    <th class="text-center" width="30">Select</th>

  </tr>
</thead>
<tbody>
  <?php
  $area_name = "";
  $i=1;
  foreach ($levels as $row) {
   ?>
   <tr>
    <td class="text-center"><?php echo $i; ?></td>
    <td><?php echo "&nbsp;&nbsp;".$row['sub_name_en']; ?></td>

    <?php
    if($type_id == 0){
    ?>
      <td class="text-center"><a class="btn btn-info btn-sm" onclick="selectMajor('<?php echo $row['sub_name_en']; ?>','<?php echo $row['maj_name_en']; ?>','<?php echo $row['sub_id']; ?>','<?php echo $row['lev_id']; ?>','<?php echo $row['maj_id_inter']; ?>','<?php echo $row['00']; ?>');" ><i class="fa fa-external-link"></i></a></td>
    <?php
    }else{
    ?>
      <td class="text-center"><a class="btn btn-info btn-sm" onclick="selectMajor_walkIn('<?php echo $row['sub_name_en']; ?>','<?php echo $row['maj_name_en']; ?>','<?php echo $row['sub_id']; ?>','<?php echo $row['lev_id']; ?>','<?php echo $row['maj_id_inter']; ?>','<?php echo $row['00']; ?>');" ><i class="fa fa-external-link"></i></a></td>
    <?php
    }
    ?>
    
    <td class="hide_td"> <?php echo $row['sub_id']; ?></td>
    <td class="hide_td"> <?php echo $row['maj_id']; ?></td>
    <td class="hide_td"> <?php echo $row['lev_id']; ?></td>

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

<?php
    }else{
?>
  
    <div class="col-md-12 col-md-offset-0" style="padding: 10px">

  <div class="panel panel-success">

    <div class="panel-body" id="panelMain">

      <div class="form-group has-info has-feedback">
        <div class="col-sm-12">
          <div class="input-group">
            <span class="input-group-addon">Search</span>
            <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> 
          </div>
        </div>
      </div>

      <!-- <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->

<!-- <table class="table-bordered display" cellspacing="0" width="100%" id="myTable">
-->  
<table class="table-bordered" cellspacing="0" width="100%" id="myTable" name="myTable">
 <thead bgcolor="#ffffe6">
  <tr>
    <th class="text-center"  width="30">#</th>
    <th class="text-center" width="350">Field of Study</th>
    <th class="text-center" width="350">Faculty</th>
    <th class="text-center" width="30">Select</th>

  </tr>
</thead>
<tbody>
  <?php
  $area_name = "";
  $i=1;
  foreach ($levels as $row) {
   ?>
   <tr>
    <td class="text-center"><?php echo $i; ?></td>
    <td><?php echo "&nbsp;&nbsp;".$row['maj_name_en']; ?></td>
    <td><?php echo "&nbsp;&nbsp;".$row['fac_name_en']; ?></td>

     <?php
    if($type_id == 0){
    ?>
       <td class="text-center"><a class="btn btn-info btn-sm" onclick="selectMajor('<?php echo $row['maj_name_en']; ?>','<?php echo $row['fac_name_en']; ?>','<?php echo $row['maj_id']; ?>','<?php echo $row['lev_id']; ?>','<?php echo $row['fac_id']; ?>','<?php echo $row['id']; ?>');" ><i class="fa fa-external-link"></i></a></td>
    <?php
    }else{
    ?>
      <td class="text-center"><a class="btn btn-info btn-sm" onclick="selectMajor_walkIn('<?php echo $row['maj_name_en']; ?>','<?php echo $row['fac_name_en']; ?>','<?php echo $row['maj_id']; ?>','<?php echo $row['lev_id']; ?>','<?php echo $row['fac_id']; ?>','<?php echo $row['id']; ?>');" ><i class="fa fa-external-link"></i></a></td>
    <?php
    }
    ?>

   
    <td class="hide_td"> <?php echo $row['maj_id']; ?></td>
    <td class="hide_td"> <?php echo $row['fac_id']; ?></td>
    <td class="hide_td"> <?php echo $row['lev_id']; ?></td>

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


<?php
    }
?>


<?php    
  }else{
?>

<h3>No data</h3>

<?php
  }
?>




<script type="text/javascript">
  $(document).ready(function() {
    $(".hide_td").hide();
  });

  function myFunction() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
</script>
</script>

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

  
</script>