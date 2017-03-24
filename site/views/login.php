
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.png">
  <title>Clean Zone</title>
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Raleway:300,200,100" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet" type="text/css">

  <link href="<?php echo base_url('assets/themes/login/css/bootstrap.min.css');?>" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url('assets/themes/login/css/font-awesome/css/font-awesome.min.css');?>">
    <!--if lt IE 9script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
  -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/login/css/jquery.nanoscroller/css/nanoscroller.css');?>">
  <link href="<?php echo base_url('assets/themes/login/css/style.css');?>" rel="stylesheet">
</head>
<body class="texture">
  <div id="cl-wrapper" class="login-container">
    <div class="middle-login">
      <div class="block-flat">
        <div class="header">
          <h3 class="text-center">International Affair</h3>
        </div>
        <div>
        <form style="margin-bottom: 0px !important;" class="form-horizontal" name="form_data" id="form_data">
            <div class="content">
              <h4 class="title">Login Access</h4>
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" placeholder="Username" class="form-control" name="name" id="name">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input  type="password" placeholder="Password" class="form-control" name="sex" id="sex">
                  </div>
                </div>
              </div>
            </div>
            <div class="foot">

              <button data-dismiss="modal" type="button" class="btn btn-primary" id="btn_save">Log me in</button>
            </div>
          </form>
        </div>
      </div>
      <div class="text-center out-links"><a href="#">© 2016 Your Company</a></div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url('assets/themes/login/js/jquery.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/themes/login/js/jquery.nanoscroller.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/themes/login/js/cleanzone.js');?>"></script>
  <script src="<?php echo base_url('assets/themes/login/js/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('assets/themes/login/js/voice-recognition.js');?>"></script>

    <!-- bootboxjs -->
<script src="<?php echo base_url('assets/bootstrap_extras/bootbox/bootbox.min.js'); ?>"></script>

<!--pnotify-->
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.icons.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.js') ?>"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      	//initialize the javascript
      	App.init();

       $("#btn_save").click(function() {



        var faction = "<?php echo site_url('site/inter2017_2/check_login'); ?>";
        var fdata = $("#form_data").serialize();

          

            $.ajax({
              type: 'POST',
              url: faction,
                data: fdata, // or JSON.stringify ({name: 'jonas'}),
                success: function(jdata) {
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

              },

              dataType: 'json'
            });

            return false;
            

          });



     });

   </script>
 </body>
 </html>