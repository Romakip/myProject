<?php

/* 
 * View start page subcategory
 * 
 * 
 */

use ItForFree\SimpleMVC\Config;

$Subcategory = Config::getObject('core.user.class');
?>

<?php include('includes/admin-subcategories-nav.php'); ?>

<h2> А вот и подкатегории </h2>

<?php if(!empty($subcategories)): ?>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Subcategory name</th>
      <th scope="col">Description</th>
      <th scope="col">On category</th>
      <th scope="col">Редактировать</th>
    </tr>
     </thead>
     <tbody>
        
    <?php foreach($subcategories as $subcategory): ?>
        <tr>
            <td> <?= $subcategory->name ?></td>
            <td> <?= $subcategory->description ?></td>
            <?php foreach ($categories as $category) : ?>
                <?php if ($category->id == $subcategory->category_id) { ?>
            <td> <?= $category->name?></td>
                <?php } endforeach; ?>
            <td> <?= $Subcategory->returnIfAllowed("admin/subcategory/edit", 
                    "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/subcategory/edit&id=". $subcategory->id) 
                    . ">[Редактировать подкатегорию]</a>");?> </td>
        </tr>    
    <?php endforeach; ?>
     </tbody>
</table>

<?php else:?>
    <p> Список статей пуст </p>
<?php endif; ?>