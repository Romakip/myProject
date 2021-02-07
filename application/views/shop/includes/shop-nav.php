<?php 
use ItForFree\SimpleMVC\Config;
use ItForFree\SimpleMVC\Url;

$User = Config::getObject('core.user.class');

?>

<ul class="nav">
        
    
    <?php  if ($User->isAllowed("admin/article/add") && ($User->role == "admin")): ?>
    <li class="nav-item ">
        <a class="nav-link" href="<?= Url::link("admin/shop/add") ?>"> Добавить товар</a>
    </li>
    <?php endif; ?>  
</ul>

