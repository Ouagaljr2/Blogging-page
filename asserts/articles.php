<?php

$artName = htmlspecialchars($_POST['artName']);
$autorName = htmlspecialchars($_POST['autorName']);
$content = htmlspecialchars($_POST['content']);


if (strlen($artName) >= 3 && $artName !== '' && strlen($autorName) <= 255 && strlen($autorName) !=='' && strlen($content)>10) {
    $pdo = new PDO('sqlite:' . dirname(__FILE__) . '/database.db');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->query('CREATE TABLE IF NOT EXISTS articles (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    artName VARCHAR(255) NOT NULL,
    autorName VARCHAR(255) NOT NULL,
    content TEXT NOT NULL

)');

    $statement = $pdo->prepare('INSERT INTO articles (artName,autorName,content) VALUES (:artName,:autorName,:content)');
    $statement->bindValue(':artName', $artName);
    $statement->bindValue(':autorName', $autorName);
    $statement->bindValue(':content', $content);
    $statement->execute();

}
header('Location: http://localhost:8080');
