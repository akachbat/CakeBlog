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
			<th><?= __('Slug') ?></th>
			<th><?= __('Action') ?></th>
		</thead>
		<tbody>
			<?php foreach ($cats as $cat): ?>
				<tr>
					<td><?= $cat['Category']['title'] ?></td>
					<td><?= $cat['Category']['slug'] ?></td>
					<td>
						<div class="dropdown">
						 	<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?= __('Action') ?> <span class="caret"></span></button>				
							<ul class="dropdown-menu" role="menu">					
								<li><?= $this->Html->link(__('Modifier'),array('action' => 'edit', $cat['Category']['id'])) ?></li>
								<li>		
									<?= $this->Form->postLink(
											__('Supprimer'),
											array('action' => 'delete', $cat['Category']['id']),
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
