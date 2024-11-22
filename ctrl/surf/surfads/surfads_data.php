<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['id']) && isset($_POST['deposit'])){
        $surf_id = test_input($_POST['id']);
        $amount = test_input($_POST['deposit']);
        updateSurfDeposit($surf_id, $amount);
    }
    header('location:surfads');
}

if (isset($_GET['a']) && isset($_GET['token'])){
    require __DIR__.'/action/action.php';
    $surf_id = test_input(base64_decode($_GET['token']));
    if ($_GET['a'] == 'edit'){
        header('location:addsurf?a=edit&token='. base64_encode($surf_id));
    }if ($_GET['a'] == 'pause' || $_GET['a'] == 'play'){
        require __DIR__.'/action/active.php';
    }else if ($_GET['a'] == 'delete'){
        require __DIR__.'/action/delete.php';
    }
}