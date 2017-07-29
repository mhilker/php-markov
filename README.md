# PHP Markov

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

[Markov chain](link-wikipedia) text generator for PHP.

## Install

``` bash
$ composer require mhilker/markov
```

## Example

Create your markov table from your base text. [Some](link-satellites) [examples](link-stars) are provided in the [resources](link-resources) directory.

``` php
$text = 'your text goes here...';
$table = new Table(new Text($text), 2);
```

Generate your new strings from the created table. You can define the length of each generated string. 

``` php
$generator = new Generator();
for ($i = 0; $i < 10; $i++) {
    echo $generator->generateText($table, 8) . PHP_EOL;
}
```

## Result

``` bash
$ php resources/example.php
Spica Eta
Vadr Tau
0.28 Segi
52s Star
ction Col
aenody 13
lusa Dhen
4.72 Alch
ard Pavon
h Par 151
```
## Order

When creating a new table, you can set the `order` to define how many characters should be in each chunk of text.

``` php
$text = 'your text goes here...';
$order = 3
$table = new Table(new Text($text), $order);
```

A high order value of 3, 4 or greater creates strings which are very similar to the source-text.
A low order of 1 or 2 creates more random and _glibberish_ strings. Good for names, but not very readable.

## Changelog

Please see the [changelog](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```
## Security

If you discover any security related issues, please email `maikhilker89@gmail.com` instead of using the issue tracker.

## License

The MIT License (MIT). Please see the [license file](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mhilker/php-markov.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mhilker/php-markov.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/mhilker/php-markov
[link-downloads]: https://packagist.org/packages/mhilker/php-markov
[link-satellites]: resources/satellites.txt
[link-stars]: resources/stars.txt
[link-resources]: resources/
[link-wikipedia]: https://en.wikipedia.org/wiki/Markov_chain
