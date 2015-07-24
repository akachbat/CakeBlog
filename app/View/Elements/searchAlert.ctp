<?php if(isset($this->request->query['search'])): ?>
<div class="alert alert-info" role="alert">
  	<a href="<?= Router::url(array('controller' => '/')) ?>" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></a>
	<strong>Mots clés :</strong> "<?= h($this->request->query['search']) ?>"
</div>
<?php endif; ?>