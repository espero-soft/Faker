# Faker

Faker is a PHP library that generates fake data for you. Whether you need to bootstrap your database, create good-looking HTML documents, fill in your persistence to stress test it, or anonymize data taken from a production service, Faker is for you.

It's heavily inspired by Perl's [Data::Faker](https://metacpan.org/pod/Data::Faker) and by Ruby's [Faker](https://rubygems.org/gems/faker).

## Getting Started

### Installation

Faker requires PHP >= 7.1.

```shell
composer require espero-soft/faker:dev-master
```

### Documentation

For detailed usage instructions and a comprehensive list of available methods, please refer to the official documentation.

### Basic Usage

To get started with Faker, create a Faker generator instance and use its methods to generate various types of fake data:

```php
<?php
require_once 'vendor/autoload.php';
use EsperoSoft\Faker\Faker;

$faker = new Faker();

// Generate a unique ID
for ($i = 0; $i < 5; $i++) {
    echo $faker->id() . "\n";
}

// Generate an image URL
echo $faker->image() . "\n";

// Download images to local
for ($i = 0; $i < 5; $i++) {
    echo $faker->imageUrl(__DIR__, $file_directory = "/assets/images/") . "\n";
}

// Get video links
echo $faker->video() . "\n";

// Download videos to local
for ($i = 0; $i < 5; $i++) {
    echo $faker->videoUrl(__DIR__, $file_directory = "/assets/videos/") . "\n";
}

// Generate names
for ($i = 0; $i < 5; $i++) {
    echo $faker->name() . "\n";
}

// Generate full names
for ($i = 0; $i < 5; $i++) {
    echo $faker->full_name() . "\n";
}

// Generate first names
for ($i = 0; $i < 5; $i++) {
    echo $faker->firstname() . "\n";
}

// Generate last names
for ($i = 0; $i < 5; $i++) {
    echo $faker->lastname() . "\n";
}

// Generate email addresses
for ($i = 0; $i < 5; $i++) {
    echo $faker->email() . "\n";
}

// Generate city names
for ($i = 0; $i < 5; $i++) {
    echo $faker->city() . "\n";
}

// Generate country names
for ($i = 0; $i < 5; $i++) {
    echo $faker->country() . "\n";
}

// Generate phone numbers
for ($i = 0; $i < 5; $i++) {
    echo $faker->phone() . "\n";
}

// Generate postal codes
echo $faker->codepostal() . "\n";

// Generate street addresses
echo $faker->streetAddress() . "\n";

// Generate random text
echo $faker->text() . "\n";

// Generate dates
for ($i = 0; $i < 5; $i++) {
    echo $faker->dateTime($range_of_days = 6000)->format("Y-m-d H:i:s") . "\n";
}

// Generate dates with DateTimeImmutable
for ($i = 0; $i < 5; $i++) {
    echo $faker->dateTimeImmutable($range_of_days = 6000)->format("Y-m-d H:i:s") . "\n";
}

// Generate dates from a specific origin
$origin = new DateTimeImmutable('16-09-1989 13:00:10');
echo $faker->fromNow($origin) . "\n"; // e.g., 33 years ago

```

## License

Faker is released under the MIT License.

---