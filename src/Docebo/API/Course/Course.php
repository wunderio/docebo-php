<?php

namespace Docebo\API\Course;

use Docebo\API\BaseApi;
use Symfony\Component\HttpFoundation\JsonResponse;

class Course extends BaseApi {

  const PATH_BASE = 'learn/v1/';
  const PATH_LIST_COURSES = self::PATH_BASE . 'courses';

  /**
   * @param int $course_id
   * @return JsonResponse
   */
  public function course($course_id) {
    return $this->docebo->get(self::PATH_LIST_COURSES . '/' . $course_id);
  }

  /**
   * @param int $page
   * @param int $page_size
   * @param string $sort_by
   * @param string $sort_by_direction
   * @param bool $get_total_count
   * @return JsonResponse
   */
  public function courses($page, $page_size, $sort_by, $sort_by_direction, $get_total_count) {
    $parameters = [
      'page' => $page,
      'page_size' => $page_size,
      'sort_by' => $sort_by,
      'sort_by_direction' => $sort_by_direction,
      'get_total_count' => $get_total_count
    ];

    return $this->docebo->get(self::PATH_LIST_COURSES, $parameters);
  }

}
