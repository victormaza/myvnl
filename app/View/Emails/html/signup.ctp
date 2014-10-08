<p><strong>Bonjour <?= $username ?></strong></p>
<p>Pour activer ce compte, cliquer sur ce lien : </p>
<p><?= $this->Html->link('Activer mon compte', $this->Html->url($link,true));  ?></p>