<?php


namespace application\controllers;

use application\core\Controller;

/**
 * Class MainController
 *
 * @package application\controllers
 */
class MainController extends Controller {


  public function loginAction() {
    if (isset($_SESSION['admin'])) {
      $this->view->redirect('admin');
    }
    if (!empty($_POST)) {
      if (!$this->model->loginValidator($_POST)) {
        $this->view->message('error', $this->model->error);
      }
      $_SESSION['admin'] = TRUE;
      $this->view->location('admin');
    }
    $this->view->render('Login');
  }

}