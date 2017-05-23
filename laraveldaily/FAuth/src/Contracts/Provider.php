<?php

namespace Laraveldaily\FAuth\Contracts;

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
     * @return \Laraveldaily\FAuth\Contracts\User
     */
    public function user();
}
