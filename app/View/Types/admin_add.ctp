<!-- File: /app/View/Types/admin_add.ctp -->  
<h2>Tipos &raquo; Cadastrar</h2>
<div class="types form">
<?php echo $this->Form->create('Type');?>
<p>Os campos com * são obrigatórios</p>   
 <?php echo $this->Form->input('name',array('label'=>'Nome:','maxlength'=>'50'))."\n"; ?>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Tipos', true), array('action' => 'index'));?></li>
	</ul>
</div>