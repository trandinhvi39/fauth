<?php

namespace Laraveldaily\FAuth;

use Illuminate\Http\Request;
use App\Http\Requests;
use FAuth;
use Laraveldaily\FAuth\Services\SocialAccountService;
use Log;

class FAuthController extends Controller
{

    /**
      * @param $provider
      * @return mixed
    */
    public function redirectToProvider($provider)
    {
        return FAuth::driver($provider)->redirect();
    }

    /**
      * @param SocialAccountService $service
      * @param $provider
     * @return mixed
    */
    public function handleProviderCallback(SocialAccountService $service, $provider)
    {
        try {
            $user = $service->createOrGetUser(FAuth::driver($provider));

            dd($user);
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
