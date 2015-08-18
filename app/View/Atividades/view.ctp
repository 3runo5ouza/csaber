<?php echo $this->element('sidebar'); ?>
<?php //debug($atividade); die() ;?>
<div class="col-md-6">
	<h2><?php echo __('Atividade'); ?></h2>


		<?php
			//TODO: encontrar todos os formatos suportados pelo viewerjs
			$suporteViewerJs = array('pdf', 'odt', 'odp');
			$ehImg=false;
			if(!in_array($atividade['Atividade']['ext'], $suporteViewerJs))
				$ehImg=true;

			if(!$ehImg) {
				$iframeUrl =$this->webroot;
				$iframeUrl.='ViewerJS/#../img/';
				$iframeUrl.=$atividade['Atividade']['arquivo'].'.';
				$iframeUrl.=$atividade['Atividade']['ext'];
			} else {
				$iframeUrl =$this->webroot;
				$iframeUrl.='\/img/';
				$iframeUrl.=$atividade['Atividade']['arquivo'].'.';
				$iframeUrl.=$atividade['Atividade']['ext'];
			}
		?>
		<iframe src="<?php echo $iframeUrl; ?>"
			width='450' height='600'
			allowfullscreen
			webkitallowfullscreen>
		</iframe>
</div>
	<div class="col-md-3">
		<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd><?php echo h($atividade['Atividade']['id']); ?></dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd><?php echo h($atividade['Atividade']['nome']); ?></dd>
		<dt><?php echo __('Ano'); ?></dt>
		<dd>
			<?php echo h($atividade['Atividade']['ano']); ?></dd>
		<dt><?php echo __('Caminho'); ?></dt>
		<dd>
			<?php echo h($atividade['Atividade']['arquivo']); ?></dd>
		<dt><?php echo __('Materia'); ?></dt>
		<dd><?php echo $this->Html->link($atividade['Materia']['nome'], array('controller' => 'atividade', 'action' => 'view', $atividade['Materia']['id'])); ?></dd>

		<dt><?php echo __('Tags'); ?></dt>
		<dd><?php foreach ($atividade['Tag'] as $tag):?>
			<?php echo $this->Html->link($tag['nome'], array('controller' => 'atividades', 'action' => 'searchTag', $tag['id'])); ?>
		<?php endforeach;?></dd>

	</dl>
	<?php
			echo $this->Html->link('Download',
				array('controller' => 'atividades', 'action' => 'sendfile',
						$atividade['Atividade']['arquivo'], $atividade['Atividade']['ext']));
		?>
	</div>
</div>



</div>
</div>
