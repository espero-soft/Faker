<?php 
namespace EsperoSoft\Faker;

class Faker {

    private $imagesLength = 0;
    private $videosLength = 0;
    private $images = array();
    private $videos = array();

    public function __construct(){
        $this->initImages();
        $this->initVideos();
    }

    public function initImages(){
        $key = "key=9066696-3cf1c3ec03180a57ab47a44cd&";
        $api = "https://pixabay.com/api/?";
        $sufixe = "&image_type=photo&pretty=true&per_page=200";
        $query = [
            "office",
            "women",
            "web",
            "home"
            // "informatique",
            // "MYSQL"
        ];

        foreach ($query as $value) {
            $url = $api.$key."q=".$value.$sufixe;
            $data = json_decode(file_get_contents($url));
            $page = 1;
            while ($data && $page < $data->totalHits/200) {
                foreach ($data->hits as $value) {
                    $this->images[] = $value->largeImageURL;
                }
                $page++;
                $data = json_decode(file_get_contents($url."&page=".$page));
            }
            $this->setImagesLength(count($this->images));
        }
    }
    public function initVideos(){
        $key = "key=9066696-3cf1c3ec03180a57ab47a44cd&";
        $api = "https://pixabay.com/api/videos/?";
        $sufixe = "&video_type=film&pretty=true&per_page=200";
        $query = [
            "office",
            "women",
            "web",
            "home"
            // "informatique",
            // "MYSQL"
        ];

        $results = [];

        foreach ($query as $value) {
            $url = $api.$key."q=".$value.$sufixe;
            $data = json_decode(file_get_contents($url));
            $page = 1;
            while ($data && $page < $data->totalHits/200) {
                foreach ($data->hits as $value) {
                    $this->videos[] = $value->videos->large->url;
                }
                $page++;
                $data = json_decode(file_get_contents($url."&page=".$page));
            }
            $this->setVideosLength(count($this->videos));
        
            // echo $url."\n";
        }

    }
  
    public function image(){
        return $this->images[rand(0,$this->imagesLength -1 )];
    }
    public function video(){
        return $this->videos[rand(0,$this->videosLength - 1)];
    }

    static public function dateDiff($date1, $date2){
        
        
        $firstDate  =  $date1;
        $secondDate =  $date2;
        $result = "";
        $intvl = $firstDate->diff($secondDate);

        if($intvl->y > 0){
            if($intvl->y>1){
                $result .= $intvl->y." years ago";
            }else{
                $result .= $intvl->y." year ago";
            }
        }else if($intvl->m > 0){
            if($intvl->m>1){
                $result .= $intvl->m." months ago";
            }else{
                $result .= $intvl->m." month ago";
            }
        }else if($intvl->d > 0){
            if($intvl->d>1){
                $result .= $intvl->d." days ago";
            }else{
                $result .= $intvl->d." day ago";
            }
        } else if($intvl->h > 0){
            if($intvl->h>1){
                $result .= $intvl->h." hours ago";
            }else{
                $result .= $intvl->h." hour ago";
            }
        }
        else if($intvl->i > 0){
            if($intvl->i>1){
                $result .= $intvl->i." minutes ago";
            }else{
                $result .= $intvl->i." minute ago";
            }
        }
        else if($intvl->s > 0){
            if($intvl->s>1){
                $result .= $intvl->s." seconds ago";
            }else{
                $result .= $intvl->s." second ago";
            }
        }
        return $result;
    }

    public function fromNow($date):?string
    {
        $now = new \DateTimeImmutable();
        $diff = Faker::dateDiff($now,$date);
        return $diff;
    }

    /**
     * Get the value of imagesLength
     */
    public function getImagesLength()
    {
        return $this->imagesLength;
    }

    /**
     * Set the value of imagesLength
     */
    public function setImagesLength($imagesLength): self
    {
        $this->imagesLength = $imagesLength;

        return $this;
    }

    /**
     * Get the value of videosLength
     */
    public function getVideosLength()
    {
        return $this->videosLength;
    }

    /**
     * Set the value of videosLength
     */
    public function setVideosLength($videosLength): self
    {
        $this->videosLength = $videosLength;

        return $this;
    }
}