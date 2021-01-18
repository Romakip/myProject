<style> 
    
    textarea{
        height: 200%;
        width: 1110px;
        color: #003300;
    }
   
</style>


<?php include('includes/admin-articles-nav.php'); ?>


<form id="addArticle" method="post" action="<?= \ItForFree\SimpleMVC\Url::link("admin/article/add")?>"> 
    
    <div class="form-group">
        <label for="title">Название статьи</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="наименование статьи">
    </div>
    <div class="form-group">
        <label for="summary">Короткое описание</label><br>
        <textarea type="description" name="summary" placeholred="описание подкатегории"  value=></textarea>
    </div>
    <div class="form-group">
        <label for="content">Содержание</label><br>
        <textarea type="description" name="content" placeholred="описание подкатегории"  value=></textarea>
    </div>
    <div class="form-group">   
        <label for="categoryid">Принадлежность к категории</label>
        <select name="categoryId" id="categoryId" class="form-control"> 
            <option value="0">(none)</option>
            <?php foreach ($categories as $category ) { ?>
                  <option value="<?php echo $category->id?>"><?php echo htmlspecialchars( $category->name )?></option>
                <?php } ?>
        </select>
    </div>
    <div class="form-group">   
        <label for="subcategoryId">Принадлежность к подкатегории</label>
        <select name="subcategoryId" id="subcategoryId" class="form-control"> 
            <option value="0">(none)</option>
            <?php foreach ($subcategories as $subcategory ) { ?>
                  <option value="<?php echo $subcategory->id?>"><?php echo htmlspecialchars( $subcategory->name )?></option>
                <?php } ?>
        </select>
    </div>
    <div class="form-group">   
        <label for="author">Выбор автора</label>
        <select name="author" id="author" class="form-control"> 
            <option value="0">(none)</option>
            <?php foreach ($users as $user ) { ?>
                  <option value="<?php echo $user->id?>"><?php echo htmlspecialchars( $user->login )?></option>
                <?php } ?>
        </select>
    </div>
    <label for="publicationDate">Publication Date</label>
        <input type="date" name="publicationDate" id="publicationDate" placeholder="YYYY-MM-DD" required maxlength="10" value=/><br>
    <input type="submit" class="btn btn-primary" name="saveNewArticle" value="Сохранить">
    <input type="submit" class="btn" name="cancel" value="Назад">
</form>
