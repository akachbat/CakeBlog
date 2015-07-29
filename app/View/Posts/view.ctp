<?php $this->set('title_for_layout',$post['Post']['title']) ?>

<div class="row">
	<div class="col-xs-9">
		<h1><?= $post['Post']['title'] ?></h1>

		<ul class="list-inline text-left">
			<li>
				<i class="glyphicon glyphicon-user" title="<?= __('Auteur') ?>"></i> 
				<?= $this->Html->Link($post['User']['username'],array('controller' => 'author', 'action' => $post['User']['id']),array('class' => 'text text-primary')) ?>
			</li>
			<li>
				<i class="glyphicon glyphicon-tag" title="<?= __('Catégorie') ?>"></i>
				<?= $this->Html->Link($post['Category']['title'],array('controller' => 'category', 'action' => $post['Category']['slug']),array('class' => 'text text-primary')) ?>						
			<li><i class="glyphicon glyphicon-time" title="<?= __('Date/Heure') ?>"></i> <?= $this->Time->nice($post['Post']['created']) ?></li>
			<li><i class="glyphicon glyphicon-comment" title="<?= __('Commentaires') ?>"></i> <?= count($post['Comment']) ?> <a href="#comments"><?= __('Commentaire(s)') ?></a></li>
		</ul>

		<div class="">
			<?= $this->Markdown->transform($post['Post']['content']) ?>	
		</div>
		<hr>

		<div id="tag">
			<i class="glyphicon glyphicon-tag" title="vues"></i>
			<?= implode(' ', array_map(function($v){ 
				return '<a href="'. Router::url(array('controller' => 'tag','action' => strtolower($v['title']))) .'"><span class="badge">'. $v['title'] .'</span></a>';
				}, $post['Tag']))
			?>	
		</div>

		<div id="comments" class="">
			<h3 class="text-primary"><?= __('Commentaires') ?></h3><br/>	
			<?php if(empty($post['Comment'])): ?>
				<div class="alert alert-warning"><span><?= __('Il n\'y a aucun commentaire pour le moment !') ?></span></div>
			<?php endif; ?>

			<?php foreach ($post['Comment'] as $comment): ?>
				<div class="row">
				  	<div class="col-xs-2">
				  		<img src="http://1.gravatar.com/avatar/<?= md5($comment['email']); ?>?s=100" width="80%">
				  	</div>
				  	<div class="col-xs-10">
				  		<p>
				  			<i class="glyphicon glyphicon-user"></i> <strong><?= h($comment['fullname']) ?></strong>&nbsp;
				  			<i class="glyphicon glyphicon-time"></i> <?= $this->Time->timeAgoInWords($comment['created']) ?>
				  		</p>
			  			<p><?= nl2br(h($comment['content'])) ?></p>
				  	</div>
				</div><br/>					
			<?php endforeach; ?>
			
			<br>
			<?= $this->Session->flash(); ?>
			<h3 class="text-primary"><?= __('Votre commentaire') ?></h3><br>
			<?= $this->Form->create('Comment') ?>
			<?= $this->Form->input('fullname',array(
					'label' => __('Nom'),
					'class' => 'form-control',
					'div' => array('class' => 'form-group')				
				));
			?>	
			<?= $this->Form->input('email',array(
					'label' => __('Email'),
					'class' => 'form-control',
					'div' => array('class' => 'form-group')				
				));
			?>	
			<?= $this->Form->input('content',array(
					'label' => __('Commentaire'),
					'type' => 'textarea',
					'class' => 'form-control',
					'div' => array('class' => 'form-group')				
				));
			?>					
			<?= $this->Form->end(array(
					'label' => __('Envoyer'),
					'class' => 'btn btn-primary'
				));
			?>
		</div>
	</div>

	<div class="col-xs-3">
		<?= $this->element('postsWidget',array(),array('cache' => 'default')) ?>
		<?= $this->element('categoriesWidget',array(),array('cache' => 'default')) ?>
	</div>	
</div>
