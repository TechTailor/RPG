# Random Password Generator for Laravel 5


[![GitHub release](https://img.shields.io/github/release/techtailor/rpg.svg?style=for-the-badge&&colorB=7E57C2)](https://packagist.org/packages/techtailor/rpg)
[![GitHub issues](https://img.shields.io/github/issues/TechTailor/RPG.svg?style=for-the-badge)](https://github.com/TechTailor/RPG/issues)
<img src="https://img.shields.io/badge/StyleCI-passed-green.svg?style=for-the-badge&&colorB=FF69B4">
[![Software License](https://img.shields.io/badge/license-MIT-blue.svg?style=for-the-badge&&colorB=F27E40)](license.md)
[![GitHub repo size in bytes](https://img.shields.io/github/repo-size/TechTailor/RPG.svg?style=for-the-badge)]()
[![Twitter](https://img.shields.io/twitter/url/https/github.com/TechTailor/RPG.svg?style=social)](https://twitter.com/intent/tweet?text=Wow:&url=https%3A%2F%2Fgithub.com%2FTechTailor%2FRPG)

This package is a simple Laravel untility that allows you to generate complex passwords using a simple Facade.

## Installation

### Step 1: Install Through Composer

```bash
$ composer require techtailor/rpg
```

### Step 2: Add the Service Provider (Skip this step for Laravel 5.5 or higher)

In the 'config/app.php' file -

```php
'providers' => [
    // ...
    TechTailor\RPG\RPGServiceProvider::class,
];
```

### Step 3: Add the Alias (Skip this step for Laravel 5.5 or higher)

In the 'config/app.php' file -

```php
'aliases' => [
    // ...
    'RPG' => TechTailor\RPG\Facade\RPG::class,
];
```
In Laravel 5.5 & higher the package will autoregister the service provider and the alias.

## Usage

In order to use the included RPG Facade, import the following in your file

```php
use TechTailor\RPG\Facade\RPG;
```

### The RPG Facade comes with two basic methods - ``Generate`` and ``Preset``

The ``Generate`` method allows you to pass custom specifications for the generator. 

```php
 RPG::Generate($character, $size, $dashes)
```
Lets go into a bit detail about each of the specifications that can be provided

```bash
$character 
//Accepts a string of letters called "luds"
//Where > l is for lowercase alphabets
        > u is for uppercase alphabets
        > d is for digits
        > s is for special characters'
//The combination of these letters will provide the character set for the generator. Ex: 'ld' will only generate string with lowercase alphabets and digits.
```
```bash
$size
//The total size/lenght of the string your want to generate. 
//Ex : 15 - will generate a string of total 15 characters using the character set your selected
```
```bash
$dashes
//Two options - 0 or 1
//Using '1' - will add multiple dashes (-) randomly within the string generated.
```
Example command for generating a password string of 16 characters with dashes using the 'lud (lowercase, uppercase, digits)' character set -
```bash
return RPG::Generate('lud',16,1); //Result: 37vX-zerT-weSa-vCC3
```

The ``Preset`` method allows you to instantly select from any of the 4 preset specifications for the generator. 

```php
 RPG::Preset($preset) //Where $preset value can be 1, 2, 3 or 4.
```
Details of each preset -
```bash
 Preset - 1
 //Character Set = 'ld' //Size = 8  //Dashes = 0 (Dashes Not allowed)
 //Sample Result: cn3hvphy
 Preset - 2
 //Character Set = 'lud' //Size = 8  //Dashes = 0 (Dashes Not allowed)
 //Sample Result: 4sCFwNr8
 Preset - 3
 //Character Set = 'luds' //Size = 12  //Dashes = 0 (Dashes Not allowed)
 //Sample Result: r&$EQx1#USbw
 Preset - 4
 //Character Set = 'luds' //Size = 16  //Dashes = 1 (Dashes Allowed)
 //Sample Result: 1Z2h-F&?C-x$Tg-KEA8
```
Well that should be enough to get you up and running in no time. 

## Demo Site

You can check out the live demo of this package at https://rpg.gits.moinuddin.info

## Changelog

Please see [CHANGELOG](changelog.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](contributing.md) for details.

## Security

If you discover any security related issues, please email hello@moinuddin.info instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](license.md) for more information.
