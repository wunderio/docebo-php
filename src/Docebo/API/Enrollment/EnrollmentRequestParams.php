<?php

namespace Docebo\API\Enrollment;

use Docebo\API\BaseRequestParams;

/**
 * Class EnrollmentRequestParams
 *
 * This class holds the possible parameters to call the enrollment api endpoint.
 *
 * @package Docebo\API\Enrollment
 */

class EnrollmentRequestParams extends BaseRequestParams {

  /**
   * @var array[int] $id_user
   */
  protected $id_users;

  /**
   * @var array[string]
   */
  protected $status;

  /**
   * @var array[string]
   */
  protected $type;

  /**
   * @var int|null
   */
  protected $rating;

  /**
   * @var int|null
   */
  protected $channel;

  /**
   * @var string|null
   */
  protected $search;

  /**
   * @var int|null
   */
  protected $page_size;

  /**
   * @var bool
   */
  protected $get_total_count;

  /**
   * @var bool
   */
  protected $get_cursor;

  /**
   * @var array[int]
   */
  protected $id_course;

  /**
   * @var array[string]
   */
  protected $code_course;

  /**
   * @var array[int]
   */
  protected $id_learning_plan;

  /**
   * @var array[string]
   */
  protected $code_learning_plan;

  /**
   * @var string|null
   */
  protected $level;

  /**
   * @var string|null
   */
  protected $sort_by;

  /**
   * EnrollmentRequestParams constructor.
   */
  public function __construct() {
    $this->id_users = [];
    $this->status = [];
    $this->type = [];
    $this->rating = NULL;
    $this->channel = NULL;
    $this->search = NULL;
    $this->page_size = NULL;
    $this->get_total_count = FALSE;
    $this->get_cursor = TRUE;
    $this->id_course = [];
    $this->code_course = [];
    $this->id_learning_plan = [];
    $this->code_learning_plan = [];
    $this->level = NULL;
    $this->sort_by = NULL;
  }

  /**
   * @return array
   */
  public function getIdUsers(): array {
    return $this->id_users;
  }

  /**
   * @param array $id_users
   */
  public function setIdUsers(array $id_users): void {
    $this->id_users = $id_users;
  }

  /**
   * @return array
   */
  public function getStatus(): array {
    return $this->status;
  }

  /**
   * @param array $status
   */
  public function setStatus(array $status): void {
    $this->status = $status;
  }

  /**
   * @return array
   */
  public function getType(): array {
    return $this->type;
  }

  /**
   * @param array $type
   */
  public function setType(array $type): void {
    $this->type = $type;
  }

  /**
   * @return int|null
   */
  public function getRating(): ?int {
    return $this->rating;
  }

  /**
   * @param int|null $rating
   */
  public function setRating(?int $rating): void {
    $this->rating = $rating;
  }

  /**
   * @return int|null
   */
  public function getChannel(): ?int {
    return $this->channel;
  }

  /**
   * @param int|null $channel
   */
  public function setChannel(?int $channel): void {
    $this->channel = $channel;
  }

  /**
   * @return null|string
   */
  public function getSearch(): ?string {
    return $this->search;
  }

  /**
   * @param null|string $search
   */
  public function setSearch(?string $search): void {
    $this->search = $search;
  }

  /**
   * @return int|null
   */
  public function getPageSize(): ?int {
    return $this->page_size;
  }

  /**
   * @param int|null $page_size
   */
  public function setPageSize(?int $page_size): void {
    $this->page_size = $page_size;
  }

  /**
   * @return bool
   */
  public function isGetTotalCount(): bool {
    return $this->get_total_count;
  }

  /**
   * @param bool $get_total_count
   */
  public function setGetTotalCount(bool $get_total_count): void {
    $this->get_total_count = $get_total_count;
  }

  /**
   * @return bool
   */
  public function isGetCursor(): bool {
    return $this->get_cursor;
  }

  /**
   * @param bool $get_cursor
   */
  public function setGetCursor(bool $get_cursor): void {
    $this->get_cursor = $get_cursor;
  }

  /**
   * @return array
   */
  public function getIdCourse(): array {
    return $this->id_course;
  }

  /**
   * @param array $id_course
   */
  public function setIdCourse(array $id_course): void {
    $this->id_course = $id_course;
  }

  /**
   * @return array
   */
  public function getCodeCourse(): array {
    return $this->code_course;
  }

  /**
   * @param array $code_course
   */
  public function setCodeCourse(array $code_course): void {
    $this->code_course = $code_course;
  }

  /**
   * @return array
   */
  public function getIdLearningPlan(): array {
    return $this->id_learning_plan;
  }

  /**
   * @param array $id_learning_plan
   */
  public function setIdLearningPlan(array $id_learning_plan): void {
    $this->id_learning_plan = $id_learning_plan;
  }

  /**
   * @return array
   */
  public function getCodeLearningPlan(): array {
    return $this->code_learning_plan;
  }

  /**
   * @param array $code_learning_plan
   */
  public function setCodeLearningPlan(array $code_learning_plan): void {
    $this->code_learning_plan = $code_learning_plan;
  }

  /**
   * @return null|string
   */
  public function getLevel(): ?string {
    return $this->level;
  }

  /**
   * @param null|string $level
   */
  public function setLevel(?string $level): void {
    $this->level = $level;
  }

  /**
   * @return null|string
   */
  public function getSortBy(): ?string {
    return $this->sort_by;
  }

  /**
   * @param null|string $sort_by
   */
  public function setSortBy(?string $sort_by): void {
    $this->sort_by = $sort_by;
  }



}
