<?php include 'user.php'; ?>
<?php 
class Shipper extends User {
    protected $distributionHub;

    function __construct($username, $password, $distributionHub, $profilePicture) {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
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
}

?>