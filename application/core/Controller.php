<?php

namespace application\core;

/**
 * Class Controller
 *
 * @package application\core
 */
abstract class Controller {

  /**
   * @var array|null
   */
  public $route;

  /**
   * @var \application\core\View
   */
  public $view;

  /**
   * @var mixed
   */
  public $model;

  /**
   * @var array
   */
  public $access;

  /**
   * Controller constructor.
   *
   * @param $route
   */
  public function __construct($route) {
    $this->route = $route;
    if (!$this->checkAccess()) {
      View::errorCode(403);
    }
    $this->view = new View($route);
    $this->model = $this->loadModel($route['controller']);
  }

  /**
   * @param $name
   *
   * @return mixed
   */
  public function loadModel($name) {
    $path = 'application\models\\' . ucfirst($name);
    if (class_exists($path)) {
      return new $path;
    }
  }

  /**
   * @return bool
   */
  public function checkAccess() {
    $this->access = require_once 'application/access/' . $this->route['controller'] . '.php';
    if ($this->isAccess('all')) {
      return TRUE;
    }
    elseif (isset($_SESSION['admin']) && $this->isAccess('admin')) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * @param $key
   *
   * @return bool
   */
  public function isAccess($key) {
    return in_array($this->route['action'], $this->access[$key]);
  }

}