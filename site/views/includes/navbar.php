<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="page-scroll" href="#page-top"><img src="<?php echo base_url('assets/themes/templatemo_403_karma/images/bran.png'); ?>" alt="karma"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo site_url().'/site/inter2015/'; ?>">หน้าหลัก</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo site_url().'/site/dashboard/about'; ?>" onclick="loadpage1();">เกี่ยวกับเรา</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo site_url().'/site/dashboard/personal'; ?>">บุคลากร</a>
                </li>
                <li>
                    <a class="page-scroll" href="#" onclick="loadpage1();">การติดต่อ</a>
                </li>
                <li>
                    <a class="page-scroll" href="#"><div id="flip">เข้าสู่ระบบ</div></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div id="panel">
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <h3 class="animated bounceInDown">Login</h3>
                <div class="login-box clearfix animated flipInY">
                    <div class="login-logo">
<!--                        <img src="<?php echo base_url('assets/themes/agency/img/logo.png"');?>">-->
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
                                <input type="text" id="name" name="name" class="form-control" id="inputWarning1" placeholder="Username">
                            </div>
                            <div class="form-group has-warning">                               
                                <input type="password" id="sex" name="sex" class="form-control" id="inputWarning1" placeholder="Password">
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
    $(document).ready(function(){

        $("#btn_save").click(function(){
           
                
                    var faction = "<?php echo site_url('site/dashboard/check_login'); ?>";
                    var fdata = $("#form_data").serialize();
                    $.post(faction, fdata, function(jdata){
                                         

                        if(jdata.is_successful){

                            $.pnotify({
                                title: 'แจ้งให้ทราบ!',
                                text: jdata.msg,
                                type: 'success',
                                opacity: 1,
                                history: false
                                
                            });
                            
                            $(window.location).attr('href', '<?php echo 'http://crruinter.crru.ac.th/bootstrap/check_user.php';?>');
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
                
          
            return false;
        });
        
        
     
  

    });
</script>
<script>

            function loadpage1(){
                
                
                $('#pagecontent').load('<?php echo base_url('/site/dashboard/data_controller'); ?>');
            }
              
        </script>
