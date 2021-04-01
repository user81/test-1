<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;

/**
 * Class AdminController
 *
 * @package application\controllers
 */
class AdminController extends Controller {

  public function showAction() {
    $result = $this->model->getStudents();
    $vars = [
      'students' => $result,
    ];
    $this->view->path = 'admin/students';
    $this->view->render('List of students', $vars);
  }

  public function addAction() {
    if (!empty($_POST)) {
      if (!$this->model->studentValidator($_POST)) {
        $this->view->message('error', $this->model->error);
      }
      $this->model->studentAdd($_POST);
      $this->view->location('admin/students');
    }
    $this->view->render('Adding Student');
  }


  public function editAction() {

    $id = $this->route['id'];

    if (!$this->model->isStudentExists($id)) {
      View::errorCode(404);
    }

    if (!empty($_POST)) {
      if (!$this->model->studentValidator($_POST)) {
        $this->view->message('error', $this->model->error);
      }
      $this->model->studentEdit($_POST, $id);
      $this->view->location('admin/students');
    }
    $vars = [
      'data' => $this->model->studentData($id)[0],
    ];
    $this->view->render('Edit  Student', $vars);

  }

  public function deleteAction() {
    $id = $this->route['id'];
    if (!$this->model->isStudentExists($id)) {
      View::errorCode(404);
    }
    else {
      $this->model->studentDelete($id);
      $this->view->redirect('admin');
    }
  }

  public function logoutAction() {
    unset($_SESSION['admin']);
    $this->view->redirect('');
  }

}