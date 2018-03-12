<?php

namespace Docebo\API\LearningPlan;

use Docebo\API\BaseApi;
use Symfony\Component\HttpFoundation\JsonResponse;
use Docebo\API\LearningPlan\LearningPlanRequestParams;

class LearningPlan extends BaseApi {

  const PATH_BASE = 'learn/v1/';
  const PATH_LIST_LEARNING_PLANS = self::PATH_BASE . 'lp';

  /**
   * Retrieves a specific Learning Plan
   *
   * @param \Docebo\API\LearningPlan\LearningPlanRequestParams $params
   *   The params object.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function learningPlan(LearningPlanRequestParams $params) {
    return $this->docebo->get(self::PATH_LIST_LEARNING_PLANS . '/' . $params->getLpId());
  }

}
