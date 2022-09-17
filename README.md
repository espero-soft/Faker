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
// use the factory to create a Faker\Generator instance
$faker = new EsperoSoft\Faker\Faker();
// generate data by calling methods
echo $faker->image();
// 'https://pixabay.com/get/g9ac286be168cbd296471da1_1280.jpg'
echo $faker->video();
// 'https://cdn.pixabay.com/vimeo/565144818/Stream%20-%2078213.mp4?width=3840&hash=d05acb913345b3b873b01121453acbf275b18796'

// Generate Name
for ($i=0; $i < 100; $i++) { 
    # code...
    echo $faker->name()."\n";
}

// Generate Email
for ($i=0; $i < 100; $i++) { 
    # code...
    echo $faker->email()."\n";
}

// Generate City
for ($i=0; $i < 100; $i++) { 
    # code...
    echo $faker->city()."\n";
}

// Generate Country
for ($i=0; $i < 100; $i++) { 
    # code...
    echo $faker->country()."\n";
}

// Generate Phone
for ($i=0; $i < 100; $i++) { 
    # code...
    echo $faker->phone()."\n";
}

echo $faker->codepostal()."\n";
echo $faker->streetAddress()."\n";
echo $faker->text()."\n";


// Date
$origin = new DateTimeImmutable('16-09-1989 13:00:10');
echo $faker->fromNow($origin)."\n"; // 33 years ago


## License

Faker is released under the MIT License. See [`LICENSE`](LICENSE) for details.

