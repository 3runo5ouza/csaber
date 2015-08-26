<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend>
            <?php echo __('Entrar'); ?>
        </legend>
        <?php echo $this->Form->input('nome');
        echo $this->Form->input('senha', array('type'=>'password'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>