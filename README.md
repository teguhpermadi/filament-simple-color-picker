<picture>
    <source
        media="(prefers-color-scheme: dark)"
        srcset="https://banners.beyondco.de/Filament%20-%20Simple%20Color%20Picker.png?theme=dark&packageManager=composer+require&packageName=rockero-cz%2Ffilament-simple-color-picker&pattern=diagonalStripes&style=style_1&description=Set+your+colors+simple+way...&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg"
    />
      <img alt="Banner" src="https://banners.beyondco.de/Filament%20-%20Simple%20Color%20Picker.png?theme=dark&packageManager=composer+require&packageName=rockero-cz%2Ffilament-simple-color-picker&pattern=diagonalStripes&style=style_1&description=Set+your+colors+simple+way...&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg">
</picture>

# Filament Simple Color Picker
[![Rockero](https://img.shields.io/badge/Rockero-yellow)](https://rockero.cz)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/rockero-cz/filament-simple-color-picker.svg?style=flat-square)](https://packagist.org/packages/rockero-cz/filament-simple-color-picker)
[![Total Downloads](https://img.shields.io/packagist/dt/rockero-cz/filament-simple-color-picker.svg?style=flat-square)](https://packagist.org/packages/rockero-cz/filament-simple-color-picker)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)

## Installation

Install the package via composer:

```bash
composer require rockero-cz/filament-simple-color-picker
```

## Features

Filament form input allows you to predefine a color palette for users, with the possibility to set the number of colors per row.

---

![Alt text](/assets/simple-color-picker.png "Simple color picker")

### Usage

```php
use Rockero\FilamentSimpleColorPicker\SimpleColorPicker;

SimpleColorPicker::make('color')
    ->colors([
        '#0ea5e9', // blue light
        '#0094ff', // blue middle
        '#0000ff', // blue dark

        '#FFD700', // Gold
        '#FFC300', // yellow
        '#ff9200', // orange

        '#36d943', // green light
        '#26B131', // green middle
        '#209b2a', // green dark

        '#ff00ff', // pink
        '#cc00ff', // purple
        '#ff0000', // red

        '#dddddd', // gray light
        '#9a9a9a', // gray middle
        '#565656', // gray dark

        '#8D1E4D', // wine
        '#581845', // dark purple
        '#000000', // black
    ])
    ->colorColumns(6),
```

---

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

-   [Rockero](https://github.com/rockero-cz)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
