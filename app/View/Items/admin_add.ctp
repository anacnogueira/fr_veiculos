<!-- File: /app/View/Items/admin_add.ctp -->
<h2>Items &raquo; Cadastrar</h2>
<div class="items form">
<?php echo $this->Form->create('Item');?>
<p>Os campos com * são obrigatórios</p>   
 <?php echo $this->Form->input('name',array('label'=>'Nome:','maxlength'=>'50'))."\n"; ?>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Opcionais', true), array('action' => 'index'));?></li>
	</ul>
</div>