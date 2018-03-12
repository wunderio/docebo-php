<?php

namespace Docebo\API\User;

use Docebo\API\BaseApi;
use Symfony\Component\HttpFoundation\JsonResponse;
use Docebo\API\User\UserRequestParams;

class User extends BaseApi {

  const PATH_BASE = 'manage/v1/';
  const PATH_LIST_USERS = self::PATH_BASE . 'user';

  /**
   * Retrieves users based on the request params.
   *
   * @param \Docebo\API\User\UserRequestParams $params
   *   The params object.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function users(UserRequestParams $params) {
    $parameters = [
      'pending' => $params->getPending(),
      'branch_id' => $params->getBranchId(),
      'selection_status' => $params->getSelectionStatus(),
      'sort_attr' => $params->getSortAttr(),
      '$sort_dir' => $params->getSortDir(),
      'page' => $params->getPage(),
      'page_size' => $params->getPage(),
      'search_text' => $params->getSearchText(),
      'exclude' => $params->getExclude(),
      'exclude_power_users_and_super_admins' => $params->getExcludePowerUsersAndSuperAdmins()
    ];

    return $this->docebo->get(self::PATH_LIST_USERS, $parameters);
  }

}
