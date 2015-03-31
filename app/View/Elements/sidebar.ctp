<div class="container-fluid">
	<div class="row">
		<nav class="col-md-2" id="menu-lateral">
			<ul class="nav nav-pills nav-stacked">
				<li><?php echo $this->Html->link(__('Listar Atividades'), array('action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Listar Matérias'), array('action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Nova Atividade'), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('Listar Matérias'), array('controller' => 'materias', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Nova Matéria'), array('controller' => 'materias', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('Listar Favoritas'), array('controller' => 'favoritas', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Nova Favorita'), array('controller' => 'favoritas', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('Listar Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Nova Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('Listar Usuários'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Novo Usuário'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
			</ul>
		</nav>