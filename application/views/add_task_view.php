<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="UTF-8">
        <title>Add Task </title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <script src="<?php echo base_url(); ?>assets/js/jquery3.7.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    </head>
<body>

<div class="container">
    <h1>Ajouter des taches</h1>
    <!-- Dans add_task_view.php -->
    <?php echo form_open('task/add_task'); ?>
    <div class="form-group">
    <label for="title">Title:</label>
    <?php echo form_input('title', set_value('title'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <label for="description">Description:</label>
    <?php echo form_textarea('description', set_value('description'), 'class="form-control"'); ?>
</div>

 <div class="form-group">
    <label for="user_id">User ID:</label>
    <?php echo form_input('user_id', set_value('user_id'), 'class="form-control"'); ?>
</div>

<div class="form-group">
    <label for="task_date">Task Date:</label>
    <?php
    $task_date_value = set_value('task_date');
    $task_date_display = !empty($task_date_value) ? date('Y-m-d', strtotime($task_date_value)) : '';

    // Utiliser le type de champ "date" pour afficher le calendrier
    echo form_input('task_date', $task_date_display, 'class="form-control" type="date"');
    ?>
</div>


<div class="form-group">
    <?php echo form_submit('submit', 'Add Task', 'class="btn btn-primary"'); ?>
</div>

</div>

</body>
</html>
