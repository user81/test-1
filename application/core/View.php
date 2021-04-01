<?php

namespace application\core;

/**
 * Class View
 *
 * @package application\core
 */
class View {

  /**
   * @var string
   */
  public $path;

  /**
   * @var array
   */
  public $route;
  public $layout = 'default';

  /**
   * View constructor.
   *
   * @param $route
   */
  public function __construct($route) {
    $this->route = $route;
    $this->path = $route['controller'] . '/' . $route['action'];
  }

  /**
   * @param $title
   * @param array $vars
   */
  public function render($title, $vars = []) {
    $path = 'application/views/' . $this->path . '.php';
    extract($vars);
    if (file_exists($path)){
      ob_start();
      require_once $path;
      $content = ob_get_clean();
      require_once 'application/views/layouts/' . $this->layout . '.php';
    }
  }

  /**
   * @param $url
   */
  public function redirect($url) {
    header('location: /' . $url);
    exit;
  }

  /**
   * @param $code
   */
  public static function errorCode($code) {
    http_response_code($code);
    $path = 'application/views/errors/' . $code . '.php';
    if ($path) {
      require_once $path;
    }
    exit;
  }

  /**
   * @param $status
   * @param $msg
   */
  public function message($status, $msg) {
    exit(json_encode(['status' => $status, 'message' => $msg]));
  }

  /**
   * @param $url
   * @param $msg
   */
  public function location($url) {
    exit(json_encode(['url' => $url]));
  }

}