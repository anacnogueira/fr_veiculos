<!-- File: /app/View/Categories/admin_add.ctp -->
<h2>Categorias &raquo; Cadastrar</h2>
<div class="categories form">
<?php echo $this->Form->create('Category');?>
<p>Os campos com * são obrigatórios</p>   
 <?php echo $this->Form->input('name',array('label'=>'Nome:','maxlength'=>'50'))."\n"; ?>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Categorias', true), array('action' => 'index'));?></li>
	</ul>
</div>