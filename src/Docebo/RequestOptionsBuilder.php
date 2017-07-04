<?php

namespace Docebo;

use GuzzleHttp\RequestOptions;

class RequestOptionsBuilder {

  /**
   * @param array $parameters
   * @param array $headers
   * @return array
   */
  public function buildPostOptions($parameters, $headers) {
    $options = [
      RequestOptions::HEADERS => $headers,
      RequestOptions::FORM_PARAMS => $parameters
    ];

    return $options;
  }

  /**
   * @param array $parameters
   * @param array $headers
   * @return array
   */
  public function buildGetOptions($parameters, $headers) {
    $options = [
      RequestOptions::HEADERS => $headers,
      RequestOptions::QUERY => $parameters
    ];

    return $options;
  }

}