<?php

//change logo action
class logoClass{
    private $flogo;
    
    public function setLogo($flogo){
        if ($flogo==0 || $flogo == 1){
            $this->flogo = $flogo;
        }
    }

    public function updateLogo($conn){
        if (isset($this->flogo)){
            $sql = "UPDATE site_info SET logo_action = '$this->flogo' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:settings');
                    
                }
        }      
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['logo'])){
        $flogo = test_input($_POST['logo']);
    
    $api = new logoClass();
    $api->setLogo($flogo);
    $api->updateLogo($conn);
    }  
}