<!-- File: /app/View/Users/admin_alterar_dados.ctp -->
<?php
  $script = $this->Html->script(array('jquery.maskedinput.js','mascara_campo.js'))."\n";
  echo $this->addScript('scripts_for_layout',$script);
?>
<div class="user form">
 <h2>Alterar dados usuário</h2>
 <?php echo $this->Form->create('User');?>
<p>Os campos com * são obrigatórios</p>
	<fieldset>
 <legend>Informações Pessoais</legend>
 <?php echo $this->Form->input('name',array(
  'label'=>'Nome:*',
  'maxlength'=>'50',
  'required' => false))."\n"; ?>
<?php echo $this->Form->input('cpf',array(
  'label'=>'CPF:*',
  'class'=>'cpf',
  'maxlength'=>'14',
  'required'=>false,
  'after'=>"<span class='instrucoes'> 999.999.999-99</span>"))."\n"; ?>
</fieldset>
<br />
<fieldset>
  <legend>Informações para contato</legend>
  <?php echo $this->Form->input('telefone',array(
    'label'=>'Telefone:',
    'class'=>'telefone',
    'maxlength'=>'13',
    'required'=>false,
    'after'=>"<span class='instrucoes'> (99)9999-9999</span>"))."\n"; ?>
<?php echo $this->Form->input('celular',array(
  'label'=>'Celular:',
  'class'=>'telefone',
  'required'=>false,
  'maxlength'=>'13','after'=>"<span class='instrucoes'> (99)9999-9999</span>"))."\n"; ?>
</fieldset>
<br />

<fieldset>
  <legend>Informações de acesso</legend>
  <?php echo $this->Form->input('email',array(
  'label'=>'Email:*',
  'maxlength'=>'50',
  'required'=>false)); ?>
</fieldset>
<?php echo $this->Form->end('Enviar');?>
</div>