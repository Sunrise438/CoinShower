<?php
$ok = 0;

if (isset($_GET['token'])){
    $fuser = htmlspecialchars(strip_tags(trim($_GET['token'])));
    
    // Validate e-mail
    if (isset($fuser)) {
        // select user info
        
        $sql = "SELECT * FROM users WHERE uname = '$fuser' ";
        $result = $conn->query($sql);

        if ($result->num_rows>0){
            $ok = 1; 
            $row = $result->fetch_assoc();
            $user_id = $row['id'];
            $user_email =$row['uname'];
            
        } else {
            $dataErr = ucfirst($noRecordsFoundName);

        }
        
    } else {
        $dataErr = ucfirst($enterName).' '. ucfirst($validName).' '. ucfirst($userNameName);
    }
}

