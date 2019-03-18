<?php

namespace Controller;

use Model\Model;

class CommonController extends AbstractController
{
	public function index()
	{
		$this->render('view/index.php');
	}

	public function aboutUs()
	{
		$this->render('view/aboutUs.php');
	}

	public function pageNotFound()
	{
		http_response_code(404);
		$this->render('view/404.php');
	}
}