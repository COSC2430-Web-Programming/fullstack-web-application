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
        $this->stored_products = json_decode(file_get_contents($this->storage), true);

        $this->new_product = [
            "name" => $this->name,
            "price" => $this->price,
            "image" => $this->image,
            "description" => $this->description
        ];
        $this-> insertProduct();
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