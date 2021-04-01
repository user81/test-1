<?php

return [
  //MainController
  '' => [
    'controller' => 'main',
    'action' => 'login',
  ],
  //AdminController
  'admin' => [
    'controller' => 'admin',
    'action' => 'show',
  ],
  'admin/logout' => [
    'controller' => 'admin',
    'action' => 'logout',
  ],
  'admin/students' => [
    'controller' => 'admin',
    'action' => 'show',
  ],
  'admin/add' => [
    'controller' => 'admin',
    'action' => 'add',
  ],
  'admin/edit/{id:\d+}' => [
    'controller' => 'admin',
    'action' => 'edit',
  ],
  'admin/delete/{id:\d+}' => [
    'controller' => 'admin',
    'action' => 'delete',
  ],

];