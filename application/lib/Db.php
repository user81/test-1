<?php

namespace application\lib;

use PDO;

/**
 * Class Db
 *
 * @package application\lib
 */
class Db {

  /**
   * @var \PDO
   */
  protected $db;

  /**
   * Db constructor.
   */
  public function __construct() {
    $config = require_once 'application/config/db.php';
    $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . '', $config['user'], $config['pass']);
  }

  /**
   * @param $sql
   * @param array $params
   *
   * @return false|\PDOStatement
   */
  public function query($sql, $params = []) {
    $stmt = $this->db->prepare($sql);
    if (!empty($params)) {
      foreach ($params as $key => $value) {
        $stmt->bindValue(':' . $key, $value);
      }
    }
    $stmt->execute();
    return $stmt;
  }

  /**
   * @param $sql
   * @param array $params
   *
   * @return array
   */
  public function row($sql, $params = []) {
    $result = $this->query($sql, $params);
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * @param $sql
   * @param array $params
   *
   * @return mixed
   */
  public function column($sql, $params = []) {
    $result = $this->query($sql, $params);
    return $result->fetchColumn();
  }

}