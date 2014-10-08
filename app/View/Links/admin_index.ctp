<h1>Voici la liste des liens raccourcis!</h1>

<ul class="inline">
	<?php foreach ($links as $link) : ?>
		<li>
			<?= $link['Link']['url'] ; ?>
		</li>
	<?php endforeach; ?>
</ul>
<a href="<?= $this->Html->url(array('action' => 'add')); ?>">Retour</a>