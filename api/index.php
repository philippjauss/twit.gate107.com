<?php

use Twit;

require 'vendor/autoload.php';

$app = new \Slim\Slim();
$app->contentType('application/json;charset=utf-8');


spl_autoload_register(function ($class) {
        include __DIR__.'/../classes/' . $class . '.php';
});





// Routing


$app->get('/','hello');
$app->get('/shows', 'getAllShows');
$app->get('/shows/:showName', 'getShow'); //






/*
 * Return simple welcome json object for testing purpose of the api-root
 */
function hello() {
   $welcomeMessage = ['message'=>'hello'];
   echo json_encode($welcomeMessage);
    
}

/*
 * Return an array of show objects for all TWiT-Shows as json
 */
function getAllShows() {
    $twitshows =  new Twit("http://feeds.twit.tv/brickhouse_video_hd.xml");
    $shows = $twitshows ->getShows();  // array of show objects

    echo json_encode($shows);
}


/*
 * Return an array of show objects for a specific show as json
 */
function getShow($showName){
    
}

$app->run();
