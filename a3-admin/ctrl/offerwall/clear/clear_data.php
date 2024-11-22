<?php
session_start();

if (isset($_SESSION['aemail'])){
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //delete earn history
        $limit = htmlspecialchars(strip_tags(trim($_POST['chv'])));
        $limit = (int)$limit;

        require '../../../config/config.php';
        require '../../../libs/site_info.php';
        require '../../../lng/en.php';
        
        //check history if exist
        $sql = "SELECT id FROM offerwall_history WHERE date < CURDATE() LIMIT 10";
        $result = $conn->query($sql);
        if ($result->num_rows>0){
            $sql = "DELETE FROM offerwall_history WHERE date < CURDATE() ORDER BY date ASC LIMIT $limit";
                if ($conn->query($sql) === TRUE){
                    echo ucfirst($deletedSuccessfullyName);
                } 
        }else {
            echo ucfirst($noRecordName);
        } 
        
    }

$conn->close();
}
exit();