<?php foreach ($posts as $post) : ?>
	<p>
		<a href="<?= $this->Html->url(array('action' => 'view', $post['Post']['slug']), true); ?>"><?= $post['Post']['title']; ?></a>
		<?= $post['Post']['created']; ?>
		<a href="<?= $this->Html->url(array('action' => 'edit', $post['Post']['id']), true); ?>">Modifier</a>
		<span onclick="ajaxDelete(<?= $post['Post']['id'];?>, '<? echo $this->Html->url(array('action' => 'delete')); ?>')">Supprimer</span>
	</p>
<?php endforeach; ?>
<?= $this->Html->script('deletePost'); ?>