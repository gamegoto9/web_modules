<?php $this->load->view('../2015/includes/header'); ?>
<?php $this->load->view('../2015/includes/navbar'); ?>



<?php $this->load->view('includes2/header'); ?>


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

<section id="content">
    <div class="container">

        <div class="row">

            <br><br><br><br><br><br><br><br>

            <div class="col-xs-12 col-sm-12 ">	
                <div class="border-radius-top-teerawat">
                    <font color="#FFF">ความร่วมมือกับต่างชาติ</font>
                </div>
                <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    
                    <table width="100%" class="table table-bordered">
                        <thead>
                            <tr bgcolor="#b35900">
                     
                  
                                <td align="center"><h3>ลำดับที่</h3></td>
                                <td align="center"><h3>มหาวิทยาลัย / องกรณ์ / ความร่วมมือกับต่างชาติ</h3></td>
                                <td align="center"><h3>ประเทศ</h3></td>
                                <td align="center"><h3>Website</h3></td>
                             
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($recData->result_array() as $row) {
                            ?>
                                <tr>
                                    <td align="center"><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td align="center"><?php echo $row['international']; ?></td>
                                    <td align="center"><a href="<?php echo $row['link']; ?>" target="_blank">Website</a></td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    <div align="right">
                        ข้อมูล ณ วันที่ 31 มีนาคม 2558<br>
                        กองวิเทศสัมพันธ์ สำนักงานอธิการบดี<br>
                        <a class="btn btn-danger  view-pdf" href="<?php echo base_url('site/dashboard/detial_MOU/'); ?>">Print</a>
                    </div>
                    
                    </div>
                </div><!--/.col-lg-4 -->
            </div><!--/.row-->
            <?php echo $this->pagination->create_links(); ?>
        </div><!--/.container-->
    </section><!--/#content-->  


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
   