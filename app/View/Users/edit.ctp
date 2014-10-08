<h1>Créer un compte</h1>
<?= $this->Form->create('User'); ?>
	<?php 
	 echo $this->Form->input('firstname', array('label' => 'Prénom :'));
	 echo $this->Form->input('lastname', array('label' => 'Nom :'));
	 echo $this->Form->input('email', array('label' => 'Email :','type' =>'email')); 
	 echo $this->Form->input('pass1', array('label' => 'Mot de passe :','type' =>'password')); 
	 echo $this->Form->input('pass2', array('label' => 'Confirmer mot de passe :','type' =>'password')); 
	 ?>
 <? echo $this->Form->end('S\'enregistrer'); ?>