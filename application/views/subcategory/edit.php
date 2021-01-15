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
 * Редактирование подкатегории
 * 
 * 
 */
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
$Subcategory = Config::getObject('core.subcategory.class');
?>

<?php include('includes/admin-subcategories-nav.php'); ?>

<form id="editSubcategory" method="post" action="<?= $Url::link("admin/subcategory/edit&id=" . $_GET['id'])?>">
    <h5>Name subcategory</h5> 
    <input type="text" name="name" placeholder="наименование подкатегории" value="<?= $viewSubcategory->name?>"><br>
    <h5 class="unput">Description</h5>
    <textarea type="description" name="description" placeholred="описание подкатегории"  value=><?= $viewSubcategory->description ?></textarea>
    <h5>On category</h5>
    <select name="category_id">
                <option value="0"<?php echo $viewSubcategory->category_id ? " selected" : ""?>>(none)</option>
                <?php foreach ($categories as $category ) { ?>
                  <option value="<?php echo $category->id?>"<?php echo ( $category->id == $viewSubcategory->category_id ) ? " selected" : ""?>><?php echo htmlspecialchars( $category->name )?></option>
                <?php } ?>
    </select><br>
    
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="submit" name="saveChanges" value="Сохранить">
    <input type="submit" name="cancel" value="Назад">
</form>