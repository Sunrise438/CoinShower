<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $amount = test_input($_POST['amount']);
    echo $amount;
    if ($amount > 0){
        $update = baltopb($amount);
        if ($update == 1){
            createBaltopbHistory($amount);
        }
        
    }
    header('location:deposit');
}

