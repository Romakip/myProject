<?php
namespace application\models;

/* 
 * class Cart
 * 
 * 
 */

class Cart extends BaseExampleModel{
    
    public $tablename = 'cart';
    
    public $user_id = null;
    
    public $product_id = null;
    
    public $product_count = null;
    
    public $products = array();
    
    //public $orderBy = 'user_id';
    
    
    
    
    
    
    public function getByIdCart($userId) {
        

        $sql = "select * from stock left join cart on (stock.id = cart.product_id) where cart.user_id = $userId";
        $modelClassName = static::class;
        $list = array();
        $st = $this->pdo->prepare($sql);
        $st->execute();
        while ($row = $st->fetch()){
            $list[] = $row;
        }
        return $list;
        
    }
    
    
    public function getByIdUser($login) {
        
        $sql = "select id, login, role from users where login = '$login'";
        $st = $this->pdo->prepare($sql);
        $st->execute();
        return $st->fetch();
    }
    
    
    public function insert($user_id, $product_id, $product_count = 1){
        
        $sql = "INSERT INTO $this->tablename (user_id, product_id, product_count) VALUES (:user_id, :product_id, :product_count)";
        $st = $this->pdo->prepare($sql);
        $st->bindValue( ":user_id", $user_id, \PDO::PARAM_INT );
        $st->bindValue( ":product_id", $product_id, \PDO::PARAM_INT );
        $st->bindValue( ":product_count", $product_count, \PDO::PARAM_INT );
        $st->execute();
             
    }
    
    public function updateCart($product_id, $product_count, $user_id) {
        
        if($product_count > 0){
            $sql = "UPDATE cart SET product_count=$product_count where user_id = $user_id and product_id = $product_id";
            $st = $this->pdo->prepare($sql);
            $st->execute();
        }
    }
     
    
    public function BuyCart($products, $user_id){
        
        foreach ($products as $product){
            
            if ($product['count'] - $product['product_count'] > -1){
                $productCount = $product['count'] - $product['product_count'];
                $id = +$product['id'];
                $sql = "UPDATE stock SET count=$productCount where id=$id";
                $st = $this->pdo->prepare($sql);
                $st->execute(); 
                $this->deleteProductIncart($id, $user_id);
            }else return true;
        }
        return false;
        
    }
    
    
    
    public function deleteProductIncart($product_id, $user_id){
        
        
        $sql = "DELETE FROM cart WHERE user_id = $user_id and product_id= $product_id";
        $st = $this->pdo->prepare($sql);
        $st->execute();
        
    }
    
    
}
