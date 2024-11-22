<?php

//change api class
class siteInfoClass{
    private $fsitename;
    private $fsiteurl;

    //set site name
    public function setSiteName($fsitename){
        if (isset($fsitename)){
            $this->fsitename = $fsitename;
        }
    }
    
    //set site url
    public function setSiteUrl($fsiteurl){
        if (isset($fsiteurl)){
            $this->fsiteurl = $fsiteurl;
        }
    }

    //update site name
    public function updateSiteName($conn){
        if (isset($this->fsitename)){
            
            //update site name
            $sql = "UPDATE site_info SET site_name = '$this->fsitename' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                      
                }   
        }      
    }
    
     //update site url
    public function updateSiteUrl($conn){
        if (isset($this->fsiteurl)){
            
            //update site name
            $sql = "UPDATE site_info SET site_url = '$this->fsiteurl' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                      
                }   
        }      
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //site name update
    if(isset($_POST['fsitename'])){
        $fsitename = test_input($_POST['fsitename']);

        $api = new siteInfoClass();
        $api->setSiteName($fsitename);
        $api->updateSiteName($conn);
        header('location:settings');
    }  
    
    //site url update
    if(isset($_POST['fsiteurl'])){
        $fsiteurl = test_input($_POST['fsiteurl']);

        $api = new siteInfoClass();
        $api->setSiteUrl($fsiteurl);
        $api->updateSiteUrl($conn);
        header('location:settings');
    } 
}