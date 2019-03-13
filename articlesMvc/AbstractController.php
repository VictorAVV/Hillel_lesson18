<?php

abstract class AbstractController
{
	protected function getModel($model)
	{
		return new $model;
	}

	protected function render($template, $data = [])
	{
		extract($data);
		include $template;
	}
}