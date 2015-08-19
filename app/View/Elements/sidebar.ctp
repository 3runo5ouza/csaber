<div class="container-fluid">
	<div class="row">
		<nav class="col-md-2" id="menu-lateral">
			<ul class="nav nav-pills nav-stacked">
				<li><?php echo $this->Html->link(__('Nova Atividade'), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('Minhas Atividades'), array('action' => 'minhasAtividades')); ?></li>
				<li><?php echo $this->Html->link(__('Ver Atividades'), array('action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Listar Matérias'), array('controller' => 'materias', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Listar Favoritas'), array('controller' => 'favoritas', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Listar Tags'), array('controller' => 'tags', 'action' => 'index')); ?></li>
			</ul>
		</nav>