<?php
  require_once("lib/rsslib.php");
  include("lib/common_db.inc");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  
  <title>CMIVXX News Feeds</title>
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  
  <!-- link type="text/css" href="styles/tab_style.css" rel="stylesheet" css="masonCss" id="masonCss" / -->

  <link type="text/css" href="styles/style-masonry.css" rel="stylesheet" css="masonCss" id="masonCss" />
  <link type="text/css" href="styles/rss-style.css" rel="stylesheet" css="cssMain" id="cssMain" />
  <link type="text/css" href="styles/slide.css" rel="stylesheet" media="screen" />

<script type="text/javascript"> 

        //  css file based on the device
        var mainCss;
        var masonCss;
        //  get the device agent and conver to lover case
        var deviceAgent = navigator.userAgent.toLowerCase();

        // alert(deviceAgent);

        if(deviceAgent.match(/android/i)){
            masonCss = "styles/style-masonry-mobile.css";
            mainCss = "styles/mobile.css";
            document.getElementById("masonCss").setAttribute("href", masonCss);
            document.getElementById("cssMain").setAttribute("href", mainCss);
        }
        else if(deviceAgent.match(/webos/i)){
            masonCss = "styles/style-masonry-mobile.css";
            mainCss = "styles/mobile.css";
            document.getElementById("masonCss").setAttribute("href", masonCss);
            document.getElementById("cssMain").setAttribute("href", mainCss);
        }
        else if(deviceAgent.match(/iphone/i)){
            masonCss = "styles/style-masonry-mobile.css";
            mainCss = "styles/mobile.css";
            document.getElementById("masonCss").setAttribute("href", masonCss);
            document.getElementById("cssMain").setAttribute("href", mainCss);
        }
        else if(deviceAgent.match(/ipod/i)){
            masonCss = "styles/style-masonry-mobile.css";
            mainCss = "styles/mobile.css";
            document.getElementById("masonCss").setAttribute("href", masonCss);
            document.getElementById("cssMain").setAttribute("href", mainCss);
        }
        else if(deviceAgent.match(/ipad/i)){
            masonCss = "styles/style-masonry-mobile-ipad.css";
            mainCss = "styles/mobile.css";
            document.getElementById("masonCss").setAttribute("href", masonCss);
            document.getElementById("cssMain").setAttribute("href", mainCss);
        }
        else if(deviceAgent.match(/blackberry/i)){
            masonCss = "styles/style-masonry-mobile.css";
            mainCss = "styles/mobile.css";
            document.getElementById("masonCss").setAttribute("href", masonCss);
            document.getElementById("cssMain").setAttribute("href", mainCss);
        }
        else {
            masonCss = "styles/style-masonry.css";
            mainCss = "styles/rss-style.css";
            document.getElementById("masonCss").setAttribute("href", masonCss);
            document.getElementById("cssMain").setAttribute("href", mainCss);
        }

</script>

<script language="JavaScript" type="text/javascript">
    <!--
        if (document.images) {
            homebuttonup       = new Image();
            homebuttonup.src   = "img/home_off.png" ;
            homebuttondown     = new Image() ;
            homebuttondown.src = "img/home_on.png" ;

            designbuttonup       = new Image();
            designbuttonup.src   = "img/design_off.png" ;
            designbuttondown     = new Image() ;
            designbuttondown.src = "img/design_on.png" ;
        }
        function buttondown( buttonname )
        {
            if (document.images) {
              document[ buttonname ].src = eval( buttonname + "down.src" );
            }
        }
        function buttonup ( buttonname )
        {
            if (document.images) {
              document[ buttonname ].src = eval( buttonname + "up.src" );
            }
        }
    // -->
</script>
  
  <!-- scripts at bottom of page -->

</head>
<body class="demos ">

<!-- Panel -->
<div id="toppanel">
  <div id="panel">
    <div class="content clearfix">
      <div class="left">
        <h1>Welcome to CMIVXX RSS Home Screen</h1>
      </div>
    </div>
</div> <!-- /login -->  

  <!-- The tab on top --> 
<div class="tab">
  <ul class="login">
    <li class="left">&nbsp;</li>
    <li id="toggle">
      <a id="open" class="open" href="#">Page Options</a>
      <a id="close" style="display: none;" class="close" href="#">Page Options</a>      
    </li>
    <li class="right">&nbsp;</li>
  </ul> 
</div> <!-- / top -->

  <!-- ul id="tabnav">
    <li><a href="index.php" class="active">home</a></li>
    <li><a href="#">design</a></li>
    <li><a href="#">news</a></li>
    <li><a href="#">other</a></li>
  </ul -->
    
<section id="content">
    
<div style="float: right; margin-right: 20px;">
  <a href="index.php" onmouseover="buttondown('homebutton')" onmouseout="buttonup('homebutton')"><img src="img/home_off.png" name="homebutton" border="0" /></a>&nbsp;<a href="design.php" onmouseover="buttondown('designbutton')" onmouseout="buttonup('designbutton')"><img src="img/design_off.png" name="designbutton" border="0" /></a>
</div>

<h1 align="left">CMIVXX News Feeds</h1>

<div id="container" class="clearfix">

  <?php

  $link_id = db_connect(cm_homep);

  $result = mysql_query("SELECT idnum, pg, name, url, rss, amt, col, ord FROM rssurls_2 WHERE pg = '1' AND sho = '1' ORDER BY ord ASC", $link_id);

      $MYSQL_ERRNO = mysql_errno();
      $MYSQL_ERROR = mysql_error();

      //echo "$MYSQL_ERRNO - $MYSQL_ERROR<br />";

  while($query_data = mysql_fetch_row($result)) {

?>

  <div class="box col1" align="left">
      <h3><a href="<? echo $query_data[3]; ?>" target="_blank"><? echo $query_data[2]; ?></a></h3>
      <?php
        $url = $query_data[4];
        $amt = $query_data[5];
        // echo RSS_Display($url, 10, false, false);
        echo RSS_Links($url, $amt);
      ?>
  </div>


<?php
  }
?>

</div> <!-- #container -->

<!-- script src="../js/jquery-1.7.1.min.js"></script -->

  <!-- jQuery - the core -->
  <script src="lib/jquery-1.7.1.min.js" type="text/javascript"></script>
  <!-- Sliding effect -->
  <script src="lib/slide.js" type="text/javascript"></script>

<script src="lib/jquery.masonry.min.js"></script>
<script>
  $(function(){
    
    $('#container').masonry({
      itemSelector: '.box',
      isAnimated: true
    });

  });
</script>

    
    <footer id="site-footer">
      Copyright 2013 <a href="http://cmivxx.com">CMIVXX.com</a>
    </footer>
    
  </section> <!-- #content -->

</body>
</html>