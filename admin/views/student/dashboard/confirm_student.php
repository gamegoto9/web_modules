
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

<div class="row" id="select_type">
    <div class="col-xs-12 col-md-12">

        <div class="form-group centered">
            <form name="form_select_data" id="select_data">
                <div class="col-md-3 col-md-offset-3">

                    <label for="">เลือกสิ่งที่ต้องการค้นหา :</label>
                    <select class="form-control" id="types">
                        
                        <option data-id="date_in">วันที่เข้าศึกษา</option>
                        <option data-id="year_in">ปีที่เข้าศึกษา</option>
                        <option data-id="address">รุ่นนักศึกษา</option>
                    </select>
                    <br>
                    <label for="">ประเภทที่ต้องการค้นหา :</label>
                    <select class="form-control" id="types2">
                        <option>+เลือกข้อมูล+</option>
                    </select>
                    <br>
                    <button class="btn btn-success col-md-offset-4" id="btn_con">ค้นหา</button>
                </div>
            </form>
        </div>


    </div>
</div>

<br><br>
<div class="row" >
    <div class="col-xs-12 col-md-12" id="show_data_confirm">

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


    $(document).ready(function() {

        $('#types2').prop('disabled', 'disabled');
        $('#btn_con').prop('disabled', 'disabled');
        $('#types').change(function() {


            var faction = "<?php echo site_url('admin/student/select_type/'); ?>";
            var fdata = {id: $(this).find(':selected').data('id')};

            $.post(faction, fdata, function(jdata) {

                if (jdata.is_successful) {


                    var options;

                   
                    for (var i = 0; i < jdata.data.length; i++) {
                        options += '<option value="' + jdata.data[i].colum1 + '">' +
                                jdata.data[i].colum1 + '</option>';
                    }

                    $('#types2').html(options);

                    $('#types2').prop('disabled', false);

                } else {

                    alert("NOOOOOO");

                }

            }, 'json');

        });

        $('#types2').change(function() {
            $('#btn_con').prop('disabled', false);
            var type2 = $('#types2').val();

            //alert(type2);

        });

        $("#btn_con").click(function() {

            var type1 = $('#types').find(':selected').data('id');
            var type2 = $('#types2').val();

            console.log(type1,type2);

            $('#show_data_confirm').load('student/select_data_type/' + type1 + '/' + type2);


        });

    });



    



</script>

