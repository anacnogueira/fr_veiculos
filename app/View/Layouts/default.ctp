<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$description = __d('desc', '::Fr Veículos::');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
			<?php echo $title_for_layout; ?>
      <?php echo $description; ?>

	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('frontend','form'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
    echo $this->Html->script(array('jquery','jquery.selects','get_modelos'));

    echo '<script type="text/javascript">'."\n";
    echo 'var URL = "'.$this->Html->url('/',true).'";'."\n";
    echo '</script>'."\n";

   echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
    <?php echo $this->element('top'); ?>
    <?php echo $this->element('menu'); ?>
    <?php echo $this->element('search'); ?>
		<div id="content">

       <?php echo $this->fetch('content');   ?>
      <?//php echo $this->element('sql_dump');   ?>
		</div>
		<?php echo $this->element('footer'); ?>
	</div>
</body>
</html>
