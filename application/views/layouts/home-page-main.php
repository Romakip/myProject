<?php

/* 
 * Шаблон для главной страницы
 * 
 * 
 */

use ItForFree\SimpleMVC\Config;
$User = Config::getObject('core.user.class');
?>

<html>
    <body>
       <div id="container">
    <?php include('includes/mainPage/header.php'); ?>    
            <?= $CONTENT_DATA ?>   
    <?php include('includes/mainPage/footer.php'); ?>
       </div>
    </body>
</html>

