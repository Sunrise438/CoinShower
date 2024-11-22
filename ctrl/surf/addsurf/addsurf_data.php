<?php

if($_SERVER["REQUEST_METHOD"] ==  "POST"){
    if (isset($_POST["title"]) && isset($_POST["url"]) && isset($_POST["countryCode"]) && isset($_POST["duration"]) && isset($_POST['a'])){
        $title = test_input($_POST['title']);
        $description = test_input($_POST['description']);
        $rmin = test_input($_POST['rmin']);
        if (checkUrl($_POST['url'])){
            $url = test_input($_POST['url']);
        } else {
            $dataErr = ucfirst($enterValidUrlName);
        }
        $countryCode= test_input($_POST['countryCode']);
        $duration = test_input($_POST['duration']);
        
        if (isset($title) && isset($url) && isset($duration) && isset($countryCode) && isset($_POST['a'])){
            if ($_POST['a'] == 'a'){
                if (createCampaignSurf($title, $url, $duration, $description, $countryCode, $rmin)){
                    header('location:surfads');
                } else {
                    $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
                }
            }elseif ($_POST['a'] == 'e' && isset ($_POST['id'])) {
                $_surf_id = test_input($_POST['id']);
                if (editCampaignSurf($_surf_id, $title, $url, $duration, $description, $countryCode, $rmin)){
                    header('location:surfads');
                } else {
                    $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
                }
            } else {
                $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
            }
        } else {
            $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
        }
    } else {
        $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
    }
}

if($_SERVER["REQUEST_METHOD"] ==  "GET"){
    if (isset($_GET['a']) && isset($_GET['token'])){
        if ($_GET['a'] == 'edit'){
            $surf_id = test_input(base64_decode($_GET['token']));
            $surf_id = (int)$surf_id;
            $ads_info = surfInfoById($surf_id);
        }
    }
}