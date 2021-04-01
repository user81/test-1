<?php

namespace application\models;

use application\core\Model;

/**
 * Class Admin
 *
 * @package application\models
 */
class Admin extends Model {

  /**
   * @var array
   */
  public $error;

  /**
   * @return array
   */
  public function getStudents() {
    return $this->db->row('SELECT * FROM `students`');
  }

  /**
   * @param $post
   *
   * @return bool
   */
  public function studentValidator($post) {

    $data = [
      'name',
      'surname',
      'gender',
      'age',
      'faculty',
      'group',
    ];

    foreach ($data as $value) {
      if (empty($post[$value]) || !isset($post[$value])) {
        $this->error = ucfirst($value) . ' field is empty';
        return FALSE;
      }
    }

    $name = iconv_strlen($post['name']);
    $surname = iconv_strlen($post['surname']);
    if ($name < 4 || $name > 20) {
      $this->error = 'The name field must contain between 4 and 20 characters!';
      return FALSE;
    } elseif ($surname < 4 || $surname > 30) {
      $this->error = 'The surname field must contain between 4 and 30 characters!';
      return FALSE;
    } elseif ($post['age'] < 17 || $post['age'] > 80) {
      $this->error = 'The age field must be between 17 and 80 years old!';
      return FALSE;
    }
    return TRUE;
  }

  /**
   * @param $post
   */
  public function studentAdd($post) {
    $params = [
      'name' => $post['name'],
      'surname' => $post['surname'],
      'gender' => $post['gender'],
      'age' => $post['age'],
      'faculty' => $post['faculty'],
      'learning_group' => $post['group'],
    ];
    $this->db->query(
      "INSERT 
        INTO `students` 
            (`name`, `surname`, `gender`, `age`, `learning_group`, `faculty`) 
        VALUE 
            (:name, :surname, :gender, :age, :learning_group, :faculty)", $params
    );
  }

  /**
   * @param $post
   * @param $id
   */
  public function studentEdit($post, $id) {
    $params = [
      'id' => $id,
      'name' => $post['name'],
      'surname' => $post['surname'],
      'gender' => $post['gender'],
      'age' => $post['age'],
      'faculty' => $post['faculty'],
      'learning_group' => $post['group'],
    ];
    $this->db->query(
      "UPDATE 
        `students` 
      SET 
        `name`=:name,
        `surname`=:surname,
        `gender`=:gender,
        `age`=:age,
        `learning_group`=:learning_group,
        `faculty`=:faculty
      WHERE 
          `id`=:id ", $params
    );
  }

  /**
   * @param $id
   *
   * @return mixed
   */
  public function isStudentExists($id) {
    $params = ['id' => $id];
    return $this->db->column("SELECT `id` FROM `students` WHERE `id` = :id", $params);
  }

  /**
   * @param $id
   *
   * @return array
   */
  public function studentData($id) {
    $params = ['id' => $id];
    return $this->db->row("SELECT * FROM `students` WHERE `id` = :id", $params);
  }

  /**
   * @param $id
   *
   * @return mixed
   */
  public function studentDelete($id) {
    $params = ['id' => $id];
    return $this->db->column("DELETE FROM `students` WHERE `id` = :id", $params);
  }
}