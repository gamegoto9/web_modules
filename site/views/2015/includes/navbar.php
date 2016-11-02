<?PHP
$user_language = $this->session->userdata('language');
$this->lang->load('contact_form_' . $user_language, $user_language);
echo $user_language;
?> 
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">    
    <div class="container">
        <div class="row">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand img-responsive"><img src="<?php echo base_url('assets/themes/templatemo_403_karma/images/bran.png'); ?>" alt="karma"></a>
                </div>
            </div>        

            <div class="col-md-10 col-sm-10 col-xs-12">

                <div class="navbar-collapse collapse menu">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#home"><i class="fa fa-home"></i><?PHP echo $this->lang->line('nav_home'); ?></a></li>
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user dropdown"></i><?PHP echo $this->lang->line('nav_about'); ?></a>
                            <ul class="dropdown-menu" style="background-color: #ddd;">

                                <li><a href="<?php echo base_url().'site/dashboard/about'; ?>"><?PHP echo $this->lang->line('nav_abount_abount'); ?></a></li>
                                <li><a href="<?php echo base_url().'site/dashboard/personal'; ?>"><?PHP echo $this->lang->line('nav_abount_personal'); ?></a></li>
                                <li><a href="#home"><?PHP echo $this->lang->line('nav_abount_contact'); ?></a></li>
                               
                            </ul>
                        </li>
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs dropdown"></i><?PHP echo $this->lang->line('nav_service'); ?></a>
                            <ul class="dropdown-menu" style="background-color: #ddd;">

                                <li><a href="<?php echo base_url('/site/dashboard/list_international/0'); ?>"><?PHP echo $this->lang->line('service_mou'); ?></a></li>
                                <li><a href="<?php echo base_url('/site/dashboard/view_passport'); ?>"><?PHP echo $this->lang->line('service_visa'); ?></a></li>
                                <li><a href="<?php echo base_url('/site/dashboard/view_visa'); ?>"><?PHP echo $this->lang->line('service_visa_for'); ?></a></li>
                                <li><a href="<?php echo base_url('/site/dashboard/view_notvisa'); ?>"><?PHP echo $this->lang->line('service_notvisa'); ?></a></li>
                                <li><a href="<?php echo base_url('/site/dashboard/list_exchange'); ?>"><?PHP echo $this->lang->line('service_excheng_program'); ?></a></li>
                                <li><a href="<?php echo base_url('/site/dashboard/list_exten'); ?>"><?PHP echo $this->lang->line('service_excheng'); ?></a></li>
                                <li><a href="<?php echo base_url('/site/dashboard/spark_2015'); ?>"><?PHP echo $this->lang->line('service_sum_std'); ?></a></li>
                                <li><a href="<?php echo base_url('/site/dashboard/list_download'); ?>"><?PHP echo $this->lang->line('service_download'); ?></a></li>
                                <li><a href="#"><?PHP echo $this->lang->line('service_search'); ?></a></li>
                                <li><a href="<?php echo base_url('/site/dashboard/list_services'); ?>"><?PHP echo $this->lang->line('service_service'); ?></a></li>
                                
                                
                                
                            </ul>
                        </li>
<!--                        <li><a href="#portfolio"><i class="fa fa-briefcase"></i><?PHP echo $this->lang->line('nav_por'); ?></a></li>-->
                        <li><a href="http://crruinter.crru.ac.th/inter_2014/site/dashboard/gms"><i class="fa fa-globe"></i><?PHP echo $this->lang->line('nav_blog'); ?></a></li>
                        <li id="flip"><a href="#contact"><i class="fa fa-group"></i><?PHP echo $this->lang->line('nav_contact'); ?></a></li>

                    </ul>

                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.row -->
    </div>
</nav>

<div id="panel">
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <h3 class="animated bounceInDown">Login</h3>
                <div class="login-box clearfix animated flipInY">
                    <div class="login-logo">
<!--                        <img src="<?php echo base_url('assets/themes/agency/img/logo.png"'); ?>">-->
                    </div> 
                    <hr />
                    <div class="login-form">
                        <!--                        <div class="alert alert-error hide">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <h4>Error!</h4>
                                                    Your Error Message goes here
                                                </div>-->
                        <form id="form_data" accept-charset="utf-8">
                            <div class="form-group has-warning">                              
                                <input type="text" id="name" name="name" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group has-warning">                               
                                <input type="password" id="sex" name="sex" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-red" id="btn_save">Login</button> 
                        </form>	
                        <div class="login-links"> 
                            <a href="#">
                                Forgot password?
                            </a>
                            <br />
                            <a href="#">
                                Don't have an account? <strong>Sign Up</strong>
                            </a>
                        </div>      		
                    </div> 			        	
                </div>


            </div>
        </div>
    </div>

</div>
<!-- bootboxjs -->
<script src="<?php echo base_url('assets/bootstrap_extras/bootbox/bootbox.min.js'); ?>"></script>

<!--pnotify-->
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.icons.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.js') ?>"></script>



<script>
    $(document).ready(function() {
        $("#flip").click(function() {
            $("#panel").slideToggle("slow");
        });
    });
</script>

<script>
    $(document).ready(function() {

        $("#btn_save").click(function() {

     

            var faction = "<?php echo site_url('site/inter2015/check_login'); ?>";
            var fdata = $("#form_data").serialize();
            $.post(faction, fdata, function(jdata) {


                if (jdata.is_successful) {

                    $.pnotify({
                        title: 'แจ้งให้ทราบ!',
                        text: jdata.msg,
                        type: 'success',
                        opacity: 1,
                        history: false

                    });

                    $(window.location).attr('href', '<?php echo 'http://crruinter.crru.ac.th/bootstrap/check_user.php'; ?>');
                } else {

                    $.pnotify({
                        title: 'เตือน!',
                        text: jdata.msg,
                        type: 'error',
                        opacity: 1,
                        history: false
                    });
                }

            }, 'json');


            return false;
            
           
        });





    });
</script>
<script>

    function loadpage1() {


        $('#pagecontent').load('<?php echo base_url('/site/dashboard/data_controller'); ?>');
    }

</script>
