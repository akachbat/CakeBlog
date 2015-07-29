<h1><?= __('Ajouter un Article') ?></h1>

<div class="form-group">
    <p class="text-right">
        <?= $this->Html->Link(__('Retour'),
            array('action' => 'index'),
            array('class' => 'btn btn-danger')) 
        ?>      
    </p>
</div>

<?= $this->Form->create('Post'); ?>

<div class="row">
	<div class="col-xs-6">
		<?= $this->Form->input('title',array(
				'label' => __('Titre'),
				'class' => 'form-control',
				'div' => array('class' => 'form-group')				
			));
		?>		
	</div>	
	<div class="col-xs-6">
		<?= $this->Form->input('slug',array(
				'label' => __('Slug'),
				'class' => 'form-control',
				'div' => array('class' => 'form-group')				
			));
		?>		
	</div>		
</div>

<div class="row">
	<div class="col-xs-6">
		<?= $this->Form->input('user_id',array(
				'label' => __('Auteur'),
				'class' => 'form-control',
				'empty' => '-- Choisissez --',
				'div' => array('class' => 'form-group')				
			));
		?>		
	</div>	
	<div class="col-xs-6">
		<?= $this->Form->input('category_id',array(
				'label' => __('Categorie '),
				'class' => 'form-control',
				'div' => array('class' => 'form-group')				
			));
		?>		
	</div>	
</div>

<div class="row">
	<div class="col-xs-12">
		<?= $this->Form->input('Tag.tags',array(
				'label' => __('Tags'),
				'class' => 'form-control',
				'type' => 'text',
				'div' => array('class' => 'form-group')				
			));
		?>
	</div>	
	<div class="col-xs-12">
		<label><?= __('Tags définis') ?> :</label> 
		<?= implode(' ', array_map(function($v){ 
				return sprintf('<span class="badge">%s</span>', $v);
			}, $tags))
		?>
	</div>			
</div>

<div class="row">
	<div class="col-xs-12">
		<?= $this->Form->input('content',array(
				'label' => __('Texte'),
				'type' => 'textarea',
				'class' => 'form-control',
				'div' => array('class' => 'form-group')				
			));
		?>		
	</div>	
</div>

<?= $this->Form->end(array(
		'label' => __('Enregistrer'),
		'class' => 'btn btn-primary',
		'div' => array(
			'class' => 'form-group'
		)
	));
?>