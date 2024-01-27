<?php

echo '<h1> Login Form</h1> <br /> <br>';

echo '<div class="col-md-4 pull-left">';

if ($this->session->flashdata('errors')) {
    echo $this->session->flashdata('errors');
}
?>
<p class="bg-success">
    <?php
    if ($this->session->flashdata('login_succed')) {
        echo $this->session->flashdata('login_succed');
    }
    ?>
</p>

<p class="bg-danger">
  <?php
    if ($this->session->flashdata('login_failed')) {
        echo $this->session->flashdata('login_failed');
   }
?>
</p>

<?php

echo '<div class="form-login">';

$data = array(
    'class' => 'form-horizontal',
    'method' => 'post'
);

// Utilisation de form_open pour générer automatiquement la balise de formulaire
echo form_open('user/login', $data);
//username
echo '<div class="form-group">';
$data = array(
    'class' => 'form-control',
    'type' => 'text',
    'name' => 'username',
    'placeholder' => 'Username'
);

// Utilisation de form_input pour générer automatiquement la balise d'entrée
echo form_input($data);
echo '</div>';
//password
echo '<div class="form-group">';
$data = array(
    'class' => 'form-control',
    'type' => 'password',
    'name' => 'password',
    'placeholder' => 'Password'
);

// Utilisation de form_password pour générer automatiquement la balise de mot de passe
echo form_password($data);
echo '</div>';

echo '<div class="form-group">';
$data = array(
    'class' => 'form-control btn btn-primary',
    'type' => 'submit',
    'value' => 'Login'
);

// Utilisation de form_submit pour générer automatiquement la balise de bouton de soumission
echo form_input($data);
echo '</div>';

// Utilisation de form_close pour générer automatiquement la balise de fermeture de formulaire
echo form_close();
echo '</div>';

echo '</div>';
?>
