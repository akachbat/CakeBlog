<?php $this->set('title_for_layout','Accueil') ?>

<div class="row">
	<div class="jumbotron text-center bg-white">
        <h1>CakeBlog</h1>
        <p class="lead">Un blog simple avec <b>CakePHP 2.X</b></p>
  	</div>	
</div>

<div class="row">
	<!-- Search Alert -->
	<?= $this->element('searchAlert') ?>

	<div class="col-xs-9">
		<?php foreach ($posts as $post): ?>
			<div>
				<h2><?= $post['Post']['title'] ?></h2>
				<ul class="list-inline text-left">
					<li>
						<i class="glyphicon glyphicon-user" title="vues"></i> 
						<?= $this->Html->Link($post['User']['username'],array('controller' => 'author', 'action' => $post['User']['id']),array('class' => 'text text-primary')) ?>
					</li>
					<li>
						<i class="glyphicon glyphicon-tag" title="vues"></i>
						<?= $this->Html->Link($post['Category']['title'],array('controller' => 'category', 'action' => $post['Category']['slug']),array('class' => 'text text-primary')) ?>						
					<li><i class="glyphicon glyphicon-time" title="vues"></i> <?= $this->Time->nice($post['Post']['created']) ?></li>
					<li>
						<i class="glyphicon glyphicon-comment" title="vues"></i> <?= count($post['Comment']) ?> 
						<?= $this->Html->Link('Commentaire(s)',array('controller' => '/','action' => $post['Post']['slug'],null,
							'#' => 'comments')) ?>
						</li>
				</ul>

				<p><?= $this->Markdown->transform($this->Text->truncate($post['Post']['content'],500)) ?></p>

				<ul class="list-inline text-right">
					<li><?= $this->Html->Link('Lire',
							array('controller' => '/','action' => $post['Post']['slug']),
							array('class' => 'btn btn-primary')) 
						?>
					</li>
				</ul>
			</div>
			<hr/>
		<?php endforeach; ?>
		<nav>
			<ul class="pagination">
				<?= $this->Paginator->prev(__('Précédent'), array('tag' => 'li'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a')) ?>
				<?= $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 1)) ?>				
				<?= $this->Paginator->next(__('Suivant'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a')) ?>
			</ul>
		</nav>
	</div>

	<div class="col-xs-3">
		<?= $this->element('categoriesWidget',array(),array('cache' => 'default')) ?>
	</div>
</div>
