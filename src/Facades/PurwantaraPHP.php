<?php

namespace Ezha\PurwantaraPHP\Facades;

use Illuminate\Support\Facades\Facade;

class PurwantaraPHP extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'purwantaraphp';
    }
}
