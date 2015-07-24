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
			<th>Slug</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php foreach ($cats as $cat): ?>
				<tr>
					<td><?= $cat['Category']['title'] ?></td>
					<td><?= $cat['Category']['slug'] ?></td>
					<td>
						<div class="dropdown">
						 	<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>				
							<ul class="dropdown-menu" role="menu">					
								<li><?= $this->Html->link('Modifier',array('action' => 'edit', $cat['Category']['id'])) ?></li>
								<li>		
									<?= $this->Form->postLink(
											'Supprimer',
											array('action' => 'delete', $cat['Category']['id']),
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
