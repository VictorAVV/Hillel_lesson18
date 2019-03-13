<?php

require 'Model.php';
require 'AbstractController.php';
require 'CommonController.php';
require 'BlogController.php';
require 'RouteController.php';

$page = filter_input(INPUT_GET, 'page');
RouteController::getRoute($page);
