<!-- File: /app/View/News/admin_edit.ctp -->
<?php
$script = $this->Html->script(array('jquery.maskedinput','mascara_campo'))."\n";
  echo $this->addScript('scripts_for_layout',$script);
?>
<?php echo $this->element('tiny_mce'); ?>
<h2>Editar Notícia</h2>
<div class="news form">
<?php echo $this->Form->create('News',array('type'=>'file'));?>
<p>Os campos com * são obrigatórios</p>
<?php echo $this->Form->input('title',array('label'=>'Título*:'))."\n"; ?>
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
   <?php if(!empty($this->data['News']['image'])): ?>
   <div class="foto_atual">
    <label>Foto atual:</label>
    <?php echo $this->Html->image('news/'.$this->data['News']['image'],array('alt'=>$this->data['News']['title'])); ?>
   </div>
   <?php endif; ?>
    <p><strong>Instruções para inserção de imagem:</strong></p>
     <ul>
     <li>Extensões permitidas: gif,jpg e png</li>
    <li>Cada imagem não deve ultrapassar <?php echo Configure::read('File.max_file_size_txt'); ?></li>
   </ul>
 <?php echo $this->Form->hidden('id');?>
 <?php echo $this->Form->hidden('foto_old');?>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Excluir', true), array('action' => 'admin_delete', $this->Form->value('News.id')), null, sprintf('Tem certeza que deseja excluir o registro  # %s?', $this->Form->value('News.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Notícias', true), array('action' => 'admin_index'));?></li>
	</ul>
</div>

