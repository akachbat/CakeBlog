<div class="panel panel-primary">
	<div class="panel-heading">Catégories</div>
	<?php 
		$cats = $this->requestAction(array('controller' => 'posts','action' => 'widget','element' => 'categories')) 
	?>
	<ul class="nav nav-stacked">
		<?php foreach ($cats as $cat): ?>
			<li><a href="<?= Router::url(array('controller'=> 'category', 'action' => $cat['Category']['slug'])) ?>"><span class="badge pull-right"><?= count($cat['Post']) ?></span><?= $cat['Category']['title'] ?></a></li>
		<?php endforeach; ?>		
	</ul>
</div>