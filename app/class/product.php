<?php
class Product {
    private $productId; // generate ID
    private $name;
    private $price;
    private $image;
    private $raw_image;
    private $description;
    private $creator;
    public $error;
    public $success;
    private $storage = "../../database/products.db";
    private $stored_products;
    private $new_product;

    function __construct($name, $price, $raw_image, $description, $creator) {
        $this->name = trim($name);
        $this->price = trim($price);
        $this->raw_image = $raw_image;
        $this->description=$description;
        $this->creator = $creator;
        $this->stored_products = json_decode(file_get_contents($this->storage), true);
        $this->product_id = uniqid('product_',true);
        $this->validateImage();

        $this->new_product = [
            "name" => $this->name,
            "price" => $this->price,
            "image" => $this->image,
            "description" => $this->description,
            "creator" => $this->creator,
            "product_id" => $this->product_id
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

    private function validateImage() {
        $imageName = $this->raw_image['name'];
        $imageTmpName = $this->raw_image['tmp_name'];
        $imageSize = $this->raw_image['size'];
        $imageError = $this->raw_image['error'];
        $imageType = $this->raw_image['type'];

        $imageExt = explode('.', $imageName);
        $imageActualExt = strtolower(end($imageExt));
        // Allowed types for an image
        $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'webp');

        if (in_array($imageActualExt, $allowed)) {
            if ($imageError === 0) {
                if ($imageSize < 1000000) {
                    $imageNameNew = uniqid('', true).".".$imageActualExt;
                    $imageDestination = '../../../www/assets/images/'.$imageNameNew;
                    $this->image = $imageNameNew;
                    move_uploaded_file($imageTmpName, $imageDestination);
                } else {
                    $this->error = "Your image size is too big. Please choose another image!";
                }
            } else {
                $this->error = "Founded error in uploading image. Please choose another image!";
            }
        } else {
            $this->error =  "You cannot upload image of this type!. Please choose another image!";
        }
    }
}

?>