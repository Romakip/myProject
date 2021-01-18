<style> 
    input{width: 700px;}
    textarea{
        height: 200%;
        width: 700px;
        color: #003300;
    }
   
</style>

<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
$Article = Config::getObject('core.article.class');
?>

<?php include('includes/admin-articles-nav.php'); ?>

<h2><?= $editArticleTitle ?>
    <span>
        <?= $User->returnIfAllowed("admin/adminusers/delete", 
            "<a href=" . $Url::link("admin/article/delete&id=" . $_GET['id']) 
            . ">[Удалить]</a>");?>
    </span>
</h2>

<form id="editArticle" method="post" action="<?= $Url::link("admin/article/edit&id=" . $_GET['id'])?>">
    <h5>Article Title</h5> 
    <input type="text" name="title" placeholder="name article" value=<?= $viewArticle->title?>><br>
    <h5 class="unput">Article Summary</h5>
    <textarea type="description" name="summary" placeholred="описание"  value=><?= $viewArticle->summary ?></textarea>
    <h5>Article Content</h5>
    <textarea type="description" name="content" placeholred="контент"   value=><?= $viewArticle->content ?></textarea>
    <h5>Article category</h5>
    <select name="categoryId">
                  <option value="0"<?php echo $viewArticle->categoryId ? " selected" : ""?>>(none)</option>
                <?php foreach ($categories as $category ) { ?>
                  <option value="<?php echo $category->id?>"<?php echo ( $category->id == $viewArticle->categoryId ) ? " selected" : ""?>><?php echo htmlspecialchars( $category->name )?></option>
                <?php } ?>
                </select>
    <h5>Article subcategory</h5>
    <select name="subcategoryId">
                 <option value="0"<?php echo $viewArticle->subcategoryId ? " selected" : ""?>>(none)</option>
                <?php foreach( $subcategories as $subcategory ) { ?>   
                    <option value="<?php echo $subcategory->id?>"<?php echo ( $subcategory->id == $viewArticle->subcategoryId ) ? " selected" : ""?>><?php echo htmlspecialchars( $subcategory->name )?></option>
                <?php } ?>
                </select>
    <h5>Выбор автора</h5>
        <select name="author" id="author" class="form-control"> 
            <option value="0"<?php echo $viewArticle->author ? " selected" : ""?>>(none)</option>
            <?php foreach ($users as $user ) { ?>
            <option value="<?php echo $user->id?>"<?php echo ( $user->id == $viewArticle->author ) ? " selected" : ""?>><?php echo htmlspecialchars($user->login)?></option>
                <?php } ?>
        </select>
    <h5>Publication data</h5>
    <input type="date" name="publicationDate" id="publicationDate" placeholder="YYYY-MM-DD" required maxlength="10" value="0"/>
    
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="submit" name="saveChanges" value="Сохранить">
    <input type="submit" name="cancel" value="Назад">
</form>