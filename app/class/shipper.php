<?php include 'user.php'; ?>
<?php 
class Shipper extends User {
    protected $distributionHub;

    function __construct($username, $password, $distributionHub, $profilePicture) {
        $this->username = $username;
        $this->password = $password;
        $this->distributionHub = $distributionHub;
        $this->profilePicture = $profilePicture;
        $this->registeredTime = date('Y-m-d H:i');
        $this->role = SHIPPER_ROLE;
        $this->stored_users = json_decode(file_get_contents($this->storage), true);

        $this->new_user = [
            "username" => $this->username,
            "password" => $this->password,
            "distributionHub" => $this->distributionHub,
            "profilePicture" => $this->profilePicture,
            "registeredTime" => $this->registeredTime,
            "role" => $this->role
        ];
        
        if ($this->checkFieldValues() == TRUE) {
            $this->insertUser();
        }
    }

    protected function insertUser() {
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