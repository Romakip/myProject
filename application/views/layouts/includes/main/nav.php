
<?php 
use ItForFree\SimpleMVC\Config;
use ItForFree\SimpleMVC\Url;

$User = Config::getObject('core.user.class');


//ppre($User->explainAccess("admin/adminusers/index"));

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- Меню оформленное с помощью  twitter bootstrap -->
 <a class="navbar-brand" href="#" title="This is MVC project">SimpleMVC</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item ">
            <a class="nav-link" href="/">Главная</a>
        </li>
        <?php  if ($User->isAllowed("admin/adminusers/index") || ($User->role == "auth_user")): ?>
        <li class="nav-item"> 
            <a class="nav-link" href="<?= Url::link("admin/article/index") ?>">Article</a>
        </li> 
        <?php endif; ?>
        <?php  if ($User->isAllowed("admin/adminusers/index")): ?>
        <li class="nav-item"> 
            <a class="nav-link" href="<?= Url::link("admin/category/index") ?>">Category</a>
        </li> 
        <?php endif; ?>
        <?php  if ($User->isAllowed("admin/adminusers/index")): ?>
        <li class="nav-item"> 
            <a class="nav-link" href="<?= Url::link("admin/subcategory/index") ?>">Subcategory</a>
        </li> 
        <?php endif; ?>
        <?php  if ($User->isAllowed("login/login")): ?>
        <li class="nav-item ">
            <a class="nav-link" href="<?= Url::link("login/login") ?>">[Вход]</a>
        </li>
        <?php endif; ?>
        
        <?php  if ($User->isAllowed("admin/adminusers/index")): ?>
        <li class="nav-item ">
            <a class="nav-link" href="<?= Url::link("admin/adminusers/index") ?>"> Пользователи </a>
        </li>
        <?php endif; ?>
        
        <?php  if ($User->isAllowed("admin/adminusers/index")): ?>
        <li class="nav-item ">
            <a class="nav-link" href="<?= Url::link("admin/cart/index") ?>"><p id="CartCount">Корзина <?php echo !empty($productsCart) ? count($productsCart) : ""; ?></p></a>
        </li>
        <?php endif; ?>
        
        <?php  if ($User->isAllowed("admin/adminusers/index")): ?>
        <li class="nav-item ">
            <a class="nav-link" href="<?= Url::link("admin/shop/index") ?>"> Магазин </a>
        </li>
        <?php endif; ?>
        
        <?php  if ($User->isAllowed("login/logout")): ?>
        <li class="nav-item ">
            <a class="nav-link" href="<?= Url::link("login/logout") ?>">Выход (<?= $User->userName ?>)</a>
        </li>
        <?php endif; ?>
    </ul>
   </div>
</nav>

