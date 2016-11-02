    <link rel="stylesheet" type="text/css" href="localhost/inter_2014/assets/bootstrap_extras/calendar/New folder/screen.css?v=d4d5e39a58" />
    <link rel="stylesheet" type="text/css" href="localhost/inter_2014/assets/bootstrap_extras/calendar/New folder/nes.css" />
    <link rel="stylesheet" type="text/css" href="localhost/inter_2014/assets/bootstrap_extras/calendar/New folder/custom.css" />
    <link rel="stylesheet" type="text/css" href="localhost/inter_2014/assets/bootstrap_extras/calendar/New folder/css?family=PT+Serif:400,700,400italic|Open+Sans:700,400" />
    <link href="localhost/inter_2014/assets/bootstrap_extras/calendar/New folder/css1?family=Carrois+Gothic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="localhost/inter_2014/assets/bootstrap_extras/calendar/New folder/vs.min.css">
    <link href="localhost/inter_2014/assets/bootstrap_extras/calendar/New folder/font-awesome.min.css" rel="stylesheet">
     <style>
     .post {max-width:1200px !important;}
     </style>
   
<link rel="alternate" type="application/rss+xml" title="MikeSmithDev" href="/rss/">
<link rel="canonical" href="http://www.mikesmithdev.com/blog/fullcalendar-event-details-with-bootstrap-modal/" />
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-15550354-1', 'auto');
      ga('send', 'pageview');

    </script>
    <script type="text/javascript" src="localhost/inter_2014/assets/bootstrap_extras/calendar/New folder/addthis_widget.js#pubid=ra-4e3b21215b0b20b2" async></script>


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '607084892744542',
      xfbml      : true,
      version    : 'v2.1'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
    

<nav class="main-nav clearfix">
    <a class="back-button icon-arrow-left" href="http://www.mikesmithdev.com">Home</a>
    <a class="subscribe-button icon-feed" href="http://www.mikesmithdev.com/rss/">Subscribe</a>
</nav>

<main class="content" role="main">

    <article class="post tag-fullcalendar tag-modal tag-dialog tag-json tag-bootstrap">

        <header class="post-header">
            <h1 class="post-title">Extend FullCalendar Events with Bootstrap Modal</h1>
            <section class="post-meta">
                <time class="post-date" datetime="2014-09-13">13 September 2014</time>  on <a href="/tag/fullcalendar/">FullCalendar</a>, <a href="/tag/modal/">modal</a>, <a href="/tag/dialog/">dialog</a>, <a href="/tag/json/">JSON</a>, <a href="/tag/bootstrap/">Bootstrap</a>
            </section>
        </header>

        <section class="post-content">
            <div class="mainCol">
               

<div id="fullCalModal" class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span> <span class="sr-only">close</span></button><h4 id="modalTitle" class="modal-title"></h4></div><div id="modalBody" class="modal-body"></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button  class="btn btn-success"><a id="eventUrl" target="_blank">Event Page</a></button></div></div></div></div>

<div id="bootstrapModalFullCalendar"></div>  

<p><br>  </p>




               
                <script type="text/javascript" src="http://zor.livefyre.com/wjs/v3.0/javascripts/livefyre.js"></script>
                <script type="text/javascript">
                (function () {
                    var articleId =  window.location.href.split('?')[0];
                    articleId = articleId.replace('www.mike','mike');
                    fyre.conv.load({}, [{
                        el: 'livefyre-comments',
                        network: "livefyre.com",
                        siteId: "314590",
                        articleId: articleId,
                        signed: false,
                        collectionMeta: {
                            articleId: articleId,
                            url: fyre.conv.load.makeCollectionUrl(),
                        }
                    }], function() {});
                }());
                </script>
                <!-- END: Livefyre Embed -->
            </div>
            <div class="adCol">
                <div class="adCon">
                    
                    <script type="text/javascript"><!--
                        google_ad_client = "ca-pub-5517302116163052";
                        /* MSDev300x250 */
                        google_ad_slot = "6044618352";
                        google_ad_width = 300;
                        google_ad_height = 250;
                        //-->
                    </script>
                    <script type="text/javascript" src="//pagead2.googlesyndication.com/pagead/show_ads.js">
                    </script>
                        <br><br><br><br><br><br> <!-- yeah that is right, I positioned with <br />. Just be glad it isn't a transparent gif -->
                        <div id="contentad27897"></div>
<script type="text/javascript">
    (function() {
        var params =
        {
            id: "2a3fd2aa-f8bc-4c7d-b527-28743124166b",
            d:  "bWlrZXNtaXRoZGV2LmNvbQ==",
            wid: "27897",
            cb: (new Date()).getTime()
        };

        var qs="";
        for(var key in params){qs+=key+"="+params[key]+"&"}
        qs=qs.substring(0,qs.length-1);
        var s = document.createElement("script");
        s.type= 'text/javascript';
        s.src = "http://api.content.ad/Scripts/widget.aspx?" + qs;
        s.async = true;
        document.getElementById("contentad27897").appendChild(s);
    })();
</script><br><br><br><br>
                       <a class="twitter-timeline" width="300" href="https://twitter.com/MikeSmithDev" data-widget-id="451205014279577600">Tweets by @MikeSmithDev</a>
                    <script>!function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https'; if (!d.getElementById(id)) { js = d.createElement(s); js.id = id; js.src = p + "://platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs); } }(document, "script", "twitter-wjs");</script>


                        <br><br><br><br>
                       <script type="text/javascript"><!--
                        google_ad_client = "ca-pub-5517302116163052";
                        /* MSDev350x250-2 */
                        google_ad_slot = "7521351551";
                        google_ad_width = 300;
                        google_ad_height = 250;
                        //-->
                    </script>
                    <script type="text/javascript" src="//pagead2.googlesyndication.com/pagead/show_ads.js">
                    </script>
<br><br><br><br><br><br>
                    <div id="contentad27898"></div>
<script type="text/javascript">
    (function() {
        var params =
        {
            id: "f7ae9345-26ab-47f5-9965-c001a9409900",
            d:  "bWlrZXNtaXRoZGV2LmNvbQ==",
            wid: "27898",
            cb: (new Date()).getTime()
        };

        var qs="";
        for(var key in params){qs+=key+"="+params[key]+"&"}
        qs=qs.substring(0,qs.length-1);
        var s = document.createElement("script");
        s.type= 'text/javascript';
        s.src = "http://api.content.ad/Scripts/widget.aspx?" + qs;
        s.async = true;
        document.getElementById("contentad27898").appendChild(s);
    })();
</script>
                </div>
            </div>
            <div class="clearfix"></div>
        </section>

        <footer class="post-footer">


            


            

        </footer>

    </article>

</main>



    <div class="footerAd">
        <script type="text/javascript"><!--
            google_ad_client = "ca-pub-5517302116163052";
            /* MSDev-Footer */
            google_ad_slot = "1005643150";
            google_ad_width = 728;
            google_ad_height = 90;
            //-->
        </script><script type="text/javascript" src="//pagead2.googlesyndication.com/pagead/show_ads.js"></script>
    </div>
    <footer class="site-footer clearfix">
         <section class="copyright"><a href="http://www.mikesmithdev.com">MikeSmithDev</a> &copy; 2015</section>
         <section class="poweredby">Proudly published with <a href="https://ghost.org">Ghost</a></section>
    </footer>

    <script src="/public/jquery.js?v=d4d5e39a58"></script>

    <script type="text/javascript" src="localhost/inter_2014/assets/bootstrap_extras/calendar/New folder/jquery.fitvids.js?v=d4d5e39a58"></script>
    <script type="text/javascript" src="localhost/inter_2014/assets/bootstrap_extras/calendar/New folder/index.js?v=d4d5e39a58"></script>
    <script src="localhost/inter_2014/assets/bootstrap_extras/calendar/New folder/moment.js/2.8.2/moment.min.js"></script>
    <script src="localhost/inter_2014/assets/bootstrap_extras/calendar/New folder/fullcalendar.min.js"></script>
    <script src="localhost/inter_2014/assets/bootstrap_extras/calendar/New folder/handstamp.js"></script>
    <script src="localhost/inter_2014/assets/bootstrap_extras/calendar/New folder/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    
    <!-- The inline JS: It's just easier for user-scraping my demos and also for use in Ghost -->
    <script type="text/javascript">
        if (document.getElementById("jquiModalcalendar")){
            //add styles so it doesn't conflict with other portions of the site
            MSDevAddCSS("http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css");
            MSDevAddCSS("/shared/css/calendar.css");

            /* 
             * START JQUERY UI MODAL DEMO CODE
             */
            $(document).ready(function() {     
                $.getScript( "http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js" )
                  .done(function( script, textStatus ) {
                    /* Just for fun. Get the event source via AJAX. Not necessary in this case. Just 'cause. */
                    $.ajax({
                        type: "GET",
                        contentType: "application/json",
                        url: "/hackyjson/cal/",
                        dataType: "json",
                        success: function(data) {
                           $('#jquiModalcalendar').fullCalendar({
                                events: data,
                                header: {
                                    left: '',
                                    center: 'prev title next',
                                    right: ''
                                },
                                theme:true,
                                eventRender: function (event, element) {
                                    element.attr('href', 'javascript:void(0);');
                                    element.click(function() {
                                        $("#startTime").html(moment(event.start).format('MMM Do h:mm A'));
                                        $("#endTime").html(moment(event.end).format('MMM Do h:mm A'));
                                        $("#eventInfo").html(event.description);
                                        $("#eventLink").attr('href', event.url);
                                        $("#eventContent").dialog({ modal: true, title: event.title, width:350 });
                                    });
                                }
                            });
                        }
                    });
                  });
            });
            /* 
             * END JQUERY UI MODAL DEMO CODE
             */
        } else if (document.getElementById("eventFilterCalendar")) {
            MSDevAddCSS("http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css");
            MSDevAddCSS("/shared/css/calendar.css");

            /* 
             * START EVENT FILTER DEMO CODE
             */

            var curSource = new Array();
            curSource[0] = '/hackyjson/cal?e1=' +  $('#e1').is(':checked') + '&e2='+ $('#e2').is(':checked');
            curSource[1] = '/hackyjson/anothercal/';
            var newSource = new Array();
            
            $(document).ready(function() {     
                $('#eventFilterCalendar').fullCalendar({
                    eventSources: [curSource[0],curSource[1]],
                    header: {
                        left: '',
                        center: 'prev title next',
                        right: ''
                    },
                    theme:true,
                    eventRender: function (event, element) {
                        element.attr('href', 'javascript:void(0);');
                    }
                });

                $("#e1, #e2, #e3").change(function() {
                    newSource[0] = '/hackyjson/cal?e1=' +  $('#e1').is(':checked') + '&e2='+ $('#e2').is(':checked');
                    newSource[1] = $('#e3').is(':checked') ? '/hackyjson/anothercal/' : '';
                    $('#eventFilterCalendar').fullCalendar('removeEventSource', curSource[0]);
                    $('#eventFilterCalendar').fullCalendar('removeEventSource', curSource[1]);
                    $('#eventFilterCalendar').fullCalendar('refetchEvents');
                    $('#eventFilterCalendar').fullCalendar('addEventSource', newSource[0]);
                    $('#eventFilterCalendar').fullCalendar('addEventSource', newSource[1]);
                    $('#eventFilterCalendar').fullCalendar('refetchEvents');
                    curSource[0] = newSource[0];
                    curSource[1] = newSource[1];
                });
            });
             /* 
             * END EVENT FILTER DEMO CODE
             */
         } else if (document.getElementById("bootstrapModalFullCalendar")) {
            MSDevAddCSS("http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css");
            MSDevAddCSS("/shared/css/bootstrapmodal.css");
            MSDevAddCSS("/shared/css/calendar.css");
            
             /* 
             * START BOOTSTRAP MODAL DEMO CODE
             */
            $(document).ready(function() { 
                //load up bootstrap modal js for the demo   
                $.getScript( "/shared/js/bootstrapmodal.min.js" ).done(function( script, textStatus ) {
                   $('#bootstrapModalFullCalendar').fullCalendar({
                        events: '/hackyjson/cal/',
                        header: {
                            left: '',
                            center: 'prev title next',
                            right: ''
                        },
                        theme:true,
                        eventRender: function (event, element) {
                            element.attr('href', 'javascript:void(0);');
                            element.click(function() {
                                //set the modal values and open
                                $('#modalTitle').html(event.title);
                                $('#modalBody').html(event.description);
                                $('#eventUrl').attr('href',event.url);
                                $('#fullCalModal').modal();
                            });
                        }
                    });
                });
            });
             /* 
             * END BOOTSTRAP MODAL DEMO CODE
             */
         }

         function MSDevAddCSS(s) {
            var f=document.createElement("link");
            f.setAttribute("rel", "stylesheet");
            f.setAttribute("type", "text/css");
            f.setAttribute("href", s);
            document.getElementsByTagName("head")[0].appendChild(f);
         }

         
</script>
</body>
</html>
