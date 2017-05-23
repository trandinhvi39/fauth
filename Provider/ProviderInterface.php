<?php

namespace Trandinhvi39\Fauth\Provider;

interface ProviderInterface
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
     * @return \Trandinhvi39\Fauth\Provider\User
     */
    public function user();
}
