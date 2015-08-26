<?php echo $this->element('sidebar'); ?>
<div class="col-md-6">
	<h2><?php echo __('Escolha uma matéria:'); ?></h2>
	<ul class="list-unstyled">
	<?php foreach ($materias as $materia): ?>
	<h4><li>
		<?php
			echo $this->Html->link($materia['Materia']['nome'],
				array('controller' => 'atividades', 'action' => 'listaMateria',
					$materia['Materia']['id'], $materia['Materia']['nome']));
		?>
	</li></h4>
	<?php endforeach; ?>
	</ul>
</div>

</div>
</div>
</div>
