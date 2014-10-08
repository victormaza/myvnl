<h1>Raccourcir un lien</h1>
<?= $this->Form->create('Link'); ?>
	<?= $this->Form->input('url', array('label' => 'Votre lien', 'placeholder' => 'http://www.monlien.fr')); ?>
<?= $this->Form->end('Raccourcir le lien'); ?>