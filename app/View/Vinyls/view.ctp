<h1><?= $vinyl['Vinyl']['title']; ?></h1>
<p><?= $vinyl['Genre']['name']; ?></p>
<p><?= $vinyl['Vinyl']['year']; ?></p>
<p><?= $vinyl['Vinyl']['tracklist']; ?></p>
<p><a href="<?= $this->Html->url('/vinyls'); ?> ">Retour</a></p>