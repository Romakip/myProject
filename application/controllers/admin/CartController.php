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
        
        $products = $Shop->getList()['results'];
        $this->view->addVar('products', $products);
        
        //$carts = $Cart->getList()['results'];
        //$this->view->addVar('carts', $carts);
        
        $this->view->render('cart/index.php');
        
    }
    
}
