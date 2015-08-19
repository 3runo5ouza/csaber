<?php echo $this->element('sidebar'); ?>
<div class="col-md-6">
	<h2><?php echo __('Minhas Atividades'); ?></h2>
	<table class="table">
	<tr>
		<th>Nome</th>
		<th>Ano</th>
		<th>Matéria</th>
		<th>Ações</th>
	</tr>
	<?php foreach ($atividades as $atividade): ?>
	
	<tr>
		<td><?php echo h($atividade['Atividade']['nome']); ?>&nbsp;</td>
		<td><?php echo h($atividade['Atividade']['ano']).'º ano'; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($atividade['Materia']['nome'], array('controller' => 'materias', 'action' => 'view', $atividade['Materia']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $atividade['Atividade']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $atividade['Atividade']['id'])); ?>
			<?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $atividade['Atividade']['id']), array(), __('Are you sure you want to delete # %s?', $atividade['Atividade']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
</div>

</div>
</div>
</div>