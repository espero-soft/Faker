<?php 

use EsperoSoft\Faker\Faker;
require_once "vendor/autoload.php";


$faker = new Faker();

// for ($i=0; $i < 5; $i++) { 
//     echo $faker->image()."\n";
// }

$origin = new DateTimeImmutable('16-09-1989 13:00:10');
echo $faker->fromNow($origin)."\n";
