<?php

class ORM
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('sqlite:' . dirname(__FILE__) . '/database.db');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->createArticleTable();
    }

    private function createArticleTable (): void {
        $this->pdo->query('CREATE TABLE IF NOT EXISTS articles(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    articleName VARCHAR(255) NOT NULL )');

    }

    public function loadArticles(): array
    {
        return $this->pdo->query('SELECT * FROM articles')
                         ->fetchAll();
    }

    public function loadArticle(int $id){
        return $this->pdo->query('SELECT FROM articles WHERE id='.$id)
                    -> fetch();
    }
    public function deleteArticle(int $id){
        $this->query('DELETE FROM articles WHERE id='.$id)
            ->fecth();

    }
}