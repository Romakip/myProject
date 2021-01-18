<?php
use application\models\Article;
//use ItForFree\SimpleMVC\Config;
//$Article = Config::getObject('core.article.class');

if (isset($_GET['articleId'])) {
    $Article = new Article();
    $article = $Article->getById((int)$_GET['articleId']);
    echo json_encode($article->content);
}

if (isset ($_POST['articleId'])) {
    $Article = new Article();
    $article = $Article->getById((int)$_POST['articleId']);
    echo json_encode($article->content);
}


