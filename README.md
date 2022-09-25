# Faker

Faker is a PHP library that generates fake data for you. Whether you need to bootstrap your database, create good-looking HTML documents, fill-in your persistence to stress test it, or anonymize data taken from a production service, Faker is for you.

It's heavily inspired by Perl's [Data::Faker](https://metacpan.org/pod/Data::Faker), and by Ruby's [Faker](https://rubygems.org/gems/faker).

## Getting Started

### Installation

Faker requires PHP >= 7.1.

```shell
composer require espero-soft/faker:dev-master
```

### Documentation



### Basic Usage

Use `new EsperoSoft\Faker\Faker()` to create and initialize a Faker generator, which can generate data by accessing methods named after the type of data you want.

```php
<?php
require_once 'vendor/autoload.php';
// use the Faker to create a Faker Generator instance
$faker = new EsperoSoft\Faker\Faker();


// generate unique Id
for ($i=0; $i < 5; $i++) { 
    # code...
    echo $faker->id()."\n";
    // x7mk3p9i4j48ek3d98b5
    // w139191mu2ds49lgg3wt
    // a4fdm8n761r96zsb53g3
    // 271k1527v353v1917r8b
    // cpjuf3ph57hoaa5b13u7
}

// generate image URL
echo $faker->image();
// 'https://pixabay.com/get/g9ac286be168cbd296471da1_1280.jpg'

// Download image to local
for ($i=0; $i < 5; $i++) { 
    echo $faker->imageUrl(__DIR__, $file_directory="/assets/images/")."\n";
    // /assets/images/1l18wgbt16m1cb9.png
    // /assets/images/46tgvy22f9nwh8b.png
    // /assets/images/hszf5h8z973x4uz.png
    // /assets/images/iarpiuj12hwb13s.png
    // /assets/images/s41qo8zlh8f44g6.png
}

// Get video link
echo $faker->video();
// 'https://cdn.pixabay.com/vimeo/565144818/Stream%20-%2078213.mp4?width=3840&hash=d05acb913345b3b873b01121453acbf275b18796'

// Download video to local
for ($i=0; $i < 5; $i++) { 
    echo $faker->videoUrl(__DIR__, $file_directory="/assets/videos/")."\n";
    // /assets/videos/fh9g7io6r8govm5.mp4
    // /assets/videos/587343bo1244hb6.mp4
    // /assets/videos/l3z21dz4twtw3p5.mp4
    // /assets/videos/vuh75n33z5gznp8.mp4
    // /assets/videos/lc417fz4c52ihzl.mp4
}

// Generate Name
for ($i=0; $i < 5; $i++) { 
    # code...
    echo $faker->name()."\n";
    // Stella Hicks
    // Kermit Holland
    // Ashton Dunlap
    // Jeremy Rutledge
    // Evan Hood
}
for ($i=0; $i < 5; $i++) { 
    # code...
    echo $faker->full_name()."\n";
    // Orlando Dickerson
    // Lavinia Ortega
    // Madison Calderon
    // Hope Jennings
    // Gay Davis
}

for ($i=0; $i < 5; $i++) { 
    # code...
    echo $faker->firstname()."\n";
    // Diann
    // Shaquana
    // Freddy
    // Edward
    // Marinda
}

for ($i=0; $i < 5; $i++) { 
    # code...
    echo $faker->lastname()."\n";
    // Hanh
    // Cathey
    // Candi
    // Yetta
    // Alexia
}

// Generate Email
for ($i=0; $i < 5; $i++) { 
    # code...
    echo $faker->email()."\n";
}

// Generate City
for ($i=0; $i < 5; $i++) { 
    # code...
    echo $faker->city()."\n";
}

// Generate Country
for ($i=0; $i < 5; $i++) { 
    # code...
    echo $faker->country()."\n";
}

// Generate Phone
for ($i=0; $i < 5; $i++) { 
    # code...
    echo $faker->phone()."\n";
}

echo $faker->codepostal()."\n";
echo $faker->streetAddress()."\n";
echo $faker->text()."\n";



## Generate Dates

for ($i=0; $i < 5; $i++) {
    echo $faker->dateTime($range_of_days = 6000)->format("Y-m-d H:i:s")."\n";
    // 2015-08-20 20:37:40
    // 2021-07-23 22:27:40
    // 2021-03-18 13:36:40
    // 2019-02-01 04:30:40
    // 2016-04-07 08:40:40
}

for ($i=0; $i < 5; $i++) { 
    echo $faker->dateTimeImmutable($range_of_days = 6000)->format("Y-m-d H:i:s")."\n";
    // 2015-08-20 20:37:40
    // 2021-07-23 22:27:40
    // 2021-03-18 13:36:40
    // 2019-02-01 04:30:40
    // 2016-04-07 08:40:40
}

$origin = new DateTimeImmutable('16-09-1989 13:00:10');
echo $faker->fromNow($origin)."\n"; // 33 years ago


## License

Faker is released under the MIT License. 

