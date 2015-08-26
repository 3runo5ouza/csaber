<?php echo $this->element('sidebar'); ?>
<div class="col-md-6">
	<h2><?php echo __('Atividades'); ?></h2>
	<table class="table">
	<tr>
		<th>Nome</th>
		<th>Ano</th>
		<th>Matéria</th>
	</tr>
	<?php foreach ($atividades as $atividade): ?>
		<?php $a = $atividade['Atividade'] ?>
	
	<tr>
		<td><?php echo $this->Html->link($a['nome'], array('action' => 'view', $a['id'])); ?></td>
		<td><?php echo h($a['ano']).'º ano'; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(
					$materias[$a['materia_id']],
					array('controller' => 'atividades',
							'action' => 'listaMateria', $a['materia_id'], $materias[$a['materia_id']])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
</div>

</div>
</div>
</div>