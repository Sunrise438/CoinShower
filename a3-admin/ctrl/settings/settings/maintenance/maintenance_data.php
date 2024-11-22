<?php

//change api class
class maintenanceClass{
    private $fmaintenance;
    
    public function setMaintenance($fmaintenance){
        if ($fmaintenance==0 || $fmaintenance == 1){
            $this->fmaintenance = $fmaintenance;
        }
    }

    public function setMaintenanceMode($conn){
        if (isset($this->fmaintenance)){
            $sql = "UPDATE site_info SET maintenance_action = '$this->fmaintenance' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:settings');
                    
                }
        }      
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['maintenance'])){
        $fmaintenance = test_input($_POST['maintenance']);
    
    $api = new maintenanceClass();
    $api->setMaintenance($fmaintenance);
    $api->setMaintenanceMode($conn);
    }  
}