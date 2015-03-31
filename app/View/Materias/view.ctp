<div class="materias view">
<h2><?php echo __('Materia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($materia['Materia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($materia['Materia']['nome']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Materia'), array('action' => 'edit', $materia['Materia']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Materia'), array('action' => 'delete', $materia['Materia']['id']), array(), __('Are you sure you want to delete # %s?', $materia['Materia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Materias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materia'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Atividades'), array('controller' => 'atividades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Atividade'), array('controller' => 'atividades', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Atividades'); ?></h3>
	<?php if (!empty($materia['Atividade'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Ano'); ?></th>
		<th><?php echo __('Caminho'); ?></th>
		<th><?php echo __('Materia Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($materia['Atividade'] as $atividade): ?>
		<tr>
			<td><?php echo $atividade['id']; ?></td>
			<td><?php echo $atividade['nome']; ?></td>
			<td><?php echo $atividade['ano']; ?></td>
			<td><?php echo $atividade['caminho']; ?></td>
			<td><?php echo $atividade['materia_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'atividades', 'action' => 'view', $atividade['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'atividades', 'action' => 'edit', $atividade['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'atividades', 'action' => 'delete', $atividade['id']), array(), __('Are you sure you want to delete # %s?', $atividade['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Atividade'), array('controller' => 'atividades', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
