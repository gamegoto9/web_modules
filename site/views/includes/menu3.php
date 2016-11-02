<link href="<?php echo base_url('assets/themes/css3-responsive-menu/style/reset.css'); ?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/themes/css3-responsive-menu/style/example.css'); ?>" rel="stylesheet">   

        <script src="<?php echo base_url('assets/themes/css3-responsive-menu/style/script/respond.js');?>"></script>
       
     
      
        <script>
            jQuery(function($) {
                var open = false;

                function resizeMenu() {
                    if ($(this).width() < 768) {
                        if (!open) {
                            $("#menu-drink").hide();
                        }
                        $("#menu-button").show();
                        $("#logo").attr("src", "image/logo.png");
                    }
                    else if ($(this).width() >= 768) {
                        if (!open) {
                            $("#menu-drink").show();
                        }
                        $("#menu-button").hide();
                        $("#logo").attr("src", "image/logo-large.png");
                    }
                }

                function setupMenuButton() {
                    $("#menu-button").click(function(e) {
                        e.preventDefault();

                        if (open) {
                            $("#menu-drink").fadeOut();
                            $("#menu-button").toggleClass("selected");
                        }
                        else {
                            $("#menu-drink").fadeIn();
                            $("#menu-button").toggleClass("selected");
                        }
                        open = !open;
                    });
                }


                $(window).resize(resizeMenu);

                resizeMenu();
                setupMenuButton();
            });
        </script>
        
        
  <section id="feature" class="transparent-bg">
    <div class="container">	  
  
        <div id="banner-wrapper">
            <header id="banner" role="banner">
                <div id="banner-inner-wrapper">
                    <div id="banner-inner">
                       
                        <nav id="menu-nav">
                            <div id="menu-button">
                                <div id="menu-button-inner"></div>
                            </div>
                        </nav>
                    </div>
                </div>
                <nav id="menu-drink">
                    <ul>
                        <li>
                            <a class="beer" href="#"><span class="icon"></span>Beer</a>
                        </li>
                        <li>
                            <a class="beer" href="#"><span class="icon"></span>Beer</a>
                        </li>
                        <li>
                            <a class="beer" href="#"><span class="icon"></span>Beer</a>
                        </li>
                        <li>
                            <a class="beer" href="#"><span class="icon"></span>Beer</a>
                        </li><br/><br/><br/><br/>
                        <li>
                            <a class="beer" href="#"><span class="icon"></span>Beer</a>
                        </li>
                        
                        <li>
                            <a class="wine" href="#"><span class="icon"></span>Wines</a>
                        </li>
                        <li>
                            <a class="soft-drink" href="#"><span class="icon"></span>Soft Drinks</a>
                        </li>
                        <li>
                            <a class="coffee-tea" href="#"><span class="icon"></span>Coffee &amp; Tea</a>
                        </li>
                        <li>
                            <a class="beer" href="#"><span class="icon"></span>Beer</a>
                        </li>
                        
                        <li>
                            <a class="wine" href="#"><span class="icon"></span>Wines</a>
                        </li>
                        <li>
                            <a class="soft-drink" href="#"><span class="icon"></span>Soft Drinks</a>
                        </li>
                        <li>
                            <a class="coffee-tea" href="#"><span class="icon"></span>Coffee &amp; Tea</a>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>
        
     </div><!--/.container-->
</section><!--/#feature-->  