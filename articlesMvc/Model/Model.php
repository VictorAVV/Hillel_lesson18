<?php

namespace Model;

class Model extends AbstractModel
{
	public function getArticles($sortBy = 'datetime', $sortOrder = 'ASC') : array
	{	
		switch (strtolower($sortBy)) {
			case 'title': 
				$sortBy = 'title';
				break;
			case 'datetime':
			default:
				$sortBy = 'datetime';
		}

		if (strtoupper($sortOrder) !== 'DESC') {
			$sortOrder = 'ASC';
		}

		$sql="SELECT * FROM `articles` ORDER BY `$sortBy` $sortOrder";  
		$result = $this->getConnect()->query($sql);
		
		$articles = array();
		while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
			$articles[] = $res;
		}
		
		return compact('articles', 'sortBy', 'sortOrder');
	}

	public function getArticle($id)
	{
		$stmt = $this->getConnect()->prepare('SELECT * FROM `articles` WHERE id = :id');
		$stmt->bindValue(':id', $id, SQLITE3_INTEGER);
		$result = $stmt->execute();
		return $result->fetchArray(SQLITE3_ASSOC);
	}

	public function saveArticle($article)
	{	
		if (isset($article['id'])) {
			$sql = "UPDATE articles 
				SET 
					`title` = :title,
					`text` = :text,
					`datetime` = " . time() . "
				WHERE 
					`id` = :id 
			;";
		} else {
			$sql = "INSERT INTO articles (
					`title`,
					`text`,
					`datetime`
				) VALUES(
					:title, 
					:text, 
					" . time() . "
			);";
		}
		$stmt = $this->getConnect()->prepare($sql);
		if (isset($article['id'])) {
			$stmt->bindValue(':id', $article['id'], SQLITE3_TEXT);
		}
		$stmt->bindValue(':title', $article['title'], SQLITE3_TEXT);
		$stmt->bindValue(':text', $article['text'], SQLITE3_TEXT);
		$result = $stmt->execute();

		if (isset($article['id'])) {
			return $article['id'];
		} else {
			return $this->getConnect()->lastInsertRowID();
		}
	}

	public function deleteArticle($id)
	{	
		$stmt = $this->getConnect()->prepare('DELETE FROM `articles` WHERE id = :id');
		$stmt->bindValue(':id', $id, SQLITE3_INTEGER);
		$result = $stmt->execute();
		return true;
	}

}
