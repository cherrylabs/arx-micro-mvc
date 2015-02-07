# Arx Micro MVC

[![Latest Stable Version](https://poser.pugx.org/arx/mmvc/v/stable.png)](https://packagist.org/packages/arx/mmvc)
[![Total Downloads](https://poser.pugx.org/arx/mmvc/downloads.png)](https://packagist.org/packages/arx/mmvc)
[![License](https://poser.pugx.org/arx/mmvc/license.png)](http://opensource.org/licenses/MIT)


## Features

* Micro MVC Blok based on Laravel Framework
* Can be used in any kind of application (Wordpress, Api, etc.)

## Getting started

This is a micro MVC framework based on Laravel. Please keep in mind that if you need more complex app => you should better use Laravel directly.

### Requirements

- PHP > 5.3
- [Composer](http://www.getcomposer.org)

### Installation

```bash
$ composer require arx/mmvc

# To create a micro mvc project

$ vendor/arx/mmvc/bin/blok new $$where_your_app_path_goes ex: app => will put folder inside app folder $$

```

### How to use it

- There is basically 3 files to be aware of : 

* index.php # load everything and put a caller
* bootstrap.php # This is where you can add a ServiceProvider or your Facade depends on your need
* routes.php # Put your routes logic here

Everything else is almost the same than a classic Laravel Project.

/!\ The approache here is to have a blazzing fast micro-mvc and just what you need in most of case

If your app is more complexe, you should considere to use directly a Laravel Project instead !

### Advanced

See ** [the wiki page for more infos](https://github.com/arx/php-mmvc/wiki) **

## Release Notes

### Version 4.2.0

- use Laravel tagging version to simplify the version correspondance (so yes we start directly from 4.2 instead of 1.0)


## License

Arx Micro MVC is free software distributed under the terms of the MIT license

## Aditional information

Any questions, feel free to contact me or ask [here](https://github.com/arx/php-mmvc/issues)

Any issues, please [report here](https://github.com/arx/php-mmvc/issues)