<?php

$sql = "SELECT * FROM ads WHERE id = '1'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


$siteName = '';

$siteNameErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['websiteName'])){
        $siteNameErr = 'Enter website name';
        
    } else {
        $siteName = test_input($_POST['websiteName']);
        
        $sql = "UPDATE ads SET sitename = '$siteName' WHERE id = '1'";

         if ($conn->query($sql) === TRUE) {
             echo "Website Name updated successfully";
             header('location:settings');
             
         } else {
             echo "Error updating record: " . $conn->error;
             
          }
        
    }
    
}
