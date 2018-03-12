<?php

namespace Docebo\API\Enrollment;

use Docebo\API\BaseApi;
use Symfony\Component\HttpFoundation\JsonResponse;
use Docebo\API\Enrollment\EnrollmentRequestParams;

class Enrollment extends BaseApi {

  const PATH_BASE = 'learn/v1/';
  const PATH_LIST_ENROLLMENTS = self::PATH_BASE . 'enrollments';


  /**
   * Retrieves enrollments based on the request params.
   *
   * @param \Docebo\API\Enrollment\EnrollmentRequestParams $params
   *   The params object.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function enrollments(EnrollmentRequestParams $params) {
    $parameters = [
      'id_user' => $params->getIdUsers(),
      'status' => $params->getStatus(),
      'type' => $params->getType(),
      'rating' => $params->getRating(),
      'channel' => $params->getChannel(),
      'search' => $params->getSearch(),
      'page_size' => $params->getPageSize(),
      'get_total_count' => $params->isGetTotalCount(),
      'id_course' => $params->getIdCourse(),
      'code_course' => $params->getCodeCourse(),
      'id_learning_plan' => $params->getIdLearningPlan(),
      'code_learning_plan' => $params->getCodeLearningPlan(),
      'level' => $params->getLevel(),
      'sort_by' => $params->getSortBy(),
      'get_cursor' => $params->isGetCursor()
    ];

    return $this->docebo->get(self::PATH_LIST_ENROLLMENTS, $parameters);
  }

}
