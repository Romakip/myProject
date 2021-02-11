<?php

use ItForFree\SimpleMVC\Config;
use ItForFree\SimpleAsset\SimpleAssetManager;
use application\assets\ShopJavascriptAsset;
ShopJavascriptAsset::add();
SimpleAssetManager::printJS();

$User = Config::getObject('core.user.class');


?>

<h1><center>Магазин "Vivaldi"</center></h1>
<center><img src="images/vivaldi.png" alt="shop"></center>

<?php if (!empty($products)): ?>
<table class="table">
    <thead>
    <tr>
      <th scope="col">product</th>
      <th scope="col">price</th>
      <th scope="col">count</th>
      <?php if ($User->isAllowed("admin/shop/edit")): ?>
      <th scope="col">edit</th>
      <?php endif; ?>
      <th scope="col">buy</th>
      <th></th>
    </tr>
     </thead>
     
     <tbody>
    <?php foreach($products as $product): ?>
         
    <tr>
        <td> <?= "<a href=" . \ItForFree\SimpleMVC\Url::link('admin/shop/index&id=' 
		. $product->id . ">{$product->product}</a>" ) ?> </td>
        <td> <?= $product->price ?></td>
        <td> <?= $product->count ?></td>
        <td> <?= "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/shop/edit&id=". $product->id 
                    . ">(edit)</a>");?></td>
        <?php if (!empty($productsCart)) : ?>
            <?php $i=0 ?>
            <?php foreach ($productsCart as $productCart) : ?>
                <?php $i++; ?>
                <?php if ($product->id == $productCart['id']) : ?> 
                    <td>Уже в корзине!</td>
                    <?php           break; ?>  
                <?php endif ?>
                <?php if (count($productsCart) != $i) : ?>
                    <?php continue; ?>
                <?php else : ?>
                    <td id="pullCartId<?= $product->id ?>"><button class = "shopCart" data-product-id="<?= $product->id ?>">В корзину</button></td>
                <?php endif ?>    
        <?php endforeach ?>  
        <?php else : ?>
                    <td id="pullCartId<?= $product->id ?>"><button class = "shopCart" data-product-id="<?= $product->id ?>">В корзину</button></td>
        <?php endif ?>            

    </tr>    
    <?php 
    endforeach; 
          endif; 
          ?>
    </table>
<?php include('includes/shop-nav.php'); ?>

