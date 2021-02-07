<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');

?>

<?php include('includes/shop-nav.php'); ?>

<h2><?= $editProductTitle ?>
    <span>
        <?= $User->returnIfAllowed("admin/adminusers/delete", 
            "<a href=" . $Url::link("admin/shop/delete&id=" . $_GET['id']) 
            . ">[Удалить]</a>");?>
    </span>
</h2>

<form id="editProduct" method="post" action="<?= $Url::link("admin/shop/edit&id=" . $_GET['id'])?>">

    <h5>Product</h5> 
    <input type="text" name="product" placeholder="название товара" value="<?= $viewProduct->product?>">
    <h5>Price</h5>
    <input type="number" class="form-control" name="price" id="price" placeholred="цена товара" value=<?= $viewProduct->price ?>>
    <h5>Count</h5>
    <input type="number" class="form-control" name="count" id="count" placeholred="количество на складе" value=<?= $viewProduct->count ?>>
      
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="submit" name="saveChanges" value="Сохранить">
    <input type="submit" name="cancel" value="Назад">    
</form>

<?php if (!empty($_GET['error'])): ?>
    <h5>Цена или количество товара не могут быть отрицательными! </h5>   
<?php endif; ?>

