<?php

namespace Docebo\API\User;

use Docebo\API\BaseRequestParams;

/**
 * Class UserRequestParams
 *
 * This class holds the possible parameters to call the user api endpoint.
 *
 * @package Docebo\API\UserRequestParams
 */

class UserRequestParams extends BaseRequestParams {

  /**
   * @var int|null
   */
  protected $pending;

  /**
   * @var int|null
   */
  protected $branch_id;

  /**
   * @var int|null
   */
  protected $selection_status;

  /**
   * @var string|null
   */
  protected $sort_attr;

  /**
   * @var string|null
   */
  protected $sort_dir;

  /**
   * @var int|null
   */
  protected $page;

  /**
   * @var int|null
   */
  protected $page_size;

  /**
   * @var string|null
   */
  protected $search_text;

  /**
   * @var array[int]
   */
  protected $exclude;

  /**
   * @var int|null
   */
  protected $exclude_power_users_and_super_admins;

  /**
   * EnrollmentRequestParams constructor.
   */
  public function __construct() {
    $this->pending = NULL;
    $this->branch_id = NULL;
    $this->selection_status = NULL;
    $this->sort_attr = NULL;
    $this->sort_dir = NULL;
    $this->page = NULL;
    $this->page_size = NULL;
    $this->search_text = NULL;
    $this->exclude = [];
    $this->exclude_power_users_and_super_admins = NULL;
  }

  /**
   * @return int|null
   */
  public function getPending(): ?int {
    return $this->pending;
  }

  /**
   * @param int|null $pending
   */
  public function setPending(?int $pending): void {
    $this->pending = $pending;
  }

  /**
   * @return int|null
   */
  public function getBranchId(): ?int {
    return $this->branch_id;
  }

  /**
   * @param int|null $branch_id
   */
  public function setBranchId(?int $branch_id): void {
    $this->branch_id = $branch_id;
  }

  /**
   * @return int|null
   */
  public function getSelectionStatus(): ?int {
    return $this->selection_status;
  }

  /**
   * @param int|null $selection_status
   */
  public function setSelectionStatus(?int $selection_status): void {
    $this->selection_status = $selection_status;
  }

  /**
   * @return null|string
   */
  public function getSortAttr(): ?string {
    return $this->sort_attr;
  }

  /**
   * @param null|string $sort_attr
   */
  public function setSortAttr(?string $sort_attr): void {
    $this->sort_attr = $sort_attr;
  }

  /**
   * @return null|string
   */
  public function getSortDir(): ?string {
    return $this->sort_dir;
  }

  /**
   * @param null|string $sort_dir
   */
  public function setSortDir(?string $sort_dir): void {
    $this->sort_dir = $sort_dir;
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
  public function getSearchText(): ?string {
    return $this->search_text;
  }

  /**
   * @param null|string $search_text
   */
  public function setSearchText(?string $search_text): void {
    $this->search_text = $search_text;
  }

  /**
   * @return array
   */
  public function getExclude(): array {
    return $this->exclude;
  }

  /**
   * @param array $exclude
   */
  public function setExclude(array $exclude): void {
    $this->exclude = $exclude;
  }

  /**
   * @return int|null
   */
  public function getExcludePowerUsersAndSuperAdmins(): ?int {
    return $this->exclude_power_users_and_super_admins;
  }

  /**
   * @param int|null $exclude_power_users_and_super_admins
   */
  public function setExcludePowerUsersAndSuperAdmins(?int $exclude_power_users_and_super_admins): void {
    $this->exclude_power_users_and_super_admins = $exclude_power_users_and_super_admins;
  }

}
