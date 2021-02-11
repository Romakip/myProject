<?php
namespace application\controllers;
use ItForFree\SimpleMVC\Config;
use application\models\Article as Article;
use application\models\Cart;
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
    
    
    public function indexInsertAction(){
        
        $Cart = new Cart();
        
        $user_id = $Cart->getByIdUser($_SESSION['user']['userName']);
        
        if ($_POST['product-id']){
            $product_id = $_POST['product-id'];
        
            $Cart->insert($user_id['id'], $product_id);
            $products = $Cart->getByIdCart($user_id['id']);
            echo json_encode(count($products));    
        }         
    }
    
    
    public function indexUpdateAction() {
        
        $Cart = new Cart();
        
        $user_id = $Cart->getByIdUser($_SESSION['user']['userName']);
        
        if($_POST['productId']){
            $product_id = +$_POST['productId'];
            $productsCart = $Cart->getByIdCart($user_id['id']);
            
            foreach ($productsCart as $product){   
                if ($product['id'] == $product_id) $product_count = +$product['product_count'];
            }
            
            $_POST['doing'] == "plus" ? ++$product_count : 
                          (($_POST['doing'] == "minus") ? --$product_count : "");
            
            $Cart->updateCart($product_id, $product_count, $user_id['id']);
            $productsCart = $Cart->getByIdCart($user_id['id']);
            
            foreach ($productsCart as $product){
                if ($product['id'] == $product_id) echo json_encode(+$product['product_count']);
            }
        }    
        
    }
    
}

