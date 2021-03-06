
<!--datatable-->
<link href="<?php echo base_url('assets/css/jquery.dataTables123.css') ?>" rel="stylesheet">
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


<div align='right'>

    <a class="btn btn-success" href="#" onClick="javascript:fnExcelReport();" id="test">Print</a>
    <br>

</div>
<br><br>
<table class="display" cellspacing="0" width="100%" >


    <thead>
        <tr bgcolor='#7ACCFA'>
            <th><center>#</center></th>
            <th><center>รายการ</center></th>
            <th><center>จำนวน</center></th>
            <th><center>ข้อมูล</center></th>
            <th><center>บัญชีวัสดุ</center></th>
        </tr>
    </thead>
    <body>



        <?php
        $i = 1;



        foreach ($record->result_array() as $row) {
            ?>

            <tr>

                <td><center><?php echo $i ?></center></td>
                <td><?php echo $row['MatName']; ?></td>
                <td><center><?php echo $row['qty']; ?></center></td>
                <td><center><i class="fa fa-info btn btn-warning" onclick="showModal(<?php echo $row['MatId']; ?>);"></i></center></td>
                <td><center><a class="fa fa-info btn btn-info" href="<?php echo base_url('admin/dashboard/detial_lend_paple_material_center/'.$row['MatId']); ?>"></a></center></td>
            </tr>

            <?php
            $i++;
        } ?> 

    </table>

    <div id="excel1">
    <table cellspacing="0" name="myTable" id="myTable" width="100%" >


            <thead>
                <tr bgcolor='#7ACCFA'>
                    <th><center>#</center></th>
                    <th><center>รายการ</center></th>
                    <th><center>จำนวน</center></th>
                    <th><center>ข้อมูล</center></th>
                    <th><center>บัญชีวัสดุ</center></th>
                </tr>
            </thead>
            <body>



                <?php
                $i = 1;



                foreach ($record->result_array() as $row) {
                    ?>

                    <tr>

                        <td><center><?php echo $i ?></center></td>
                        <td><?php echo $row['MatName']; ?></td>
                        <td><center><?php echo $row['qty']; ?></center></td>
                        <td><center><i class="fa fa-info btn btn-warning" onclick="showModal(<?php echo $row['MatId']; ?>);"></i></center></td>
                        <td><center><a class="fa fa-info btn btn-info" href="<?php echo base_url('admin/dashboard/detial_lend_paple_material_center/'.$row['MatId']); ?>"></a></center></td>
                    </tr>

                    <?php
                    $i++;
                } ?> 

            </table>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-admin" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">-- ข้อมูลวัสดุ --</h4>
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

            function showModal(xid) {


               var sdata = {id: xid};
               $('#div_show').load('<?php echo site_url('admin/dashboard/data_detial_material'); ?>', sdata);
               $('#modalShow').modal('show');
           }




           function btn_delete(id) {

            bootbox.dialog({
                message: "Password : <input type='password' class='form-control' name='pass' id='pass'></input>",
                title: "ยืนยันการส่งคืน",
                buttons: {
                    main: {
                        label: "Close",
                        className: "btn-primary",
                    },
                    success: {
                        label: "OK!",
                        className: "btn-success",
                        callback: function() {
                            var key = "sphrd2345";


                        // alert("Hi "+ $('#pass').val());
                        var keyword = $('#pass').val();

                        //if(keyword == key){


                            var sdata = {id: id,
                                key: keyword};
                                var faction = '<?php echo site_url('admin/dashboard/delete_data_durable'); ?>';
                                $.post(faction, sdata, function(jdata) {

                                    if (jdata.is_successful) {
                                        $.pnotify({
                                            title: 'แจ้งให้ทราบ',
                                            text: jdata.msg,
                                            type: 'success',
                                            history: false,
                                            delay: 3000
                                        });

                                //  $(window.location).attr('href', '<?php echo site_url('website/index') ?>');  //โหลด function liste_data อีกครั้ง
                                $('#myTab a[href="#list"]').tab('show');
                                // LoadList();
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


                        //}else{



                        //}

                    }
                }

            }
        });

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

<script type="text/javascript">
  function fnExcelReport() {
    var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
    tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

    tab_text = tab_text + '<x:Name>พัสดุคงเหลือ</x:Name>';

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
        navigator.msSaveBlob(blob, 'พัสดุคงเหลือ.xls');
    }
} else {
  $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
  $('#test').attr('download', 'พัสดุคงเหลือ.xls');
}



}
</script>