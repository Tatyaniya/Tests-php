<?php

class TaskController {

  public function index() {
    $tasks = new Task->getAllTasks();
    include 'views/task_list.php';
  }

  public function create() {
    include 'views/task_form.php';
  }

  public function store() {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $this->task->createTask($title, $description);

    header('Location: /tasks');
    exit;
  }

  public function edit($id) {
    $task = $this->task->getTask($id);
    include 'views/task_form.php';
  }

  public function update($id) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? 1 : 0;

    $this->task->updateTask($id, $title, $description, $status);

    header('Location: /tasks');
    exit;
  }

  public function delete($id) {
    $this->task->deleteTask($id);

    header('Location: /tasks');
    exit;
  }
}

?>