<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require '../../lng/en.php';
    require '../fun.php';
    if(checkImage($_POST['suggest']) == 1){
        
    } else {
        echo ucwords($enterValidImageUrlName);
    }
}

