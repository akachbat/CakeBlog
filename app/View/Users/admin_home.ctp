<h1 class="text-center text-primary"><?= __('Bonjour') ?>&nbsp;<i><?= $username ?></i>,</h1>

<h2><?= __('Configuration génerale') ?></h2><hr>

<div class="col-xs-6">

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

<?= $this->Form->input('setting.blog_language',
	array(
		'label' => 'Language',
		'options' => array(Setting::$availableLanguages),
	));
?>

<?= $this->Form->input('setting.blog_contact',array(
		'label' => 'Email de contact',
		'type' => 'email',
		'required' => 'true'
	)); 
?>

<?= $this->Form->end(array(
    'label' => __('Enregistrer'),
    'class' => 'btn btn-primary'
    ));
?> 

</div>