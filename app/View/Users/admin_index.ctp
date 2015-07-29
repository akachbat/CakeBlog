<h1><?= __('Utilisateurs') ?></h1>

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
			<th><?= __('Login') ?></th>
			<th><?= __('Role') ?></th>
			<th><?= __('Date création') ?></th>
			<th><?= __('Action') ?></th>
		</thead>
		<tbody>
			<?php foreach ($users as $user): ?>
				<tr>
					<td><?= $user['User']['username'] ?></td>
					<td><?= $user['User']['role'] ?></td>
					<td><?= $user['User']['created'] ?></td>
					<td>
						<div class="dropdown">
						 	<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?= __('Action') ?> <span class="caret"></span></button>				
							<ul class="dropdown-menu" role="menu">
								<li><?= $this->Html->link(__('Modifier'),array('action' => 'edit', $user['User']['id'])) ?></li>
								<li>					
								<?= $this->Form->postLink(
										__('Supprimer'),
										array('action' => 'delete', $user['User']['id']),
										array('confirm' => __('Etes-vous sur ?') )
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
