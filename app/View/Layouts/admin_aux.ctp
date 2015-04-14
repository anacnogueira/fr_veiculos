<?php echo $this->Html->docType('xhtml-strict'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo Configure::read('Site.name') ?> - Admin - <?php echo $title_for_layout; ?></title>
  <?php echo $this->Html->charset('UTF-8'); ?>
	<?php echo $this->Html->css(array('backend'));?>
  <?php echo  $this->Html->script(array('jquery')); ?>
  <?php
    echo '<script type="text/javascript">'."\n";
    echo 'var URL = "'.$this->Html->url('/',true).'";'."\n";
    echo '</script>'."\n";
  ?>
  <?php echo $scripts_for_layout; ?>
</head>
<body>
  <div id="container">
    <div id="content">
      <div id="main_content_container_aux">
      <?php echo $this->Session->flash(); ?>
      <?php echo $content_for_layout;?>

      <?php echo $this->element('sql_dump'); ?>
      </div>
      <div id="empty">&nbsp;</div> 
	  </div>
	</div>
</body>
</html>