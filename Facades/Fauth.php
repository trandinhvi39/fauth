<?php

namespace Trandinhvi39\Fauth\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Trandinhvi39\Fauth\FAuthManager
 */
class Fauth extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Trandinhvi39\Fauth\Contracts\Factory';
    }
}
