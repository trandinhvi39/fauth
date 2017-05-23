<?php

namespace Trandinhvi39\Fauth\Contracts;

interface Factory
{
    /**
     * Get an OAuth provider implementation.
     *
     * @param  string  $driver
     * @return \Trandinhvi39\FAuth\Contracts\Provider
     */
    public function driver($driver = null);
}
