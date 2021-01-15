<?php //include "includes/header.php" ?>

<?php
/* 
 * View article title in this project
 * 
 * 
 */
use ItForFree\SimpleMVC\Config;

$Article = Config::getObject('core.user.class');
?>

<?php include('includes/admin-articles-nav.php'); ?>

<h2> Наши с вами статьи </h2>

<?php if (!empty($articles)): ?>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Publication Date</th>
      <th scope="col">Article</th>
      <th scope="col">Category</th>
      <th scope="col">Subcategory</th>
      <th scope="col">Author</th>
      <th scope="col">Active</th>
      <th scope="col">Редактировать</th>
    </tr>
     </thead>
       <tbody>
    <?php foreach($articles as $article): ?>
    <tr>
        <td> <?= $article->publicationDate ?> </td>
        <td> <?= $article->summary ?> </td>
        <?php foreach ($categories as $category):
                 if ($category->id == $article->categoryId){ ?>
                    <td>  <?= $category->name ?></td>
                <?php } ?>
        <?php endForeach; ?>
        
        <?php foreach ($subcategories as $subcategory): 
                if ($subcategory->id == $article->subcategoryId){ ?>
                    <td> <?=$subcategory->name ?> </td>
                <?php } ?>    
        <?php endforeach; ?>
        
        <?php if ($article->active == 1) { ?>            
            <td> <?="Статья активна"?> </td>
        <?php } else { ?>
            <td> <?="Статья не активна" ?> </td>
        <?php } ?>
            
            <td> <?= "Author" ?> </td>   
            
        <td>  <?= $Article->returnIfAllowed("admin/article/edit", 
                    "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/article/edit&id=". $article->id) 
                    . ">[Редактировать]</a>");?></td>
    </tr>
    <?php endforeach; ?>
    
    </tbody>
</table>
            
<?php else:?>
    <p> Список статей пуст </p>
<?php endif; ?>            
    