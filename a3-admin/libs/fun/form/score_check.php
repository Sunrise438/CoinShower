<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require '../../lng/en.php';
    require '../fun.php';
    if(checkScore($_POST['suggest']) == 1){
        
    } else {
        echo ucwords($enterName).' ', ucfirst($scoreName).' '.$betweenName.' 0 - 10';
    }
}

