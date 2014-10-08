<?php foreach ($vinyls as $vinyl) : ?>
	<?php
		$cover = $vinyl['Vinyl']['cover'];
		if(!empty($cover)){
			echo $this->Html->image('covers/'.$cover, array(
				'alt' => $vinyl['Vinyl']['title'].'-'.$vinyl['Artist']['name']
				));
		}
	?>
	<h1><?= $vinyl['Artist']['name']; ?>  - <a href="<?= $this->Html->url(array('action' => 'view', $vinyl['Vinyl']['slug']), true); ?>"><?= $vinyl['Vinyl']['title']; ?></a></h1>

	<p><?= $vinyl['Genre']['name']; ?></p>
	<div><?= $vinyl['Vinyl']['year']; ?></div>
	<div><?= $vinyl['Label']['name']; ?></div>
<?php endforeach; ?>
<?= $this->Paginator->numbers(); ?>