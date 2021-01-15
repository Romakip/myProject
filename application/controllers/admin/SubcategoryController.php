<?php

namespace application\controllers\admin;
use application\models\Category as Category;
use application\models\Subcategory as Subcategory;
use ItForFree\SimpleMVC\Config;

/* 
 * Controller subcategories
 * 
 * 
 */

class SubcategoryController extends \ItForFree\SimpleMVC\mvc\Controller {
  
    
    public $layoutPath = 'admin-main.php';
    
    protected $rules = [ //вариант 2:  здесь всё гибче, проще развивать в дальнешем
         ['allow' => true, 'roles' => ['admin']],
         ['allow' => false, 'roles' => ['?', '@']],
    ];
    
    
    public function indexAction() { 
        
        $Subcategory = new Subcategory();
        $Category = new Category();
        $id = $_GET['id'] ?? null;
        
        if ($id){ //если есть конкретная статья, то отобразим ее   
            
            $categories = $Category->getList()['results'];
            $this->view->addVar('categories', $categories);
            
            $viewSubcategories = $Subcategory->getById($_GET['id']);
            $this->view->addVar('viewSubcategories', $viewSubcategories);
            $this->view->render('subcategory/view-item.php');           
        } else{ // отобразим полный список
            $categories = $Category->getList()['results'];
            $this->view->addVar('categories', $categories);
            
            $subcategories = $Subcategory->getList()['results'];
            $this->view->addVar('subcategories', $subcategories);
            $this->view->render('subcategory/index.php');
         
    
        }
    }
    
    
    
    public function editAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) { // это выполняется нормально.
            
            if (!empty($_POST['saveChanges'] )) {
                $Subcategory = new Subcategory();
               

                $newSubcategory = $Subcategory->loadFromArray($_POST);
                $newSubcategory->update();
                $this->redirect($Url::link("admin/subcategory/index&id=$id"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/subcategory/index&id=$id"));
            }
        }
        else {
            $Subcategory = new Subcategory();
            $Category = new Category();
            
            $categories = $Category->getList()['results'];
            $this->view->addVar('categories', $categories);
            
            $viewSubcategory = $Subcategory->getById($id);
            
            $editSubcategoryTitle = "Редактирование подкатегории";
            
            $this->view->addVar('viewSubcategory', $viewSubcategory);
            $this->view->addVar('editSubcategoryTitle', $editSubcategoryTitle);
            
            $this->view->render('subcategory/edit.php');   
        }
        
    }
    
    
    public function addAction()
    {   
        
        $Url = Config::get('core.url.class');
        if (!empty($_POST)) {
            if (!empty($_POST['saveNewSubcategory'])) {
                
                $Subcategory = new Subcategory();
                
               
            
                $newSubcategory = $Subcategory->loadFromArray($_POST);
                $newSubcategory->insert(); 
                $this->redirect($Url::link("admin/subcategory/index"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/subcategory/index"));
            }
        }
        else {
            $Category = new Category();
            $categories = $Category->getList()['results'];
            $this->view->addVar('categories', $categories);
                
            $addSubcategoryTitle = "Новая категория";
            $this->view->addVar('addSubcategoryTitle', $addSubcategoryTitle);
            
            $this->view->render('subcategory/add.php');
        }
    }
    
    public function deleteAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) {
            if (!empty($_POST['deleteSubcategory'])) {
                $Subcategory = new Subcategory();
                $newSubcategory = $Subcategory->loadFromArray($_POST);
                $newSubcategory->delete();
                
                $this->redirect($Url::link("archive/allsubcategories"));
              
            }
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/subcategory/edit&id=$id"));
            }
        }
        else {
            
            $Subcategory = new Subcategory();
            $deletedSubcategory = $Subcategory->getById($id);
            $deleteSubcategoryTitle = "Удаление подкатегории";
            
            $this->view->addVar('deleteSubcategoryTitle', $deleteSubcategoryTitle);
            $this->view->addVar('deletedSubcategory', $deletedSubcategory);
            
            $this->view->render('subcategory/delete.php');
        }
    }       
}