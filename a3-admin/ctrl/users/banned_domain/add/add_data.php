<?php

//add banned domain
class addBannedDomainClass{
    private $fdomain;
    
    public function setDomain($fdomain){
        if (isset($fdomain)){
            $this->fdomain = $fdomain;
        }
    }

    public function addDomain($conn){
        if (isset($this->fdomain)){
            
            //select banned domain 
            $ok = 0;
            $sql = "SELECT email FROM banned_email WHERE email = '$this->fdomain' ";
            $result = $GLOBALS['conn']->query($sql);
            if ($result->num_rows>0){
                $row = $result->fetch_assoc();
                $ok = 1;
            } else {
                $ok = 0;
            }
            
            if ($ok == 0){
                //add to banned domain
                $sql = "INSERT INTO banned_email (email) VALUES('$this->fdomain')";
                if ($GLOBALS['conn']->query($sql) === TRUE){
                    return 1;
                } else {
                    return 0;
                }
            }
            
        }      
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['domain'])){
        
        $fdomain = test_input($_POST['domain']);

        $api = new addBannedDomainClass();
        $api->setDomain($fdomain);
        $api->addDomain($conn);
        header('location:banned_domain');
    } 
}