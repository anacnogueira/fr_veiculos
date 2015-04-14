<div class="menu_login">
 <ul>
  <li>Olá <?php echo $this->Session->read('user.name'); ?></li>
  <li>&nbsp;|&nbsp;</li>
  <li><?php echo $this->Html->link('Alterar Dados',array('controller'=>'Users','action'=>'alterar_dados','admin'=>true)); ?></li>
  <li>&nbsp;|&nbsp;</li>
  <li><?php echo $this->Html->link('Alterar Senha',array('controller'=>'Users','action'=>'alterar_senha','admin'=>true)); ?></li>
  <li>&nbsp;|&nbsp;</li>
  <li><?php echo $this->Html->link('Sair',array('controller'=>'Users','action'=>'logout')); ?></li>
 </ul>
</div>
