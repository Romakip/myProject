<?php 

use ItForFree\SimpleMVC\Config;
use ItForFree\SimpleAsset\SimpleAssetManager;
use application\assets\ShopJavascriptAsset;
ShopJavascriptAsset::add();
SimpleAssetManager::printJS();


$User = Config::getObject('core.user.class');
$sum = 0;

?>

<br>

<h2><center>Ваша корзина! Спасибо, что выбрали нас! <img src="images/loves.png" alt="Love"></center></h2>
<span id="Botall">
<span class="errors"></span>
<?php if (!empty($productsCart)) : ?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Товар</th>
        <th scope="col">Количество</th>
        <th scope="col">Цена за единицу</th>
        <th scope="col">Сумма</th>
    </tr>
    </thead>
    
    <tbody>
    <?php foreach($productsCart as $product): ?>
      
    <tr>    
        <td><?= "<a href=" . \ItForFree\SimpleMVC\Url::link('admin/shop/index&id=' 
                . $product['id'] . ">{$product['product']}</a>" )?></td>
        <td><p id="CountId<?= $product['id']?>"><?= $product['product_count']?> </p>
            <button class="minusCount" data-priceId="<?=$product['price']?>" data-productId="<?= $product['id'] ?>">-</button>
            <button class="plusCount" data-priceId="<?=$product['price']?>" data-productId="<?= $product['id'] ?>">+</button></td>
        <td><?= $product['price'] ?> </td>
        <td><p id="SumId<?= $product['id']?>"><?= $product['product_count'] * $product['price']?></p></td>
        <?php $sum += $product['product_count'] * $product['price'];?> 
    </tr>    
    <?php endforeach?>       
</table>
<h5 align="right">Итого: <?= $sum ?></h5>
<h5 align="right"><button class="buyAll">Купить все!(ВаБАнк)</button></h5>
<?php endif ?>

<?php if (empty($productsCart)) : ?>
    <h3>Ваша корзина еще пуста, но у нас есть <?="<a href=" . \ItForFree\SimpleMVC\Url::link('admin/shop/index') ?>>классный магазин</a>, в котором вы можете ее заполнить!</h3>
<?php endif ?>
</span>


