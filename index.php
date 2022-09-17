<?php 

use EsperoSoft\Faker\Faker;
require_once "vendor/autoload.php";


$faker = new Faker();

// for ($i=0; $i < 500; $i++) { 
//     echo $faker->image()."\n";
// }
// for ($i=0; $i < 500; $i++) { 
//     echo $faker->video()."\n";
// }

// $origin = new DateTimeImmutable('16-09-1989 13:00:10');
// echo $faker->fromNow($origin)."\n";

// for ($i=0; $i < 100; $i++) { 
//     # code...
//     echo $faker->name()."\n";
// }
// for ($i=0; $i < 100; $i++) { 
//     # code...
//     echo $faker->email()."\n";
// }
// for ($i=0; $i < 100; $i++) { 
//     # code...
//     echo $faker->city()."\n";
// }
// for ($i=0; $i < 100; $i++) { 
//     # code...
//     echo $faker->country()."\n";
// }
// for ($i=0; $i < 100; $i++) { 
//     # code...
//     echo $faker->phone()."\n";
// }
// for ($i=0; $i < 100; $i++) { 
//     # code...
// }
// echo $faker->codepostal()."\n";
// echo $faker->streetAddress()."\n";
// echo $faker->text()."\n";
// for ($i=0; $i < 100; $i++) { 
//     # code...
//     echo $faker->dateTime(3000)->format("Y-m-d H:i:s")."\n";
// }
for ($i=0; $i < 100; $i++) { 
    # code...
    echo $faker->dateTimeImmutable(3000)->format("Y-m-d H:i:s")."\n";
}
