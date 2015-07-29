<h1><?= __('Commentaires') ?></h1>


<div class="row">
	<table class="table table-striped table-bordered">
		<thead>
			<th><?= __('Nom & email') ?></th>
			<th><?= __('Commentaire') ?></th>
			<th><?= __('Date') ?></th>
			<th><?= __('Status') ?></th>
			<th><?= __('Post') ?></th>
			<th><?= __('Action') ?></th>
		</thead>
		<tbody>
			<?php foreach ($comments as $comment): ?>
				<tr>
					<td><?= $comment['Comment']['fullname'] ?> - <?= $comment['Comment']['email'] ?></td>
					<td><?= $comment['Comment']['content'] ?></td>
					<td><?= $comment['Comment']['created'] ?></td>
					<?php if($comment['Comment']['active']): ?>
						<td><span class="label label-success"><?= __('Validé') ?></span></td>
					<?php else: ?>
						<td><span class="label label-default"><?= __('Non validé') ?></span></td>
					<?php endif ?>
					<td>
						<?= $this->Html->link($comment['Post']['title'],
							array(
								'controller' => '/',
								'action' => $comment['Post']['slug'],
								'admin' => false
							),
							array('target' => '_blank'))
						?>
					</td>
					<?php if($comment['Comment']['active']): ?>
						<td class="text-center">
							<?= $this->Html->link('<span class="glyphicon glyphicon-thumbs-down"></span>',
								array(
									'action' => 'update',
									'commentId' => $comment['Comment']['id'],
									'active' => 0
								),
								array('escape' => false,'class' => 'comment-stat','data-active' => 0,'data-ajax-href' => '#'))							
							?>
						</td>
					<?php else: ?>
						<td class="text-center">
							<?= $this->Html->link('<span class="glyphicon glyphicon-thumbs-up"></span>',
								array(
									'action' => 'update',
									'commentId' => $comment['Comment']['id'],
									'active' => 1
								),
								array('escape' => false,'class' => 'comment-stat','data-active' => 1,'data-ajax-href' => '#'))							
							?>							
						</td>
					<?php endif ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<?php 
$script = <<<JS
	jQuery(document).ready(function($) {

		$('.comment-stat').on('click', function(e) {
			var element = $(this);
			var active = $(element).attr('data-active');
			var statElement = $(element).parents('tr').find('.label');
			$.ajax({
				cache : false,
				url: element.attr('href')
			})
			.done(function(data) {
				data = jQuery.parseJSON(data);
				$(element).attr('href',data.url);
				if(active == '1'){
					$(element).attr('data-active','0');
					$(statElement).text(data.status);
					$(statElement).addClass('label-success').removeClass('label-default');
					$(element).children('span').removeClass().addClass('glyphicon glyphicon-thumbs-down');
				}
				else{
					$(element).attr('data-active','0');					
					$(statElement).text(data.status);
					$(statElement).removeClass('label-success').addClass('label-default');
					$(element).children('span').removeClass().addClass('glyphicon glyphicon-thumbs-up');
				}
			})
			e.preventDefault();
		});		
	});	

JS;
?>

<!-- AJAX -->
<?= $this->Html->scriptBlock($script, array('block' => 'script')); ?>
