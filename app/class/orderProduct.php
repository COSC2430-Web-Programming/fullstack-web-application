<?php include 'product.php'; ?>
<?php
class OrderProduct extends Product {
    protected $p_quantity;
    // public $error;
    // public $success;
    private $storage = "../../database/products.db";
    private $stored_products;
    private $new_product;

    function __construct($product_id, $p_quantity, $name, $price, $image, $description) {
        $this->product_id = $product_id;
        $this->p_quantity = $p_quantity;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image; 
        $this->description = $description;


        // $this->stored_products = json_decode(file_get_contents($this->storage), true);
        // $this->product_id = uniqid('product_',true); // generate ID
    }   
}

?>