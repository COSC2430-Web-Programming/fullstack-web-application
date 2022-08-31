<?php
class Product {
    private $productId; // generate ID
    private $name;
    private $price;
    private $image;
    private $description;
    private $creator;
    public $error;
    public $success;
    private $storage = "../../database/products.db";
    private $stored_products;
    private $new_product;

    function __construct($name, $price, $image, $description, $creator) {
        $this->name = trim($name);
        $this->price = trim($price);
        $this->image = $image;
        $this->description=$description;
        $this->creator = $creator;
        $this->stored_products = json_decode(file_get_contents($this->storage), true);

        $this->new_product = [
            "name" => $this->name,
            "price" => $this->price,
            "image" => $this->image,
            "description" => $this->description,
            "creator" => $this->creator
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