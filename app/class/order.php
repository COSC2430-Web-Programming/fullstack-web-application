<?php
class Order {
    private $order_id;
    private $products_list;
    private $total_price;
    private $address;
    private $status;
    private $distribution_hub;
    public $error;
    public $success;
    private $storage = "../../database/orders.db";
    private $stored_orders;
    private $new_order;

    function __construct($products_list, $total_price, $address, $status, $distribution_hub) {
        $this->order_id = uniqid('order_',true);
        $this->products_list = $products_list;
        $this->total_price = $total_price;
        $this->address = trim($address);
        $this->status = $status;
        $this->distribution_hub = $distribution_hub;
        $this->stored_orders = json_decode(file_get_contents($this->storage), true);

        $this->new_order = [
            "order_id" => $this->order_id,
            "products_list" => $this->products_list,
            "total_price" => $this->total_price,
            "address" => $this->address,
            "status" => $this->status,
            "distribution_hub" => $this->distribution_hub
        ];

        if ($this->checkFieldValueofOrder() == TRUE){
            $this-> insertOrder();
        }
    }

    private function checkFieldValueofOrder(){
        if (count($this->products_list) == 0) {
            $this->error = "There is no product in the cart. Cannot check out the order!";
            return false;
        }

        return true;
    }

    protected function insertOrder(){
        array_push($this->stored_orders, $this->new_order);
        if (file_put_contents($this->storage, json_encode($this->stored_orders, JSON_PRETTY_PRINT))) {
            return $this->success = "Successfully ordered.";
        } else {
            $this->error = "Unsuccessfully ordered, please try again.";
        }
    }

    // 

    // For Shipper page: Update Status Function
}

?>