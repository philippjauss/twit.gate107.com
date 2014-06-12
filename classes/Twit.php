<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

/**
 * Create an array of Show objects
 * 
 * This class creates the array of the latest twit shows and returns the
 * array.
 *
 * @author Philipp
 */
class Twit {
    
    /**
     * Feedurl
     * 
     * @var string stores the url to the rss-feed
     */
    private $feed;
    
    /**
     *
     * @var string stores the name of the feed
     */
    private $feedname;
    
    /**
     * All shows as array
     * 
     * @var array storing the show-records
     */
    private $shows = array();
    
    /**
     * Path of thumbnails
     * 
     * @var string storing the path for the showthumbnails
     */
    private $outputpath = "showthumbs/";
    
    
    /***
     * Create instance with the feedurl
     * 
     * @param string $feedurl the url representing the rss-feedurl
     * @return void
     */
    function __construct($feedurl){
        $this->feed=$feedurl;
 
    }
    
    /**
     * Delete old thumbnails, otherwise we run out of filespace sooner or later
     * 
     * @param none
     * @return void
     */
    function cleanup(){
         if (file_exists($this->outputpath)) {
            foreach (new DirectoryIterator($this->outputpath) as $fileInfo) {
                if ($fileInfo->isDot()) {
                    // ignore current and upper directory
                }else {
                    // Delete all files older 21 days 
                    if (time() - $fileInfo->getCTime() >= 60*60*24*21) {
                    // Delete all files older 3 minutes 
                    // if (time() - $fileInfo->getCTime() >= 60*3) {                        
                        //echo "Filename: " . $fileInfo->getFilename() . "\n";
                        //echo "realPath: " . $fileInfo->getRealPath() . "\n";
                        unlink($fileInfo->getRealPath());
                    }
                }
            }
        }       
    }
    
    /**
     * Parse the feed xml file and creates the array of shows and the thumbnails
     * 
     * @param none 
     * @return void
     */
    function parse(){
       
        $rss = simplexml_load_file($this->feed);
        $this->feedname = (string) $rss->channel->title;

        foreach($rss->channel->item as $item){
         
            $show = new Show();
            
            $show->setShowname((string)$item->title);
            $show->setDescription((string)$item->children('http://www.itunes.com/dtds/podcast-1.0.dtd',false) -> summary[0]);
            $show->setVideourl((string)$item->link);
            $show->setThumbnailNameAndPath($this->createThumbnail($show->getShowname(),$show->getVideourl()));
            $this->shows[]=$show;
            
        }        
    }
    
    /**
     * Creates the imagefilename based on the showname if it doesn't exist yet
     * and returns the thumbnail name inclusive directory
     * 
     * @param string $showname the name of the show
     * @param string $videourl the url for the video
     * @return string $imageFileName
     */
    function createThumbnail($showname,$videourl){
            
            switch (getHostName()){
                case "Andromeda":
                    // Programm Path for Windows
                    $ffmpeg ='C:\Programme\ffmpeg\bin\ffmpeg';
                    $jpegoptim = 'C:\Programme\jpegoptim\jpegoptim';
                    break;
                case "saturn":
                    // Programm Path for Linux
                    $ffmpeg ='/usr/bin/avconv';
                    $jpegoptim = '/usr/bin/jpegoptim';
                    break;
                default:
                    // Defaults to Linux path
                    $ffmpeg ='/usr/bin/ffmpeg';
                    $jpegoptim = '/usr/bin/jpegoptim';
                    break;
                }
            
            if (strpos($showname,":")=== false){
                $imagefile = str_replace(' ','',$showname);
                $imagefile = str_replace('.','',$imagefile) . ".jpg";                
            }else {
                $imagefile = str_replace(' ','',stristr($showname,":",true));
                $imagefile = str_replace('.','',$imagefile) . ".jpg";
               
                
            }

            $thumbnail=$this->outputpath.$imagefile;
            if (file_exists($thumbnail)) {
                // If the thumbnail already exists, we don't create a new one
            }else {
                $cmd = "$ffmpeg -ss 00:02:30 -i $videourl  -vframes 1 -s 640x360 $thumbnail 2>&1";          
                error_log(exec($cmd));
                // Optimize jpeg according to googles pagespeed insights
                $cmd = "$jpegoptim $thumbnail --strip-all";
                error_log(exec($cmd));
                
                
            }
            return $thumbnail;
    }
    
    /**
     * Delete old thumbnails, parse the feedxml and deliver the shows-array
     * 
     * @param none
     * @return Show[] array with Show objects
     */
    function getShows(){
        $this->cleanup();
        $this->parse();
        return $this->shows;
    }
}
