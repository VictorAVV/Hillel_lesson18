<?php

namespace Controller;

use Model\Model;

class BlogController extends AbstractController
{
	public function blog()
	{
		$sortBy = filter_input(INPUT_GET, 'sortby');
		$sortOrder = filter_input(INPUT_GET, 'sortorder');

		$model = $this->getModel(Model::class);
		$articles = $model->getArticles($sortBy, $sortOrder);
		$this->render('view/blog.php', $articles);
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
			if (isset($article['id']) && !$model->getArticle($article['id'])) {
				return $this->render('view/404.php');
			}
			//возвращаем id статьи
			$article['id'] = $model->saveArticle($article);
			$this->render('view/saveArticle.php', $article);
		}
	}
	
	public function deleteArticle()
	{	
		//нужно сделать запрос на подтверждение удаления статьи
		$id = filter_input(INPUT_GET, 'id');
		$model = $this->getModel(Model::class);
		if ($article = $model->getArticle($id)) {
			$model->deleteArticle($id);
			$this->render('view/articleDeleted.php', $article);
		} else {
			$this->render('view/articleNotFound.php');
		}
	}
	
	public function editArticle()
	{	
		$id = filter_input(INPUT_GET, 'id');
		$model = $this->getModel(Model::class);
		if ($article = $model->getArticle($id)) {
			$this->render('view/editArticle.php', $article);
		} else {
			$this->render('view/articleNotFound.php');
		}
	}
}
