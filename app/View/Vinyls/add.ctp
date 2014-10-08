<h1>Ajouter un vinyl</h1>
<?= $this->Form->create('Vinyl', array('type' => 'file')); ?>
	<?= $this->Form->input('title', array('label' => 'Titre', 'placeholder' => 'Le nom de la galette')); ?>
	<?= $this->Form->input('Artist.name', array('label' => 'Artiste', 'placeholder' => 'Qui est l\'artiste ?')); ?>
	<?= $this->Form->input('Label.name', array('label' => 'Label', 'placeholder' => 'Sorti sur quel label ?')); ?>
	<?= $this->Form->input('Genre.name', array('label' => 'Genre', 'placeholder' => 'Quel genre ?')); ?>
 	<?= $this->Form->input('year', array(
											'type' => 'date',
											'dateFormat' => 'Y',
										    'empty' => 'Sorti en quelle année ?',
										    'value' => date('Y'),
                                            'minYear' => 1950, // start year
                                            'maxYear' => date('Y') // current 
                                           )
    ); ?>
	<?= $this->Form->input('tracklist', array('label' => 'Tracklist', 'type' => 'textarea', 'placeholder' => 'Ajouter la tracklist de votre vinyl')); ?>
	<?= $this->Form->input('cover_file', array('label' => 'La cover', 'type' => 'file')); ?>
<?= $this->Form->end('Ajouter'); ?>