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
   * @param int $page_size
   * @param bool $get_total_count
   * @param array[int] $id_course
   * @param	array[string] $code_course
   * @return JsonResponse
   */
  public function enrollments($id_user, $status, $type, $rating, $channel, $search, $page_size, $get_total_count, $id_course, $code_course, $get_cursor = 1) {
    $parameters = [
      'id_user' => $id_user,
      'status' => $status,
      'type' => $type,
      'rating' => $rating,
      'channel' => $channel,
      'search' => $search,
      'page_size' => $page_size,
      'get_total_count' => $get_total_count,
      'id_course' => $id_course,
      'code_course' => $code_course,
      'get_cursor' => $get_cursor,
    ];

    return $this->docebo->get(self::PATH_LIST_ENROLLMENTS, $parameters);
  }

}
