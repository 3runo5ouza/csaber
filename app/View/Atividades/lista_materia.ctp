<?php echo $this->element('sidebar'); ?>
<div class="col-md-6">
	<h2><?php echo __('Atividades de '.$materia); ?></h2>
	<table class="table">
	<tr>
		<th>Nome</th>
		<th>Ano</th>
		<th>Autor</th>
	</tr>
	<?php foreach ($atividades as $atividade): ?>
	<?php $a = $atividade['Atividade']; ?>
	<tr>
		<td>
		<?php echo $this->Html->link($a['nome'],
				array('action' => 'view', $a['id'])); ?>
		</td>
		<td><?php echo h($a['ano']); ?></td>
		<td><?php echo $usuarios[$a['usuario_id']] ?></td>
	</tr>
	<?php endforeach; ?>
	</table>
</div>

</div>
</div>
</div>
