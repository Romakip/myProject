<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
?>

<?php include('includes/shop-nav.php'); ?>

<h2><?= $deleteProductTitle ?></h2>

<form method="post" action="<?= $Url::link("admin/shop/delete&id=". $_GET['id'])?>" >
    Вы уверены, что хотите удалить товар?
    
    <input type="hidden" name="id" value="<?= $deletedProduct->id ?>">
    <input type="submit" name="deleteProduct" value="Удалить">
    <input type="submit" name="cancel" value="Вернуться"><br>
</form>
