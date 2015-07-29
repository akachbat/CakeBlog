<h1><?= __('Articles') ?></h1>

<div class="row">
	<p class="text-right">
		<?= $this->Html->link(
				__('Nouveau'),
				array('action' => 'edit'),
				array('class' => 'btn btn-primary')
			);
		?>
	</p>
</div>

<div class="row">
	<table class="table table-striped table-bordered">
		<thead>
			<th><?= __('Titre') ?></th>
			<th><?= __('Catégorie') ?></th>
			<th><?= __('Auteur') ?></th>
			<th><?= __('Date création') ?></th>
			<th><?= __('Date mise à jour') ?></th>
			<th><?= __('Action') ?></th>
		</thead>
		<tbody>
			<?php foreach ($posts as $post): ?>
				<tr>
					<td><?= $post['Post']['title'] ?></td>
					<td><?= $post['Category']['title'] ?></td>
					<td><?= $post['User']['username'] ?></td>
					<td><?= $post['Post']['created'] ?></td>
					<td><?= $post['Post']['updated'] ?></td>
					<td>
						<div class="dropdown">
						 	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?= __('Action') ?> <span class="caret"></span></button>				
							<ul class="dropdown-menu" role="menu">
								<li><?= $this->Html->link(__('Modifier'),array('action' => 'edit', $post['Post']['id'])); ?></li>
								<li>				
									<?= $this->Form->postLink(
										__('Supprimer'),
										array('action' => 'delete', $post['Post']['id']),
										array('confirm' => 'Etes-vous sur ?')); 
									?>
								</li>
							</ul>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
