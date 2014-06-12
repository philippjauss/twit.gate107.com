<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->

<html class="no-js" lang="de" >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Twit</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/foundation.css">  
  <link rel="stylesheet" href="customcss/styles.css">
  <link href='http://fonts.googleapis.com/css?family=Fira+Sans:300' rel='stylesheet' type='text/css'>
  <script src="js/vendor/modernizr.js"></script>  

</head>
<body id="videopage">
<?php include_once("analyticstracking.php") ?>    
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
      </ul>
    </aside>


    <section class="main-section"> 
        <div class="row">
            <div class="small-12 large-12 columns">        
    <div id="videocontainer">
        <video id="videoplayer" controls autoplay name="media">
           <source src="<?php echo filter_input(INPUT_GET,'videourl',FILTER_SANITIZE_URL); ?>" 
               type="video/mp4">
           <p>
            Your browser doesn't support HTML5 video.
            <a href="<?php echo filter_input(INPUT_GET,'videourl',FILTER_SANITIZE_URL); ?>">Download</a> the video instead.
            </p>
        </video>
    </div>
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
    $(document).ready(function(){
       setVideosize(); 
    });

    
    $( window ).resize(function() {
       setVideosize();
    });
    
    function setVideosize(){
        
        // http://stackoverflow.com/questions/11800124/html5-video-set-to-browser-full-screen-same-as-noborder-for-flash-movie
        // Using jQuery for ease
       var $videoplayer = $('#videoplayer');
       var $window = $(window);
       
        
       // if you only set one of width and height, the other dimension is automatically 
       // adjusted appropriately so that the video retains its aspect ratio.
       // http://dev.opera.com/articles/view/everything-you-need-to-know-about-html5-video-and-audio/        
       $videoplayer[0].height = $window.height()-$('.tab-bar').height();    

       
    }
    
</script>
</body>
</html>

