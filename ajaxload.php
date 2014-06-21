<?php
    spl_autoload_register(function ($class) {
        include 'classes/' . $class . '.php';
    });
    $twitshows = new Twit("http://feeds.twit.tv/brickhouse_video_hd.xml");
    $shows = $twitshows ->getShows();
?>
    
<?php foreach ($shows as $show):?>
<a href="video.php?videourl=<?php echo $show->getVideourl();?>">
    <div class="showtile">
        <img src="<?php echo $show->getThumbnailNameAndPath(); ?>" />
        <div class="showtitletext">
            <h2><?php echo $show->getShowname();?></h2> 
        </div>
    </div>
</a>
<?php endforeach;