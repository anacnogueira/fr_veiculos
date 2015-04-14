<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'index'));
  Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
  // Veiculos
  Router::connect('/motos', array('controller' => 'vehicles', 'action' => 'index','type'=>'Moto'));
  Router::connect('/carros', array('controller' => 'vehicles', 'action' => 'index','type' => 'Carro'));
  Router::connect('/resultado-busca', array('controller' => 'vehicles', 'action' => 'index'));
  Router::connect(
    '/Moto/:id/*',
    array('controller'=>'vehicles','action' => 'view'),
    array('id' => '[0-9]+')
  );

  Router::connect(
    '/Carro/:id/*',
    array('controller'=>'vehicles','action' => 'view'),
    array('id' => '[0-9]+')
  );

   Router::connect('/veiculo-formulario-enviado',array('controller'=>'vehicles','action' => 'sent'));

  // Venda seu veiculo
  Router::connect('/venda-seu-veiculo', array('controller' => 'pages', 'action' => 'venda_seu_veiculo'));
   Router::connect('/venda-seu-veiculo-formulario-enviado',array('controller'=>'pages','action' => 'sent'));
  // Serviços
  Router::connect('/servicos', array('controller' => 'pages', 'action' => 'servicos'));
  //Noticias
  Router::connect('/noticias', array('controller' => 'news', 'action' => 'index'));
  Router::connect(
    '/noticia/:id/*',
    array('controller'=>'news','action' => 'view'),
    array('id' => '[0-9]+')
  );

  //Rota para login
  Router::connect('/admin', array('controller' => 'users', 'action' => 'login'));
  Router::connect('/admin/', array('controller' => 'users', 'action' => 'login'));
  Router::connect('/admin/login', array('controller' => 'users', 'action' => 'login'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
