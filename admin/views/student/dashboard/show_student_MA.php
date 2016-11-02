
<!--datatable-->
<?php $this->load->library("tcpdf"); ?>
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

<div class="row">
    <div class="col-xs-12 col-md-8">


        <table class="table table-bordered text-center">
            <thead>
                <tr class="active" >
                    <th colspan="5"><a class="btn btn-danger btn-lg btn-block view-pdf" href="<?php echo base_url('admin/student/checkMA_student/'.$send); ?>">ออกรายงาน</a>

   

                </tr>
                <tr class="active" >
                    <th>#</th>
                    <th>คณะ</th>
                    <th>ระดับ</th>
                    <th>สัญชาติ</th>
                    <th>จำนวน</th>


                </tr>
            </thead>



            <tbody>
                <?php
                $i = 1;
                if($send == "0"){      
                foreach ($student as $row) {
                    ?>


                    <tr class="warning">
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['fac_name_th']; ?></td>
                        <td><?php echo $row['lev_name_en']; ?></td>
                        <td><?php echo $row['nation_id']; ?> : <?php echo $row['nation_name_th']; ?></td>
                        <td><?php echo $row['count']; ?></td>





                    </tr>
                    <?php
                    $i++;
                }
                }else if($send == "5"){
                    foreach ($student as $row) {
                    ?>


                    <tr class="warning">
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['maj_name_th']; ?></td>
                        <td><?php echo $row['lev_name_en']; ?></td>
                        <td><?php echo $row['nation_id']; ?> : <?php echo $row['nation_name_th']; ?></td>
                        <td><?php echo $row['count']; ?></td>





                    </tr>
                    <?php
                    $i++;
                }
                }
                ?>
            </tbody>
        </table>

    </div>
</div>


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



    function loadpage1(year) {

        var year = year;


        $('#main_view').load('student/show_data_student_year/' + year);

    }

    



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
                title: 'รายงานจำนวนนักศึกษาที่สถานะภาพกำลังศึกษา',
                message: iframe,
                closeButton: true,
                scrollable: false
            });
            return false;
        });
    })


</script>