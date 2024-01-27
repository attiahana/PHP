<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <title>Login Application </title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <script src="<?php echo base_url(); ?>assets/js/jquery3.7.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    </head>
    <body>
        <div class="content">
               <div class="container">
                      <div class="row">  
                          <?php 
                          if($this->session->flashdata('register_succed'))
                          {
                              echo $this->session->flashdata('register_succed');
                          }
                          ?>
                       <?php $this->load->view($content); ?>
                       </div>
                </div>
         </div>
    </body>
      
</html>
