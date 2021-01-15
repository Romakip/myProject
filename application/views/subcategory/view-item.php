<?php

/* 
 * View-item subcategory
 * 
 * 
 */
use ItForFree\SimpleMVC\Config;

$User = Config::getObject('core.user.class');
?>

<?php include('includes/admin-subcategories-nav.php'); ?>

<h2><?= $viewSubcategories->name ?>
    <span>
        <?= $User->returnIfAllowed("admin/adminusers/edit", 
            "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/subcategory/edit&id=". $viewSubcategories->id) 
            . ">[Редактировать]</a>");?>
    </span>
</h2> 

<h5>Name subcategory: </h5>
<?= $viewSubcategories->name ?>
<h5>Description: </h5>
<?= $viewSubcategories->description ?>
<h5>On category</h5>
<?php foreach ($categories as $category) : ?>
    <?php if ($category->id == $viewSubcategories->category_id) { ?>
        <?= $category->name ?>
    <?php } ?>
<?php endforeach; ?>
