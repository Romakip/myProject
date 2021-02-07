<form id="addProduct" method="post" action="<?= \ItForFree\SimpleMVC\Url::link("admin/shop/add")?>">

    <div class="form-group">
        <label for="product">Название товара</label>
        <input type="text" class="form-control" name="product" id="product" placeholder="название товара">
    </div>
    
    <div class="form-group">
        <label for="price">Цена товара</label><br>
        <input type="number" class="form-control" name="price" id="price" placeholred="цена товара">
    </div>
    
    <div class="form-group">
        <label for="price">Количество товара</label><br>
        <input type="number" class="form-control" name="count" id="count" placeholred="количество товара">
    </div>


    <input type="submit" class="btn btn-primary" name="saveNewProduct" value="Сохранить">
    <input type="submit" class="btn" name="cancel" value="Назад">
</form>

<?php if (!empty($_GET['error'])): ?>
    <h5>Цена или количество товара не могут быть отрицательными! </h5>   
<?php endif; ?>