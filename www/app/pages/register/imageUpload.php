<?php
$profilePicture =  $_FILES['profilePicture'];
$imageName = $_FILES['profilePicture']['name'];
$imageTmpName = $_FILES['profilePicture']['tmp_name'];
$imageSize = $_FILES['profilePicture']['size'];
$imageError = $_FILES['profilePicture']['error'];
$imageType = $_FILES['profilePicture']['type'];

$imageExt = explode('.', $imageName);
$imageActualExt = strtolower(end($imageExt));
// Allowed types for an image
$allowed = array('jpg', 'jpeg', 'png', 'pdf');

if (in_array($imageActualExt, $allowed)) {
    if ($imageError === 0) {
        if ($imageSize < 1000000) {
            $imageNameNew = uniqid('img_', true).".".$imageActualExt;
            $imageDestination = '../../../assets/images/'.$imageNameNew;
            move_uploaded_file($imageTmpName, $imageDestination);
        } else {
            echo "Your image size is too big. Please choose another image!";
        }
    } else {
        echo "Founded error in uploading image. Please choose another image!";
    }
} else {
    echo "You cannot upload image of this type!. Please choose another image!";
}
?>