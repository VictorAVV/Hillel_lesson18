<?php

namespace Controller;

use Model\Model;

class BlogController extends AbstractController
{
	public function blog()
	{
		$model = $this->getModel(Model::class);
		$articles = $model->getArticles();
		$this->render('view/blog.php', compact('articles'));
	}

	public function article()
	{
		$id = filter_input(INPUT_GET, 'id');
		$model = $this->getModel(Model::class);
		$article = $model->getArticle($id);

		if (!$article) {
			return $this->render('view/404.php');
		}

		$this->render('view/article.php', compact('article'));
	}

	public function createPage()
	{
		$this->render('view/createArticle.php');
	}
	
	public function saveArticle()
	{	
		$article['title'] = filter_input(INPUT_POST, 'titleArticle');
		$article['text'] = filter_input(INPUT_POST, 'textArticle');
		$article['id'] = filter_input(INPUT_POST, 'id');

		if (!isset($article['title']) || !isset($article['text']) || empty($article['title']) || empty($article['text'])) {
			$this->render('view/createArticle.php');
		} else {
			$model = $this->getModel(Model::class);
			//возвращаем id статьи
			$article['id'] = $model->saveArticle($article);
			//нужно добавить проверку вводимых данных.
			//если не получилось сохранить, то надо что-то вывести.
			$this->render('view/saveArticle.php', $article);
		}
	}
	
	public function deleteArticle()
	{	
		//нужно сделать запрос на подтверждение удаления статьи
		$id = filter_input(INPUT_GET, 'id');
		$model = $this->getModel(Model::class);
		$result = $model->deleteArticle($id);
		if ($result) {
			$this->render('view/articleDeleted.php', $result);
		} else {
			$this->render('view/articleNotFound.php');
		}
	}
	
	public function editArticle()
	{	
		$id = filter_input(INPUT_GET, 'id');
		$model = $this->getModel(Model::class);
		if ($model->articleExists($id)) {
			$this->render('view/editArticle.php', $model->getArticle($id));
		} else {
			$this->render('view/articleNotFound.php');
		}
	}
}
