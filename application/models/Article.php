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

        // Вставляем статью
        
        if ( isset($this->publicationDate) ) {
        $publicationDate = explode ( '-', $this->publicationDate);

        if ( count($publicationDate) == 3 ) {
          list ( $y, $m, $d ) = $publicationDate;
          $this->publicationDate = mktime ( 0, 0, 0, $m, $d, $y );
          
        }}
        
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
        
        $sql = "INSERT INTO authors (article_id, author) VALUES (:id, :author)";
        $st = $this->pdo->prepare( $sql );
        $st->bindValue( ":id", $this->id, \PDO::PARAM_INT);
        $st->bindValue( ":author", $this->author, \PDO::PARAM_INT);
        $st->execute();
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

   

      // Обновляем статью
        
      if ( isset($this->publicationDate) ) {
        $publicationDate = explode ( '-', $this->publicationDate);

        if ( count($publicationDate) == 3 ) {
          list ( $y, $m, $d ) = $publicationDate;
          $this->publicationDate = mktime ( 0, 0, 0, $m, $d, $y );
          
        }}  
        
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
      
      
      $sql = "INSERT INTO authors (article_id, author) "
              . "VALUES (:id, :author);";
      $st= $this->pdo->prepare($sql);        
      $st->bindValue(":id", $this->id, \PDO::PARAM_INT);  
      $st->bindValue(":author", $this->author, \PDO::PARAM_INT);
      $st->execute();
         
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
    
    
    public function storeFormValues ( $params ) {

      // Сохраняем все параметры
      $this->__construct( $params );

      // Разбираем и сохраняем дату публикации
      if ( isset($params['publicationDate']) ) {
        $publicationDate = explode ( '-', $params['publicationDate'] );

        if ( count($publicationDate) == 3 ) {
          list ( $y, $m, $d ) = $publicationDate;
          $this->publicationDate = mktime ( 0, 0, 0, $m, $d, $y );
          
        }
      }
    }    
     
    
    public function getById($id, $tableName = "") {

        $sql = "SELECT *, UNIX_TIMESTAMP(publicationDate) "
                . "AS publicationDate FROM $this->tableName"
                . " LEFT JOIN authors"
                . " On article_id=id"
                . " WHERE id = :id";
        
        $st = $this->pdo->prepare($sql);
        $st->bindValue(":id", $id, \PDO::PARAM_INT);
        $st->execute();

        $row = $st->fetch();
        $conn = null;
        
        if ($row) { 
            return new Article($row);
        }
    }
        
    public function getList($numRows=1000000)  
    {
       
         
        $sql = "SELECT SQL_CALC_FOUND_ROWS $this->tableName. *,
                UNIX_TIMESTAMP(publicationDate) AS publicationDate,
                GROUP_CONCAT(users.login SEPARATOR ', ') as author
                FROM articles LEFT JOIN authors
                ON $this->tableName.id = authors.article_id
                LEFT JOIN users
                ON users.id = authors.author 
                GROUP BY $this->tableName.id
                ORDER BY $this->orderBy LIMIT :numRows;";
        
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