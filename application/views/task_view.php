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

<?php if ($this->session->userdata('logged_in') && $this->session->userdata('role') == 'admin'): ?>
    <!-- Boutons d'ajout -->
    <button class="btn btn-primary" onclick="window.location='<?php echo base_url('user/register'); ?>';">Ajouter User</button>
    <button class="btn btn-success" onclick="window.location='<?php echo base_url('task/add_task'); ?>';">Ajouter Tâche</button>
    <br/>

    <?php if(isset($tasks)): ?>
        <!-- Liste des tâches -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>is_checked </th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>User ID</th>
                    <th>Task Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tasks as $task): ?>
                    <tr class="table-light">
                        <td>
                            <!-- Formulaire pour cocher/décocher la case -->
                            <input class="checkbox-task" id="ck<?php echo $task->id; ?>" type="checkbox" name="is_checked" <?php echo ($task->is_checked == 1) ? 'checked' : ''; ?> data-task-id="<?php echo $task->id; ?>">
                        </td>
                        <td><?php echo $task->id; ?></td>
                        <td><?php echo $task->title; ?></td>
                        <td><?php echo $task->description; ?></td>
                        <td><?php echo $task->user_id; ?></td>
                        <td><?php echo $task->task_date; ?></td>
                        <td>
                            <!-- Bouton de suppression avec un attribut data-task-id pour stocker l'ID de la tâche -->
                        <button class="btn btn-danger btn-delete-task" data-task-id="<?php echo $task->id; ?>">Delete</button>
                        
                        <a class="btn btn-warning" href="<?php echo base_url('task/edit_task/'.$task->id); ?>">Edit</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

<?php else: ?>
    <!-- Liste des tâches pour l'utilisateur non administrateur -->
    <?php if(isset($tasks)): ?>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>is_checked </th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>User ID</th>
                    <th>Task Date</th>
                    </tr>
            </thead>
            <tbody>
                <?php foreach($tasks as $task): ?>
                    <tr class="table-light">
                        <tr class="table-light">
                        <td>
                            <!-- Formulaire pour cocher/décocher la case -->
                            <input class="checkbox-task" id="ck<?php echo $task->id; ?>" type="checkbox" name="is_checked" <?php echo ($task->is_checked == 1) ? 'checked' : ''; ?> data-task-id="<?php echo $task->id; ?>">
                        </td>
                        <td><?php echo $task->id; ?></td>
                        <td><?php echo $task->title; ?></td>
                        <td><?php echo $task->description; ?></td>
                        <td><?php echo $task->user_id; ?></td>
                        <td><?php echo $task->task_date; ?></td>
                       </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
<?php endif; ?>
<script>
$(document).ready(function() {
    $('.checkbox-task').change(function() {
        var isChecked = $(this).prop('checked');
        if(isChecked){
            isChecked = 1;
        }else{
             isChecked = 0;
        }
        var taskId = $(this).data('task-id');

        $.ajax({
            url: '<?php echo base_url("task/update_checkbox"); ?>',
            method: 'POST',
            data: { task_id: taskId, is_checked: isChecked },
            success: function(response) {
                console.log('Mise à jour réussie dans la base de données');
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la mise à jour dans la base de données');
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    // Attacher un gestionnaire d'événement au clic du bouton de suppression
    $('.btn-delete-task').click(function() {
        // Récupérer l'ID de la tâche à partir de l'attribut data-task-id
        var taskId = $(this).data('task-id');

        // Demander confirmation à l'utilisateur
        if (confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')) {
            // Envoyer une requête Ajax pour supprimer la tâche
            $.ajax({
                url: '<?php echo base_url("task/delete_task"); ?>/' + taskId,
                method: 'POST',
                data: { confirm_delete: true },
                success: function(response) {
                    // Actualiser la page ou effectuer d'autres actions après la suppression
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Erreur lors de la suppression de la tâche.');
                }
            });
        }
    });
});
</script>
</body>
</html>
