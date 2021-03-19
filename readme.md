# PurwantaraPHP

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Documentation
```bash
Payment Code
    - CIMB = 6 DIGIT
    - MANDIRI = X DIGIT
    - MUAMALAT = X DIGIT
    - PERMATA = X DIGIT
    - BNI = X DIGIT

Bank
    - CIMB
    - MANDIRI
    - MUAMALAT
    - PERMATA
    - BNI
```

## Installation

Via Composer

``` bash
$ composer require ezha/purwantaraphp
```

Publish in config folder
```bash
$ php artisan vendor:publish --provider="Ezha\PurwantaraPHP\PurwantaraPHPServiceProvider"
```


## Usage
Open .env file and put
```bash
PURWANTARA_TOKEN=YOUR_TOKEN_FROM_PURWANTARA
```

Get Channel From Purwantara
```php
<?php

use Carbon\Carbon;
use Ezha\PurwantaraPHP\PurwantaraPHP;

class PurwantaraController extends Controller
{
    public function Channel()
    {
        $purwantara    = new PurwantaraPHP();
        
        return $purwantara->getChannel();
    }
}
```

Create Virtual Account
```php
<?php

use Carbon\Carbon;
use Ezha\PurwantaraPHP\PurwantaraPHP;

class PurwantaraController extends Controller
{
    public function VirtualAccount()
    {
        $params = [
            'amount'        => 10000,
            'name'          => 'Ezha Syafaat',
            'channel'       => 'CIMB', //required, see list bank code in Documentation
            'desc'          => 'Description',
            'expired_at'    => Carbon::now()->addDays(2)->toIso8601String(), //Expired time with format Iso8601
            'unique_id'     => 'TESTING PACKAGE EZHA',
            'payment_code'  => null, //optional, see format payemnt code in Documentation
        ];

        $purwantara    = new PurwantaraPHP();
        
        return $purwantara->getVirtualAccount($params);
    }
}
```


## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.


## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [Muh Ezha Syafaat][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ezha/purwantaraphp.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ezha/purwantaraphp.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ezhasyafaat/purwantaraphp/master.svg?style=flat-square
[ico-styleci]: https://github.styleci.io/repos/349119905/shield

[link-packagist]: https://packagist.org/packages/ezha/purwantaraphp
[link-downloads]: https://packagist.org/packages/ezha/purwantaraphp
[link-travis]: https://travis-ci.org/github/ezhasyafaat/purwantaraphp
[link-styleci]: https://github.styleci.io/repos/349119905
[link-author]: https://ezxxcode.com
[link-contributors]: ../../contributors
