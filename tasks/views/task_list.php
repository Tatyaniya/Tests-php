<!-- views/task_list.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
</head>
<body>
  <h1>Task List</h1>
  <a href="<?php echo BASE_URL; ?>tasks/create">Add Task</a>
  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tasks as $task): ?>
        <tr>
          <td><?php echo $task['title']; ?></td>
          <td><?php echo $task['description']; ?></td>
          <td><?php echo $task['status'] ? 'Completed' : 'Not Completed'; ?></td>
          <td>
            <a href="/tasks/edit/<?php echo $task['id']; ?>">Edit</a>
            <a href="/tasks/delete/<?php echo $task['id']; ?>">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
