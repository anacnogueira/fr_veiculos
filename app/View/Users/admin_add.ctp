<!-- File: /app/View/Users/admin_add.ctp -->  
<?php
  $script = $this->Html->script(array('jquery.maskedinput.js','mascara_campo.js'))."\n";
  echo $this->addScript('scripts_for_layout',$script);
?>
<h2>Adicionar Usuário</h2>
<div class="users form">
<?php echo $this->Form->create('User');?>
<p>Os campos com * são obrigatórios</p>
	<fieldset>
 <legend>Informações Pessoais</legend>
 <?php echo $this->Form->input('name',array('label'=>'Nome*:','maxlength'=>'50'))."\n"; ?>
<?php echo $this->Form->input('cpf',array('label'=>'CPF*:','class'=>'cpf','maxlength'=>'14',
'after'=>"<span class='instrucoes'> 999.999.999-99</span>"))."\n"; ?>
</fieldset>
<br />
<fieldset>
  <legend>Informações para contato</legend>
  <?php echo $this->Form->input('telefone',array('label'=>'Telefone:','class'=>'telefone',
 'maxlength'=>'13','after'=>"<span class='instrucoes'> (99)9999-9999</span>"))."\n"; ?>
<?php echo $this->Form->input('celular',array('label'=>'Celular:','class'=>'telefone',
'maxlength'=>'13','after'=>"<span class='instrucoes'> (99)9999-9999</span>"))."\n"; ?>
</fieldset>
<br />

<fieldset>
  <legend>Informações de acesso</legend>
  <?php echo $this->Form->input('email',array('label'=>'Email*:','maxlength'=>'50')); ?>
  <?php echo $this->Form->input('password',array('label'=>'Senha*:','maxlength'=>'15')); ?>
  <span class='instrucoes' style='margin-left: 120px'>Sua senha deve conter entre 6 e 15 caracteres</span>
</fieldset>
<fieldset>
  <legend>Informações Adicionais</legend>

  <label>Ativo:*</label>
  <?php echo $this->Form->radio('ativo',array(
   'N'=>'Não',
   'S'=>'Sim'),array('legend'=>false,'label'=>false)); ?>
   <?php echo $this->Form->error('ativo'); ?>

</fieldset>

<?php echo $this->Form->end('Enviar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Usuários', true), array('action' => 'admin_index'));?></li>
	</ul>
</div>
