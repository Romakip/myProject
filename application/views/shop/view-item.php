<?php

include("includes/shop-nav.php");

use ItForFree\SimpleMVC\Config;

$User = Config::getObject('core.user.class');
?>

<h2><?= $viewProducts->product ?>
    <span>
        <?= $User->returnIfAllowed("admin/adminusers/edit", 
            "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/shop/edit&id=". $viewProducts->id) 
            . ">[Редактировать]</a>");?>
    </span>
</h2>
<h5>Цена товара: <em><?= $viewProducts->price ?></em></h5>
<h5>Количество товара на складе: <em><?= $viewProducts->count ?></em></h5>
<button>Купить</button>
