<?php
class OrderUser {
    public $username;
    public $name;
    public $address;

    function __construct($username, $name, $address) {
        $this->username = $username;
        $this->name = $name;
        $this->address = $address;
    }   
}
?>