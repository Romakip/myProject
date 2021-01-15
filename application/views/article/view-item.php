<?php
use ItForFree\SimpleMVC\Config;

$Article = Config::getObject('core.article.class');
?>

<?php include('includes/admin-articles-nav.php'); ?>

<h2><?= $viewArticle->summary ?>
    <span>
        <?= $Article->returnIfAllowed("admin/article/edit", 
            "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/article/edit&id=". $viewArticle->id) 
            . ">[Редактировать]</a>");?>
    </span>
</h2> 

