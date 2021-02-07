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
    
    public $orderBy = 'user_id';
    
    
    
}
