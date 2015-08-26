<div class="users form">
<?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend><?php echo __('Criar nova conta'); ?></legend>
        <?php echo $this->Form->input('nome');
        echo $this->Form->input('senha', array('type'=>'password'));
        echo $this->Form->input('papel', array(
            'options' => array('admin' => 'Admin', 'autor' => 'Autor')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>