<?php

namespace application\models;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Shop extends BaseExampleModel
{
    public $id = null;
    
    public $product = null;
    
    public $price = null;
    
    public $count = null;
    
    public $orderBy = 'product ASC';
    
    public $tableName = "stock";
    
    
    public function insert() {
        
        $sql = "INSERT INTO $this->tableName (product, price, count) VALUES (:product, :price, :count)";
        $st = $this->pdo->prepare ( $sql );
        $st->bindValue(":product", $this->product, \PDO::PARAM_STR);
        $st->bindValue(":price", $this->price, \PDO::PARAM_INT);
        $st->bindValue(":count", $this->count, \PDO::PARAM_INT);
        $st->execute();
        $this->id = $this->pdo->lastInsertId();       
       
    }
    
    
    public function update() {
        
        
        $sql = "UPDATE $this->tableName SET product=:product, price=:price, count=:count WHERE id = :id";
        $st = $this->pdo->prepare ( $sql );
        $st->bindValue(":id", $this->id, \PDO::PARAM_INT);
        $st->bindValue(":product", $this->product, \PDO::PARAM_STR);
        $st->bindValue(":price", $this->price, \PDO::PARAM_INT);
        $st->bindValue(":count", $this->count, \PDO::PARAM_INT);
        $st->execute();
        
    }
}

