<?php

class TaskController {
  private $task;

  public function __construct($task) {
    $this->task = $task;
  }

  public function index() {
    $tasks = $this->task->getAllTasks();
    include 'views/task_list.php';
  }

  public function create() {
    include 'views/task_form.php';
  }

  public function store() {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $this->task->createTask($title, $description);

    header("Location: BASE_URL/tasks");
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

    header("Location: BASE_URL/tasks");
    exit;
  }

  public function delete($id) {
    $this->task->deleteTask($id);

    header("Location: BASE_URL/tasks");
    exit;
  }
}

?>