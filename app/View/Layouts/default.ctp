<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset(); ?>
	<title> CakeBlog :: <?= $title_for_layout ?> </title>
	<?= $this->Html->css('bootstrap.min') ?>
	<?= $this->Html->css('style') ?>
	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>
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
		          	<?= $this->Html->Link('CakeBlog', array('controller' => '/', 'action' => 'index'), array('class' => 'navbar-brand')) ?>
				</div>
				<div id="navbar" class="navbar-collapse collapse navbar-right">
		     		<form class="navbar-form navbar-left" role="search" method="get" action="<?= Router::url(array('controller' => '/')) ?>">
				        <div class="form-group">
			          		<input type="text" name="search" class="form-control" placeholder="PHP, Cake,...">
				        </div>
			        	<button type="submit" class="btn btn-danger"><?= __('Rechercher') ?></button>
			      	</form>			
					<ul class="nav navbar-nav">
						<li><a href="<?= Router::url(array('controller' => 'contact')) ?>"><span class="glyphicon glyphicon-send"></span> <?= __('Contact') ?></a></li>
						<li><a href="<?= Router::url(array('controller' => 'users', 'admin' => true)) ?>"><span class="glyphicon glyphicon-user"></span> 
							<?php if($this->Session->read('Auth.User')): ?>
								<?= $this->Session->read('Auth.User.username') ?>
							<?php else: ?>
								<?= __('Connexion') ?>
							<?php endif; ?>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>	

		<div class="container" id="content">		
			<?php echo $this->fetch('content'); ?>
		</div>

		<div class="container">
			<?php echo $this->element('sql_dump'); ?>
			<br><br>
		</div>

	</div>

	<footer class="navbar-inverse container-fluid">
		<div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?= Router::url(array('controller' => '/')) ?>">CakeBlog <?= date('Y') ?></a></li>
				<li><a href="<?= Router::url(array('controller' => 'contact')) ?>"><?= __('Nous-contacter') ?></a></li>
			</ul>
		</div>
	</footer>

	<?= $this->Html->script('jquery.min'); ?>
</body>
</html>
