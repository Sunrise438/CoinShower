<?php
//delete backup file
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if (isset($_POST['dbdelete'])){
        $file = "backup_db/".$_POST['dbdelete'];
        
        unlink($file);

        header('location:backup');
    }
}