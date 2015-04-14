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
 * @package       Cake.View.Layouts.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
 $url = Configure::read('Site.url');

?>
<?php echo $this->Html->docType('xhtml-strict'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo Configure::read('Site.name') ?> - Admin</title>
  <?php echo $this->Html->charset('UTF-8'); ?>
	<style type='text/css'>
    html, body, div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, code, del, em, font, img, small, strike, strong, dl, dt, dd, ol, ul, li, fieldset, form, label, table, caption, tbody, tfoot, thead, tr, th, td {
	    margin: 0;
	    padding: 0;
	    border: 0;
	    outline: 0;
	    font-size: 100%;
	    vertical-align: baseline;
	    background: transparent;
    }

    /* TAGS BÁSICAS */
body{
  background-color: #fff;
  font-family: verdana;
  font-size: 12px;
}
p{ padding: 5px;  }
li { list-style-type: none; }

h2 {
  font-size: 24px;
  color: #933;
  font-weight: normal;
  margin-bottom: 10px;
}

table{
  background: #fff;
	border:1px solid #ccc;
	border-right:0;
	clear: both;
	color: #333;
	margin-bottom: 10px;
	width: 100%;

}
th {
	background: #f2f2f2;
	border:1px solid #bbb;
	border-top: 1px solid #fff;
	border-left: 1px solid #fff;
	text-align: center;
  color:#933;
}
th a {
	background:#f2f2f2;
  color:#933;
	display: block;
	padding: 2px 4px;
	text-decoration: none;
}
th a:hover {
	background: #ccc;
	color: #333;
	text-decoration: none;
}
table tr td{
	background: #fff;
	border-right: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
	padding: 4px;
	text-align: center;
	vertical-align: top;
}
table tr td:last_child { border-bottom: none;}

td.actions {
	text-align: center;
	white-space: nowrap;
}
td.actions a {
	margin: 0px 6px;
  text-decoration: none;
  color: #003;
}

table.none, table.none tr td{
  border:  none;
  margin: 0px;
  padding: 5px;
  width: auto;
  text-align: left;
  vertical-align:bottom;
}


div#top div.logo_sipac{
 float: left;
 margin: 5px;

}
div#top div.logo_empresa{
 float: right;
 margin: 5px;
}
div#top div.logo_empresa span{
 font-size: 10px;
 position: absolute;
 top: 30px;
 right: 250px;
}

#footer .left{ float: left; margin-top: 40px;  }
#footer .right{ float: right; }

.imagem_pri{
  position:relative;
  margin-left: -10px;
  margin-bottom: 20px;
}

/* MAIN CONTENT CONTAINER */
div#main_content_container  {
 padding: 10px;
 clear: both;
 min-height: 350px;
 height:auto !important;
 height: 350px;
}

  </style>

</head>
<body>
  <div id="container">
    <div id="content">
      <div id="top">
        <div class='logo_sipac'>
          <?php echo $this->Html->image($url . '/teste/img/sipac.gif',array('alt'=>'SIPAC')); ?>
        </div>
        <div class='logo_empresa'>
          <span>Licenciado para</span>
          <?php echo $this->Html->image($url . '/teste/img/' . Configure::read('Site.logo'),array('alt'=>Configure::read('Site.name'))); ?>
        </div>
      </div>
     
      <div id="main_content_container">
       <?php
          echo $this->fetch('content');

       ?>
      </div>
      <div id="empty">&nbsp;</div>

	  </div>
	</div>
</body>
</html>

