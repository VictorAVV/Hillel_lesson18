<?php

namespace Model;

class Model
{
	private const STORAGEDIR = './storage/';
	private const DATEFORMAT = 'Y-m-d H:i:s';

	public function getArticles() : array
	{	
		$fileList = $this->getFileListInStorage();
		usort($fileList, function($a, $b) 
			{ 
				return filemtime($a) - filemtime($b); 
			});
		$articles = array();
		foreach ($fileList as $file) {
			$articles[] = json_decode(file_get_contents($file), true);
		}

		return $articles;
	}

	public function getArticle($id)
	{
		$fileName = $this->articleExists($id);
		if ($fileName) {
			return json_decode(file_get_contents($fileName), true);
		} else {
			return false;
		}
	}

	public function getLastArticleId()
	{
		$fileList = $this->getFileListInStorage();
		if (empty($fileList)) {
			return 1;
		}
		$idList = array();
		foreach ($fileList as $file) {
			$idList[] = preg_replace('/(.*\/)*(\d+)\.txt$/', '$2', $file);
		}

		return max($idList);
	}

	public function saveArticle($article)
	{
		//лучше сохранять в БД, но пока что сохраним статью в текстовом файле
		//еще нужно добавить сохранение даты создания/редактирования статьи
		if (!isset($article['id'])) {
			$lastArticleId = (int) $this->getLastArticleId();
			$article['id'] = ++$lastArticleId;
		} 
		$article['date'] = date(self::DATEFORMAT);
		$file_name = self::STORAGEDIR . $article['id'] . '.txt';
		file_put_contents($file_name, json_encode($article)); 

		return $article['id'];
	}

	public function deleteArticle($id)
	{	
		$fileName = $this->articleExists($id);
		if ($fileName) {
			$article['title'] = ($this->getArticle($id))['title'];
			unlink($fileName);
			return $article;
		} else {
			return false;
		}
	}

	public function articleExists($id)
	{	
		$fileName = self::STORAGEDIR . $id . '.txt';
		if (file_exists($fileName)) {
			return $fileName;
		} else {
			return false;
		}
	}

	private function getFileListInStorage()
	{
		return glob(self::STORAGEDIR . "*.txt");
	}
}
