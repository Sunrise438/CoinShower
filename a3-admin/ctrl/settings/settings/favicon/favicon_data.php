<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST["upfavicon"])){

//directry
$target_dir = "../image/img/";

$target_file = $target_dir . basename($_FILES["ffavicon"]["name"]);

$uploadOk = 1;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["ffavicon"]["tmp_name"]);
    //check if image is ico
    if($check !== false) {
        if($check['mime'] == 'image/vnd.microsoft.icon'){

            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

    } else {
        $uploadOk = 0;
    }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {

        } else {
            if (move_uploaded_file($_FILES["ffavicon"]["tmp_name"], $target_file)) {
                //rename file
                $rename_image = $target_dir."/favicon.ico";
                rename($target_file,$rename_image);
                //echo "The file ". htmlspecialchars( basename( $_FILES["ffavicon"]["name"])). " has been uploaded.";
            } else {
                //echo "Sorry, there was an error uploading your file.";
            }
        }  
        
        header('location:settings');
    
    }  
}