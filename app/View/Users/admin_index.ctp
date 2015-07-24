<h1>Utilisateurs</h1>

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
			<th>Username</th>
			<th>Role</th>
			<th>Date création</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php foreach ($users as $user): ?>
				<tr>
					<td><?= $user['User']['username'] ?></td>
					<td><?= $user['User']['role'] ?></td>
					<td><?= $user['User']['created'] ?></td>
					<td>
						<div class="dropdown">
						 	<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>				
							<ul class="dropdown-menu" role="menu">
								<li><?= $this->Html->link('Modifier',array('action' => 'edit', $user['User']['id'])) ?></li>
								<li>					
								<?= $this->Form->postLink(
										'Supprimer',
										array('action' => 'delete', $user['User']['id']),
										array('confirm' => 'Etes-vous sur ?')
									)
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
