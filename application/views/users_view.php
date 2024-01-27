
<?php foreach($users as $user): ?>
<h1>
         <?php echo $user->id ?> <br/>
         <?php echo $user->username ?><br/>
         <?php echo $user->pwd ?><br/>
</h1>

<?php endforeach;
