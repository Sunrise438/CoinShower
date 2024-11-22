<?php

//set status play
if ($_GET['a'] == 'p'){
    $sql = "UPDATE shortlinks SET status = 1 WHERE id = '$aid'";
    if ($conn->query($sql) === TRUE){
        header('location:shortlinks');
    }
}

//set status pause
if ($_GET['a'] == 's'){
    $sql = "UPDATE shortlinks SET status = 0 WHERE id = '$aid'";
    if ($conn->query($sql) === TRUE){
        header('location:shortlinks');
    }
}