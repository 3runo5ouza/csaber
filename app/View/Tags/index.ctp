<?php echo $this->element('sidebar'); ?>
<div class="col-md-6">
	<h2><?php echo __('Escolha um marcador:'); ?></h2>
	<ul class="list-unstyled">
	<?php foreach ($tags as $tag): ?>
	<h4><li>
		<?php
			echo $this->Html->link($tag['Tag']['nome'],
				array('controller' => 'atividades', 'action' => 'listaTag',
					$tag['Tag']['id'], $tag['Tag']['nome']));
		?>
	</li></h4>
	<?php endforeach; ?>
	</ul>
</div>

</div>
</div>
</div>
