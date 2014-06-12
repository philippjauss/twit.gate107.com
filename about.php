<!DOCTYPE html>

<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->

<html class="no-js" lang="en" >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latest TWiT Shows</title>

  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
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
        <h1 class="title">Latest TWiT Shows</h1>
      </section>

    </nav>

    <aside class="left-off-canvas-menu">
      <ul class="off-canvas-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.html">About</a></li>
        <hr>
        <li><a href="http://www.twit.tv" target="_blank">TWiT.tv</a></li>        
      </ul>
    </aside>


    <section class="main-section">
        <!-- main content -->

        <div class="row">
            <div class="small-12 large-12 columns">
                <h1>About</h1>
                <p>Da ich nicht für jedes Gerät eine App installieren wollte, 
                    nur um die aktuellsten TWiT-Shows anschauen zu können, habe ich mir eine einfache Übersicht erstellt
                    und kann damit die letzten Folgen schauen, egal welches Gerät ich benutze. Und mit Googles Chrome auch gleich
                    aus dem Browser heraus an den Chromecast streamen.
                    
                    Als Datenquelle benutze ich den offiziellen TWiT-RSS-Feed. </p>
                <hr>
                <p> Sick and tired of installing an app on every platform just to watch the latest twit shows, I made a 
                    simple overview to watch them no matter what device I use. And with the latest Chrome (on Android) I can even 
                    stream it to my chromecast.
                    Datasource is the official TWiT-RSS-Feed.


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
  </script>
</body>
</html>




