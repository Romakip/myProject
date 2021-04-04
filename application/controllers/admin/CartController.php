<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\controllers\admin;
use application\models\Cart;
use application\models\Shop;
//use application\models\Adminusers;
use ItForFree\SimpleMVC\Config;
/**
 * Description of CartController
 *
 * @author rm
 */
class CartController extends \ItForFree\SimpleMVC\mvc\Controller 
{
    
    
    public function indexAction() {
        
        $Cart = new Cart();
        $Shop = new Shop();
        $user_id = $Cart->getByIdUser($_SESSION['user']['userName']);
        $productsCart = $Cart->getByIdCart($user_id['id']);
        $this->view->addVar('productsCart', $productsCart);
        
        $this->view->render('cart/index.php');
        
    }
    
    public function updateAction() {
        
        $Cart = new Cart();
        $Shop = new Shop();
        
        $user_id = $Cart->getByIdUser($_SESSION['user']['userName']);
        $products = $Cart->getByIdCart($user_id['id']);
        
        $responce = [
            'status' => true,
            'errors' => [],
            'user' => $user_id['id']
         ];
        
        $responce['errors'] = $Cart->buyCart($products, $user_id['id']);
        echo json_encode($responce);
    } 
    
}
