<?php

echo '<h1> Registration Form</h1> <br /> <br>';
//vérifie si la session flashdata contient des erreurs 
if ($this->session->flashdata('errors'))
{
    echo $this->session->flashdata('errors');
}
    echo '<div class="col-md-12 pull-left">';
    echo '<div class="form-login">';

    $data = array(
        'class' => 'form-horizontal',
        'method' => 'post'
    );

    // Utilisation de form_open pour générer automatiquement la balise de formulaire
    echo form_open('user/register', $data);

    // username
    echo '<div class="form-group">';
    $data = array(
        'class' => 'form-control',
        'type' => 'text',
        'name' => 'username',
        'placeholder' => 'Username'
    );
    echo form_input($data);
    echo '</div>';

    // password
    echo '<div class="form-group">';
    $data = array(
        'class' => 'form-control',
        'type' => 'password',
        'name' => 'password',
        'placeholder' => 'Password'
    );
    echo form_password($data);
    echo '</div>';

    // email
    echo '<div class="form-group">';
    $data = array(
        'class' => 'form-control',
        'type' => 'email',
        'name' => 'email', 
        'placeholder' => 'Email'
    );
    echo form_input($data);
    echo '</div>';

    // role
    echo '<div class="form-group">';
    $data = array(
        'class' => 'form-control',
        'type' => 'text',
        'name' => 'role',
        'placeholder' => 'Role'
    );
    echo form_input($data);
    echo '</div>';

    // submit
    echo '<div class="form-group">';
    $data = array(
        'class' => 'form-control btn btn-primary',
        'type' => 'submit',
        'value' => 'Register'
    );

    // Utilisation de form_submit pour générer automatiquement la balise de bouton de soumission
    echo form_input($data);
    echo '</div>';

    // Utilisation de form_close pour générer automatiquement la balise de fermeture de formulaire
    echo form_close();
    echo '</div>';

    echo '</div>';
 
?>
