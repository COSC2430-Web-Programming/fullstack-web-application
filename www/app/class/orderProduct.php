<?php
class OrderProduct {
    public $product_id;
    public $quantity;
    public $name;
    public $price;
    public $image;

    function __construct($product_id, $quantity, $name, $price, $image) {
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image; 
    }   
}

?>