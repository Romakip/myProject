<?php
use ItForFree\SimpleMVC\Config;

$Article = Config::getObject('core.article.class');
?>

<?php include('includes/admin-articles-nav.php'); ?>

<h2><?= $viewArticles->title ?>
    <span>
        <?= $User->returnIfAllowed("admin/adminusers/edit", 
            "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/article/edit&id=". $viewArticles->id) 
            . ">[Редактировать]</a>");?>
    </span>
</h2> 

<h5>Name article </h5>
<?= $viewArticles->title ?>
<h5>Summary article </h5>
<?= $viewArticles->summary ?>
<h5>Content article</h5>
<?= $viewArticles->content ?>
<h5>On category </h5>
<?php foreach ($categories as $category) : ?>
    <?php if ($category->id == $viewArticles->categoryId) { ?>
        <?= $category->name ?>
    <?php } ?>
<?php endforeach; ?>
<h5>On subcategory </h5>
<?php foreach ($subcategories as $subcategory) : ?>
    <?php if ($subcategory->id == $viewArticles->subcategoryId) { ?>
        <?= $subcategory->name ?>
    <?php } ?>
<?php endforeach; ?>
<h5>Author</h5>
<?php foreach ($users as $user) : ?>
    <?php if ($user->id == $viewArticles->author) { ?>
        <?= $user->login ?>
    <?php } ?>
<?php endforeach; ?>

