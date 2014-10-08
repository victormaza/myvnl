<?php
	$href = $this->Html->url(array('action' => 'view', 'id' => $id),true);
?>
<h1>Bravo</h1>

<p>Votre lien a bien été raccourci</p>
<p>
	<a href="<?= $href;?>" class="button" target="_blank">
		<?= $href; ?>
 	</a>
</p>
<p>
	Voir la liste des liens raccourcis <a href="<?= $this->Html->url(array('action' => 'listlinks'));?>">ici</a>
</p>