# Faker

Faker is a PHP library that generates fake Media data for you. Whether you need to bootstrap your database, create good-looking XML documents, fill-in your persistence to stress test it, or anonymize data taken from a production service, Faker is for you.

It's heavily inspired by Perl's [Data::Faker](https://metacpan.org/pod/Data::Faker), and by Ruby's [Faker](https://rubygems.org/gems/faker).

## Getting Started

### Installation

Faker requires PHP >= 7.1.

```shell
composer require EsperoSoft/faker
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
$origin = new DateTimeImmutable('16-09-1989 13:00:10');
echo $faker->fromNow($origin)."\n"; // 33 years ago


## License

Faker is released under the MIT License. See [`LICENSE`](LICENSE) for details.

## Backward compatibility promise

PHP 8 introduced [named arguments](https://wiki.php.net/rfc/named_params), which
increased the cost and reduces flexibility for package maintainers. The names of the
arguments for methods in Faker is not included in our BC promise.