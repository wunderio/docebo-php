<?php

namespace Docebo;

use Symfony\Component\HttpFoundation\JsonResponse;

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
   * @param array[int] $id_user
   * @param array[string] $status
   * @param array[string] $type
   * @param int $rating
   * @param int $channel
   * @param string $search
   * @return JsonResponse
   */
  public function listEnrollments($id_user = [], $status = [], $type = [], $rating = NULL, $channel = NULL, $search = NULL);

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
  public function listUsers($pending = NULL, $branch_id = NULL, $selection_status = NULL, $sort_attr = NULL, $sort_dir = NULL, $page = NULL, $page_size = NULL, $get_total_count = NULL, $search_text = NULL, $exclude = NULL, $exclude_power_users_and_super_admins = NULL);
}
