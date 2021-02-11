<?php

namespace application\controllers\admin;
use application\models\Category as Category;
use ItForFree\SimpleMVC\Config;
use application\models\Cart;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CategoryController extends \ItForFree\SimpleMVC\mvc\Controller {
    
   public $layoutPath = 'admin-main.php';
    
    protected $rules = [ //вариант 2:  здесь всё гибче, проще развивать в дальнешем
         ['allow' => true, 'roles' => ['admin']],
         ['allow' => false, 'roles' => ['?', '@']],
    ];
    
    
    public function indexAction() { 
        
        $Category = new Category();
        
        $id = $_GET['id'] ?? null;
        
        $Cart = new Cart();
       
        $user_id = $Cart->getByIdUser($_SESSION['user']['userName']);
        $productsCart = $Cart->getByIdCart($user_id['id']);
        $this->view->addVar('productsCart', $productsCart);
        
        if ($id){ //если есть конкретная статья, то отобразим ее   
            
            $viewCategories = $Category->getById($_GET['id']);
            $this->view->addVar('viewCategories', $viewCategories);
            $this->view->render('category/view-item.php');           
        } else{ // отобразим полный список
            
            $categories = $Category->getList()['results'];
            $this->view->addVar('categories', $categories);
            $this->view->render('category/index.php');
         
    
        }
    }
    
    
    public function editAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) { // это выполняется нормально.
            
            if (!empty($_POST['saveChanges'] )) {
                $Category = new Category();
                $newCategory = $Category->loadFromArray($_POST);
                $newCategory->update();
                $this->redirect($Url::link("admin/category/index&id=$id"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/category/index&id=$id"));
            }
        }
        else {
            $Category = new Category();
            $viewCategory = $Category->getById($id);
            
            $editCategoryTitle = "Редактирование категории";
            
            $this->view->addVar('viewCategory', $viewCategory);
            $this->view->addVar('editCategoryTitle', $editCategoryTitle);
            
            $this->view->render('category/edit.php');   
        }
        
    }
    
    
    
    public function addAction()
    {
        $Url = Config::get('core.url.class');
        if (!empty($_POST)) {
            if (!empty($_POST['saveNewCategory'])) {
                $Category = new Category();
                $newCategory = $Category->loadFromArray($_POST);
                $newCategory->insert(); 
                $this->redirect($Url::link("admin/category/index"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/category/index"));
            }
        }
        else {
            $addCategoryTitle = "Новая категория";
            $this->view->addVar('addCategoryTitle', $addCategoryTitle);
            
            $this->view->render('category/add.php');
        }
    }
    
    public function deleteAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) {
            if (!empty($_POST['deleteCategory'])) {
                $Category = new Category();
                $newCategory = $Category->loadFromArray($_POST);
                $newCategory->delete();
                
                $this->redirect($Url::link("admin/category/index"));
              
            }
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/category/edit&id=$id"));
            }
        }
        else {
            
            $Category = new Category();
            $deletedCategory = $Category->getById($id);
            $deleteCategoryTitle = "Удаление категории";
            
            $this->view->addVar('deleteCategoryTitle', $deleteCategoryTitle);
            $this->view->addVar('deletedCategory', $deletedCategory);
            
            $this->view->render('category/delete.php');
        }
    }       
}