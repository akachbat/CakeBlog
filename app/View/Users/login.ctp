<div class="col-xs-6 col-xs-offset-3">
    <h2>Connexion</h2>
    <?= $this->Form->create('User', array(
            'inputDefaults' => array(
                'div' => array('class' => 'form-group'),
                'class' => 'form-control'
            )
        )); 
    ?>
    <?= $this->Session->flash(); ?>
    <?= $this->Form->input('username', array(
            'label' => 'Username'
        ));
    ?>
    <?= $this->Form->input('password', array(
            'label' => 'Password'
        )); 
    ?>
    <?= $this->Form->end(array(
        'label' => 'se connecter',
        'class' => 'btn btn-primary'
        ));
    ?>
</div>