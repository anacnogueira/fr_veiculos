<!-- File: /app/View/ItemValues/admin_add.ctp -->  
<h2>Opções Items &raquo; Cadastrar</h2>
<div class="item_values form">
<?php echo $this->Form->create('ItemValue');?>
<p>Os campos com * são obrigatórios</p>
 <?php echo $this->Form->input('item_id',array('label'=>'Opcional:'))."\n"; ?>
 <?php echo $this->Form->input('name',array('label'=>'Nome:','maxlength'=>'50'))."\n"; ?>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Opcionais Valores', true), array('action' => 'index'));?></li>
	</ul>
</div>