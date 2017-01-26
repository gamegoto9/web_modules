
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

                    <?php 

                    if($type == 1){
                        ?>
                        <input type="hidden" id="lendId" name="lendId" value="<?php echo $lendId; ?>">
                        <input type="hidden" id="standard" name="standard" value="<?php echo $standard; ?>">
                        <?php
                    }else if($type == 2){
                        ?>
                        <input type="hidden" id="LmatId" name="LmatId" value="<?php echo $LmatId; ?>">

                        <?php
                    }else if($type == 3){
                        ?>

                        <input type="hidden" id="get_material_id" name="get_material_id" value="<?php echo $get_material_id; ?>">
                        <?php
                    }else if($type == 4){
                        ?>
                        <input type="hidden" id="get_id" name="get_id" value="<?php echo $get_id; ?>">
                        <?php
                    }else if($type == 5){
                        ?>
                        <input type="hidden" id="maxid" name="maxid" value="<?php echo $detial_return_id; ?>">
                        <?php
                    }else if($type == 6){
                        ?>
                        <input type="hidden" id="id_repair" name="id_repair" value="<?php echo $id_repair; ?>">
                        <?php
                    }
                    ?>
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


    function btn_con_save_file_lend_material() {

        bootbox.confirm("ต้องการบันทึกหรือไม่ ?", function(result) {
            if (result) {

                var formData = new FormData($('#select_data')[0]);

                $.ajax({
                    url: "dashboard/insert_file_lend_material",
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


                           loadDetialLendMaterial();
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


    function btn_con_save_file_get_material() {

        bootbox.confirm("ต้องการบันทึกหรือไม่ ?", function(result) {
            if (result) {

                var formData = new FormData($('#select_data')[0]);

                $.ajax({
                    url: "dashboard/insert_file_get_material",
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


                           loadDetialGetMaterial();
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


    function btn_con_save_file_get_goods() {

        bootbox.confirm("ต้องการบันทึกหรือไม่ ?", function(result) {
            if (result) {

                var formData = new FormData($('#select_data')[0]);

                $.ajax({
                    url: "dashboard/insert_file_get_goods",
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


                           loadDetialGet();
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

    function btn_save_file_tranform(){
        var formData = new FormData($('#select_data')[0]);

        $.ajax({
            url: "dashboard/insert_file_goods_return2",
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

               
                 loadDetialReturn();
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

    function btn_save_file_repair(){
        var formData = new FormData($('#select_data')[0]);

        $.ajax({
            url: "dashboard/insert_file_repair",
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

               
                 loadDetialRepair();
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

    function btn_clear() {
        $("#select_data").trigger('reset');
    }




</script>