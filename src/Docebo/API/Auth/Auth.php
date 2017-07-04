<?php

namespace Docebo\API\Auth;

use Docebo\API\BaseApi;
use Symfony\Component\HttpFoundation\JsonResponse;

class Auth extends BaseApi {

  const PATH_TOKEN = 'oauth2/token';
  const GRANT_TYPE = 'password';
  const SCOPE = 'api';

  /**
   * @param string $clientId
   * @param string $clientSecret
   * @param string $userName
   * @param string $password
   * @return JsonResponse
   */
  public function login($clientId, $clientSecret, $userName, $password) {
    $parameters = [
      'client_id' => $clientId,
      'client_secret' => $clientSecret,
      'username' => $userName,
      'password' => $password,
      'grant_type' => self::GRANT_TYPE,
      'scope' => self::SCOPE
    ];

    return $this->docebo->post(self::PATH_TOKEN, $parameters);
  }

}
