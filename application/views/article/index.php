<script src="JS/jquery-3.2.1.js"></script>
<script src="JS/loaderIdentity.js"></script>
<script src="JS/JS-ajax.js"></script>
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
      <th scope="col">Content</th>
      <th scope="col">Category</th>
      <th scope="col">Subcategory</th>
      <th scope="col">Active</th>
      <th scope="col">Author</th>
      <?php if ($User->isAllowed("admin/article/edit")): ?>
      <th scope="col">Редактировать</th>
      <?php endif; ?>
    </tr>
     </thead>
     
       <tbody>
    <?php foreach($articles as $article): ?>
        <?php $article->fiftychar = mb_strimwidth($article->content, 0, 50) . '...';?>
    <tr>
        <td> <?= date('j M Y', $article->publicationDate)?></?> </td>
        <td> <?= $article->title ?> </td>
        <td class="summary<?php echo $article->id?>"><?php echo htmlspecialchars ($article->fiftychar)?>
                <a href="//" class="ajaxNewArticleByPost" data-contentId="<?php echo $article->id?>"><?= "Показать продолжение POST" ?></a> 
                <a href="//" class="ajaxNewArticleByGet" data-contentId="<?php echo $article->id?>"><?= "Показать продолжение GET" ?> </a> 
        </td>   
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
        
        <?php if($article->author) {   ?> 
            <td><?= $article->author ?> </td>  
        <?php } else { ?>
            <td><?= "Author unknow"?> </td>
        <?php } ?>
        <?php if ($User->isAllowed("admin/article/edit")): ?>
        <td>  <?= $Article->returnIfAllowed("admin/article/edit", 
                    "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/article/edit&id=". $article->id) 
                    . ">[Редактировать]</a>");?></td>
        <?php endif; ?>
    </tr>
    <?php endforeach; ?>
    
    </tbody>
</table>
            
<?php else:?>
    <p> Список статей пуст </p>
<?php endif; ?>            
    