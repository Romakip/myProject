<?php
namespace application\controllers\admin;
use application\models\Category as Category;
use application\models\Subcategory as Subcategory;
use \application\models\Adminusers as Adminusers;
use application\models\Article as Article;
use ItForFree\SimpleMVC\Config;

class ArticleController extends \ItForFree\SimpleMVC\mvc\Controller
{
    
    public $layoutPath = 'admin-main.php';
    
    protected $rules = [ //вариант 2:  здесь всё гибче, проще развивать в дальнешем
         ['allow' => true, 'roles' => ['admin']],
         ['allow' => false, 'roles' => ['?', '@']],
    ];
     
    
    
    public function indexAction() { 
        
        $Article = new Article();
        $Category = new Category();
        $Subcategory = new Subcategory();
        $User = new Adminusers();
        
        
        $id = $_GET['id'] ?? null;
        
        if ($id){ //если есть конкретная статья, то отобразим ее   
            
            $categories = $Category->getList()['results'];
            $this->view->addVar('categories', $categories);
            
            $subcategories = $Subcategory->getList()['results'];
            $this->view->addVar('subcategories', $subcategories);
            
            $users = $User->getList()['results'];
            $this->view->addVar('users', $users);
            
            $viewArticles = $Article->getById($_GET['id']);
            $this->view->addVar('viewArticles', $viewArticles);
            $this->view->render('article/view-item.php');           
        } else{ // отобразим полный список

            $categories = $Category->getList()['results'];
            $this->view->addVar('categories', $categories);
            
            $subcategories = $Subcategory->getList()['results'];
            $this->view->addVar('subcategories', $subcategories);
            
            $users = $User->getList()['results'];
            $this->view->addVar('users', $users);
            
            $articles = $Article->getList()['results'];
            $this->view->addVar('articles', $articles);
            $this->view->render('article/index.php');

        }

    }
    
    
    
    public function editAction()
    {
        
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) { // это выполняется нормально.
            
            if (!empty($_POST['saveChanges'] )) {
                $User = new Adminusers();
                $users = $User->getList()['results'];
                $this->view->addvar('users', $users);
                $Article = new Article();
                $newArticle = $Article->loadFromArray($_POST);
                $newArticle->update();
                $this->redirect($Url::link("admin/article/index&id=$id"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/article/index&id=$id"));
            }
        }
        else {
            
            $Article = new Article();
            $Category = new Category();
            $Subcategory = new Subcategory();
            $User = new Adminusers();
            
            $users = $User->getList()['results'];
            $this->view->addvar('users', $users);
            $categories = $Category->getList()['results'];
            $this->view->addVar('categories', $categories);
            
            $subcategories = $Subcategory->getList()['results'];
            $this->view->addVar('subcategories', $subcategories);
            
            
            $viewArticle = $Article->getById($id);
            
            $editArticleTitle = "Редактирование данных статьи";
            
            $this->view->addVar('viewArticle', $viewArticle);
            $this->view->addVar('editArticleTitle', $editArticleTitle);
            
            $this->view->render('article/edit.php');   
        }
        
    }
    
    
    public function addAction()
    {
        $Url = Config::get('core.url.class');
        
        $Category = new Category();
        $Subcategory = new Subcategory();
        $User = new Adminusers();
        
        if (!empty($_POST)) {
            if (!empty($_POST['saveNewArticle'])) {
                $Article = new Article();
                
                $newArticles = $Article->loadFromArray($_POST);
                $newArticles->insert(); 
                $this->redirect($Url::link("admin/article/index"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/article/index"));
            }
        }
        else {
            $addArticlesTitle = "Регистрация статьи";
            
            $categories = $Category->getList()['results'];
            $this->view->addVar('categories', $categories);
            
            $subcategories = $Subcategory->getList()['results'];
            $this->view->addVar('subcategories', $subcategories);
            
            $users = $User->getList()['results'];
            $this->view->addVar('users', $users);
            
            $this->view->addVar('addArticlesTitle', $addArticlesTitle);
            
            $this->view->render('article/add.php');
        }
    }
    
    
    public function deleteAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) {
            if (!empty($_POST['deleteArticle'])) {
                $Article = new Article();
                $newArticle = $Article->loadFromArray($_POST);
                $newArticle->delete();
                
                $this->redirect($Url::link("admin/article/index"));
              
            }
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/article/edit&id=$id"));
            }
        }
        else {
            
            $Article = new Article();
            $deletedArticle = $Article->getById($id);
            $deleteArticleTitle = "Удаление статьи";
            
            $this->view->addVar('deleteArticleTitle', $deleteArticleTitle);
            $this->view->addVar('deletedArticle', $deletedArticle);
            
            $this->view->render('article/delete.php');
        }
    }
    
    
}
