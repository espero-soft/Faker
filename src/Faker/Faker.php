<?php 
namespace EsperoSoft\Faker;

use EsperoSoft\Library\CityData;
use EsperoSoft\Library\NameData;
use EsperoSoft\Library\TextData;
use EsperoSoft\Library\EmailData;
use EsperoSoft\Library\PhoneData;
use EsperoSoft\Library\CountryData;
use EsperoSoft\Library\CodePostalData;
use EsperoSoft\Library\StreetAddressData;

class Faker {

    private $imagesLength = 0;
    private $videosLength = 0;
    private $images = array();
    private $videos = array();
    private $cityData;
    private $countryData;
    private $nameData;
    private $emailData;
    private $phoneData;
    private $codePostalData;
    private $streetAddressData;

    public function __construct(){
        
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
        if(empty($this->images)){
            $this->initImages();
        }
        return $this->images[rand(0,$this->imagesLength -1 )];
    }
    public function video(){
        if(empty($this->videos)){
            $this->initVideos();
        }
        return $this->videos[rand(0,$this->videosLength - 1)];
    }
    public function text($min_size=1, $max_size=3){
        $paragraph = "";
        $textData = new TextData();
        for ($i=0; $i < rand($min_size, $max_size); $i++) { 
            $paragraph .= $textData->paragraph(); 
        }
        return $paragraph;
    }
    public function sentence(){
        return (new TextData())->sentence();
    }
    public function sentences(){
        return (new TextData())->sentences();
    }
    public function paragraph(){
        return (new TextData())->paragraph();
    }
    public function paragraphs(){
        return (new TextData())->paragraphs();
    }
    public function name(){
        if(!$this->nameData){
            $this->nameData = new NameData();
        }
        return $this->nameData->getName();
    }
    public function email(){
        if(!$this->emailData){
            $this->emailData = new EmailData();
        }
        return $this->emailData->getEmail();
    }
    public function phone(){
        if(!$this->phoneData){
            $this->phoneData = new PhoneData();
        }
        return $this->phoneData->getPhone();
    }
    public function city(){
        if(!$this->cityData){
            $this->cityData = new CityData();
        }
        return $this->cityData->getCity();
    }
    public function country(){
        if(!$this->countryData){
            $this->countryData = new CountryData();
        }
        return $this->countryData->getCountry();
    }
    public function streetAddress(){
        if(!$this->streetAddressData){
            $this->streetAddressData = new StreetAddressData();
        }
        return $this->streetAddressData->getStreetAddress();
    }
    public function codePostal(){
        if(!$this->codePostalData){
            $this->codePostalData = new CodePostalData();
        }
        return $this->codePostalData->CodePostal();
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