<?php

namespace Trandinhvi39\Fauth;

use Illuminate\Http\Request;
use App\Http\Requests;
use Fauth;
use Trandinhvi39\Fauth\Services\SocialAccountService;
use Log;

class FAuthController extends Controller
{

    /**
      * @param $provider
      * @return mixed
    */
    public function redirectToProvider($provider)
    {
        return Fauth::driver($provider)->redirect();
    }

    /**
      * @param SocialAccountService $service
      * @param $provider
     * @return mixed
    */
    public function handleProviderCallback(SocialAccountService $service, $provider)
    {
        try {
            $user = $service->createOrGetUser(Fauth::driver($provider));

            dd($user);
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
