<!DOCTYPE html>
<html>
<head>
  <title>Task Form</title>
</head>
<body>
  <h1>Task Form</h1>
  <form method="post" action="/tasks/store">
    <label>Title</label>
    <input type="text" name="title" value="<?php echo isset($task) ? $task['title'] : ''; ?>">
    <br>
    <label>Description</label>
    <textarea name="description"><?php echo isset($task) ? $task['description'] : ''; ?></textarea>
    <br>
    <?php if (isset($task)): ?>
        <label>Status</label>
        <input type="checkbox" name="status" <?php echo $task['status'] ? 'checked' : ''; ?>>
    <?php endif; ?>
    <br>
    <button type="submit">Save</button>
  </form>
</body>
</html>
