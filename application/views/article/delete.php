<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
?>

<?php include('includes/admin-articles-nav.php'); ?>

<h2><?= $deleteArticleTitle ?></h2>

<form method="post" action="<?= $Url::link("admin/article/delete&id=". $_GET['id'])?>" >
    Вы уверены, что хотите удалить статью?
    
    <input type="hidden" name="id" value="<?= $deletedArticle->id ?>">
    <input type="submit" name="deleteArticle" value="Удалить">
    <input type="submit" name="cancel" value="Вернуться"><br>
</form>

