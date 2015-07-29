<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset(); ?>
	<title> CakeBlog :: <?= $title_for_layout ?> </title>
	<?= $this->Html->css('bootstrap.min') ?>
	<?= $this->Html->css('style') ?>
	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
</head>
<body>
	<div id="wrap">
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
		          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
		          	</button>			
		          	<a class="navbar-brand" href=".">CakeBlog Admin Panel</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">	
					<ul class="nav navbar-nav">
						<li><?= $this->Html->link(__('Articles'), array('controller' => 'posts', 'action' => 'index', 'admin' => true)) ?></li>
						<li><?= $this->Html->link(__('Utilisateurs'), array('controller' => 'users', 'action' => 'index', 'admin' => true)) ?></li>
						<li><?= $this->Html->link(__('Categories'), array('controller' => 'categories', 'action' => 'index', 'admin' => true)) ?></li>					
						<li><?= $this->Html->link(__('Commentaires'), array('controller' => 'comments', 'action' => 'index', 'admin' => true)) ?></li>					
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><?= $this->Html->Link(__('Voir le blog'),array('controller' => '/', 'action' => '/','admin' => false)) ?></li>
						<li><?= $this->Html->Link(__('Déconnexion'), array('controller' => 'users', 'action' => 'logout', 'admin' => true)) ?></li>				
					</ul>
				</div>
			</div>
		</nav>	

		<div class="container" id="content">
			<div class="col-xs-12">
				<?= $this->Session->flash(); ?>
				<div class="alert alert-warning alert-ajax-start"><b><?= __('Chargement...') ?></b></div>
				<div class="alert alert-success alert-ajax-success"><b><?= __('Bravo') ?></b> <?= __('l\'action a bien été terminé') ?></div>
				<?= $this->fetch('content'); ?>
			
			</div>		
			<?= $this->element('sql_dump'); ?>
		</div>


	</div>

	<?= $this->Html->script('jquery.min'); ?>
	<?= $this->Html->script('bootstrap.min'); ?>
	<?= $this->fetch('script') ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {

			$(document).ajaxStart(function(event, xhr, settings) {
				$('.alert-ajax-start').fadeIn();
				$('.alert-ajax-success').hide();
			})

			$(document).ajaxComplete(function(event, xhr, settings) {
				$('.alert-ajax-success').fadeIn();
				$('.alert-ajax-start').hide();
			})					

		});
	</script>
</body>
</html>
