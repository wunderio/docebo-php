<?php

namespace Docebo;

use Symfony\Component\HttpFoundation\JsonResponse;
use Docebo\API\Enrollment\EnrollmentRequestParams;
use Docebo\API\LearningPlan\LearningPlanRequestParams;
use Docebo\API\User\UserRequestParams;
use Docebo\API\Course\CourseRequestParams;

interface DoceboInterface {

  /**
   * @param string $path
   * @param string $cursor
   * @param int $page
   * @return JsonResponse
   */
  public function getPage($path, $cursor, $page);

  /**
   * @param CourseRequestParams $params
   * @return JsonResponse
   */
  public function getCourse(CourseRequestParams $params);

  /**
   * @param CourseRequestParams $params
   * @return JsonResponse
   */
  public function listCourses(CourseRequestParams $params);

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
