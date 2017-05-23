<?php

namespace Trandinhvi39\Fauth\Contracts;

interface Provider
{
    /**
     * Redirect the user to the authentication page for the provider.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect();

    /**
     * Get the User instance for the authenticated user.
     *
     * @return \Trandinhvi39\Fauth\Contracts\User
     */
    public function user();
}
