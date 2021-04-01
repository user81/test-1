<?php

namespace application\models;

use application\core\Model;

/**
 * Class Main
 *
 * @package application\models
 */
class Main extends Model {

  /**
   * @param $post
   *
   * @return bool
   */
  public function loginValidator($post) {
    $config = require_once 'application/config/admin.php';
    if ($config['login'] != $post['login'] || $config['password'] != $post['pass']) {
      $this->error = 'Login or password is not correct!';
      return FALSE;
    }
    return TRUE;
  }

}