<?php

//change api class
class userActionClass{
    private $fuseracton;
    
    public function setUserAction($fuseracton){
        if ($fuseracton==0 || $fuseracton == 1){
            $this->fuseracton = $fuseracton;
        }
    }

    public function updateUserAction($conn, $femail){
        if (isset($this->fuseracton)){
            $sql = "UPDATE users SET status = '$this->fuseracton' WHERE uname = '$femail' ";
                if ($conn->query($sql) === TRUE){
                    header('location:users_info?token='. urlencode($femail));
                    
                }
        }      
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['useracton']) && isset($_POST['user'])){
        $fuseracton = test_input($_POST['useracton']);
        $femail = test_input($_POST['user']);
    
    $api = new userActionClass();
    $api->setUserAction($fuseracton);
    $api->updateUserAction($conn, $femail);
    }  
}