
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


           <div class="col-md-12" >
            <h3><?php echo $type; ?></h3>
            <br>
        </div>
        <div class="col-md-12">

            <div align='right'>
                <button type="button" class="btn btn-success" onclick="showModal_main('<?php echo $standard; ?>');"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </div>
            <br/><br/>



            <div class="col-md-12">
                <input type="hidden" name="maxid" id="maxid" value="<?php echo "R".sprintf("%04d",$maxid->maxID); ?>">
              
               <table class="table table-bordered" id="tDataGoods">
                <thead>
                    <th class="text-center">#</th>
                    <th class="text-center">รายการ/รายละเอียด</th>
                    <th class="text-center">ราคา</th>
                    <th class="text-center">จำนวน</th>
                    <th class="text-center">ราคารวม</th>
                    <th class="text-center">ยกเลิก</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <br/><br/>

        <div class="form-group">
            <div class="pull-right">
                <label for="inputsumPrice" class="col-sm-6 control-label ">ราคารวม</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="sumPrice" placeholder="ราคารวม">
              </div>
          </div>
      </div>

      <br/><br/>
      <div class="form-group">

        <button type="button" class="btn btn-success col-md-offset-4" onclick="btn_con();">เพิ่ม</button>
        <button type="button" class="btn btn-danger" onclick="btn_clear();">ยกเลิก</button>
    </div>
</div>


</form>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalShow_main" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-admin" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">-- ข้อมูลครุภัณฑ์ --</h4>
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
    $(function() {
        $('#datetimepicker1').datetimepicker({format: 'YYYY/MM/DD'});

    });
</script>
<script>



    $(document).ready(function() {

        $("#tDataGoods").on('click', '#remo', function() {
            $(this).parent().parent().remove();
            update_price();
        });
    });

    function update_price() {
        var rowss = $('#tDataGoods >tbody >tr').length;

        var full_price = 0;
        var i = 0;

        while (i < rowss) {
            i++;

            var price_t = $('#tDataGoods').children().children().eq(i).children().eq(4).text();

            var price_v = parseInt(price_t);
            full_price = full_price + price_v;

        }


        $('#sumPrice').val(full_price);

    }

    function getIdgoods(){
        var rowss = $('#tDataGoods >tbody >tr').length;

        var full_price='00';
        var i = 0;

        while (i < rowss) {
            i++;
            if(i == 1){
                full_price = "";
            }

            var price_t = $('#tDataGoods').children().children().eq(i).children().eq(6).text();


            full_price = full_price + "'"+price_t+"',";

        }


        console.log(full_price);

        return full_price;
    }

    function showModal_main(xid) {

        console.log(xid);

        var getvalue = getIdgoods();

        var query = getvalue.substr(0,getvalue.length - 1);

        console.log("F : "+query);


        var sdata = {id: xid,query : query};
        $('#div_show_main').load('<?php echo site_url('admin/dashboard/select_material'); ?>', sdata);
        $('#modalShow_main').modal('show');

        
    }


    function btn_con() {

        bootbox.confirm("ยืนยันการเบิกหรือไม่ ?", function(result) {
            if (result) {

                var rowss = $('#tDataGoods >tbody >tr').length;
                
                if(rowss > 0){

                    var faction1 = "<?php echo site_url('admin/dashboard/lend_goode_seq/'); ?>";

                    var fdata1 = {id: 'xxx'};

                    $.post(faction1, fdata1, function(jdata) {}, 'json');

                    //var Ddate = new Date().toISOString().slice(0, 10);
                    var lend_id = $('#maxid').val();
                    var i = 0;
                    while (i < rowss) {

                        i++;
                        var id_goods = $('#tDataGoods').children().children().eq(i).children().eq(6).text();
                        var standard1 = $('#tDataGoods').children().children().eq(i).children().eq(7).text();
                        
                        var faction = "<?php echo site_url('admin/dashboard/lend_goode_detial/'); ?>";

                        var fdata = {id: id_goods,lendId: lend_id,standard: standard1};

                        console.log(i);

                        if(i === rowss-1){
                            window.open('dashboard/detial_lend_paple_now/'+lend_id,'_blank');
                        }

                        $.post(faction, fdata, function(jdata) {

                            if (jdata.is_successful) {


                                console.log('xxx :: '+i);
                                $.pnotify({
                                    title: 'แจ้งให้ทราบ!',
                                    text: jdata.msg,
                                    type: 'success',
                                    opacity: 1,
                                    history: false

                                });

                                $("#tDataGoods >tbody >tr").remove(); 

                                update_price();


                                loadpage_lendView('1');

                                

                                

                        //$("#select_data").trigger('reset');


                    } else {
                        $.pnotify({
                            title: 'แจ้งให้ทราบ!',
                            text: jdata.msg,
                            type: 'error',
                            opacity: 1,
                            history: false

                        });


                    }

                }, 'json');
                    }
                }else{
                 $.pnotify({
                    title: 'แจ้งให้ทราบ!',
                    text: "กรุณาเพิ่มข้อมูล",
                    type: 'error',
                    opacity: 1,
                    history: false

                });
             }


             //
         }
     });
        return false;
    }
    function btn_clear() {
        $("#select_data").trigger('reset');
    }




</script>