<?php

namespace application\models;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Category extends BaseExampleModel {
    
   // Свойства
    /**
     * Имя таблицы
     */
    public $tableName = 'categories';
    /**
    * @var int ID категории из базы данных
    */
    public $id = null;

    /**
    * @var string Название категории
    */
    public $name = null;
    /**
     * @var string Критерий сортировки строк таблицы
     */
    public $orderBy = 'id';
    /**
    * @var string Короткое описание категории
    */
    public $description = null;
    
    
    public function insert() {

      // У объекта Category уже есть ID?
      //if ( !is_null( $this->id ) ) trigger_error ( "Category::insert(): Attempt to insert a Category object that already has its ID property set (to $this->id).", E_USER_ERROR );

      // Вставляем категорию
      $sql = "INSERT INTO $this->tableName ( name, description ) VALUES ( :name, :description )";
      $st = $this->pdo->prepare ( $sql );
      $st->bindValue( ":name", $this->name, \PDO::PARAM_STR );
      $st->bindValue( ":description", $this->description, \PDO::PARAM_STR );
      $st->execute();
      $this->id = $this->pdo->lastInsertId();
      
    }


    /**
    * Обновляем текущий объект Category в базе данных.
    */

    public function update() {

      // У объекта Category  есть ID?
      //if ( is_null( $this->id ) ) trigger_error ( "Category::update(): Attempt to update a Category object that does not have its ID property set.", E_USER_ERROR );

      // Обновляем категорию
     
      $sql = "UPDATE $this->tableName SET name=:name, description=:description WHERE id = :id";
      $st = $this->pdo->prepare ( $sql );
      $st->bindValue( ":name", $this->name, \PDO::PARAM_STR );
      $st->bindValue( ":description", $this->description, \PDO::PARAM_STR );
      $st->bindValue( ":id", $this->id, \PDO::PARAM_INT );
      $st->execute();
      
    }
    
    
}
