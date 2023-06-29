<?php

namespace EpubLib;

use EpubLib\Router;

// Autoloading classes
require_once 'autoload.php';
require_once 'Router.php';

// Create a new instance of the Router
$router = new Router();

// Define your routes
$router->get('/web2/tugas_akhir/', 'HomeController@index');

// Dispatch the current request
$router->dispatch();

?>