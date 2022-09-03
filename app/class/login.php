<?php
define('VENDOR_ROLE', 0);
define('CUSTOMER_ROLE', 1);
define('SHIPPER_ROLE', 2);

class LoginUser {
    private $username;
    private $password;
    public $error;
    public $success;
    private $storage = "../database/accounts.db";
    private $stored_users; 
    private $new_user;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
        $this->stored_users = json_decode(file_get_contents($this->storage), true);
        $this->login();
    }

    private function login() {
        foreach ($this->stored_users as $user) {
            if($user['username'] == $this->username){
                if(password_verify($this->password, $user['password'])){ // the first argument is plain password, the second is the hashed password
                    // Set a session
                    session_start();
                    // Redirect the users to their accounts
                    $_SESSION['user'] = $this->username;
                    
                    if ($user['role'] === VENDOR_ROLE) {
                        header("location: homepage/vendorHomepage.php");
                    } else if ($user['role'] === CUSTOMER_ROLE) {
                        header("location: homepage/customerHomepage.php");
                    } else if ($user['role'] === SHIPPER_ROLE) {
                        header("location: homepage/shipperHomepage.php");
                    }

                    exit();

                    return  $this->success = "Successfully loged in";
                }
            }
        }
        return $this->error = "Wrong input username or password";
    }
}

?>