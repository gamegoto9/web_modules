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
            <th>ยี่ห้อ/รุ่น</th>
            <th>หมายเลขครุภัณฑ์</th>
            
            <th>ราคา</th>
            <th>ปีงบฯ</th>
            <th>ข้อมูล</th>
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
                <td><?php echo $row['name_goods']; ?></td>
                <td><?php echo $row['brand_goods']; ?></td>
                <td><?php echo $row['id_goods_crru']; ?></td>

                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['year']; ?></td>

                <!--<td><i class="fa fa-folder-o btn btn-primary" data-toggle="modal" data-target="#myModal" onclick ="showModal(<?php echo $row['id_goods']; ?>)"> ดูข้อมูล </i></td>-->
<td> <i class="fa fa-tags btn btn-success" onclick="showModal(<?php echo $row['id_goods']; ?>);"> </i></td>
<td> <i class="fa fa-share btn btn-warning " onclick="btn_select(<?php echo $row['id_goods']; ?>);"> </i></td>

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