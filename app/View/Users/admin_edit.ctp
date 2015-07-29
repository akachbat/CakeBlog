<div class="row">
    <h2><?= __('Ajouter un utilisateur') ?></h2>

    <div class="col-xs-6">
        <div class="form-group">
            <p class="text-right">
                <?= $this->Html->Link(__('Retour'),
                    array('action' => 'index'),
                    array('class' => 'btn btn-danger')) 
                ?>      
            </p>
        </div>

        <?= $this->Form->create('User', array(
                'inputDefaults' => array(
                    'div' => array('class' => 'form-group'),
                    'class' => 'form-control',
                    'error' => array(
                        'class' => 'has-error',
                        'attributes' => array(
                            'wrap'=> 'span',
                            'class' => 'help-block'
                        )
                    )
                )
            )); 
        ?>
        <?= $this->Form->input('username', array(
        		'label' => __('Login')
        	));
        ?>
        <?= $this->Form->input('password', array(
        		'label' => __('Mot de passe')
        	)); 
        ?>
     	<?=  $this->Form->input('role', array(
         		'label' => __('Role'),
                'options' => array('admin' => 'Admin', 'user' => 'User')
            ));
    	?>
        <?= $this->Form->end(array(
            'label' => __('Enregistrer'),
            'class' => 'btn btn-primary'
            ));
        ?>    
    </div>
</div>