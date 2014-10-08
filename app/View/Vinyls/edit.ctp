<?= $this->Form->create('Post'); ?>
	<?= $this->Form->input('title', array('label' => 'Titre', 'placeholder' => 'Éditer un titre', 'value' => $post['Post']['title'])); ?>
	<?= $this->Form->input('content', array('label' => 'Texte', 'placeholder' => 'Éditer le texte de votre post', 'value' => $post['Post']['content'])); ?>
<?= $this->Form->end('Éditer'); ?>
