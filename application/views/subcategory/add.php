<style> 
    
    textarea{
        height: 200%;
        width: 1110px;
        color: #003300;
    }
   
</style>

<?php include('includes/admin-subcategories-nav.php'); ?>

<form id="addCategory" method="post" action="<?= \ItForFree\SimpleMVC\Url::link("admin/subcategory/add")?>"> 
    
    <div class="form-group">
        <label for="name">Введите наименование подкатегории</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="наименование подкатегории">
    </div>
    <div class="form-group">
        <label for="login">Описание подкатегории</label><br>
        <textarea type="description" name="description" placeholred="описание подкатегории"  value=></textarea>
    </div>
    <div class="form-group">   
        <label for="category_id">Принадлежность к категории</label>
        <select name="category_id" id="category_id" class="form-control"> 
            <option value="0">(none)</option>
            <?php foreach ($categories as $category ) { ?>
                  <option value="<?php echo $category->id?>"><?php echo htmlspecialchars( $category->name )?></option>
                <?php } ?>
        </select>
    </div>
    <input type="submit" class="btn btn-primary" name="saveNewSubcategory" value="Сохранить">
    <input type="submit" class="btn" name="cancel" value="Назад">
</form>

