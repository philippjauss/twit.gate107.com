<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Twit</title>
  <link rel="stylesheet" href="customcss/styles.css">

</head>
<body id="videopage">
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

<script src="js/vendor/jquery.js"></script>
<script>
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
       $videoplayer[0].height = $window.height();    

       
    }
    
</script>
</body>
</html>

