<div class="atividades form">
<?php echo $this->Form->create('Atividade'); ?>
	<fieldset>
		<legend><?php echo __('Edit Atividade'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('ano');
		echo $this->Form->input('caminho');
		echo $this->Form->input('materia_id');
		echo $this->Form->input('Tag');
		echo $this->Form->input('Usuario');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Atividade.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Atividade.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Atividades'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Materias'), array('controller' => 'materias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materia'), array('controller' => 'materias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Favoritas'), array('controller' => 'favoritas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Favorita'), array('controller' => 'favoritas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
