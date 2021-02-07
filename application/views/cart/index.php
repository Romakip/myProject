<?php 

use ItForFree\SimpleMVC\Config;

$User = Config::getObject('core.user.class');

?>

<br>
<h2><center>Ваша корзина! Спасибо, что выбрали нас! <img src="images/loves.png" alt="Love"></center></h2>

<?php if (!empty($cart)) : ?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Товар</th>
        <th scope="col">Количество</th>
        <th scope="col">Сумма</th>
        <th scope="col">Итого:</th>
    </tr>
    </thead>
</table>
<?php endif ?>

<?php if (empty($cart)) : ?>
    <h3>Ваша корзина еще пуста, но у нас есть <a href="#">классный магазин</a>, в котором вы можете ее заполнить!</h3>
<?php endif ?>





