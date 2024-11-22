<?php

//user delete
class userDeleteClass{
    private $femail;
    
    public function setUserDelete($femail){
        if (isset($femail)){
            $this->femail = $femail;
        }
    }

    public function updateUserDelete($conn){
        if (isset($this->femail)){
            
            $sql = "SELECT id FROM users WHERE uname = '$this->femail' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $user_id = $row['id'];
            //delete user
            $ok = 0;
            $sql = "DELETE FROM users WHERE uname = '$this->femail' ";
                if ($conn->query($sql) === TRUE){
                    $ok = 1;
                }
                
            if ($ok == 1){
                //delete transaction  
                $sql = "DELETE FROM faucet_history WHERE uname = '$this->femail' ";
                    if ($conn->query($sql) === TRUE){

                    }
                    
                //delete referrals  
                $sql = "DELETE FROM ref WHERE uname = '$user_id' ";
                    if ($conn->query($sql) === TRUE){

                    }
            } 
            
            header('location:users_info?token='. urlencode($this->femail)).'&a=d';
            
        }      
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['userdelete']) && isset($_POST['user']) && $_POST['userdelete'] == 'd'){
        
        $femail = test_input($_POST['user']);
    
    $api = new userDeleteClass();
    $api->setUserDelete($femail);
    $api->updateUserDelete($conn);
    } 
}