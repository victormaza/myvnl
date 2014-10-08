<h1>Créer un compte</h1>
<?= $this->Form->create('User'); ?>
	<?php 
	 echo $this->Form->input('username', array('label' => 'Login :'));
	 echo $this->Form->input('email', array('label' => 'Email :','type' =>'email')); 
	 echo $this->Form->input('password', array('label' => 'Mot de passe :','type' =>'password')); 
	 ?>
 <? echo $this->Form->end('S\'enregistrer'); ?>