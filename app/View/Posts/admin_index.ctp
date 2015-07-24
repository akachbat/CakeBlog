<h1>Articles</h1>

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
			<th>Titre</th>
			<th>Catégorie</th>
			<th>Auteur</th>
			<th>Date création</th>
			<th>Date mise à jour</th>
			<th>Action</th>
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
						 	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>				
							<ul class="dropdown-menu" role="menu">
								<li><?= $this->Html->link('Modifier',array('action' => 'edit', $post['Post']['id'])); ?></li>
								<li>				
									<?= $this->Form->postLink('Supprimer',
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
