<?php
class Task extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Task_model', 'task_model');
    }


public function index() {
    if ($this->session->userdata('logged_in')) {
        $role = $this->session->userdata('role');

        if ($role == 'admin') {
            // Si l'utilisateur est un administrateur, récupérez toutes les tâches
            $data['tasks'] = $this->task_model->get_all_tasks();
        } else {
            // Si l'utilisateur n'est pas un administrateur, récupérez les tâches de l'utilisateur actuel
            $user_id = $this->session->userdata('user_id');
            $data['tasks'] = $this->task_model->get_user_tasks($user_id);
        }

        $this->load->view('task_view', $data);
    } else {
        redirect('home'); // Redirigez l'utilisateur vers la page d'accueil s'il n'est pas connecté
    }
}


 public function add_task() {
    $this->load->model('task_model');

    if ($this->input->post()) {
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'user_id' => $this->input->post('user_id'),
            'task_date' => $this->input->post('task_date')
        );

        $task_id = $this->task_model->add_task($data);

        if ($task_id) {
            // Tâche ajoutée avec succès, rediriger vers la page des tâches
            redirect('task');
        } else {
            echo "Erreur lors de l'ajout de la tâche.";
        }
    }
    // Chargez la vue pour afficher le formulaire d'ajout de tâche
    $this->load->view('add_task_view');
}

public function edit_task($task_id) {
    $this->load->model('task_model');

    // Vérifiez si le formulaire d'édition a été soumis
    if ($this->input->post('edit_task')) {
        // Mettez à jour les données de la tâche dans la base de données
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'user_id' => $this->input->post('user_id'),
            'task_date' => $this->input->post('task_date')
            // Ajoutez d'autres champs ici si nécessaire
        );

        $result = $this->task_model->edit_task($task_id, $data);

        if ($result) {
            echo "Tâche mise à jour avec succès";
        } else {
            echo "Erreur lors de la mise à jour de la tâche.";
        }
    } else {
        // Chargez la tâche à éditer depuis la base de données
        $data['task'] = $this->task_model->get_task_by_id($task_id);

        // Chargez la vue pour afficher le formulaire d'édition
        $this->load->view('edit_task_view', $data);
    }
}


public function delete_task($task_id) {
    $this->load->model('task_model');

    // Vérifiez si le formulaire de confirmation a été soumis
    if ($this->input->post('confirm_delete')) {
        // Supprimez la tâche de la base de données
        $result = $this->task_model->delete_task($task_id);

        if ($result) {
            echo "Tâche supprimée avec succès";
        } else {
            echo "Erreur lors de la suppression de la tâche.";
        }
    } else {
        // Chargez la vue pour afficher le formulaire de confirmation
        $data['task_id'] = $task_id;
    }
}


public function update_checkbox() {
    $this->load->model('task_model');
    $task_id = $this->input->post('task_id');
   
    $is_checked = $this->input->post('is_checked');
    $this->task_model->update_checkbox($task_id, $is_checked);

    echo json_encode(['success' => true]);
}


     public function get_task_by_id($task_id) {
        $this->db->where('id', $task_id);
        $query = $this->db->get('tasks');

        return $query->row();
    }

}
