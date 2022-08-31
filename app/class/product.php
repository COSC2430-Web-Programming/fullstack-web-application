<?php
class Product {
    private $productId; // generate ID
    private $name;
    private $price;
    private $image;
    private $description;
    public $error;
    public $success;
    private $storage = "../../database/products.db";
    private $stored_products;
    private $new_product;

    function __construct($name, $price, $image, $description) {
        $this->name = trim($name);
        $this->price = trim($price);
        $this->image = $image;
        $this->description=$description;
        $this->stored_products = json_decode(file_get_contents($this->storage), true);

        $this->new_product = [
            "name" => $this->name,
            "price" => $this->price,
            "image" => $this->image,
            "description" => $this->description
            
        ];

        if ($this->checkFieldValueofProduct() == TRUE){
            $this-> insertProduct();
        }
    }

    private function checkFieldValueofProduct(){
        if(strlen($this->name) <10 || strlen($this->name) >20){
            $this->error = "The length for the product name is from 10 to 20 character";
            return false;
        }else if($this->price < 0){
            $this-> error = "The product price need to be positive";
            return false;
        }else if(strlen($this->description) > 500){
            $this-> error = "The product description length need to be less than 500 character";
            return false;
        }else{
            return true;
        }
    }

    protected function insertProduct(){
        array_push($this->stored_products, $this->new_product);
        if (file_put_contents($this->storage, json_encode($this->stored_products, JSON_PRETTY_PRINT))) {
            return $this->success = "Successfully registered";
        } else {
            $this->error = "Unsuccessfully registered, please try again";
        }
    }
}

?>