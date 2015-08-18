<?php echo $this->element('sidebar'); ?>
		<div class="col-md-5">
			<?php $options = array('class'=>'form-control','div'=>array('class'=>'form-group')); ?>
			<?php echo $this->Form->create('Atividade', array('type'=>'file')); ?>
				<h2><?php echo __('Adicionar Atividade'); ?></h2>
				<?php echo $this->Form->input('nome', $options); ?>
				<?php echo $this->Form->input('ano', $options); ?>
				<?php echo $this->Form->input('arquivo', array('type'=>'file','div'=>array('class'=>'control-form'))); ?>

				<?php echo $this->Form->input('materia_id', $options); ?>
				<?php echo $this->Form->input('tag', array('type'=>'text', 'class'=>'form-control','div'=>array('class'=>'form-group'))); ?>
				<?php echo $this->Form->submit("Salvar Arquivo", array('class' => 'btn btn-primary'));?>
				<?php echo $this->Form->end()?>
	</div>
	</div>
</div>
