<?php

namespace application\models;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Subcategory extends BaseExampleModel {
    
    //put your code here
    //table Name
    public $tableName = 'subcategories';
    //id on the subcategory
    public $id = null;
    
    //id category
    public $category_id = null;
    //name on the subcategory
    public $name = null;
    //description on subcategory
    public $description = null;
    //orderBy column
    public $orderBy = 'id';
    
    
    public function insert() {

      //if ( !is_null( $this->id ) ) trigger_error ( "Subcategory::insert(): Attempt to insert a Subcategory object that already has its ID property set (to $this->id).", E_USER_ERROR );

      // Вставляем категорию
      
      $sql = "INSERT INTO $this->tableName ( category_id, name, description ) VALUES (:category_id, :name, :description )";
      $st = $this->pdo->prepare ( $sql );
      $st->bindValue( ":category_id", $this->category_id, \PDO::PARAM_INT);
      $st->bindValue( ":name", $this->name, \PDO::PARAM_STR );
      $st->bindValue( ":description", $this->description, \PDO::PARAM_STR );
      $st->execute();
      $this->id = $this->pdo->lastInsertId();
      
    }


    //Обновляем текущую подкатегорию в БД

    public function update() {

      //if ( is_null( $this->id ) ) trigger_error ( "Subcategory::update(): Attempt to update a Subcategory object that does not have its ID property set.", E_USER_ERROR );

      // Обновление подкатегории
      
      $sql = "UPDATE $this->tableName SET category_id=:category_id, name=:name, description=:description WHERE id = :id";
      $st = $this->pdo->prepare ( $sql );
      $st->bindValue( ":category_id", $this->category_id, \PDO::PARAM_INT);
      $st->bindValue( ":name", $this->name, \PDO::PARAM_STR );
      $st->bindValue( ":description", $this->description, \PDO::PARAM_STR );
      $st->bindValue( ":id", $this->id, \PDO::PARAM_INT );
      $st->execute();
      
    }
    
}
    