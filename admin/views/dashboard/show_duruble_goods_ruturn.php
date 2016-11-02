
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

<div align='right'>

<a class="btn btn-success  view-pdf" href="<?php echo base_url('admin/dashboard/detial_goods_return'); ?>">Print</a>
<br><br>
</div>
<table class="display" cellspacing="0" width="100%">
    <thead>


        <tr bgcolor='#7ACCFA'>
            <th>#</th>
            <th>รหัสครุภัณฑ์</th>
            <th>รายการ</th>
            <th>ยี่ห้อ/รุ่น</th>
            <th>ราคา</th>
            <th>ผู้ส่งคืน</th>
            <th>วันที่ส่งคืน</th>
            
        </tr>
    </thead>



    <tbody>
        <?php
      
        $i = 1;
        foreach ($reTurnGoods as $row) {
            ?>

            
            <tr bgcolor='#87FA6A'>
                <td bgcolor='#87FA6A'><?php echo $i ?></td>
                <td><?php echo $row['id_goods_crru']; ?></td>
                <td><?php echo $row['name_goods']; ?></td>
                <td><?php echo $row['brand_goods']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['date']; ?></td>

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
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    
                    
                    <div id="div_show">
                        
                    </div>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="save_edit()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

<script>
    
    
     function showModal(xid){
        
        
        var sdata = {id:xid};
        $('#div_show').load('<?php echo site_url('website/show'); ?>',sdata);
        $('#modalShow').modal('show');
    }
    
    
    function btn_delete(id) {
        

//alert("aa");
        /*
         bootbox.confirm("ยืนยันการลบข้อมูล ? ", function(ans) {
         if (ans) {
         var sdata = {id: id};
         var faction = '<?php echo site_url('admin/dashboard/delete_data_student'); ?>';
         $.post(faction, sdata, function(jdata) {
         
         if (jdata.is_successful) {
         $.pnotify({
         title: 'แจ้งให้ทราบ',
         text: jdata.msg,
         type: 'success',
         history: false,
         delay: 3000
         });
         //                                       
         //                        //$(window.location).attr('href', '<?php echo site_url('website/list_data') ?>');  //โหลด function liste_data อีกครั้ง
         //                        //                                       $('#myTab a[href="#list"]').tab('show');
         //                        //                                       LoadList();
         }
         }, 'json');
         
         
         
         }
         });   
         */



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
                        }else{
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
                title: 'รายงานรายชื่อประเทศความรวมมือกับตางชาติ MOU',
                message: iframe,
                closeButton: true,
                scrollable: false
            });
            return false;
        });
    })


</script>