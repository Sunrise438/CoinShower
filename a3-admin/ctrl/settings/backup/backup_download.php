<?php
//download backup file
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['dbname'])){
        $file = "../../../backup_db/".$_POST['dbname'];

        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"" . basename($file) . "\"");

        readfile($file);
        
    }
}