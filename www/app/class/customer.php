<?php include 'user.php'; ?>
<?php 
class Customer extends User {
    protected $name;
    protected $address;

    function __construct($username, $password, $raw_password, $rawProfilePicture, $name, $address) {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $this->username = $username;
        $this->password = $password;
        $this->raw_password = $raw_password;
        $this->rawProfilePicture = $rawProfilePicture;
        $this->name = $name;
        $this->address = $address;
        $this->registeredTime = date('Y-m-d H:i');
        $this->role = CUSTOMER_ROLE;
        $this->stored_users = json_decode(file_get_contents($this->storage), true);
        
        if ($this->checkFieldValues() == TRUE && $this->checkFieldValuesOfCustomer() == TRUE) {
            $this->insertUser();
        }
    }

    private function checkFieldValuesOfCustomer() {
        // Error messages have already displayed by checking in client side
        if (strlen($this->name) < 5) return false;
        if (strlen($this->address) < 5) return false;

        return true;
    }

    protected function insertUser(){
        if($this->usernameExists() == FALSE) {
            $this->validateImage();

            $this->new_user = [
                "username" => $this->username,
                "password" => $this->password,
                "profilePicture" => $this->profilePicture,
                "name" => $this->name,
                "address" => $this->address,
                "registeredTime" => $this->registeredTime,
                "role" => $this->role
            ];
            
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