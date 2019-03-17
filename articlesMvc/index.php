<?php

require 'config.php';
require '.\app\Router.php';
/*require 'Model.php';
require 'AbstractController.php';
require 'CommonController.php';
require 'BlogController.php';
require 'Router.php';
*/

$page = filter_input(INPUT_GET, 'page');
Router::getRoute($page);
