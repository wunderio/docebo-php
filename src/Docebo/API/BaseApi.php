<?php

namespace Docebo\API;

use Docebo\Docebo;

abstract class BaseApi {

  /** @var Docebo */
  protected $docebo;

  /**
   * @param Docebo $docebo
   */
  public function __construct(Docebo $docebo) {
    $this->docebo = $docebo;
  }
}