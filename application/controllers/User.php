<?php

class User extends CI_Controller
{


    public function login()
{
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[15]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|max_length[20]');

    if ($this->form_validation->run() == FALSE) {
        echo validation_errors(); // Afficher les messages d'erreur de validation
        $data = array(
            'errors' => validation_errors()
        );
        $this->session->set_flashdata($data);
        redirect('home');
    } else {
        // Si le nom et le mot de passe sont valides et corrects
        $username = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));

        // Obtenir les informations de l'utilisateur, y compris le rôle
        $user_info = $this->user_model->get_user_info($username, $password);

        if ($user_info) {
            $data = array(
                'user_id'   => $user_info->id,
                'username'  => $username,
                'logged_in' => true,
                'role'      => $user_info->role  // Stocker le rôle
            );
            $this->session->set_userdata($data);
            $this->session->set_flashdata('login_succed', 'You are now logged in');
            redirect('task', 'refresh');
        } else {
            $this->session->set_flashdata('login_failed', 'Username or password incorrect');
            redirect('home');
        }
    }
}

    
    
    public function register()
    { 
       $this->form_validation->set_rules('username','Username','trim|required|min_length[3]|max_length[15]');
       $this->form_validation->set_rules('password','Password','trim|required|min_length[3]|max_length[15]|matches[password]');
       $this->form_validation->set_rules('email','Email','trim|required');
       $this->form_validation->set_rules('role','Role','trim|required|min_length[3]|max_length[15]');
      
       if($this->form_validation->run() == FALSE)
      {                      //           echo validation_errors(); 
           $data = array(
                 'errors' =>'<div class="bg-danger">'.validation_errors().'</div>'
                     );
            $this->session->set_flashdata($data);
           $data['content'] = 'register_view';
           $this->load->view('home_view', $data);
       

      }else{
         $user_register = $this->user_model->register_user();
            if($user_register){
                   $this->session->set_flashdata('register_succed','<div class="bg-succes">you have beeen succces</div>');
                   redirect('home');
            }else{
              redirect('user/register');
            }
       
}

}}