<!DOCTYPE html>

<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->

<html class="no-js" lang="de" >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="/img/twit-192x192.png">  
  <title>Latest TWiT shows</title>

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/foundation.css">
  <link rel="stylesheet" href="customcss/styles.css">
  <link href='http://fonts.googleapis.com/css?family=Fira+Sans:300' rel='stylesheet' type='text/css'>
  <script src="js/vendor/modernizr.js"></script>

</head>
<body>
<?php include_once("analyticstracking.php"); ?>
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">
    <nav class="tab-bar">
      <section class="left-small">
        <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
      </section>

      <section class="middle tab-bar-section">
          <h1 class="title"><a href="http://www.twit.gate107.com">latest TWiT shows</a></h1>
      </section>

    </nav>

    <aside class="left-off-canvas-menu">
      <ul class="off-canvas-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="http://www.twit.tv" target="_blank">TWiT.tv</a></li>        
      </ul>
    </aside>


    <section class="main-video-section">
        
        <!-- show loading animation -->
        <div id="siteloader">
              <div class="spinner">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
                <div class="bar4"></div>
                <div class="bar5"></div>
                <div class="bar6"></div>
                <div class="bar7"></div>
                <div class="bar8"></div>
                <div class="bar9"></div>
                <div class="bar10"></div>
                <div class="bar11"></div>
                <div class="bar12"></div>
              </div>
            <p>Loading...</p>
        </div>
        
        <!-- main content -->
        <div class="row">
            <div id="showsbyajax" class="small-12 large-12 columns">



            </div>
        </div> 
    </section>
  <a class="exit-off-canvas"></a>

  </div>
</div>

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
    $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "ajaxload.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#siteloader").remove();    
            $("#showsbyajax").html(response); 
        }
    });
  </script>
</body>
</html>

