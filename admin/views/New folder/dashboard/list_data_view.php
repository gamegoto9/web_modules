<?php // $this->load->view('website/includes/header');     ?>

<!--<div class="container">-->

<?php // $this->load->view('website/includes/nav', array('active' => "LIST")); ?>

<div id="page1">
    <form class="form-inline" role="form" id ="form_data" >
        <div class="form-group">

            <select  class="form-control" id="task" name="task">
                <option value="0">ค้นหาตาม ชื่อ </option>
                <option value="1">ค้นหาตาม รหัส </option>

            </select>
        </div>
        <div class="form-group">


            <input type="text" class="form-control" id="txtSearch" name="txtSearch" >
            <button type="submit" class="btn btn-default" onclick="loadsearch">ค้นหา</button>

        </div>
    </form>


    <div class="row">
        <div class="pull-left span9">
            <?php echo ($is_search) ? "<span class='label label-warning'> แสดงการค้นหาโดย [ '$txt_search' ] พบ " . $search_row . " แถว</span>" : "" ?>
            จำนวนทั้งหมด <span class="badge badge-info"> <?php echo$total_row ?> </span> แถว
        </div>

    </div>
    <br><br>
    <?php echo $this->pagination->create_links(); ?>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>id</th>
                <th>name</th>
                <th>sex</th>
                <th>action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $i = $start_row;
            foreach ($recData->result_array() as $row) {
                $i++;
                ?>

                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['sex']; ?></td>
                    <td>
                        <a href ="<?php echo site_url(); ?>/website/edit_form/<?php echo $row['id']; ?>/" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i>edit</a>   
                        <i class="fa fa-trash-o btn btn-danger btn-xs" onclick="btn_delete(<?php echo $row['id']; ?>);" >delete</i>
                        <i class="fa fa-trash-o btn btn-danger btn-xs"  data-toggle="modal" data-target="#myModal" onclick ="showModal(<?php echo $row['id']; ?>)">test_update</i>
                    </td>

                </tr>

                <?php
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
                    
                   
                    <input type="hidden" id ="textid" class ="form-control" style="width: 150px;">
                    
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

    <?php echo $this->pagination->create_links(); ?>
</div>

<!--</div> /.container -->

<!-- bootboxjs -->
<script src="<?php echo base_url('assets/bootstrap_extras/bootbox/bootbox.min.js'); ?>"></script>

<!--pnotify-->
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.icons.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.js') ?>"></script>



<script>
    $(document).ready(function(){


      
        $("#btn_update").click(function(){
            
            $( "#btn_update" ).load( "website/list_data", function() {
                alert( "Load was performed." );
            });
        });
    });
 
    function loadsearch(){
        $('#page1').load('<?php echo site_url('website/search'); ?>');
    }
    
    
    
    function showModal(xid){
        $('#textid').val(xid);
        
        var sdata = {id:xid};
        $('#div_show').load('<?php echo site_url('website/show'); ?>',sdata);
        $('#modalShow').modal('show');
    }
    
    function save_edit(){
        bootbox.confirm("Are you sure?", function(result) {
                if(result){
                    var faction = "<?php echo site_url('website/update_data'); ?>";
                    var fdata = $("#form_edit").serialize();
                    $.post(faction, fdata, function(jdata){
                                         

                        if(jdata.is_successful){

                            $.pnotify({
                                title: 'แจ้งให้ทราบ!',
                                text: jdata.msg,
                                type: 'success',
                                opacity: 1,
                                history: false
                              
                            });
                       $('#modalShow').modal('hide');    
                        
                        
                        loadpage1();
                        $('#modalShow').modal('show');  
                                            
                        }else{
  
                            $.pnotify({
                                title: 'เตือน!',
                                text: jdata.msg,
                                type: 'error',
                                opacity: 1,
                                history: false
                            });
                        }
                        
                    },'json');
                }
            });
            return false;
    }
</script>
<script>
    function btn_delete(id){
     
     
        bootbox.confirm("ยืนยันการลบข้อมูล ? ", function(ans) {
            if (ans) {
                var sdata = {id: id};
                var faction = '<?php echo site_url('website/delete_data'); ?>';
                $.post(faction, sdata, function(jdata) {
                    if (jdata.is_successful) {
                        $.pnotify({
                            title: 'แจ้งให้ทราบ',
                            text: jdata.msg,
                            type: 'success',
                            history: false,
                            delay: 3000
                        });
                                       
                        $(window.location).attr('href', '<?php echo site_url('website/list_data') ?>');  //โหลด function liste_data อีกครั้ง
                        //                                       $('#myTab a[href="#list"]').tab('show');
                        //                                       LoadList();
                    }
                }, 'json');
            }
        });
     

    }
    
    function load(id){
        //        $( "#test_update" ).load( "div_load/main_view #page1" );

        bootbox.dialog({
            title: "This is a form in a modal.",
            message: '<div class="row">  ' +
                '<div class="col-md-12"> ' +
                '<form class="form-horizontal"> ' +
                '<div class="form-group"> ' +
                '<label class="col-md-4 control-label" for="name">Name</label> ' +
                '<div class="col-md-4"> ' +
                '<input id="name" name="name" type="text" placeholder="Your name" class="form-control input-md"> ' +
                '<span class="help-block">Here goes your name</span> </div> ' +
                '</div> ' +
                '<div class="form-group"> ' +
                '<label class="col-md-4 control-label" for="awesomeness">How awesome is this?</label> ' +
                '<div class="col-md-4"> <div class="radio"> <label for="awesomeness-0"> ' +
                '<input type="radio" name="awesomeness" id="awesomeness-0" value="Really awesome" checked="checked"> ' +
                'Really awesome </label> ' +
                '</div><div class="radio"> <label for="awesomeness-1"> ' +
                '<input type="radio" name="awesomeness" id="awesomeness-1" value="Super awesome"> Super awesome </label> ' +
                '</div> ' +
                '</div> </div>' +
                '</form> </div>  </div>',
            buttons: {
                success: {
                    label: "Save",
                    className: "btn-success",
                    callback: function () {
                        var name = $('#name').val();
                        var answer = $("input[name='awesomeness']:checked").val()
                        Example.show("Hello " + name + ". You've chosen <b>" + answer + "</b>");
                    }
                }
            }
        }
    );
    }
    
    $('#myModal').on('hidden.bs.modal', function (e) {
        // do something...
    })
</script>
<script>
    $(document).ready(function(){
        $( "#txtSearch" ).keypress(function() {
            
        });
    });
</script>
<?php // $this->load->view('website/includes/footer'); ?>




