<?php
defined('BASEPATH') or exit('No direct script access allowed');

$user_language = $this->
session->userdata('language');
$this->lang->load('contact_form_' . $user_language, $user_language);

$this->session->set_userdata('LASTURL', $this->uri->uri_string());
?>
<?php $this->
load->view('2017_2/includes/header');?>
<div class="gtco-loader">
</div>
<div id="page">

    <?php $this->
    load->view('2017_2/includes/navbar');?>

    <div class="gtco-section-overflow">

      <div class="gtco-section" id="gtco-services" data-section="passport">
       <div class="gtco-container">
        <div class="row">
         <div class="col-md-12 col-sm-12 animate-box fadeInLeft animated-fast" data-animate-effect="fadeInLeft">
          <div class="thumbnail" style="font-family:'thaisans_neueregular';">


            <!-- Nav tabs -->
            <ul id="tab_calendar" class="nav nav-tabs hidden-xs">
                <li class="active"><a href="#calendar_basic" data-toggle="tab"><?PHP echo $this->lang->line('scholarship_en'); ?><span class="pull-right hidden-lg"><i class="fa fa-angle-down"></i></span></a></li>
                <li><a href="#calendar_extra" data-toggle="tab"><?PHP echo $this->lang->line('scholarship_th'); ?><span class="pull-right hidden-lg"><i class="fa fa-angle-down"></i></span></a></li>
            </ul>
            <div id="tab_calendar" class="tab-content hidden-xs">

                <div class="tab-pane fade in active" id="calendar_basic">
                    <div id="calen_gen"></div>

                    <div id="page-selection_gen" class="pull-right"></div>

                </div>

                <div class="tab-pane fade" id="calendar_extra">
                    <div id="calen_ex"></div>

                    <div id="page-selection_ex" class="pull-right"></div>

                </div>



            </div>


        </div>
    </div>
</div>
</div>
</div>
</div>

<div class="gtco-section-overflow">

    <?php $this->
    load->view('2017_2/includes/footer');?>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/bootstrap_extras/bootpag/jquery.bootpag.min.js');?>"></script>
  <script src="<?php echo base_url('assets/themes/templatemo_403_karma/js/jquery.singlePageNav.js');?>"></script>

<script type='text/javascript'>

    $(document).ready(function() {

    });


</script>

<script type="text/javascript">

    function get_cate() {
        var faction = '<?php echo base_url('site/inter2017_2/data_list_found_out'); ?>';
        var fdata = {
            page: 0
        };
        $('#calen_gen').html('');

        $.post(faction, fdata, function(rData) {
            $('#calen_gen').fadeIn('1200');
            $('#calen_gen').html(rData);
        });


        var faction = '<?php echo base_url('site/inter2017_2/data_list_found_in'); ?>';
        var fdata = {
            page: 0
        };
        $('#calen_ex').html('');
        $.post(faction, fdata, function(rData) {

            $('#calen_ex').html(rData);
        });


        var faction = '<?php echo base_url('site/inter2017_2/activity_menu'); ?>';
        var fdata = {
            page: 0
        };
        $('#activity_menu').html('');
        $.post(faction, fdata, function(rData) {
            $('#activity_menu').fadeIn('1200');
            $('#activity_menu').html(rData);
        });

    }
    $(document).ready(function() {


        get_cate();
            //pagination
            $('#page-selection_gen').bootpag({
                total: 4,
                maxVisible: 6
            }).on("page", function(event, /* page number here */ num) {
                var faction = '<?php echo base_url('site/inter2017_2/data_list_found_out'); ?>';
                var fdata = {
                    page: num
                };
                console.log(fdata);
                //$('#calen_gen').html('');
                $.post(faction, fdata, function(rData) {
                    $('#calen_gen').fadeOut('1200');
                    setTimeout(function() {
                        $('#calen_gen').html(rData);
                        $('#calen_gen').fadeIn('1200');
                    }, 200);
                });

                //console.log(fdata);
            });

            $('#page-selection_ex').bootpag({
                total: 3,
                maxVisible: 6
            }).on("page", function(event, /* page number here */ num) {
                var faction = '<?php echo base_url('site/inter2017_2/data_list_found_in'); ?>';
                var fdata = {
                    page: num
                };
                //$('#calen_ex').html('');
                $.post(faction, fdata, function(rData) {
                    $('#calen_ex').fadeOut('1200');
                    setTimeout(function() {
                        $('#calen_ex').html(rData);
                        $('#calen_ex').fadeIn('1200');
                    }, 200);

                });
            });




            $('#activity_page').bootpag({
                total: 10,
                maxVisible: 4
            }).on("page", function(event, /* page number here */ num) {
                var faction = '<?php echo base_url('site/inter2017_2/activity_menu'); ?>';
                var fdata = {
                    page: num
                };
                //$('#calen_gen').html('');
                $.post(faction, fdata, function(rData) {
                    $('#activity_menu').fadeOut('1200');
                    setTimeout(function() {
                        $('#activity_menu').html(rData);
                        $('#activity_menu').fadeIn('1200');
                    }, 200);
                });

                //console.log(fdata);
            });


        });// END READY
    </script>