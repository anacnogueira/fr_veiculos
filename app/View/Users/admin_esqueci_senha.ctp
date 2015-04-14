<!-- File: /app/View/Users/admin_esqueci_senha.ctp -->  
<?php $script = $this->Html->css(array('login_admin'));  ?>
<?php echo $this->addScript('scripts_for_layout',$script); ?>
<div class='space'>&nbsp;</div>
<?php
if(isset($msg))
  echo '<p>'.$msg.'</p>';

?>
<div class="login form">
<h2>Esqueci a senha</h2>
<?php
 echo $this->Form->create('User')."\n";
 echo $this->Form->input('email',array('label'=>'E-mail:'))."\n";
 echo $this->Form->end('OK')."\n";
?>
</div>
<p><?php echo $this->Html->link('Login','/admin/login'); ?></p>