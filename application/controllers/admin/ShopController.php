<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\controllers\admin;
use application\models\Shop;
use application\models\Cart;
use ItForFree\SimpleMVC\Config;
/**
 * Description of shop
 *
 * @author rm
 */
class ShopController extends \ItForFree\SimpleMVC\mvc\Controller
{
    
    
    public function indexAction() {
        
       $Shop = new Shop(); 
       $Cart = new Cart();
       
       $user_id = $Cart->getByIdUser($_SESSION['user']['userName']);
       $productsCart = $Cart->getByIdCart($user_id['id']);
       $this->view->addVar('productsCart', $productsCart);
       
       $id = $_GET['id'] ?? null;
       
       if ($id){
           
          $viewProducts = $Shop->getById($_GET['id']);
          $this->view->addVar('viewProducts', $viewProducts);
          $user_id = $Cart->getByIdUser($_SESSION['user']['userName']);
          $this->view->render('shop/view-item.php'); 
       }
       else {
           
          $products = $Shop->getList()['results'];
          $this->view->addVar('products', $products);
          
          $this->view->render('shop/index.php');
           
       }
       
    }
    
    public function addAction() {
        
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) {
            if (!empty($_POST['saveNewProduct'])) {
                $Product = new Shop();
                $newProduct = $Product->loadFromArray($_POST);
                
                if ($newProduct->price >= 0 && $newProduct->count >= 0){
                    
                    $newProduct->insert();
                    $this->redirect($Url::link("admin/shop/index"));
                    
                } else {
                    $errorMessage = "Цена или количество товара не могут быть отрицательными";
                    $this->redirect($Url::Link("admin/shop/add&error=$errorMessage"));
                }
                
            } elseif (!empty($_POST['cancel'])) {
                
                $this->redirect($Url::link("admin/shop/index"));
            }
                
        } else {
            $Product = new Shop();
            $products = $Product->getList()['results'];
            $this->view->addVar('products', $products);
            $addProductTitle = "Новый товар";
            $this->view->addVar('addProductTitle', $addProductTitle);
            $this->view->render('shop/add.php');
        }
    }    
    
    public function editAction() {
        
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) {
            if (!empty($_POST['saveChanges'] )) {
                
                $Product = new Shop();
            
                $newProduct = $Product->loadFromArray($_POST);
                if ($newProduct->price >= 0 && $newProduct->count >= 0){
                    
                    $newProduct->update();
                    $this->redirect($Url::link("admin/shop/index"));
                    
                } else {
                    $errorMessage = "Цена или количество товара не могут быть отрицательными";
                    $this->redirect($Url::Link("admin/shop/edit&id=$id&error=$errorMessage"));
                }    
            } 
            elseif (!empty($_POST['cancel'])) {
                
                $this->redirect($Url::link("admin/shop/index&id=$id"));
                
            }    
        }
        else {
            $Product = new Shop();
            
            $viewProduct = $Product->getById($id);
            
            $editProductTitle = "Редактирование товара";
            
            $this->view->addVar('viewProduct', $viewProduct);
            $this->view->addVar('editProductTitle', $editProductTitle);
            
            $this->view->render('shop/edit.php');
        }
        
    }
    
    public function deleteAction() {
        
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) {
            if (!empty($_POST['deleteProduct'])) {
                $Product = new Shop();
                $newProduct = $Product->loadFromArray($_POST);
                $newProduct->delete();    
                $this->redirect($Url::link("admin/shop/index"));
              
            }
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/shop/edit&id=$id"));
            }
        }
        else {
            
            $Product = new Shop();
            $deletedProduct = $Product->getById($id);
            $deleteProductTitle = "Удаление товара";
            
            $this->view->addVar('deleteProductTitle', $deleteProductTitle);
            $this->view->addVar('deletedProduct', $deletedProduct);
            
            $this->view->render('shop/delete.php');
        }
        
    }
}
