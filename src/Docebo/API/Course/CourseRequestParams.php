<?php

namespace Docebo\API\Course;

use Docebo\API\BaseRequestParams;

/**
 * Class CourseRequestParams
 *
 * This class holds the possible parameters to call the course api endpoint.
 *
 * @package Docebo\API\Course
 */

class CourseRequestParams extends BaseRequestParams {

  /**
   * @var int|null $course_id
   */
  protected $course_id;

  /**
   * @var int|null $page
   */
  protected $page;

  /**
   * @var int|null $page_size
   */
  protected $page_size;

  /**
   * @var string|null $sort_by
   */
  protected $sort_by;

  /**
   * @var string|null $sort_by_direction
   */
  protected $sort_by_direction;

  /**
   * @var bool $get_total_count
   */
  protected $get_total_count;

  /**
   * @var bool
   */
  protected $get_cursor;

  /**
   * CourseRequestParams constructor.
   */
  public function __construct() {
    $this->course_id = NULL;
    $this->page = NULL;
    $this->page_size = NULL;
    $this->sort_by = NULL;
    $this->sort_by_direction = NULL;
    $this->get_total_count = TRUE;
    $this->get_cursor = TRUE;
  }

  /**
   * @return int|null
   */
  public function getCourseId(): ?int {
    return $this->course_id;
  }

  /**
   * @param int|null $course_id
   */
  public function setCourseId(?int $course_id): void {
    $this->course_id = $course_id;
  }

  /**
   * @return int|null
   */
  public function getPage(): ?int {
    return $this->page;
  }

  /**
   * @param int|null $page
   */
  public function setPage(?int $page): void {
    $this->page = $page;
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

  /**
   * @return null|string
   */
  public function getSortByDirection(): ?string {
    return $this->sort_by_direction;
  }

  /**
   * @param null|string $sort_by_direction
   */
  public function setSortByDirection(?string $sort_by_direction): void {
    $this->sort_by_direction = $sort_by_direction;
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

}
