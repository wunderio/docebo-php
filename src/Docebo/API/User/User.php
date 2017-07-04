<?php

namespace Docebo\API\User;

use Docebo\API\BaseApi;
use Symfony\Component\HttpFoundation\JsonResponse;

class User extends BaseApi {

  const PATH_BASE = 'manage/v1/';
  const PATH_LIST_USERS = self::PATH_BASE . 'user';

  /**
   * @param int $pending
   * @param int $branch_id
   * @param int $selection_status
   * @param string $sort_attr
   * @param string $sort_dir
   * @param int $page
   * @param int $page_size
   * @param int $get_total_count
   * @param string $search_text
   * @param array $exclude
   * @param int $exclude_power_users_and_super_admins
   * @return JsonResponse
   */
  public function users($pending, $branch_id, $selection_status, $sort_attr, $sort_dir, $page, $page_size, $get_total_count, $search_text, $exclude, $exclude_power_users_and_super_admins) {
    $parameters = [
      'pending' => $pending,
      'branch_id' => $branch_id,
      'selection_status' => $selection_status,
      'sort_attr' => $sort_attr,
      '$sort_dir' => $sort_dir,
      'page' => $page,
      'page_size' => $page_size,
      'get_total_count' => $get_total_count,
      'search_text' => $search_text,
      'exclude' => $exclude,
      'exclude_power_users_and_super_admins' => $exclude_power_users_and_super_admins
    ];

    return $this->docebo->get(self::PATH_LIST_USERS, $parameters);
  }

}
