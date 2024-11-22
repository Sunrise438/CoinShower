<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    /*
     * update top code
     */
    if (isset($_POST['topcode'])){
        $myfile=  '../libs/code/top_code.php';
        if ($_POST['topcode'] == ''){
            $txt = '';
        } else {
            $txt = $_POST['topcode'];
        }
        
        writeFile($myfile, $txt);
        header('location:code');
    }
    
    /*
     * update bottom code
     */
    if (isset($_POST['bottomcode'])){
        $myfile=  '../libs/code/bottom_code.php';
        if ($_POST['bottomcode'] == ''){
            $txt = '';
        } else {
            $txt = $_POST['bottomcode'];
        }
        writeFile($myfile, $txt);
        header('location:code');
    }
    
    /*
     * update left code
     */
    if (isset($_POST['leftcode'])){
        $myfile=  '../libs/code/left_code.php';
        if ($_POST['leftcode'] == ''){
            $txt = '';
        } else {
            $txt = $_POST['leftcode'];
        }
        writeFile($myfile, $txt);
        header('location:code');
    }
    
    /*
     * update right code
     */
    if (isset($_POST['rightcode'])){
        $myfile=  '../libs/code/right_code.php';
        if ($_POST['rightcode'] == ''){
            $txt = '';
        } else {
            $txt = $_POST['rightcode'];
        }
        writeFile($myfile, $txt);
        header('location:code');;
    }
        
    /*
     * update head code
     */
    if (isset($_POST['headcode'])){
        $myfile=  '../libs/code/head_code.php';
        if ($_POST['headcode'] == ''){
            $txt = '';
        } else {
            $txt = $_POST['headcode'];
        }
        writeFile($myfile, $txt);
        header('location:code');
    }
    
    /*
     * update footer code
     */
    if (isset($_POST['footercode'])){
        $myfile=  '../libs/code/footer_code.php';
        if ($_POST['footercode'] == ''){
            $txt = '';
        } else {
            $txt = $_POST['footercode'];
        }
        writeFile($myfile, $txt);
        header('location:code');
    }
}