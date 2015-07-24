<h1>Editer une catégorie</h1>
<div class="col-xs-6">
    <div class="form-group">
        <p class="text-right">
            <?= $this->Html->Link('Retour',
                array('action' => 'index'),
                array('class' => 'btn btn-danger')) 
            ?>      
        </p>
    </div>
	<?= $this->Form->create('Category'); ?>
		<?= $this->Form->input('title',array(
				'label' => 'Titre de la catégorie',
				'class' => 'form-control',
				'div' => array(
					'class' => 'form-group'
				)				
			));
		?>
		<?= $this->Form->input('slug',array(
				'label' => 'Slug',
				'class' => 'form-control',
				'div' => array(
					'class' => 'form-group'
				)				
			));
		?>
		<?= $this->Form->end(array(
				'label' => 'Enregistrer',
				'class' => 'btn btn-primary'
			));
		?>
</div>