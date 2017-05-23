<?php

namespace Trandinhvi39\Fauth\Provider;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use GuzzleHttp\Exception\RequestException;

class FramgiaProvider extends AbstractProvider implements ProviderInterface
{
    /**
     * The scopes being requested.
     *
     * @var array
     */
    protected $scopes = [];

    /**
     * The base url of auth server.
     *
     * @var string
     */
    protected $baseUrl = 'http://10.0.1.45:4000';

    /**
     * Get auth url.
     *
     * @param  string $state
     * @return string
     */
    public function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase($this->baseUrl . '/auth/hr_system/authorize', $state);
    }

    /**
     * Get token url.
     *
     * @return string
     */
    public function getTokenUrl()
    {
        return $this->baseUrl . '/auth/hr_system/access_token/';
    }

    public function request(callable $request)
    {
        try {
            $response = call_user_func($request);

            return json_decode($response->getBody());
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();

                return json_decode($response->getBody());
            }

            throw new Exception("RequestException");
        }
    }

    /**
     * Get user use password grant.
     *
     * @param  string $email
     * @param  string $password
     * @return array
     */
    public function getTokenByPasswordGrant($email, $password)
    {
        $response = $this->request(function () use ($email, $password) {
            return $this->getHttpClient()->post($this->getTokenUrl(), [
                'form_params' => [
                    'client_id' => env('FRAMGIA_CLIENT_ID'),
                    'client_secret' => env('FRAMGIA_CLIENT_SECRET'),
                    'email' => $email,
                    'password' => $password,
                    'grant_type' => 'password',
                ],
            ]);
        });

        return json_decode(json_encode($response), true);
    }

    /**
     * Refresh token.
     *
     * @param  string $refreshToken
     * @return array
     */
    public function refreshToken($refreshToken)
    {
        $response = $this->request(function () use ($refreshToken) {
            return $this->getHttpClient()->post($this->getTokenUrl(), [
                'form_params' => [
                    'client_id' => env('FRAMGIA_CLIENT_ID'),
                    'client_secret' => env('FRAMGIA_CLIENT_SECRET'),
                    'refresh_token' => $refreshToken,
                    'grant_type' => 'refresh_token',
                ],
            ]);
        });

        return json_decode(json_encode($response), true);
    }

    /**
     * Get user by token.
     *
     * @param  string $token
     * @return Trandinhvi39\Fauth\Provider\User
     */
    public function getUserByToken($token)
    {
        $userUrl = $this->baseUrl . '/me?access_token=' . $token;

        try {
            $response = $this->getHttpClient()->get(
                $userUrl, $this->getRequestOptions()
            );
        } catch (Exception $e) {
            return;
        }
        
        $user = json_decode($response->getBody(), true);

        return $user;
    }

    /**
     * Get the email for the given access token.
     *
     * @param  string  $token
     * @return string|null
     */
    public function getEmailByToken($token)
    {
        $userUrl = $this->baseUrl . '/me?access_token=' . $token;

        try {
            $response = $this->getHttpClient()->get(
                $userUrl, $this->getRequestOptions()
            );
        } catch (Exception $e) {
            return;
        }
        
        $user = json_decode($response->getBody(), true);

        if ($user && isset($user['email'])) {
            return $user['email'];
        }

        return;
    }

    /**
     * Get user map with specific fields.
     *
     * @param  $user
     * @return Trandinhvi39\Fauth\Provider\User
     */
    public function mapUserToObject($user)
    {
        if ($user) {
            return (new User)->setRaw($user)->map([
                "email" => isset($user['email']) ? $user['email'] : null,
                "avatar" => isset($user['avatar']) ? $user['avatar'] : null,
                "name" => isset($user['name']) ? $user['name'] : null,
                "authentication_token" => isset($user['authentication_token']) ? $user['authentication_token'] : null,
                "gender" => isset($user['gender']) ? $user['gender'] : null,
                "role" => isset($user['role']) ? $user['role'] : null,
                "birthday" => isset($user['birthday']) ? $user['birthday'] : null,
                "employee_code" => isset($user['employee_code']) ? $user['employee_code'] : null,
                "position" => isset($user['position']) ? $user['position'] : null,
                "contract_date" => isset($user['contract_date']) ? $user['contract_date'] : null,
                "status" => isset($user['status']) ? $user['status'] : null,
                "phone_number" => isset($user['phone_number']) ? $user['phone_number'] : null,
                "contract_type" => isset($user['contract_type']) ? $user['contract_type'] : null,
                "university" => isset($user['university']) ? $user['university'] : null,
                "join_date" => isset($user['join_date']) ? $user['join_date'] : null,
                "resigned_date" => isset($user['resigned_date']) ? $user['resigned_date'] : null,
            ]);
        }
    }
  

    /**
     * Get the default options for an HTTP request.
     *
     * @return array
     */
    public function getRequestOptions()
    {
        return [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ];
    }
}
