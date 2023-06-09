<?php

require_once 'config.php';
require_once 'model/taskModel.php';
require_once 'controller/taskController.php';

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME .'', DB_USER, DB_PASS);

$full_path = $_SERVER['REQUEST_URI'];
$path = str_replace(BASE_URL, '', $full_path);
$taskController = new TaskController(new Task($db));

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if ($path === '/tasks') {
    $taskController->index();
  } elseif ($path === '/tasks/create') {
    $taskController->create();
  } elseif (preg_match('/^\/tasks\/edit\/(\d+)$/', $path, $matches)) {
      $taskController->edit($matches[1]);
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($path === '/tasks/store') {
    $taskController->store();
  } elseif (preg_match('/^\/tasks\/update\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
    $taskController->update($matches[1]);
  }
} elseif ($path === '/^\/tasks\/delete\/(\d+)$/') {
  if (preg_match('/^\/tasks\/delete\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
    $taskController->delete($matches[1]);
  }
}

?>