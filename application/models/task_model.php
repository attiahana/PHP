<?php
class Task_model extends CI_Model {
    
public function add_task($data) {
    // Vérifier le format de la date avant l'insertion
    if (isset($data['task_date'])) {
        $data['task_date'] = date('Y-m-d', strtotime($data['task_date']));
    }

    // Ne spécifiez pas la colonne 'id' dans l'insertion
    unset($data['id']);

    $this->db->insert('tasks', $data);

    // Vérifiez s'il y a une erreur lors de l'insertion
    if ($this->db->affected_rows() > 0) {
        return $this->db->insert_id(); // Retourne l'ID de la tâche ajoutée
    } else {
        echo 'Erreur MySQL : ' . $this->db->error();
        return false; // Retourne faux si l'insertion a échoué
    }
}

public function update_checkbox($task_id, $is_checked) {
    $data = array('is_checked' => $is_checked );
    $this->db->where('id', $task_id);
    $update = $this->db->update('tasks', $data);
}



   public function get_task_by_id($task_id) {
        $this->db->where('id', $task_id);
        $query = $this->db->get('tasks');

        return $query->row();
    }



    public function delete_task($task_id) {
        $this->db->where('id', $task_id);
        $this->db->delete('tasks');
    }

 public function edit_task($task_id, $data) {
    $this->db->where('id', $task_id);
    $this->db->update('tasks', $data);
    return $this->db->affected_rows() > 0;
}


    public function get_task($task_id) {
        $this->db->where('id', $task_id);
        $query = $this->db->get('tasks');
        return $query->row();
    }

 

      //récuperer tous les tasks
      public function get_all_tasks() {
        $query = $this->db->get('tasks');
        return $query->result();
    }

 //récuperer les tasks de user connecter user_id

public function get_user_tasks($user_id) {
       // récuperer tous les champs de tasks et username de table user
    $this->db->select('tasks.*, users.username');
    $this->db->from('tasks');
    $this->db->join('users', 'tasks.user_id = users.id');
    $this->db->where('tasks.user_id', $user_id);
    $query = $this->db->get();
    return $query->result();
}




}
