<?php

namespace Docebo\API\Course;

use Docebo\API\BaseApi;
use Symfony\Component\HttpFoundation\JsonResponse;
use Docebo\API\Course\CourseRequestParams;

class Course extends BaseApi {

  const PATH_BASE = 'learn/v1/';
  const PATH_LIST_COURSES = self::PATH_BASE . 'courses';

  /**
   * Retrieves a specific course
   *
   * @param \Docebo\API\Course\CourseRequestParams $params
   *   The params object.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function course(CourseRequestParams $params) {
    return $this->docebo->get(self::PATH_LIST_COURSES . '/' . $params->getCourseId());
  }

  /**
   * Retrieves courses based on the request params.
   *
   * @param \Docebo\API\Course\CourseRequestParams $params
   *   The params object.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function courses(CourseRequestParams $params) {
    $parameters = [
      'page' => $params->getPage(),
      'page_size' => $params->getPageSize(),
      'sort_by' => $params->getSortBy(),
      'sort_by_direction' => $params->getSortByDirection(),
      'get_total_count' => $params->isGetTotalCount(),
      'get_cursor' => $params->isGetCursor()
    ];

    return $this->docebo->get(self::PATH_LIST_COURSES, $parameters);
  }

}
