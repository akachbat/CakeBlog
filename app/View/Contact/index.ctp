<?php $this->set('title_for_layout','Contact') ?>


<div class="row">
	<div class="jumbotron text-center bg-white">
        <h1><?= __('Contactez-nous') ?></h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
  	</div>	
</div>

<div class="row">
<div class="col-xs-8">
	<?= $this->Session->flash(); ?>

	<?= $this->Form->create('Contact'); ?>

	<div class="form-group">
		<div class="row">
			<div class="col-sm-6">
				<?= $this->Form->input('name',array(
						'label' => false,
						'placeholder' => 'Nom',
						'class' => 'form-control',
						'div' => array('class' => 'form-group')				
					));
				?>								
			</div>
			<div class="col-sm-6">
				<?= $this->Form->input('email',array(
						'label' => false,
						'placeholder' => 'Email',
						'class' => 'form-control',
						'div' => array('class' => 'form-group')				
					));
				?>					
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-xs-12">
				<?= $this->Form->input('message',array(
						'label' => false,
						'placeholder' => 'Message',
						'type' => 'textarea',
						'class' => 'form-control',
						'div' => array('class' => 'form-group')				
					));
				?>					
			</div>
		</div>
	</div>

	<?= $this->Form->end(array(
			'label' => __('Envoyer'),
			'class' => 'btn btn-primary',
			'div' => array(
				'class' => 'form-group'
			)
		));
	?> 					

</div>
</div>

<div class="row"></div>