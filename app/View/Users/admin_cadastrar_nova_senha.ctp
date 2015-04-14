<!-- File: /app/View/Users/admin_cadastrar_nova_senha.ctp -->  
<?php $script = $html->css(array('login_admin')); ?>
<?php echo $this->addScript('scripts_for_layout',$script); ?>
<div class='space'>&nbsp;</div>
<?php if(isset($erro)): ?>
  <div id="flashMessage"><?php echo $erro; ?></div>
<?php else: ?>
<div class="login form">
  <h2>Cadastrar nova senha</h2>
  <?php
    echo $form->create('User')."\n";
    echo $form->input('email',array('label'=>'Seu e-mail:','value'=>$email,'readonly'=>'readonly'));
    echo $form->input('password',array('label'=>'Nova senha:'));
    echo $this->Form->input('password2', array('label' => 'Confirmar Nova Senha:', 'type' => 'password'))."\n";
    echo $this->Form->input('ativo', array('type' => 'hidden',"value" => "N"))."\n";
    echo $form->end('OK');
  ?>
</div>
<div class='tips'>
 <h3>Dicas para cadastrar uma senha mais segura:</h3>
 <ul>
  <li>Use números e letras</li>
  <li>Use caracteres especiais. Ex: @</li>
  <li>Misture letras maiúsculas e minúsculas</li>
  <li>Há distinção entre maísuculas e minúsculas
 Use de 6 a 15 caracteres mas não seu nome</li>
 </ul>
</div>
<?php endif; ?>