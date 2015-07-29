<div class="col-xs-6 col-xs-offset-3">
    <h2><?= __('Connexion') ?></h2>
    <?= $this->Form->create('User', array(
            'inputDefaults' => array(
                'div' => array('class' => 'form-group'),
                'class' => 'form-control'
            )
        )); 
    ?>
    <?= $this->Session->flash(); ?>
    <?= $this->Form->input('username', array(
            'label' => __('Login')
        ));
    ?>
    <?= $this->Form->input('password', array(
            'label' => __('Mot de passe')
        )); 
    ?>
    <?= $this->Form->end(array(
        'label' => __('Se connecter'),
        'class' => 'btn btn-primary'
        ));
    ?>
</div>