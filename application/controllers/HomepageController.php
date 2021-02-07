<?php
namespace application\controllers;
use application\models\Category as Category;
use application\models\Subcategory as Subcategory;
use \application\models\Adminusers as Adminusers;
use application\models\Article as Article;
use ItForFree\SimpleMVC\Config;

/**
 * Контроллер для домашней страницы
 */
class HomepageController extends \ItForFree\SimpleMVC\mvc\Controller
{
    /**
     * @var string Название страницы
     */
    public $homepageTitle = "Домашняя страница";
    
    /**
     * @var string Пусть к файлу шаблона 
     */
    public $layoutPath = 'home-page-main.php';
      
    /**
     * Выводит на экран страницу "Домашняя страница"
     */
    public function indexAction()
    {
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
            $this->view->render('homepage/view-item.php');           
        } else{ // отобразим полный список

            $categories = $Category->getList()['results'];
            $this->view->addVar('categories', $categories);
            
            $subcategories = $Subcategory->getList()['results'];
            $this->view->addVar('subcategories', $subcategories);
            
            $users = $User->getList()['results'];
            $this->view->addVar('users', $users);
            
            $articles = $Article->getList()['results'];
            $this->view->addVar('articles', $articles);
            $this->view->addVar('homepageTitle', $this->homepageTitle); // передаём переменную по view
            $this->view->render('homepage/index.php');

        }
                    
        
    }
}

