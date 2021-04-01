<?php

namespace application\core;

use application\lib\Db;

/**
 * Class Model
 *
 * @package application\core
 */
class Model {

  /**
   * @var \application\lib\Db
   */
  public $db;

  /**
   * Model constructor.
   */
  public function __construct() {
    $this->db = new Db;
  }

}