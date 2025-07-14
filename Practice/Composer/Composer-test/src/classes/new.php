<?php 
namespace MyCrawler\Classes;

class News{

    private $url_to_crawl="",
            $dom="",
            $crawler,
            $headlines;

    function __construct($url)
    {
        $this->url_to_crawl =$url;
        $this->dom=file_get_contents($this->url_to_crawl);
        return $this->dom;

    }

}