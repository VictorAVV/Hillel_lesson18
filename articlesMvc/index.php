<?php

require 'config.php';
require '.\app\Router.php';

$page = filter_input(INPUT_GET, 'page');
Router::getRoute($page);
