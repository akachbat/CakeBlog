<h1>Commentaires</h1>

<div class="row">
	<p class="text-right">
		<?= $this->Html->link(
				'Nouveau',
				array('action' => 'edit'),
				array('class' => 'btn btn-primary')
			);
		?>
	</p>
</div>

<div class="row">
	<table class="table table-striped table-bordered">
		<thead>
			<th>Personne</th>
			<th>Commentaire</th>
			<th>Date</th>
			<th>Status</th>
			<th>Post</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php foreach ($comments as $comment): ?>
				<tr>
					<td><?= $comment['Comment']['fullname'] ?> - <?= $comment['Comment']['email'] ?></td>
					<td><?= $comment['Comment']['content'] ?></td>
					<td><?= $comment['Comment']['created'] ?></td>
					<?php if($comment['Comment']['active']): ?>
						<td><span class="label label-success">Publié</span></td>
					<?php else: ?>
						<td><span class="label label-default">Caché</span></td>
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
								array('escape' => false,'title' => 'Cacher','class' => 'comment-stat')
								)							
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
								array('escape' => false,'title' => 'Publier','class' => 'comment-stat')
								)							
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
			$.ajax({
				url: element.attr('href')
			})
			.done(function() {
				var statElement = $(element).parents('tr').find('td:eq(3) > span');
				if($(statElement).text() == 'Publié'){
					$(statElement).text('Caché');
					$(statElement).removeClass('label-success').addClass('label-default');
					$(element).children('span').removeClass().addClass('glyphicon glyphicon-thumbs-up');
				}
				else{
					$(statElement).text('Publié')
					$(statElement).addClass('label-success').removeClass('label-default');
					$(element).children('span').removeClass().addClass('glyphicon glyphicon-thumbs-down');
				}
			})	
			e.preventDefault();
		});		
	});	

JS;
?>

<!-- AJAX -->
<?= $this->Html->scriptBlock($script, array('block' => 'script')); ?>
