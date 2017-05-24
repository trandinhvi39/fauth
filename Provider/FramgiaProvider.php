<?php

namespace Trandinhvi39\Fauth\Provider;

use Exception;
use Illuminate\Support\Arr;

class GithubProvider extends AbstractProvider implements ProviderInterface
{
    /**
     * The scopes being requested.
     *
     * @var array
     */
    protected $scopes = ['user:email'];

    /**
     * Get auth url.
     *
     * @param  string $state
     * @return string
     */
    public function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase('http://auth.framgia.vn/oauth/authorize', $state);
    }

    /**
     * Get token url.
     *
     * @return string
     */
    public function getTokenUrl()
    {
        return 'http://auth.framgia.vn/oauth/access_token';
    }

    /**
     * Get user by token.
     *
     * @param  string $token
     * @return Trandinhvi39\Fauth\Provider\User
     */
    public function getUserByToken($token)
    {
        $userUrl = 'http://auth.framgia.vn/user?access_token=' . $token;

        $response = $this->getHttpClient()->get(
            $userUrl, $this->getRequestOptions()
        );

        $user = json_decode($response->getBody(), true);

        if (in_array('user:email', $this->scopes)) {
            $user['email'] = $this->getEmailByToken($token);
        }

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
        $emailsUrl = 'http://auth.framgia.vn/user/emails?access_token=' . $token;

        try {
            $response = $this->getHttpClient()->get(
                $emailsUrl, $this->getRequestOptions()
            );
        } catch (Exception $e) {
            return;
        }

        foreach (json_decode($response->getBody(), true) as $email) {
            if ($email['primary'] && $email['verified']) {
                return $email['email'];
            }
        }
    }

    /**
     * Get user map with specific fields.
     *
     * @param  array $user
     * @return Trandinhvi39\Fauth\Provider\User
     */
    public function mapUserToObject(array $user)
    {
        return (new User)->setRaw($user)->map([
            'id' => $user['id'],
            'employeeCode' => isset($user['employeeCode']) ? $user['employeeCode'] : null,
            'name' => isset($user['name']) ? $user['name'] : null,
            'email' => isset($user['email']) ? $user['email'] : null,
            'company' => isset($user['company']) ? $user['company'] : null,
            'contractDate' => isset($user['contractDate']) ? $user['contractDate'] : null,
            'staffType' => isset($user['staffType']) ? $user['staffType'] : null,
            'workspace' => isset($user['workspace']) ? $user['workspace'] : null,
            'group' => isset($user['group']) ? $user['group'] : null,
            'gender' => isset($user['gender']) ? $user['gender'] : null,
            'birthday' => isset($user['birthday']) ? $user['birthday'] : null,
        ]);
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

