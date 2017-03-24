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
        /* must be half of the width, minus scrollbar on the left (30px) */
        margin-left: 10%;
    }
    
    .table thead {
        text-align: center;
    }
</style>

<div class="row" id="select_type">
    <div class="col-xs-12 col-md-12">
        <form name="form_select_data" id="select_data" class="form-horizontal">


            <div class="col-md-12">
                <h3>
                    รายงานวัสดุคงเหลือ ประจำปี
                </h3>
                <br>
            </div>

            <div class="col-md-5 col-md-offset-3" style="padding: 10px">

                <div class="panel panel-success ">
                    <div class="panel-heading">ปีงบประมาณ</div>
                    <div class="panel-body" id="panelMain">



                        <div class="form-group">

                            <label class="col-sm-3 control-label">ปีงบประมาณ :</label>

                            <div class="col-sm-7">

                                <select class="form-control" id="year" name="year">
                                <?php
                                foreach ($year->result_array() as $row) {
                                ?>
                                    <option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?></option>
                                 
                                <?php
                                }
                                ?>
                              </select>


                          </div>

                      </div>



                      <button type="button" class="btn btn-success col-md-offset-4" onclick="btn_con2();">พิมพ์รายงาน</button>
                  </div>
                  <div id="result">
                  </div>

              </div>
          </form>
      </div>
  </div>





<script>



    function btn_con2() {



        bootbox.confirm("ต้องการพิมพ์รายงานหรือไม่ ?", function(result) {
            if (result) {

                
                if($('#year').val() != ""){
                
                    if($('#year').val() == '2559'){
                        window.location.href = 'http://crruinter.crru.ac.th/inter_2014/assets/upload/goods_material/รายงานวัสดุคงเหลือ-2559_full.xlsx';
                    }else{
            
          
                window.location.href = 'dashboard/detial_material_balance/' + $('#year').val();
              }

            }else{
                bootbox.alert("*ไม่ได้เลือกปีงบประมาณ");
            }

            
        }
    });
        return false;
    }







   
</script>