<?php

/* 
 * View category rhis project
 * 
 * 
 */
use ItForFree\SimpleMVC\Config;

$Category = Config::getObject('core.user.class');

?>

<?php include('includes/admin-categories-nav.php'); ?>

<h2>Our category</h2>

<?php if(!empty($categories)): ?>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Category name</th>
      <th scope="col">Description</th>
      <th scope="col">Редактировать</th>
    </tr>
     </thead>
    <tbody>
      
    <?php foreach ($categories as $category): ?>
      <tr>
          <td> <?= $category->name ?></td>
          <td> <?= $category->description ?></td>
          <td> <?= $Category->returnIfAllowed("admin/category/edit", 
                    "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/category/edit&id=". $category->id) 
                    . ">[Редактировать категорию]</a>");?> </td>
      </tr>  
    <?php endforeach; ?>
 
    </tbody>
</table>

<?php else:?>
    <p> Список статей пуст </p>
<?php endif; ?>