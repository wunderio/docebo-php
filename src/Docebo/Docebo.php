<?php

namespace Docebo;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Docebo\API\Auth\Auth;
use Docebo\API\Course\Course;
use Docebo\API\Enrollment\Enrollment;
use Docebo\API\User\User;

class Docebo implements DoceboInterface {

  const TOKEN_TYPE = 'Bearer';

  /** @var Client */
  private $client;

  /** @var Auth */
  private $auth;

  /** @var string */
  private $baseUrl;

  /** @var string */
  private $token;

  /** @var string */
  private $token_expires_in;

  /** @var Course */
  private $course;

  /** @var Enrollment */
  private $enrollment;

  /** @var User */
  private $user;

  /** @var RequestOptionsBuilder */
  private $requestOptionsBuilder;

  /**
   * Automatically tries to authenticate with the given user name and password
   * if token is empty. Skips authentication if the token is not empty.
   *
   * @param string|null $baseUrl
   * @param string|null $clientId
   * @param string|null $clientSecret
   * @param string|null $userName Required if token is empty.
   * @param string|null $password Required if token is empty.
   * @param string|null $token Required if both user name and password are empty.
   * @param Client $client
   * @throws \Exception if user name, password and token are all empty.
   */
  public function __construct($baseUrl, $clientId = NULL, $clientSecret = NULL, $userName = NULL, $password = NULL, $token = NULL, Client $client = NULL) {
    if ((empty($userName) || empty($password) || empty($clientId) || empty($clientSecret)) && empty($token)) {
      throw new \Exception('User name, password, client ID and secret are required when token is empty.');
    }

    $this->baseUrl = $baseUrl;
    $this->client = isset($client) ? $client : $this->getHttpClient();
    $this->auth = $this->getAuthService();
    $this->course = $this->getCourseService();
    $this->enrollment = $this->getEnrollmentService();
    $this->user = $this->getUserService();

    $this->requestOptionsBuilder = $this->getRequestOptionsBuilder();
    if (empty($token)) {
      $token_data = $this->loginAndGetToken($clientId, $clientSecret, $userName, $password);
      $this->token = $token_data['token'];
      $this->token_expires_in = $token_data['expires_in'];
    } else {
      $this->token = $token;
    }
  }

  /**
   * @return null|string
   */
  public function getToken() {
    return $this->token;
  }

  /**
   * @return null|string
   */
  public function getTokenExpiration() {
    return $this->token_expires_in;
  }

  /**
   * @inheritdoc
   */
  public function getCourse($course_id) {
    return $this->course->course($course_id);
  }

  /**
   * @inheritdoc
   */
  public function listCourses($page = NULL, $page_size = NULL, $sort_by = NULL, $sort_by_direction = NULL, $get_total_count = NULL) {
    return $this->course->courses($page, $page_size, $sort_by, $sort_by_direction, $get_total_count);
  }

  /**
   * @inheritdoc
   */
  public function listEnrollments($id_user = [], $status = [], $type = [], $rating = NULL, $channel = NULL, $search = NULL, $page_size = NULL, $get_total_count = FALSE, $id_course = [], $code_course = [], $id_learning_plan = [], $code_learning_plan = [], $level = NULL, $sort_by = NULL) {
    return $this->enrollment->enrollments($id_user, $status, $type, $rating, $channel, $search, $page_size, $get_total_count, $id_course, $code_course, $id_learning_plan, $code_learning_plan, $level, $sort_by);
  }

  /**
   * @inheritdoc
   */
  public function listUsers($pending = NULL, $branch_id = NULL, $selection_status = NULL, $sort_attr = NULL, $sort_dir = NULL, $page = NULL, $page_size = NULL, $get_total_count = NULL, $search_text = NULL, $exclude = NULL, $exclude_power_users_and_super_admins = NULL) {
    return $this->user->users($pending, $branch_id, $selection_status, $sort_attr, $sort_dir, $page, $page_size, $get_total_count, $search_text, $exclude, $exclude_power_users_and_super_admins);
  }

  /**
   * @inheritdoc
   */
  public function getPage($path, $cursor, $page) {
    $parameters = [
      'cursor' => $cursor,
      'page' => $page
    ];
    return $this->get($path, $parameters);
  }

  /**
   * @return Client
   */
  protected function getHttpClient() {
    $config = ['base_uri' => $this->baseUrl];

    return new Client($config);
  }

  /**
   * @return RequestOptionsBuilder
   */
  protected function getRequestOptionsBuilder() {
    return new RequestOptionsBuilder();
  }

  /**
   * @return Auth
   */
  protected function getAuthService() {
    return new Auth($this);
  }

  /**
   * @return Course
   */
  protected function getCourseService() {
    return new Course($this);
  }

  /**
   * @return Enrollment
   */
  protected function getEnrollmentService() {
    return new Enrollment($this);
  }

  /**
   * @return User
   */
  protected function getUserService() {
    return new User($this);
  }

  /**
   * @param string $clientId
   * @param string $clientSecret
   * @param string $userName
   * @param string $password
   * @throws \Exception if fails to get the token from the response.
   * @return array
   */
  private function loginAndGetToken($clientId, $clientSecret, $userName, $password) {
    $jsonResponse = $this->auth->login($clientId, $clientSecret, $userName, $password);
    $response = json_decode($jsonResponse->getContent());

    if (empty($response->access_token)) {
      throw new \Exception("Authentication failed: {$jsonResponse->getContent()}");
    }

    $token_data = [
      'token' => $response->access_token,
      'expires_in' => $response->expires_in
    ];

    return $token_data;
  }

  /**
   * @param string $path
   * @param array $parameters
   * @return JsonResponse
   */
  public function get($path, $parameters = []) {
    $headers['Authorization'] = self::TOKEN_TYPE . ' ' . $this->token;
    $options = $this->requestOptionsBuilder->buildGetOptions($parameters, $headers);

    try {
      $response = $this->client->get($this->baseUrl . $path, $options);
    } catch (ClientException $e) {
      $response = $e->getResponse();
    }

    return new JsonResponse(
      json_decode($response->getBody()->getContents()),
      $response->getStatusCode(),
      $response->getHeaders()
    );
  }

  /**
   * @param string $path
   * @param array $parameters
   * @return JsonResponse
   */
  public function post($path, $parameters = []) {
    $headers['Authorization'] = self::TOKEN_TYPE . ' ' . $this->token;
    $options = $this->requestOptionsBuilder->buildPostOptions($parameters, $headers);

    try {
      $response = $this->client->post($this->baseUrl . $path, $options);
    } catch (ClientException $e) {
      $response = $e->getResponse();
    }

    return new JsonResponse(
      json_decode($response->getBody()->getContents()),
      $response->getStatusCode(),
      $response->getHeaders()
    );
  }

  /**
   * Utility method to return the base url.
   *
   * @return string the base url used to connect to docebo.
   */
  public function getBaseUrl() {
    return $this->baseUrl;
  }

}
