
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

    .bgmodal {
        background-color: #9cec40;
    }

</style>

<!-- <div align='right'>

<a class="btn btn-success  view-pdf" href="<?php echo base_url('admin/dashboard/detial_goods_return'); ?>">Print</a>
<br><br>
</div> -->

<div class="col-md-12" >
        <h3><?php echo $type; ?></h3>
        <br>
</div>

<table class="display" cellspacing="0" width="100%">
    <thead>


        <tr bgcolor='#7ACCFA'>
            <th>#</th>
            <th>รหัสการเบิก</th>
            <th>วันที่เบิก</th>
            <th>จำนวน</th>
            <th>ราคารวม</th>
            <th>ผู้เบิก</th>
            <th>ข้อมูล</th>
            <th>พิมพ์</th>
            <th>หลักฐาน</th>
            
        </tr>
    </thead>



    <tbody>
        <?php
      
        $i = 1;
        foreach ($reTurnGoods as $row) {
            $lend_id = $row['lend_id'];
            ?>

            
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['lend_id']; ?></td>
                <td><?php echo $row['Ddate']; ?></td>
                <td><?php echo $row['count']; ?> ชิ้น</td>
                <td><?php echo $row['sum']; ?> บาท</td>
                <td><?php echo $row['name']; ?></td>
                <td><a class="btn btn-info" onclick="showModal('<?php echo $row['lend_id']; ?>','<?php echo $standard; ?>');"><i class="fa fa-newspaper-o"></i></a></td>
                <td><a class="btn btn-success" href="<?php echo base_url('admin/dashboard/detial_lend_paple/'.$lend_id.'/'.$standard); ?>" target="_blank">พิมพ์ใบเบิก</a>
                </td>

                <?php
                    if($row['file'] == ''){
                ?>
                    <td><a class="btn btn-warning" onclick="showModal_file('<?php echo $row['lend_id']; ?>','<?php echo $standard; ?>');"><i class="fa fa-plus"></i></a>
                    </td>

                <?php
                    }else{
                ?>
                    <td><a class="btn btn-primary" href="<?php echo $row['file']; ?>" target="_blank"><i class="fa fa-file"></i></a>
                    </td>
                <?php
                    }
                ?>
                
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
                <div class="modal-header bgmodal">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">รายละเอียดการเบิก</h4>
                </div>
                <div class="modal-body">
                    
                    
                    <div id="div_show">
                        
                    </div>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   
                </div>
            </div>
        </div>
    </div>


     <!-- Modal -->
    <div class="modal fade" id="modalShow2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bgmodal">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">เพิ่มไฟล์หลักฐาน</h4>
                </div>
                <div class="modal-body">
                    
                    
                    <div id="div_show2">
                        
                    </div>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="btn_con_save_file()">บันทึก</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   
                </div>
            </div>
        </div>
    </div>

<script>
    
    
     function showModal(xid,xstandard){
        
        
        var sdata = {id:xid,standard:xstandard};
        $('#div_show').load('<?php echo site_url('admin/dashboard/detialLend'); ?>',sdata);
        $('#modalShow').modal('show');
    }

    function showModal_file(xid,xstandard){
        
        var type_type = 1;
        var sdata = {id:xid,standard:xstandard,type:type_type};
        $('#div_show2').load('<?php echo site_url('admin/dashboard/insert_file_form'); ?>',sdata);
        $('#modalShow2').modal('show');
    }
    
    
    function btn_delete(id) {
        
        
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