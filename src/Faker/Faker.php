<?php

namespace EsperoSoft\Faker;

use EsperoSoft\Library\CityData;
use EsperoSoft\Library\NameData;
use EsperoSoft\Library\TextData;
use EsperoSoft\Library\EmailData;
use EsperoSoft\Library\PhoneData;
use EsperoSoft\Library\CountryData;
use EsperoSoft\Library\FullNameData;
use EsperoSoft\Library\CodePostalData;
use EsperoSoft\Library\StreetAddressData;

/**
 * Faker is a PHP library that generates fake data.
 */
class Faker extends TextData
{
    // Properties to store image and video data
    private $imagesLength = 0;
    private $videosLength = 0;
    private $images = [];
    private $videos = [];

    // Data objects for various types of data
    private $cityData;
    private $countryData;
    private $nameData;
    private $emailData;
    private $phoneData;
    private $codePostalData;
    private $streetAddressData;

    /**
     * Constructor for Faker class.
     */
    public function __construct()
    {
        // Initialize data objects here if needed
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

    public function generate_name($length = 15){
        $result = "";
        $code = "az123456789ertyuiopqsdfgh123456789jklmwxcvbn123456789";
    
        $index = 1;
        while ($index <= $length) {
            $result .= $code[rand(0, 52)];
            $index ++;
        }
        return $result;
    
    }

    public function imageUrl($root , $dir="/assets/images/"){
    
        $finename = $this->generate_name().".png";

        $root_dir = $root.$dir.$finename;
        
        if(empty($this->images)){
            $this->initImages();
        }
        $image_url =  $this->images[rand(0,$this->imagesLength -1 )];

        file_put_contents($root_dir, file_get_contents($image_url));

        return $dir.$finename;
    }
    public function videoUrl($root , $dir="/assets/videos/"){
    
        $finename = $this->generate_name().".mp4";

        $root_dir = $root.$dir.$finename;
        
        if(empty($this->videos)){
            $this->initVideos();
        }
        $video_url =  $this->videos[rand(0,$this->videosLength -1 )];

        file_put_contents($root_dir, file_get_contents($video_url));

        return $dir.$finename;
    }


    public function id(){
        return $this->generate_name(20);
    }
    public function video(){
        if(empty($this->videos)){
            $this->initVideos();
        }
        return $this->videos[rand(0,$this->videosLength - 1)];
    }
    public function text($min_size=1, $max_size= 3){
        $max_size = $max_size < $min_size ? $min_size +2 :$max_size; 
        $paragraph = "";
        $textData = new TextData();
        for ($i=0; $i < rand($min_size, $max_size); $i++) { 
            $paragraph .= $textData->paragraph(); 
        }
        return $paragraph;
    }
    public function name(){
        if(!$this->nameData){
            $this->nameData = new NameData();
        }
        return $this->nameData->getName();
    }
    public function names($count = 5){
        $results = [];
        for ($i=0; $i < $count; $i++) { 
            $results[] = $this->name();
        }
        return $results;
    }
    public function full_name(){
        if(!$this->nameData){
            $this->nameData = new NameData();
        }
        return $this->nameData->getName();
    }
    public function full_names($count = 5){
        $results = [];
        for ($i=0; $i < $count; $i++) { 
            $results[] = $this->full_name();
        }
        return $results;
    }
    public function email(){
        if(!$this->emailData){
            $this->emailData = new EmailData();
        }
        return $this->emailData->getEmail();
    }
    public function emails($count = 5){
        $results = [];
        for ($i=0; $i < $count; $i++) { 
            $results[] = $this->email();
        }
        return $results;
    }
    public function phone(){
        if(!$this->phoneData){
            $this->phoneData = new PhoneData();
        }
        return $this->phoneData->getPhone();
    }
    public function phones($count = 5){
        $results = [];
        for ($i=0; $i < $count; $i++) { 
            $results[] = $this->phone();
        }
        return $results;
    }
    public function city(){
        if(!$this->cityData){
            $this->cityData = new CityData();
        }
        return $this->cityData->getCity();
    }
    public function cities($count = 5){
        $results = [];
        for ($i=0; $i < $count; $i++) { 
            $results[] = $this->city();
        }
        return $results;
    }
    public function country(){
        if(!$this->countryData){
            $this->countryData = new CountryData();
        }
        return $this->countryData->getCountry();
    }
    public function countries($count = 5){
        $results = [];
        for ($i=0; $i < $count; $i++) { 
            $results[] = $this->country();
        }
        return $results;
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
    public function postcode(){
        if(!$this->codePostalData){
            $this->codePostalData = new CodePostalData();
        }
        return $this->codePostalData->CodePostal();
    }
    public function firstname(){
        return (new FullNameData())->getFirstname();
    }
    public function firstnames($count = 5){
        $results = [];
        for ($i=0; $i < $count; $i++) { 
            $results[] = $this->firstname();
        }
        return $results;
    }
    public function lastname(){
        return (new FullNameData())->getLastname();
    }
    public function lastnames($count = 5){
        $results = [];
        for ($i=0; $i < $count; $i++) { 
            $results[] = $this->lastname();
        }
        return $results;
    }
    public function dateTime($days = 6000){
        return new \DateTime("-".rand(0, $days)." days ".rand(0, 23)." hour ".rand(0, 59)." minute");
    }
    public function dateTimeImmutable($days = 6000){
        return new \DateTimeImmutable("-".rand(0, $days)." days ".rand(0, 23)." hour ".rand(0, 59)." minute");
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