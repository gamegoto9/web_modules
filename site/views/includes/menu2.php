
<link href="<?php echo base_url('assets/themes/ResponsiveRetinaReadyMenu/css/default.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/themes/ResponsiveRetinaReadyMenu/css/component.css'); ?>" rel="stylesheet">

<script src="<?php echo base_url('assets/themes/ResponsiveRetinaReadyMenu/js/modernizr.custom.js');?>"></script>

<section id="feature" class="transparent-bg">
    <div class="container">	
       
        <div class="main clearfix">
            <nav1 id="menu" class="nav1">					
                <ul>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <i aria-hidden="true" class="icon-home"></i>
                            </span>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"> 
                                <i aria-hidden="true" class="icon-services"></i>
                            </span>
                            <span>Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <i aria-hidden="true" class="icon-portfolio"></i>
                            </span>
                            <span>Portfolio</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <i aria-hidden="true" class="icon-blog"></i>
                            </span>
                            <span>Blog</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <i aria-hidden="true" class="icon-team"></i>
                            </span>
                            <span>The team</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <i aria-hidden="true" class="icon-contact"></i>
                            </span>
                            <span>Contact</span>
                        </a>
                    </li>
                    
                </ul>
                
                
            </nav1>
            
           
            <nav1 id="menu" class="nav1">					
                <ul>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <i aria-hidden="true" class="icon-home"></i>
                            </span>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"> 
                                <i aria-hidden="true" class="icon-services"></i>
                            </span>
                            <span>Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <i aria-hidden="true" class="icon-portfolio"></i>
                            </span>
                            <span>Portfolio</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <i aria-hidden="true" class="icon-blog"></i>
                            </span>
                            <span>Blog</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <i aria-hidden="true" class="icon-team"></i>
                            </span>
                            <span>The team</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <i aria-hidden="true" class="icon-contact"></i>
                            </span>
                            <span>Contact</span>
                        </a>
                    </li>
                    
                </ul>
                
                
            </nav1>
        </div>
    </div><!-- /container --> 
</div>

</div><!--/.container-->
</section><!--/#feature-->

<!--<script>
    //  The function to change the class
    var changeClass = function(r, className1, className2) {
        var regex = new RegExp("(?:^|//s+)" + className1 + "(?://s+|$)");
        if (regex.test(r.className)) {
            r.className = r.className.replace(regex, ' ' + className2 + ' ');
        }
        else {
            r.className = r.className.replace(new RegExp("(?:^|//s+)" + className2 + "(?://s+|$)"), ' ' + className1 + ' ');
        }
        return r.className;
    };

    //  Creating our button in JS for smaller screens
    var menuElements = document.getElementById('menu');
    menuElements.insertAdjacentHTML('afterBegin', '<button type="button" id="menutoggle" class="nav1toogle" aria-hidden="true"><i aria-hidden="true" class="icon-menu"> </i> Menu</button>');

    //  Toggle the class on click to show / hide the menu
    document.getElementById('menutoggle').onclick = function() {
        changeClass(this, 'nav1toogle active', 'nav1toogle');
    }

    // http://tympanus.net/codrops/2013/05/08/responsive-retina-ready-menu/comment-page-2/#comment-438918
    document.onclick = function(e) {
        var mobileButton = document.getElementById('menutoggle'),
                buttonStyle = mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;

        if (buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
            changeClass(mobileButton, 'nav1toogle active', 'nav1toogle');
        }
    }
</script>-->