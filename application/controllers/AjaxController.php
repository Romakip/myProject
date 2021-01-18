<?php
namespace application\controllers;
use ItForFree\SimpleMVC\Config;
use application\models\Article as Article;
/**
 * Можно использовать для обработки ajax-запросов.
 */
class AjaxController extends \ItForFree\SimpleMVC\mvc\Controller 
{
    /**
     * Подгрузка "лайков" статей или товаров
     */
    public function likeAction()
    {
       echo 'привет!';
    }
    
   
    public function indexShowAction(){
        
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
        
    }
    
}

