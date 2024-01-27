<?php

class User_model extends CI_Model
{ 
   public function user_login($username, $password)
   {
        $this->db->where(array(
                   'username' =>$username,
                   'password' => $password
                ));
        $result = $this->db->get('users');
        
        if($result->num_rows()==1 )
        {
            return $result->row(0)->id;
        }else
            return false;
}


public function register_user()
{   
 $data = array(
    'username' => $this->input->post('username'),
    'password' => $this->input->post('password'),
    'email' => $this->input->post('email'),
     'role' => $this->input->post('role'),
);
if ($this->db->insert('users', $data)) {
    echo 'Insertion réussie.';
} else {
    echo 'Erreur d\'insertion : ' . $this->db->error()['message'];
}
   return $user_register;
    
}
//récupérer les informations d'un utilisateur dans une base de données  
 public function get_user_info($username, $password)
    {
        
        $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));

        // Si l'utilisateur est trouvé, renvoyer ses informations, sinon renvoyer faux
        return $query->row();
    }

}
//    public function delete_user($user_id)
//    {
//        $this->db->where('id',$user_id);
//        $query = $this->db->delete('users');
//
//    }
//    
//        public function update_user($user_id,$data)
//    {
//        $this->db->where('id',$user_id);
//        $query = $this->db->update('users',$data);
//
//    }
//    
//    public function select_users($user_id) 
//    {    $this->db->where('id',$user_id);
//         $query = $this->db->get('users');
//        return $query->result();
//    }
//    
//    public function insert_user($data)
//    {
//        $query =$this->db->insert('users', $data);
//    }
//
//
//

    /*
    public function get_users()
    {
        $query = $this->db->get('users');
        return $query->result();
    }*/

