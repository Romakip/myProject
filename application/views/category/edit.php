
<style> 
    input{width: 700px;}
    textarea{
        height: 200%;
        width: 700px;
        color: #003300;
    }
   
</style>
<?php
/** 
 * Редактирование категории
 * 
 * 
 */
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
$Category = Config::getObject('core.category.class');
?>

<?php include('includes/admin-categories-nav.php'); ?>

<h2><?= $editCategoryTitle ?>
    <span>
        <?= $User->returnIfAllowed("admin/adminusers/delete", 
            "<a href=" . $Url::link("admin/category/delete&id=" . $_GET['id']) 
            . ">[Удалить]</a>");?>
    </span>
</h2>


<form id="editCategory" method="post" action="<?= $Url::link("admin/category/edit&id=" . $_GET['id'])?>">
    <h5>Name category</h5> 
    <input type="text" name="name" placeholder="наименование категории" value="<?= $viewCategory->name?>"><br>
    <h5 class="unput">Description</h5>
    <textarea type="description" name="description" placeholred="описание категории"  value=><?= $viewCategory->description ?></textarea>
    
    
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="submit" name="saveChanges" value="Сохранить">
    <input type="submit" name="cancel" value="Назад">
</form>