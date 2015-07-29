<div class="panel panel-primary">
	<div class="panel-heading"><?= __('Derniers articles') ?></div>
	<?php 
		$posts = $this->requestAction(array('controller' => 'posts','action' => 'widget','element' => 'posts')) 
	?>
	<ul class="nav nav-stacked">
		<?php foreach ($posts as $post): ?>
			<li><?= $this->Html->Link($post['Post']['title'],array('controller' => '/','action' => $post['Post']['slug'])) ?></li>
		<?php endforeach; ?>		
	</ul>
</div>