<?php
define('VENDOR_ROLE', 0);
define('CUSTOMER_ROLE', 1);
define('SHIPPER_ROLE', 2);

class User {
    protected $username;
    protected $password;
    protected $raw_password;
    protected $profilePicture;
    protected $rawProfilePicture;
    protected $registeredTime;
    public $role;
    public $error;
    public $success;
    protected $storage = "../../../accounts.db";
    protected $stored_users;
    protected $new_user;

    function __construct($username, $password, $rawProfilePicture) {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $this->username = trim($username);
        $this->username = filter_var($username, FILTER_UNSAFE_RAW);
        $this->password = filter_var(trim($password), FILTER_UNSAFE_RAW);
        $this->registeredTime = date('Y-m-d H:i');
        $this->stored_users = json_decode(file_get_contents($this->storage), true);
        $this->rawProfilePicture = $rawProfilePicture;
        $this->validateImage();

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
        if (!(8 <= strlen($this->username) && strlen($this->username) <= 15)) return false;

        // password: contains at least one upper case letter, 
        // at least one lower case letter, 
        // at least one digit, 
        // at least one special letter in the set !@#$%^&*, NO other kind of characters
        $passwordPat = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,20})/";
        if (!preg_match($passwordPat, $this->raw_password)) return false;
        // password has length from 8 to 20 characters
        if (!(8 <= strlen($this->raw_password) && strlen($this->raw_password)<= 20)) return false;

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

    private function storeData() {
        file_put_contents(
            $this->storage,
            json_encode($this->stored_users, JSON_PRETTY_PRINT)
        );
    }

    protected function updateUser($username, $field, $value){
        foreach($this->stored_users as $key => $stored_user){
            if($stored_user['username'] == $username){
                $this->stored_users[$key][$field] = $value;
            }
        }
        $this->storeData();
    }

    public function getStoredUsers(){
        return $this->stored_users;
    }

    protected function validateImage() {
        $imageName = $this->rawProfilePicture['name'];
        $imageTmpName = $this->rawProfilePicture['tmp_name'];
        $imageSize = $this->rawProfilePicture['size'];
        $imageError = $this->rawProfilePicture['error'];
        $imageType = $this->rawProfilePicture['type'];

        $imageExt = explode('.', $imageName);
        $imageActualExt = strtolower(end($imageExt));
        // Allowed types for an image
        $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'webp');

        if (in_array($imageActualExt, $allowed)) {
            if ($imageError === 0) {
                if ($imageSize < 1000000) {
                    $imageNameNew = uniqid('', true).".".$imageActualExt;
                    $imageDestination = '../../../assets/images/'.$imageNameNew;
                    $this->profilePicture = $imageNameNew;
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