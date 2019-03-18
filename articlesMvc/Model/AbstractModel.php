<?php

namespace Model;

abstract class AbstractModel
{
    protected $db;
    
    public function __construct()
	{
		if (!file_exists(PATHTODB)) {
			$this->db = new \SQLite3(PATHTODB);
			$sql = "CREATE TABLE articles(
				id INTEGER PRIMARY KEY AUTOINCREMENT,
				title TEXT,
				text TEXT,
				datetime INTEGER, 
				author TEXT DEFAULT ''
			);";
			$this->db->query($sql);
		} else {
			$this->db = new \SQLite3(PATHTODB);
		}
	}

    public function getConnect() 
	{
        if ($this->db) {
            return $this->db;
        } else {
			return false;
		}
    }   
}