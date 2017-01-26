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
                    ยืม วัสดุ
                </h3>
                <br>
            </div>

            <div class="col-md-12 col-md-offset-0" style="padding: 10px">

                <div class="panel panel-success ">
                    <div class="panel-heading">ข้อวัสดุหลัก</div>
                    <div class="panel-body" id="panelMain">



                        <div class="form-group">

                            <label class="col-sm-1 control-label">ชื่อผู้ยืม :</label>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" id="txtNameGet" name="txtNameGet" placeholder="ชื่อผู้ยืม" require>


                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-1 control-label">ตำแหน่ง :</label>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" id="txtPosition" name="txtPosition" placeholder="ตำแหน่ง" require>


                            </div>

                        </div>


                        <div class="form-group">

                            <label class="col-sm-1 control-label">หน่วยงาน :</label>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" id="txtMajor" name="txtMajor" placeholder="หน่วยงาน/คณะ" require>


                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-1 control-label">วันที่ยืม :</label>

                            <div class="col-sm-4">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" id="date1" name="date1" required="" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-1 control-label">กำหนดวันส่งคืน :</label>

                            <div class="col-sm-4">
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class="form-control" id="date2" name="date2" required="" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-1 control-label">โครงการ/กิจกรรรม :</label>

                            <div class="col-sm-6">

                                <textarea class="form-control" rows="2" id="txtNote" name="txtNote" placeholder="โครงการ/กิจกรรรม"></textarea>


                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-1 control-label">เบอร์โทร :</label>

                            <div class="col-sm-6">

                                <input type="number" maxlength="10" class="form-control" rows="2" id="tel" name="tel" placeholder="08xxxxxxx">


                            </div>

                        </div>



                    </div>
                </div>

            </div>



            <div class="col-md-12 col-md-offset-0" style="padding: 10px">

                <div class="panel panel-success ">
                    <div class="panel-heading">ข้อมูลวัสดุ</div>
                    <div class="panel-body" id="panelMain">
            <div class="col-md-12">



                

                <div align='right'>
                    <button type="button" class="btn btn-success" onclick="showModal_main();"><i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
                <br/><br/>



                <div class="col-md-12">
                    <input type="hidden" name="maxid" id="maxid" value="<?php echo "M".sprintf("%04d",$maxid->maxID); ?>">
                    <input type="hidden" name="maxid2" id="maxid2" value="<?php echo "L".sprintf("%04d",$maxid2->maxID); ?>">

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

                <!--<div class="form-group">
                    <div class="pull-left">
                        <label for="inputsumPrice" class="col-sm-5 control-label ">ผู้ครอบครอง</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="txtName2" name="txtName2" placeholder="ชื่อผู้ครอบครอง">
                        </div>
                    </div>
                </div>-->

                <br/><br/>
                <div class="form-group">

                    <button type="button" class="btn btn-success col-md-offset-4" onclick="btn_con2();">บันทึก</button>
                    <button type="button" class="btn btn-danger" onclick="btn_clear();">ยกเลิก</button>
                </div>
            </div>
</div>
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
                <h4 class="modal-title" id="myModalLabel">-- ข้อมูลวัสดุ --</h4>
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
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY/MM/DD'
        });

        $('#datetimepicker2').datetimepicker({
            format: 'YYYY/MM/DD'
        });

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

    function getIdgoods() {
        var rowss = $('#tDataGoods >tbody >tr').length;

        var full_price = '00';
        var i = 0;

        while (i < rowss) {
            i++;
            if (i == 1) {
                full_price = "";
            }

            var price_t = $('#tDataGoods').children().children().eq(i).children().eq(6).text();


            full_price = full_price + "'" + price_t + "',";

        }


        console.log(full_price);

        return full_price;
    }

    function showModal_main() {

        

        var getvalue = getIdgoods();

        var query = getvalue.substr(0, getvalue.length - 1);

        console.log("F : " + query);


      

        var sdata = {query : query};
        $('#div_show_main').load('<?php echo site_url('admin/dashboard/select_material'); ?>', sdata);
        $('#modalShow_main').modal('show');


    }


    function btn_con2() {



    bootbox.confirm("ต้องการบันทึกหรือไม่ ?", function(result) {
        if (result) {

            var rowss = $('#tDataGoods >tbody >tr').length;
            console.log(rowss);

            var idGet = $("#maxid").val();
            var lmatId = $("#maxid2").val();
            var nameGet = $("#txtNameGet").val();
            var nameMajorGet = $("#txtMajor").val();
            var date1Get = $("#date1").val();
            var date2Get = $("#date2").val();
            var noteGet = $("#txtNote").val();
            var tel = $("#tel").val();
            var position = $("#txtPosition").val();

            if(rowss > 0 && idGet != "" && nameGet != "" && nameMajorGet != "" && date1Get != "" && date2Get != "" && noteGet != "" && tel != "" && position != ""){


                // var faction1 = "<?php echo site_url('admin/dashboard/get_goods_seq/'); ?>";
                // // var fdata1 = {
                // //     id: 'xxx'
                // // };
                // $.post(faction1, function(jdata) {}, 'json');

                var i = 0;
                var row = 1;
                var id_goodsGet = new Array();
                var qty1 = new Array();
                var price = new Array();
           
                while(row <= rowss){
                    
                    id_goodsGet[i] = $('#tDataGoods').children().children().eq(row).children().eq(6).text();
                    qty1[i] = $('#tDataGoods').children().children().eq(row).children().eq(3).text();
                    price[i] = $('#tDataGoods').children().children().eq(row).children().eq(2).text();
                    
                    i++;
                    row++;
                }

                

                var faction = "<?php echo site_url('admin/dashboard/insert_get_material/'); ?>";
                var fdata = {get_id: idGet,id_goods: id_goodsGet,date_get: date1Get, date_return: date2Get, name_get: nameGet, major_get: nameMajorGet,note: noteGet,row: rowss,tel: tel,qty: qty1,price: price,lmatId: lmatId,position: position};

                $.post(faction, fdata, function(jdata) {

                    if (jdata.is_successful) {

                        $.pnotify({
                            title: 'แจ้งให้ทราบ!',
                            text: jdata.msg,
                            type: 'success',
                            opacity: 1,
                            history: false

                        });

                        //if (idGet != "") {
                           window.open('dashboard/detial_get_material_paple/' + idGet, '_blank');
                           btn_new_page();
                        //}
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

            }else{
                bootbox.alert("*ไม่ได้ป้อน ข้อมูลวัสดุหลัก");

            }

            
        }
    });
    return false;
}


   

    function btn_clear() {
        //$("#select_data").trigger('reset');
        get_goods('1');
    }

    function btn_new_page() {
        bootbox.dialog({
            message: "ต้องการเริ่มการเบิกวัสดุใหม่หรือไม่ ?",
            title: "ยืนยันการเบิกครั้งใหม่",
            buttons: {
                main: {
                    label: "Close",
                    className: "btn-primary",
                },
                success: {
                    label: "OK!",
                    className: "btn-success",
                    callback: function() {

                        get_goods('1');

                    }
                }

            }
        });
    }




    function btn_select(id) {
        var xid = id;


        var faction = "<?php echo site_url('admin/dashboard/select_goods_id/'); ?>";
        var fdata = {
            id: xid
        };
        var tname, tprice, tqty, tsum;

        $.post(faction, fdata, function(jdata) {

            if (jdata.is_successful) {

                tname = jdata.record[0]['name_goods'];
                tprice = jdata.record[0]['price'];
                tqty = 1;
                tsum = tprice * tqty;
                var numtitle = $('#tDataGoods tbody tr').length + 1;


                $("#tDataGoods tbody").append("<tr>" +
                    "<td class='text-center'>" + numtitle + "</td>" +
                    "<td class='text-left'>" + tname + jdata.record[0]['brand_goods'] + "</td>" +
                    "<td class='text-right'>" + tprice + "</td>" +
                    "<td class='text-center'>" + tqty + "</td>" +
                    "<td class='text-right'>" + tsum + "</td>" +
                    "<td class='text-center'><button type='button' class='btn btn-small btn-danger' id='remo'><i class='fa fa-trash'></i></button></td>" +
                    "<td class='hid_p'>" + jdata.record[0]['id_goods'] + "</td>" +
                    "<td class='hid_p'>" + jdata.record[0]['standard'] + "</td>" +
                    "</tr>");

                $(".hid_p").hide();
                update_price();


                $('#modalShow_main').modal('hide');


            } else {
                $.pnotify({
                    title: 'แจ้งให้ทราบ!',
                    text: "ผิดพลาด !",
                    type: 'error',
                    opacity: 1,
                    history: false

                });


            }

        }, 'json');


    }
</script>