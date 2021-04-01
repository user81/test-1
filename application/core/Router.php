<?php

namespace application\core;


/**
 * Class Router
 *
 * @package application\core
 */
class Router {

  /**
   * @var array|null
   */
  protected $routes = [];

  /**
   * @var array|null
   */
  protected $params = [];


  /**
   * Router constructor.
   */
  public function __construct() {
    $arr = require_once 'application/config/routes.php';
    foreach ($arr as $key => $value) {
      $this->add($key, $value);
    }
  }

  /**
   * @param string $route
   * @param array $params
   */
  public function add($route, $params) {
    $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
    $route = '#^' . $route . '$#';
    $this->routes[$route] = $params;
  }

  /**
   * @return bool
   */
  public function match() {
    $url = trim($_SERVER['REQUEST_URI'], '/');
    foreach ($this->routes as $route => $params) {
      if (preg_match($route, $url, $matches)) {
        foreach ($matches as $key => $match) {
          if (is_string($key)) {
            if (is_numeric($match)) {
              $match = (int) $match;
            }
            $params[$key] = $match;
          }
        }
        $this->params = $params;
        return TRUE;
      }
    }
    return FALSE;
  }

  public function run() {
    if ($this->match()) {
      $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
      if (class_exists($path)) {
        $action = $this->params['action'] . 'Action';
        if (method_exists($path, $action)) {
          $controller = new $path($this->params);
          $controller->$action();
        }
        else {
          View::errorCode(404);
        }
      }
      else {
        View::errorCode(404);
      }
    }
    else {
      View::errorCode(404);
    }
  }

}