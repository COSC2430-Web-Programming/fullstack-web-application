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
    private $new_product;

    function __construct($name, $price, $image, $description) {
        $this->name = trim($name);
        $this->price = trim($price);

        $this->new_product = [
            "name" => $this->name,
            "price" => $this->price,
            "image" => $this->image,
            "description" => $this->description
        ];
    }
}

?>