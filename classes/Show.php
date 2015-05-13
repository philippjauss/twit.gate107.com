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
 * Class containing all details about a TWiT-Show
 *
 * @author Philipp
 */
class Show implements JsonSerializable{
    /**
     * Showname
     * 
     * @var string contains the name of the show
     */
    private $showname;
    
    /**
     * Description
     * 
     * @var string contains the description of the show
     */
    private $description;
    
    /**
     * Url of vide
     * 
     * @var string contains the complete url for the video
     */
    private $videourl;
    
    /**
     * Thumbnail name and path
     *
     * @var string contains the relative path and filename of the thumbnail
     */
    private $thumbnailNameAndPath;
    
    public function __construct() {
        $this->showname="";
        $this->description="";
        $this->videourl="";
        $this->thumbnailNameAndPath="";
    }
            
    public function getShowname() {
        return $this->showname;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getVideourl() {
        return $this->videourl;
    }

    public function getThumbnailNameAndPath() {
        return $this->thumbnailNameAndPath;
    }

    public function setShowname($showname) {
        $this->showname = $showname;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setVideourl($videourl) {
        $this->videourl = $videourl;
    }

    public function setThumbnailNameAndPath($thumbnailNameAndPath) {
        $this->thumbnailNameAndPath = $thumbnailNameAndPath;
    }
    
    public function jsonSerialize()
    {
        return [
                'showname' => $this->showname,
                'description' => $this->description,
                'videourl' => $this->videourl,
                'thumbnailNameAndPath' => $this->thumbnailNameAndPath
        ];
    }

}
