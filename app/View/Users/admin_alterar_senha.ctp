<!-- File: /app/View/Users/admin_alterar_senha.ctp -->
<div class="user form">
 <h2>Alterar senha usuário</h2>
 <?php echo $this->Form->create('User');?>
 <?php echo $this->Form->input('senhaAtual',array(
  'label'=>'Senha Atual:',
  'type'=>'password',
  'required' => false
  )); ?>
 <?php echo $this->Form->input('password1',array(
 'label'=>'Nova Senha:',
 'type'=>'password',
 'required'=>false)); ?>
 <?php echo $this->Form->input('password2',array(
  'label'=>'Redigite a nova senha:',
  'type'=>'password',
  'required' => false)); ?>
<?php echo $this->Form->end('Enviar');?>
</div>