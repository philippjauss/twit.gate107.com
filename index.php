<!DOCTYPE html>

<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->

<html class="no-js" lang="de" >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="/img/twitlogo.jpg">  
  <title>Latest TWiT Shows</title>

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
        <li><a href="about.php">About</a></li>
        <hr>
        <li><a href="http://www.twit.tv" target="_blank">TWiT.tv</a></li>        
      </ul>
    </aside>


    <section class="main-section">
        <!-- main content -->
        <?php

                spl_autoload_register(function ($class) {
                    include 'classes/' . $class . '.php';
                });


                $twitshows = new Twit("http://feeds.twit.tv/brickhouse_video_hd.xml");
                $shows = $twitshows ->getShows();

        ?>

        <div class="row">
            <div class="small-12 large-12 columns">

            <?php foreach ($shows as $show):?>
                <a href="video.php?videourl=<?php echo $show->getVideourl();?>">
                    <div class="showtile">
                        <img src="<?php echo $show->getThumbnailNameAndPath(); ?>" />
                        <div class="showtitletext">
                            <h2><?php echo $show->getShowname();?></h2> 
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>

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

