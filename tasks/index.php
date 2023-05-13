<?php

require_once 'init.php';
require_once 'taskModel.php';
require_once 'taskController.php';

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME .'', DB_USER, DB_PASS);

$full_path = $_SERVER['REQUEST_URI'];
$path = str_replace(BASE_URL, '', $full_path);

switch ($path) {
  case '/tasks':
    var_dump($path);
    $controller = new TaskController();
    $controller->index();
    break;
  case '/tasks/create':
    $controller = new TaskController();
    $controller->create();
    break;
  case '/tasks/store':
    $controller = new TaskController();
    $controller->store($_POST);
    break;
  case '/tasks/edit':
    $id = intval($_GET['id']);
    $controller = new TaskController();
    $controller->edit($id);
    break;
  case '/tasks/update':
    $id = intval($_GET['id']);
    $controller = new TaskController();
    $controller->update($_POST, $id);
    break;
  case '/tasks/delete':
    $id = intval($_GET['id']);
    $controller = new TaskController();
    $controller->delete($id);
    break;
  default:
    echo "404";
    break;
}

$taskController = new TaskController(new Task($db));

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if ($_SERVER['REQUEST_URI'] === '/tasks') {
    $taskController->index();
  } elseif ($_SERVER['REQUEST_URI'] === '/tasks/create') {
    $taskController->create();
  } elseif (preg_match('/^\/tasks\/edit\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
    $taskController->edit($matches[1]);
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_SERVER['REQUEST_URI'] === '/tasks/store') {
    $taskController->store();
  } elseif (preg_match('/^\/tasks\/update\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
    $taskController->update($matches[1]);
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  if (preg_match('/^\/tasks\/delete\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
    $taskController->delete($matches[1]);
  }
}

?>