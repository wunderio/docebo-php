<?php

namespace Docebo;

use Symfony\Component\HttpFoundation\JsonResponse;
use Docebo\API\Enrollment\EnrollmentRequestParams;
use Docebo\API\LearningPlan\LearningPlanRequestParams;
use Docebo\API\User\UserRequestParams;

interface DoceboInterface {

  /**
   * @param string $path
   * @param string $cursor
   * @param int $page
   * @return JsonResponse
   */
  public function getPage($path, $cursor, $page);

  /**
   * @param int $course_id
   * @return JsonResponse
   */
  public function getCourse($course_id);

  /**
   * @param int|null $page
   * @param int|null $page_size
   * @param string|null $sort_by
   * @param string|null $sort_by_direction
   * @param bool|null $get_total_count
   * @return JsonResponse
   */
  public function listCourses($page = NULL, $page_size = NULL, $sort_by = NULL, $sort_by_direction = NULL, $get_total_count = NULL);

  /**
   * @param EnrollmentRequestParams $params
   * @return JsonResponse
   */
  public function listEnrollments(EnrollmentRequestParams $params);

  /**
   * @param LearningPlanRequestParams $params
   * @return JsonResponse
   */
  public function getLearningPlan(LearningPlanRequestParams $params);

  /**
   * @param UserRequestParams $params
   * @return JsonResponse
   */
  public function listUsers(UserRequestParams $params);
}
