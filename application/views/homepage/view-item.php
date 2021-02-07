<?php ?>

    <h1 style="width: 75%; color:red"><?php echo htmlspecialchars( $viewArticles->title )?></h1>
    <div style="width: 75%; font-style: italic;"><?php echo htmlspecialchars( $viewArticles->summary )?></div>
    <div style="width: 75%;"><?php echo $viewArticles->content?></div>
    <p class="pubDate">Published on <?php  echo date('j F Y', $viewArticles->publicationDate)?>
    
    <?php if ( $viewArticles->categoryId) { ?>
        in 
        <a href="/">
            <?php foreach ($categories as $category) : ?>
            <?php if ($category->id == $viewArticles->categoryId) { ?>
            <?= $category->name ?>
             <?php } ?>
        <?php endforeach; ?>
        </a>
    <?php } ?>
        
    </p>

    <p><a href="./">Вернуться на главную страницу</a></p>




