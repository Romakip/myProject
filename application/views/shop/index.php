<?php

use ItForFree\SimpleMVC\Config;

$User = Config::getObject('core.user.class');


?>

<h1>Магазин "Vivaldy"</h1>

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
        <?php if ($product->count > 0) : ?>
        <td><button>Купить</button></td>
        <?php endif ?>
    </tr>    
    <?php 
    endforeach; 
          endif; 
          ?>
<?php include('includes/shop-nav.php'); ?>

