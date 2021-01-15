<?php 
use ItForFree\SimpleMVC\Config;
use ItForFree\SimpleMVC\Url;

$User = Config::getObject('core.user.class');

?>

<ul class="nav">
    
    <?php  if ($User->isAllowed("admin/adminusers/index")): ?>
    <li class="nav-item ">
        <a class="nav-link" href="<?= Url::link("admin/article/index") ?>">Список</a>
    </li>
    <?php endif; ?>
    
    <?php  if ($User->isAllowed("admin/article/add")): ?>
    <li class="nav-item ">
        <a class="nav-link" href="<?= Url::link("admin/article/add") ?>"> Добавить статью</a>
    </li>
    <?php endif; ?>  
</ul>