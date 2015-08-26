<?php echo $this->element('sidebar'); ?>
<?php //debug($atividade); die() ;?>
<div class="col-md-6">
	<h2><?php echo __('Atividade'); ?></h2>
	<?php
		//TODO: encontrar todos os formatos suportados pelo viewerjs
		$suporteViewerJs = array('pdf', 'odt', 'odp');
		$ehImg = false;
		$a = $atividade['Atividade'];
		$nomeArq = $a['arquivo'].'.'.$a['ext'];

		if(!in_array($atividade['Atividade']['ext'], $suporteViewerJs))
			$ehImg=true;

		if(!$ehImg) {
			$url  = $this->webroot;
			$url .= 'ViewerJS/#../img/';
			$url .= $a['arquivo'].'.';
			$url .= $a['ext'];
			$mostraAtividade = '<iframe src="' . $url . '" width="450" height="600"';
			$mostraAtividade .= 'allowfullscreen webkitallowfullscreen></iframe>';
		} else {
			$url  = $this->webroot.'img/';
			$url .= $nomeArq;
			$mostraAtividade = '<img src="'. $url .'">';
		}
		echo $mostraAtividade;
	?>
</div>
	<div class="col-md-3">
		<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd><?php echo h($a['id']); ?></dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd><?php echo h($a['nome']); ?></dd>
		<dt><?php echo __('Ano'); ?></dt>
		<dd>
			<?php echo h($a['ano']); ?></dd>
		<dt><?php echo __('Caminho'); ?></dt>
		<dd>
			<?php echo h($a['arquivo']); ?></dd>
		<dt><?php echo __('Materia'); ?></dt>
		<?php $m = $atividade['Materia']; ?>
		<dd><?php echo $this->Html->link($m['nome'],
					array('action' => 'listaMateria',
								$m['id'], $m['nome'])); ?></dd>

		<dt><?php echo __('Tags'); ?></dt>
		<dd><?php foreach ($atividade['Tag'] as $tag):?>
			<?php echo $this->Html->link($tag['nome'], array('controller' => 'atividades', 'action' => 'searchTag', $tag['id'])); ?>
		<?php endforeach;?></dd>
	</dl>
	<p><?php
		echo $this->Html->link('Download',
			array('action' => 'sendfile', $nomeArq), array('download'=>$nomeArq)); ?></p>
	
	<p><?php echo $this->Html->link('Marcar como Favorita', array('action' => 'favoritar', $a['id'])); ?></p>
	</div>

</div>
</div>
</div>
