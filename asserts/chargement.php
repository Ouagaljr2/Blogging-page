<?php
$pagenumber=$_GET["page"];

$pdo = new PDO('sqlite:' . dirname(__FILE__) . '/database.db');

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$Articles = $pdo->query('SELECT content,artName,autorName FROM articles LIMIT 4 OFFSET '.$pagenumber*4)
             ->fetchAll();

echo json_encode($Articles);