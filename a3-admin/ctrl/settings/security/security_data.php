<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['countrycodecheck'])){
        if ($_POST['countrycodecheck']==1 || $_POST['countrycodecheck']==0){
            $status = test_input($_POST['countrycodecheck']);
            changeCountryCodeCheck($status);
        }

    }  
    
    header('location:security');
}