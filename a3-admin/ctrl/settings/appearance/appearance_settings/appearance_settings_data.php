<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['file']) && isset($_POST['code'])){
        $file = $_POST['file'];
        $code = $_POST['code'];
        writeFile($file, $code);
        header('location:'.$_SERVER['HTTP_REFERER']);
        }
}
