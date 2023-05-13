<?php

class Task {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function getAllTasks() {
    $query = $this->db->prepare("SELECT * FROM tasks");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getTask($id) {
    $query = $this->db->prepare("SELECT * FROM tasks WHERE id = :id");
    $query->bindParam(':id', $id);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function createTask($title, $description) {
    $query = $this->db->prepare("INSERT INTO tasks (title, description, created_at, status) VALUES (:title, :description, :created_at, 0)");
    $created_at = date('Y-m-d H:i:s');
    $query->bindParam(':title', $title);
    $query->bindParam(':description', $description);
    $query->bindParam(':created_at', $created_at);
    return $query->execute();
  }

  public function updateTask($id, $title, $description, $status) {
    $query = $this->db->prepare("UPDATE tasks SET title = :title, description = :description, status = :status WHERE id = :id");
    $query->bindParam(':id', $id);
    $query->bindParam(':title', $title);
    $query->bindParam(':description', $description);
    $query->bindParam(':status', $status);
    return $query->execute();
  }

  public function deleteTask($id) {
    $query = $this->db->prepare("DELETE FROM tasks WHERE id = :id");
    $query->bindParam(':id', $id);
    return $query->execute();
  }
}

?>