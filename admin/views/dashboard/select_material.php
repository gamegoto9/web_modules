<!--datatable-->
<link href="<?php echo base_url('assets/css/jquery.dataTables123.css') ?>" rel="stylesheet">
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

</style>

<style>
    .buttonT {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 4px;
        cursor: pointer;
    }
    .buttonP {background-color: #dc9e9e;} /* Blue */
    .buttonG {background-color: #a2d89a;} /* Red */
</style>


<table class="display" cellspacing="0" width="100%">


    <thead>
        <tr bgcolor='#7ACCFA'>
            <th>#</th>
            <th>รายการ</th>
            <th>จำนวน</th>
            <th>ราคา/ชิ้น</th>           
            <th>เลือก</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;

        foreach ($record as $row) {
            ?>
            <tr>
                <td bgcolor='#87FA6A'><?php echo $i ?></td>
                <td><?php echo $row['MatName']; ?></td>              
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo $row['price']; ?></td>

                <!--<td><i class="fa fa-folder-o btn btn-primary" data-toggle="modal" data-target="#myModal" onclick ="showModal(<?php echo $row['id_goods']; ?>)"> ดูข้อมูล </i></td>-->

<td> <i class="fa fa-share btn btn-warning " onclick="btn_select(<?php echo $row['MatId']; ?>);"> </i></td>

</tr>
<?php
$i++;
}            
?>
</tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="modal_cl();"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">-- ข้อมูลครุภัณฑ์ --</h4>
            </div>
            <div class="modal-body">


                <div id="div_show">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="modal_cl();">Close</button>
            </div>
        </div>
    </div>
</div>

<script>


    function modal_cl(){
        $('#modalShow').modal('hide');
    }

    function showModal(xid) {
        var sdata = {id: xid};
        $('#div_show').load('<?php echo site_url('admin/dashboard/data_goods_news'); ?>', sdata);
        $('#modalShow').modal('show');
    }
    



    function btn_select(id) {




        bootbox.dialog({
            message: "จำนวน : <input type='number' class='form-control' name='qty_num' id='qty_num'></input>",
            title: "ยืนยันจำนวนที่ต้องการเบิก",
            buttons: {
                main: {
                    label: "Close",
                    className: "btn-primary",
                },
                success: {
                    label: "OK!",
                    className: "btn-success",
                    callback: function() {



                        // alert("Hi "+ $('#pass').val());
                        var qty_num = $('#qty_num').val();

                        //if(keyword == key){

                            if( qty_num != ""){
                                var sdata = {id: id,
                                    qty_num: qty_num};

                                    console.log(qty_num+" = = "+ id);
                                    var faction = '<?php echo site_url('admin/dashboard/checkCountMaterial'); ?>';
                                    $.post(faction, sdata, function(jdata) {

                                        if (jdata.is_successful) {
                                            

                                            addDataTable(id,qty_num);

                                // //  $(window.location).attr('href', '<?php echo site_url('website/index') ?>');  //โหลด function liste_data อีกครั้ง
                                // $('#myTab a[href="#list"]').tab('show');
                                // // LoadList();
                            } else {
                                $.pnotify({
                                    title: 'แจ้งให้ทราบ',
                                    text: jdata.msg,
                                    type: 'error',
                                    history: false,
                                    delay: 3000
                                });
                            }
                        }, 'json');

                                }else{
                                    $.pnotify({
                                        title: 'แจ้งให้ทราบ',
                                        text: 'กรุณาป้อนจำนวน',
                                        type: 'error',
                                        history: false,
                                        delay: 3000
                                    });
                                }
                        //}else{



                        //}

                    }
                }

            }
        });
}

function addDataTable(id,qty_num){

        var xid = id;
        var faction = "<?php echo site_url('admin/dashboard/select_material_id/'); ?>";
        var fdata = {id:xid};
        var tname,tprice,tqty,tsum;

        $.post(faction, fdata, function(jdata) {

            if (jdata.is_successful) {

             tname = jdata.record[0]['MatName'];
             tprice = jdata.record[0]['price'];
             tqty = qty_num;
             tsum = tprice * tqty;
             var numtitle =  $('#tDataGoods tbody tr').length+1;


             $("#tDataGoods tbody").append("<tr>"+
                "<td class='text-center'>"+numtitle+"</td>"+
                "<td class='text-left'>"+tname+"</td>"+
                "<td class='text-right'>"+tprice+"</td>"+
                "<td class='text-center'>"+tqty+"</td>"+
                "<td class='text-right'>"+tsum+"</td>"+
                "<td class='text-center'><button type='button' class='btn btn-small btn-danger' id='remo'><i class='fa fa-trash'></i></button></td>"+
                "<td class='hid_p'>"+jdata.record[0]['MatId']+"</td>"+
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

<script>
    (function(a) {
        a.createModal = function(b) {
            defaults = {title: "", message: "Your Message Goes Here!", closeButton: true, scrollable: false};
            var b = a.extend({}, defaults, b);
            var c = (b.scrollable === true) ? 'style="max-height: 420px;overflow-y: auto;"' : "";
            html = '<div class="modal fade" id="myModal">';
            html += '<div class="modal-dialog">';
            html += '<div class="modal-content">';
            html += '<div class="modal-header">';
            html += '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
            if (b.title.length > 0) {
                html += '<h4 class="modal-title">' + b.title + "</h4>"
            }
            html += "</div>";
            html += '<div class="modal-body" ' + c + ">";
            html += b.message;
            html += "</div>";
            html += '<div class="modal-footer">';
            if (b.closeButton === true) {
                html += '<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'
            }
            html += "</div>";
            html += "</div>";
            html += "</div>";
            html += "</div>";
            a("body").prepend(html);
            a("#myModal").modal().on("hidden.bs.modal", function() {
                a(this).remove()
            })
        }
    })(jQuery);

    /*
     * Here is how you use it
     */
     $(function() {
        $('.view-pdf').on('click', function() {
            var pdf_link = $(this).attr('href');
            var iframe = '<div class="iframe-container"><iframe src="' + pdf_link + '"></iframe></div>'
            $.createModal({
                title: 'รายงานรายครุภัณฑ์ ประจำกองวิเทศสัมพันธ์',
                message: iframe,
                closeButton: true,
                scrollable: false
            });
            return false;
        });
    })


</script>