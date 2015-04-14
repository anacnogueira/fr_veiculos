<!-- File: /app/View/Menu_Admins/admin_edit.ctp -->  
<h2>Alterar Item de Menu</h2>
<div class="menu form">
<?php echo $this->Form->create('MenuAdmin');?>
<p>Os campos com * são obrigatórios</p>
<?php echo $this->Form->input('nome',array('label'=>'Nome*:','maxlength'=>'50'))."\n"; ?>
<?php echo $this->Form->input('descricao',array('label'=>'Descrição:','type'=>'textarea'))."\n"; ?>
<?php echo $this->Form->input('link',array('label'=>'Link*:'))."\n"; ?>
<?php echo $this->Form->input('order',array('label'=>'Ordem*:')); ?>
 <label>Ativo:*</label>
  <?php echo $this->Form->radio('ativo',array(
   'N'=>'Não',
   'S'=>'Sim'),array('legend'=>false,'label'=>false)); ?>
   <?php echo $this->Form->error('ativo'); ?>
<?php echo $this->Form->hidden('id'); ?>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Excluir', true), array('action' => 'admin_delete', $this->Form->value('MenuAdmin.id')), null, sprintf('Tem certeza que deseja excluir o registro  # %s?', $this->Form->value('MenuAdmin.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Items de Menu', true), array('action' => 'admin_index'));?></li>
	</ul>
</div>

