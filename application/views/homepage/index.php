<?php 

use ItForFree\SimpleMVC\Config;
use ItForFree\SimpleMVC\Url;
$Article = Config::getObject('core.user.class');

if (!empty($articles)):
    foreach($articles as $article){ ?>
    <ul id="headlines">
        <li class='<?php echo $article->id?>'>
            <h2>
                <span class="pubDate">
                    <?php echo date('j F', $article->publicationDate)?>
                </span>
                
                <a href="<?= Url::link("homepage/index&id=" . $article->id)?>"<?php echo $article->id?>">
                    <?php echo htmlspecialchars( $article->title)?>
                </a>
                
                <?php if (isset($article->categoryId)) { ?>
                <span class="category">
                    in <a>
                    <?php foreach ($categories as $category):
                 if ($category->id == $article->categoryId){ ?>
                    <?= $category->name ?>
                <?php } ?>
        <?php endForeach; ?>
                    </a>    
                </span>
                <?php } 
                else { ?>
                    <span class="category">
                        <?php echo "Без категории"?>
                    </span>
                <?php } ?>
            </h2>
            <p class="summary"><?php echo mb_strimwidth($article->summary, 0, 50) . '...'?></p>
        
            <a href="<?= Url::link("homepage/index&id=" . $article->id)?>" class="showContent">Показать полностью </a>
        </li>
    </ul>
    <?php } endif; ?>


