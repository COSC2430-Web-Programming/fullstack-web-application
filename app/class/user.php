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
        date_default_timezone_set("Asia/Ho_Chi_Minh");
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

        // Check other constraints
        // username contains only letters and digits
        $usernamePat = "/^[a-zA-Z0-9]*$/";
        if (!preg_match($usernamePat, $this->username)) return false;
        // username's length from 8 to 15 chars
        if (!(8 <= ($this->username).length && ($this->username).length <= 15)) return false;
        // password checked in client side

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