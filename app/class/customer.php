<?php include 'user.php'; ?>
<?php 

class Customer extends User {
    protected $name;
    protected $address;

    function __construct($username, $password, $raw_password, $profilePicture, $name, $address) {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $this->username = $username;
        $this->password = $password;
        $this->raw_password = $raw_password;
        $this->profilePicture = $profilePicture;
        $this->name = $name;
        $this->address = $address;
        $this->registeredTime = date('Y-m-d H:i');
        $this->role = CUSTOMER_ROLE;
        $this->stored_users = json_decode(file_get_contents($this->storage), true);
        validateImage();

        $this->new_user = [
            "username" => $this->username,
            "password" => $this->password,
            "profilePicture" => $this->profilePicture,
            "name" => $this->name,
            "address" => $this->address,
            "registeredTime" => $this->registeredTime,
            "role" => $this->role
        ];
        
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
}

?>