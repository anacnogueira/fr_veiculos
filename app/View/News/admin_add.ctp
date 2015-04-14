<!-- File: /app/View/News/admin_add.ctp -->
<?php
$script = $this->Html->script(array('jquery.maskedinput','mascara_campo'))."\n";
  echo $this->addScript('scripts_for_layout',$script);
?>
<?php echo $this->element('tiny_mce'); ?>
<h2>Adicionar Notícia</h2>
<div class="news form">
<?php echo $this->Form->create('News',array('type'=>'file'));?>
<p>Os campos com * são obrigatórios</p>
<?php echo $this->Form->input('title',array(
  'label'=>'Título*:',
   'required' => false  ))."\n"; ?>
<?php echo $this->Form->input('date_published',array(
  'label'=>'Data*:',
  'class'=>'data',
  'type'=>'text',
  'required' => false))."\n"; ?>
<?php
     echo '<div class="inline"><label for="content">Conteúdo*:</label></div>';
     echo '<div class="inline right">';
     echo  $this->Form->input('content',array('label'=>false,'type'=>'textarea','cols'=>'20','rows'=>'20'));
     echo '</div>';
  ?>
  <div style='clear:both'></div>

   <?php echo $this->Form->input('upload',array('type'=>'file','label'=>'Imagem*:'));?>
    <p><strong>Instruções para inserção de imagem:</strong></p>
     <ul>
     <li>Extensões permitidas: gif,jpg e png</li>
    <li>Cada imagem não deve ultrapassar <?php echo Configure::read('File.max_file_size_txt'); ?></li>
   </ul>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Notícias', true), array('action' => 'admin_index'));?></li>
	</ul>
</div>
