<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LISTE TASK</title>
    <style>
        /* Ajouter une marge en bas de 10px entre les boutons et le tableau */
        button, table {
            margin-top: 10px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <script src="<?php echo base_url('assets/js/jquery3.7.1.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
</head>
<body>

<h2>Edit Task</h2>

<?php if(isset($task)): ?>
<div class="form-group">
<form method="post" action="<?php echo base_url('task/edit_task/' . $task->id); ?>">
    <label for="title">Title:</label>
    <input  type="text" name="title" value="<?php echo $task->title; ?>" required>
    
</div>
    <label for="description">Description:</label>
    <textarea name="description" required><?php echo $task->description; ?></textarea>
    <br>

    <label for="user_id">User ID:</label>
    <input type="text" name="user_id" value="<?php echo $task->user_id; ?>" required>
    <br>

    <label for="task_date">Task Date:</label>
    <input type="date" name="task_date" value="<?php echo $task->task_date; ?>" required>
    <br>

    <input type="submit" name="edit_task" value="Edit Task">
</form>

<?php else: ?>
    <p>Task not found.</p>
<?php endif; ?>

</body>
</html>

