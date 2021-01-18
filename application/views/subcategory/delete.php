<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
?>

<?php include('includes/admin-subcategories-nav.php'); ?>

<h2><?= $deleteSubcategoryTitle ?></h2>

<form method="post" action="<?= $Url::link("admin/subcategory/delete&id=". $_GET['id'])?>" >
    Вы уверены, что хотите удалить подкатегорию?
    
    <input type="hidden" name="id" value="<?= $deletedSubcategory->id ?>">
    <input type="submit" name="deleteSubcategory" value="Удалить">
    <input type="submit" name="cancel" value="Вернуться"><br>
</form>

