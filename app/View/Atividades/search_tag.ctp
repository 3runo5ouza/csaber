<div class="container">
	<h2><?php echo __('Atividades com a Tag "'.$tag.'"'); ?></h2>
	<table class="table">
	<tr>
		<th>ID</th>
		<th>Nome</th>
		<th>Ano</th>
		<th>Arquivo</th>
		<th>Matéria</th>
		<th>Ações</th>
	</tr>
	<?php foreach ($atividades as $a): ?>
	
	<tr>
		<td><?php echo h($a['Atividade']['id']); ?>&nbsp;</td>
		<td><?php echo h($a['Atividade']['nome']); ?>&nbsp;</td>
		<td><?php echo h($a['Atividade']['ano']); ?>&nbsp;</td>
		<td><?php echo h($a['Atividade']['arquivo']); ?>&nbsp;</td>
		<td>
		<?php 
			if(isset($a['Atividade']['materia_id'])){
				$idMateria = $a['Atividade']['materia_id'];
				echo $this->Html->link(
					$materias[$idMateria],
					array('controller' => 'materias',
							'action' => 'view', $idMateria));
			}
		?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $a['Atividade']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $a['Atividade']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $a['Atividade']['id']), array(), __('Are you sure you want to delete # %s?', $a['Atividade']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
</div>



<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Atividade'), array('action' => 'add')); ?></li>
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
