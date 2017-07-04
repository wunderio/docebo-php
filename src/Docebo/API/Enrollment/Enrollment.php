<?php

namespace Docebo\API\Enrollment;

use Docebo\API\BaseApi;
use Symfony\Component\HttpFoundation\JsonResponse;

class Enrollment extends BaseApi {

  const PATH_BASE = 'learn/v1/';
  const PATH_LIST_ENROLLMENTS = self::PATH_BASE . 'enrollments';

  /**
   * @param array[int] $id_user
   * @param array[string] $status
   * @param array[string] $type
   * @param int $rating
   * @param int $channel
   * @param string $search
   * @return JsonResponse
   */
  public function enrollments($id_user, $status, $type, $rating, $channel, $search) {
    $parameters = [
      'id_user' => $id_user,
      'status' => $status,
      'type' => $type,
      'rating' => $rating,
      'channel' => $channel,
      'search' => $search
    ];

    return $this->docebo->get(self::PATH_LIST_ENROLLMENTS, $parameters);
  }

}
