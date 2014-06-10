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

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>

