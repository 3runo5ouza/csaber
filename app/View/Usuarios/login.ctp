	<?php echo $this->Session->flash('auth'); ?>
	<div class="row">
		<div class="col-md-3 col-md-offset-1">
			<?php echo $this->Form->create('Usuario', array(
				'action' => 'login',
				'inputDefaults' => array(
					'div' => array('class' => 'form-group'),
					'class' => 'form-control'
				))); ?>
		    <?php echo $this->Form->input('nome'); ?>
		    <?php echo $this->Form->input('senha', array('type'=>'password')); ?>
			<?php echo $this->Form->end(array('label' => 'Entrar','class' => 'btn btn-primary')); ?>
		</div>

		<div class="col-md-3 col-md-offset-4">
			<?php echo $this->Form->create('Registro', array(
				'url' => array('controller' => 'usuarios', 'action' => 'add'),
				'inputDefaults' => array(
					'div' => array('class' => 'form-group'),
					'class' => 'form-control'
				))); ?>
		    <?php echo $this->Form->input('nome'); ?>
		    <?php echo $this->Form->input('senha', array('type'=>'password')); ?>
		    <?php echo $this->Form->input('confirmacao_senha', array('type'=>'password', 'label'=>'Repita sua senha')); ?>
			<?php echo $this->Form->end(array('label' => 'Registrar-se','class' => 'btn btn-primary')); ?>
		</div>

	</div>