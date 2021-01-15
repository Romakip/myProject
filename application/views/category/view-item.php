<?php 
/** 
 * View-item category
 * 
 * 
 */
 
use ItForFree\SimpleMVC\Config;

$User = Config::getObject('core.user.class');
?>

<?php include('includes/admin-categories-nav.php'); ?>

<h2><?= $viewCategories->name ?>
    <span>
        <?= $User->returnIfAllowed("admin/adminusers/edit", 
            "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/category/edit&id=". $viewCategories->id) 
            . ">[Редактировать]</a>");?>
    </span>
</h2> 

<h5>Name category: </h5>
<?= $viewCategories->name ?>
<h5>Description: </h5>
<?= $viewCategories->description ?>
