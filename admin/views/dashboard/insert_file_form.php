
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

<div class="row" id="select_type">
    <div class="col-xs-12 col-md-12">
        <form name="form_select_data" id="select_data" class="form-horizontal" enctype="multipart/form-data">

            <div class="col-md-12">

                <div class="form-group">
                    <input type="hidden" id="lendId" name="lendId" value="<?php echo $lendId; ?>">
                    <input type="hidden" id="standard" name="standard" value="<?php echo $standard; ?>">

                    <label class="col-md-3 control-label">ไฟล์แนบ * :</label>

                    <div class="col-md-8">
                        <input type="file" id="file" name="file">
                    </div>

                </div>



            </div>
        </form>
    </div>
</div>



<script>

    $(document).ready(function() {

        //$('#txtId').prop('disabled', 'disabled');
    });


    function btn_con_save_file() {

        bootbox.confirm("ต้องการบันทึกหรือไม่ ?", function(result) {
            if (result) {

                var formData = new FormData($('#select_data')[0]);

                $.ajax({
                    url: "dashboard/insert_file",
                    type: 'POST',
                    data: formData,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {


                        var posts = JSON.parse(data);
                        console.log(posts);

                        if (posts.is_successful) {
                           $.pnotify({
                            title: 'แจ้งให้ทราบ',
                            text: posts.msg,
                            type: 'success',
                            history: false,

                        });
                           $('.modal').modal('hide');

                           console.log(" = = = = = = "+ $("#standard").val());
                           loadDetialLend($("#standard").val());
                           $('body').removeClass('modal-open');
                           $('.modal-backdrop').remove();

                       }else{
                           $.pnotify({
                            title: 'แจ้งให้ทราบ',
                            text: posts.msg,
                            type: 'error',
                            history: false,

                        });
                       }

                   },
                   error: function(jqXHR, textStatus, errorThrown) {
                            //handle here error returned
                        }
                    });

            }
        });
        return false;
    }



    function btn_clear() {
        $("#select_data").trigger('reset');
    }




</script>