<?php
define('VENDOR_ROLE', 0);
define('CUSTOMER_ROLE', 1);
define('SHIPPER_ROLE', 2);

class User {
    protected $username;
    protected $password;
    protected $profilePicture;
    protected $registeredTime;
    public $role;
    public $error;
    public $success;
    protected $storage = "../../database/accounts.db";
    protected $stored_users;
    protected $new_user;

    function __construct($username, $password) {
        $this->username = trim($username);
        $this->username = filter_var($username, FILTER_UNSAFE_RAW);
        $this->password = filter_var(trim($password), FILTER_UNSAFE_RAW);
        $this->registeredTime = date('Y-m-d H:i');
        $this->stored_users = json_decode(file_get_contents($this->storage), true);

        $this->new_user = [
            "username" => $this->username,
            "password" => $this->password,
        ];

        if ($this->checkFieldValues()) {
            $this->insertUser();
        }
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRegistrationTime($registeredTime) {
        $this->registeredTime = $registeredTime;
    }

    function getUserId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getRegistrationTime() {
        return $this->registeredTime;
    }

    public function jsonSerialize() {
        $vars = get_object_vars($this);
        return $vars;
    }

    protected function checkFieldValues(){
        // Check if username or password field is empty
        if (empty($this->username) && empty($this->password)) {
            $this->error = "Please input both username and password";
            return false;
        } else if (empty($this->username)) {
            $this->error = "Please input username";
            return false;
        } else if (empty($this->password)) {
            $this->error = "Please input password";
            return false;
        }

        return true;
    }

    protected function usernameExists(){
        // Check if the username exists in the database
        foreach((array) $this->stored_users as $user) {
            if ($this->username == $user['username']) {
                $this->error = "Username exists, please choose another one";
                return true;
            }
        }
        return false;
    }

    protected function insertUser(){
        if($this->usernameExists() == FALSE) {
            array_push($this->stored_users, $this->new_user);

            // Write data to file
            if (file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))) {
                return $this->success = "Successfully registered";
            } else {
                $this->error = "Unsuccessfully registered, please try again";
            }
        }

    }
}

?>