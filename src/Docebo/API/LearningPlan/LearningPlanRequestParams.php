<?php

namespace Docebo\API\LearningPlan;

use Docebo\API\BaseRequestParams;

/**
 * Class LearningPlanRequestParams
 *
 * This class holds the possible parameters to call the lp (learning plan) api endpoint.
 *
 * @package Docebo\API\LearningPlan
 */

class LearningPlanRequestParams extends BaseRequestParams {

  /**
   * @var int $lp_id
   */
  protected $lp_id;

  /**
   * LearningPlanRequestParams constructor.
   */
  public function __construct() {
    $this->lp_id = NULL;
  }

  /**
   * @return int
   */
  public function getLpId(): int {
    return $this->lp_id;
  }

  /**
   * @param int $lp_id
   */
  public function setLpId(int $lp_id): void {
    $this->lp_id = $lp_id;
  }

}
