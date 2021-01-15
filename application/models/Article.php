<?php

namespace application\models;

/* 
 * Класс статей, создание, обновление, частичная работа с ними. 
 *  
 * 
 */
class Article extends BaseExampleModel{
    
    //Свойства
    /**
     * Имя таблицы
     */
    public $tableName = 'articles';
    
    /**
     * @var string Критерий сортировки строк таблицы
     */
    public $orderBy = 'publicationDate ASC';
    
    /**
    * @var int ID статей из базы данны
    */
    public $id = null;

    /**
    * @var int Дата первой публикации статьи
    */
    public $publicationDate = null;

    /**
    * @var string Полное название статьи
    */
    public $title = null;

     /**
    * @var int ID категории статьи
    */
    public $categoryId = null;
    
    //Подкатегория статьи
    
    public $subcategoryId = null;

    /**
    * @var string Краткое описание статьи
    */
    public $summary = null;

    /**
    * @var string HTML содержание статьи
    */
    public $content = null;
    /**
    * Делаем ограничение в 50 символов 
     */
    //public $fiftychar = null;
    /**
    * Делаем ограничение в 50 символов 
     */
    public $fiftychar = null;
    
    public $author = null;
    
    public $active = 1;
    
    /**
     * @var type 
     */
    //public $timestamp = null;
        
    
    /**
    * Вставляем текущий объек Article в базу данных, устанавливаем его ID.
    */
    public function insert() {

        // Есть уже у объекта Article ID?
        if ( !is_null( $this->id ) ) trigger_error ( "Article::insert(): Attempt to insert an Article object that already has its ID property set (to $this->id).", E_USER_ERROR );

        // Вставляем статью
        
        $sql = "INSERT INTO $this->tableName ( publicationDate, categoryId, subcategoryId, title, summary, content, active ) VALUES ( FROM_UNIXTIME(:publicationDate), :categoryId, :subcategoryId, :title, :summary, :content, :active )";
        $st = $this->pdo->prepare( $sql );
        $st->bindValue( ":publicationDate", $this->publicationDate, \PDO::PARAM_INT );
        $st->bindValue( ":categoryId", $this->categoryId, \PDO::PARAM_INT );
        $st->bindValue( ":subcategoryId", $this->subcategoryId, \PDO::PARAM_INT);
        $st->bindValue( ":title", $this->title, \PDO::PARAM_STR );
        $st->bindValue( ":summary", $this->summary, \PDO::PARAM_STR );
        $st->bindValue( ":content", $this->content, \PDO::PARAM_STR );
        $st->bindValue( "active", 1, \PDO::PARAM_INT); 
        $res = $st->execute();        
        $this->id = $this->pdo->lastInsertId();
                
    }

    
    private static function PlsId($count){
          $sle = ""; 
          for ($i=0; $i < $count; $i++){
             $sle .= ":id" . $i;
             if (($i + 1) < $count){
                $sle .= ","; 
             }             
    }
            return $sle;
        }
        
         
    /**
    * Обновляем текущий объект статьи в базе данных
    */
    public function update() {

      // Есть ли у объекта статьи ID?
//      if ( is_null( $this->id ) ) trigger_error ( "Article::update(): "
//              . "Attempt to update an Article object "
//              . "that does not have its ID property set.", E_USER_ERROR );

      // Обновляем статью

      $sql = "UPDATE $this->tableName SET publicationDate=FROM_UNIXTIME(:publicationDate),"
              . " categoryId=:categoryId, subcategoryId =:subcategoryId, title=:title, summary=:summary,"
              . " content=:content, active=:active WHERE id = :id";
      
      $st = $this->pdo->prepare( $sql );
      $st->bindValue( ":publicationDate", $this->publicationDate, \PDO::PARAM_INT );
      $st->bindValue( ":categoryId", $this->categoryId, \PDO::PARAM_INT );
      $st->bindValue( ":subcategoryId", $this->subcategoryId, \PDO::PARAM_INT);
      $st->bindValue( ":title", $this->title, \PDO::PARAM_STR );
      $st->bindValue( ":summary", $this->summary, \PDO::PARAM_STR );
      $st->bindValue( ":content", $this->content, \PDO::PARAM_STR );
      $st->bindValue( ":active", $this->active, \PDO::PARAM_INT); 
      $st->bindValue( ":id", $this->id, \PDO::PARAM_INT );
      $st->execute();
            
      $sql = "DELETE  FROM authors WHERE article_id = :id";             
      $st = $this->pdo->prepare($sql);
      $st->bindValue( ":id", $this->id, \PDO::PARAM_INT);
      $st->execute();
      
      $count = count($this->author);
      $pleace_holder_author = self::Pls($count);
      $pleace_holder_article = self::PlsId($count);
      $i = 0;
      foreach ($this->author as $avt){
      $sql = "INSERT INTO authors (article_id, user_id) "
              . "VALUES (:id$i, :author$i);";
      $st= $this->pdo->prepare($sql);        
      $st->bindValue(":id$i", $this->id, \PDO::PARAM_INT);  
      $st->bindValue(":author$i", $avt, \PDO::PARAM_INT);
      $i++;
      $st->execute();
            }     
      //$st->execute();      
    }
       
    
    
    private static function Pls($count){
          $pls = ""; 
          for ($i=0; $i < $count; $i++){
             $pls .= ":author" . $i;
             if (($i + 1) < $count){
                $pls .= ","; 
             }
      
            
    }
            return $pls;
        }
    
    
        
    public function getList($numRows=1000000)  
    {
       
         
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM $this->tableName
                ORDER BY  $this->orderBy LIMIT :numRows";
        
        $modelClassName = static::class;
       
        $st = $this->pdo->prepare($sql);
        $st->bindValue( ":numRows", $numRows, \PDO::PARAM_INT );
        $st->execute();
        $list = array();
        
        while ($row = $st->fetch()) {
            $example = new $modelClassName($row);
            $list[] = $example;
        }

        $sql = "SELECT FOUND_ROWS() AS totalRows"; //  получаем число выбранных строк
        $totalRows = $this->pdo->query($sql)->fetch();
	
        return (array("results" => $list, "totalRows" => $totalRows[0]));
        
    
    }
        
       
}