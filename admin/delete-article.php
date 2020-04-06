<?php
require_once '../pdo.php';
require_once '../functions/article-function.php';
$id = $_GET['id'];
deleteArticle($pdo, $id);
header('Location: admin-homepage.php');
?>
