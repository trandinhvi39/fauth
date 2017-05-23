<?php

namespace Laraveldaily\FAuth\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Laraveldaily\FAuth\FAuthManager
 */
class FAuth extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Laraveldaily\FAuth\Contracts\Factory';
    }
}
